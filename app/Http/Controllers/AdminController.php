<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TrafficLog;
use App\Models\ProductAnalytics;
use App\Models\User;
use App\Models\Role;
use App\Models\Creator;
use App\Models\TiktokVideo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $days = (int) $request->query('range', 30);
        $startDate = Carbon::today()->subDays($days);

        // Totals for the specified range
        $totalClicks = ProductAnalytics::where('date', '>=', $startDate)->sum('clicks_count');
        $totalConversions = ProductAnalytics::where('date', '>=', $startDate)->sum('conversions_count');
        $totalRevenue = ProductAnalytics::where('date', '>=', $startDate)->sum('revenue');
        $conversionRate = $totalClicks > 0 ? ($totalConversions / $totalClicks) * 100 : 0;

        $activeProductsCount = Product::where('is_active', true)->count();
        $liveCampaignsCount = Product::where('status', 'featured')->count();

        // Performance Chart (last $days available dates, limited to 14 for visual clarity)
        $performanceData = ProductAnalytics::where('date', '>=', $startDate)
            ->select(
                'date',
                DB::raw('SUM(clicks_count) as total_clicks'),
                DB::raw('SUM(conversions_count) as total_conversions')
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->take(14)
            ->get();

        // Top Platforms Split
        $platformCounts = TrafficLog::where('created_at', '>=', $startDate)
            ->select('device_type', DB::raw('count(*) as count'))
            ->groupBy('device_type')
            ->get();

        $totalTraffic = $platformCounts->sum('count');

        $platforms = $platformCounts->map(function ($item) use ($totalTraffic) {
            return [
                'name' => ucfirst($item->device_type),
                'share' => $totalTraffic > 0 ? round(($item->count / $totalTraffic) * 100) : 0,
                'color' => $this->getPlatformColor($item->device_type),
                'icon' => $this->getPlatformIcon($item->device_type)
            ];
        });

        // Recent Link Activity (using real TikTok video data)
        $recentActivities = TiktokVideo::with(['creator', 'products'])
            ->where('posted_at', '>=', $startDate)
            ->orderBy('posted_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'product' => $item->products->first() ? $item->products->first()->name : 'General',
                    'creator' => $item->creator ? $item->creator->name : 'Anonymous',
                    'platform' => ucfirst($item->creator ? $item->creator->platform : 'Web'),
                    'clicks' => $item->clicks_count,
                    'status' => 'Active'
                ];
            });

        return view('admin.dashboard', compact(
            'totalClicks',
            'totalConversions',
            'totalRevenue',
            'conversionRate',
            'activeProductsCount',
            'liveCampaignsCount',
            'performanceData',
            'platforms',
            'recentActivities',
            'days'
        ));
    }

    public function analytics(Request $request)
    {
        $days = (int) $request->query('range', 30);
        $startDate = Carbon::today()->subDays($days);

        // Conversion Tracking Chart (for the range)
        $chartData = ProductAnalytics::where('date', '>=', $startDate)
            ->select(
                'date',
                DB::raw('SUM(clicks_count) as clicks'),
                DB::raw('SUM(conversions_count) as conversions')
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->take(14)
            ->get();

        $maxVal = $chartData->max(fn($item) => max($item->clicks, $item->conversions)) ?: 1;
        $chartDataProcessed = $chartData->map(function ($item) use ($maxVal) {
            return [
                'c' => ($item->conversions / $maxVal) * 100,
                'v' => ($item->clicks / $maxVal) * 100,
                'date' => $item->date->format('D, M d')
            ];
        });

        // Device Split
        $platformCounts = TrafficLog::where('created_at', '>=', $startDate)
            ->select('device_type', DB::raw('count(*) as count'))
            ->groupBy('device_type')
            ->get();
        $totalTraffic = $platformCounts->sum('count');
        $devices = $platformCounts->map(function ($item) use ($totalTraffic) {
            return [
                'name' => ucfirst($item->device_type) . ($item->device_type == 'mobile' ? ' Apps' : ' Web'),
                'val' => $totalTraffic > 0 ? round(($item->count / $totalTraffic) * 100, 1) . '%' : '0%',
                'color' => $this->getPlatformColor($item->device_type)
            ];
        });

        // Product Click Performance
        $productPerformance = ProductAnalytics::with(['product.category'])
            ->where('date', '>=', $startDate)
            ->select(
                'product_id',
                DB::raw('SUM(clicks_count) as total_clicks'),
                DB::raw('SUM(conversions_count) as total_conversions'),
                DB::raw('SUM(revenue) as total_revenue')
            )
            ->groupBy('product_id')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->product ? $item->product->name : 'Unknown',
                    'cat' => ($item->product && $item->product->category) ? $item->product->category->name : 'N/A',
                    'clicks' => number_format($item->total_clicks),
                    'trend' => '+0%',
                    'conv' => ($item->total_clicks > 0 ? round(($item->total_conversions / $item->total_clicks) * 100) : 0) . '%',
                    'rev' => '$' . number_format($item->total_revenue, 2),
                    'img' => $item->product ? $item->product->image_url : null
                ];
            });

        // Top Visited Pages
        $topPages = TrafficLog::where('created_at', '>=', $startDate)
            ->select('page_url', DB::raw('count(*) as count'))
            ->groupBy('page_url')
            ->orderBy('count', 'desc')
            ->take(4)
            ->get()
            ->map(function ($item) {
                return [
                    'path' => $item->page_url ?: '/',
                    'cat' => 'General',
                    'visits' => number_format($item->count / 1000, 1) . 'k',
                    'trend' => '+0%'
                ];
            });

        return view('admin.analytics', compact('chartDataProcessed', 'devices', 'productPerformance', 'topPages', 'days'));
    }

    public function products()
    {
        $products = Product::with(['category', 'ageGroup'])->get();

        $totalViews = ProductAnalytics::sum('clicks_count');
        $totalConversions = ProductAnalytics::sum('conversions_count');
        $avgConvRate = $totalViews > 0 ? ($totalConversions / $totalViews) * 100 : 0;
        $featuredCount = Product::where('status', 'featured')->count();

        $productsData = $products->map(function ($p) {
            $analytics = ProductAnalytics::where('product_id', $p->id)->first();
            return [
                'id' => $p->id,
                'name' => $p->name,
                'sku' => $p->sku ?? 'KW-' . (1000 + $p->id),
                'cat' => $p->category ? $p->category->name : 'N/A',
                'age' => $p->ageGroup ? $p->ageGroup->name : 'N/A',
                'price' => '$' . number_format($p->price, 2),
                'rating' => $p->rating ?? 0,
                'status' => $p->status ? ucfirst($p->status) : null,
                'active' => $p->is_active,
                'img' => $p->image_url,
                'clicks' => $analytics ? $analytics->clicks_count : 0
            ];
        });

        return view('admin.products', [
            'products' => $productsData,
            'totalViews' => number_format($totalViews / 1000, 1) . 'k',
            'convRate' => number_format($avgConvRate, 1) . '%',
            'featuredCount' => $featuredCount
        ]);
    }

    public function users()
    {
        $users = User::with('role')->get();

        $totalStaff = $users->count();
        $activeAdmins = User::whereHas('role', fn($q) => $q->where('slug', 'admin'))
            ->where('status', 'active')
            ->count();
        $contentManagers = User::whereHas('role', fn($q) => $q->where('slug', 'manager'))
            ->count();

        $usersData = $users->map(function ($u) {
            return [
                'name' => $u->name,
                'email' => $u->email,
                'role' => $u->role ? $u->role->name : 'N/A',
                'role_slug' => $u->role ? $u->role->slug : 'n/a',
                'status' => ucfirst($u->status ?? 'active'),
                'login' => $u->last_login_at ? \Carbon\Carbon::parse($u->last_login_at)->diffForHumans() : 'Never',
                'date' => $u->created_at ? $u->created_at->format('M d, Y') : 'N/A',
                'img' => 'https://ui-avatars.com/api/?name=' . urlencode($u->name) . '&background=random',
                'badge' => $this->getRoleBadge($u->role ? $u->role->slug : '')
            ];
        });

        return view('admin.users', compact('usersData', 'totalStaff', 'activeAdmins', 'contentManagers'));
    }

    private function getRoleBadge($slug)
    {
        return match ($slug) {
            'admin' => 'bg-sky-100 text-sky-800',
            'manager', 'product-manager' => 'bg-secondary-container text-on-secondary-container',
            default => 'bg-tertiary-container text-on-tertiary-container'
        };
    }

    private function getPlatformColor($type)
    {
        return match (strtolower($type)) {
            'desktop' => 'bg-slate-900',
            'mobile' => 'bg-pink-500',
            'tablet' => 'bg-red-600',
            default => 'bg-slate-400'
        };
    }

    private function getPlatformIcon($type)
    {
        return match (strtolower($type)) {
            'desktop' => 'movie_filter', // Reusing icons from dashboard mock
            'mobile' => 'camera',
            'tablet' => 'grid_view',
            default => 'devices'
        };
    }

    public function tiktok()
    {
        $videos = TiktokVideo::with(['creator', 'products'])->get();

        $totalViews = $videos->sum('views_count');
        $totalClicks = $videos->sum('clicks_count');
        $avgEngagement = $videos->avg('engagement_rate') ?: 0;

        $topPerformer = $videos->sortByDesc('views_count')->first();

        $videosData = $videos->map(function ($v) {
            $product = $v->products->first();
            return [
                'title' => $v->title,
                'url' => $v->tiktok_url,
                'img' => $v->thumbnail_path,
                'product' => $product ? $product->name : 'N/A',
                'product_img' => $product ? $product->image_url : null,
                'extra_products' => max(0, $v->products->count() - 1),
                'date' => $v->posted_at ? $v->posted_at->format('M d, Y') : 'N/A',
                'views' => number_format($v->views_count / 1000, 1) . 'K',
                'clicks' => number_format($v->clicks_count / 1000, 1) . 'K',
                'engagement' => number_format($v->engagement_rate, 1) . '%',
                'eng_width' => $v->engagement_rate . '%'
            ];
        });

        return view('admin.tiktok', [
            'videos' => $videosData,
            'totalViews' => number_format($totalViews / 1000000, 1) . 'M',
            'totalClicks' => number_format($totalClicks / 1000, 1) . 'K',
            'avgEngagement' => number_format($avgEngagement, 1) . '%',
            'topPerformerName' => $topPerformer ? ($topPerformer->products->first() ? $topPerformer->products->first()->name : $topPerformer->title) : 'None'
        ]);
    }
}
