<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\AgeGroup;
use App\Models\PlayType;
use App\Models\TrafficLog;
use App\Models\ProductAnalytics;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function home()
    {
        $this->recordTraffic();
        $featuredProducts = Product::where('status', 'featured')
            ->where('is_active', true)
            ->with(['category', 'ageGroup'])
            ->take(10)
            ->get();
        $categories = Category::all();
        return view('pages.home', compact('featuredProducts', 'categories'));
    }

    public function index(Request $request)
    {
        $this->recordTraffic();
        $query = Product::where('is_active', true)->with(['category', 'ageGroup']);

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('age_group')) {
            $query->whereHas('ageGroup', function ($q) use ($request) {
                $q->where('slug', $request->age_group);
            });
        }

        if ($request->filled('play_type')) {
            $query->whereHas('playTypes', function ($q) use ($request) {
                $q->where('slug', $request->play_type);
            });
        }

        $products = $query->get(); // Using get() for now as paginator might need more UI work
        $categories = Category::all();
        $ageGroups = AgeGroup::all();
        $playTypes = PlayType::all();

        return view('pages.category', compact('products', 'categories', 'ageGroups', 'playTypes'));
    }

    public function show($slug)
    {
        $this->recordTraffic();
        $product = Product::where('slug', $slug)->with(['category', 'ageGroup', 'playTypes'])->firstOrFail();

        // Record Product View
        $analytics = ProductAnalytics::firstOrCreate(
            ['product_id' => $product->id, 'date' => Carbon::today()],
            ['clicks_count' => 0, 'conversions_count' => 0, 'revenue' => 0]
        );
        $analytics->increment('clicks_count'); // In this context, "clicks" on the site index->detail counts as view/interest

        return view('pages.product', compact('product'));
    }

    public function click($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Record External Click
        $analytics = ProductAnalytics::firstOrCreate(
            ['product_id' => $product->id, 'date' => Carbon::today()],
            ['clicks_count' => 0, 'conversions_count' => 0, 'revenue' => 0]
        );
        $analytics->increment('conversions_count'); // For partner site clicks, we count as "conversions" (intent to buy)

        return redirect()->away($product->external_url);
    }

    private function recordTraffic()
    {
        TrafficLog::create([
            'page_url' => request()->path(),
            'device_type' => $this->getDeviceType(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    private function getDeviceType()
    {
        $agent = strtolower(request()->userAgent());
        if (strpos($agent, 'mobile') !== false || strpos($agent, 'android') !== false)
            return 'mobile';
        if (strpos($agent, 'tablet') !== false || strpos($agent, 'ipad') !== false)
            return 'tablet';
        return 'desktop';
    }
}
