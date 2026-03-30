@extends('layouts.admin')

@section('title', 'Analytics Overview - Kids World Admin')

@section('content')
    <!-- Page Title & Date Filter -->
    <div class="flex justify-between items-end mb-10">
        <div>
            <h2 class="text-3xl font-extrabold font-headline tracking-tight text-on-surface">Analytics Overview</h2>
            <p class="text-on-surface-variant font-body">Real-time performance tracking for Kids World ecosystem.</p>
        </div>
        <div class="flex gap-2 bg-surface-container-low p-1.5 rounded-xl">
            <button class="px-4 py-1.5 text-xs font-bold rounded-lg bg-surface-container-lowest shadow-sm text-primary">Last 30 Days</button>
            <button class="px-4 py-1.5 text-xs font-bold rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-colors">Last Quarter</button>
            <button class="px-4 py-1.5 text-xs font-bold rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-colors">Custom Range</button>
        </div>
    </div>

    <!-- Bento Grid Section -->
    <div class="grid grid-cols-12 gap-6">
        <!-- Conversion Tracking -->
        <div class="col-span-12 lg:col-span-8 bg-surface-container-lowest rounded-xl p-6 shadow-sm shadow-blue-900/5">
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h3 class="font-bold text-lg font-headline">Conversion Rates</h3>
                    <p class="text-xs text-on-surface-variant">Purchase intent vs. Actual checkouts</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-primary"></span>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant">Conversions</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-primary-container"></span>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant">Clicks</span>
                    </div>
                </div>
            </div>
            <!-- Simulated Chart Area -->
            <div class="h-64 relative flex items-end gap-1">
                @php
                    $chartData = [
                        ['c' => 40, 'v' => 60],
                        ['c' => 65, 'v' => 55],
                        ['c' => 55, 'v' => 70],
                        ['c' => 80, 'v' => 65],
                        ['c' => 90, 'v' => 80],
                        ['c' => 75, 'v' => 40],
                        ['c' => 60, 'v' => 50],
                    ];
                    $days = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'];
                @endphp
                @foreach($chartData as $data)
                <div class="flex-1 bg-surface-container-low rounded-t-lg group relative transition-all" style="height: {{ $data['c'] }}%;">
                    <div class="absolute inset-0 bg-primary opacity-20 rounded-t-lg group-hover:opacity-40 transition-opacity"></div>
                    <div class="absolute bottom-0 w-full bg-primary rounded-t-lg" style="height: {{ $data['v'] }}%;"></div>
                </div>
                @endforeach
            </div>
            <div class="flex justify-between mt-4 px-2 text-[10px] font-bold text-on-surface-variant font-label">
                @foreach($days as $day)
                <span>{{ $day }}</span>
                @endforeach
            </div>
        </div>

        <!-- Device Type -->
        <div class="col-span-12 lg:col-span-4 bg-surface-container-lowest rounded-xl p-6 shadow-sm shadow-blue-900/5 flex flex-col">
            <h3 class="font-bold text-lg font-headline mb-1">Device Split</h3>
            <p class="text-xs text-on-surface-variant mb-8">User traffic by hardware</p>
            <div class="flex-1 flex flex-col justify-center items-center">
                <div class="relative w-40 h-40 rounded-full border-[16px] border-primary-container flex items-center justify-center">
                    <div class="absolute inset-[-16px] w-40 h-40 rounded-full border-[16px] border-primary border-t-transparent border-l-transparent -rotate-45"></div>
                    <div class="text-center">
                        <p class="text-2xl font-black font-headline">72%</p>
                        <p class="text-[10px] uppercase font-bold text-on-surface-variant">Mobile</p>
                    </div>
                </div>
            </div>
            <div class="mt-8 space-y-3">
                @php
                    $devices = [
                        ['name' => 'Mobile Apps', 'val' => '72.4%', 'color' => 'bg-primary'],
                        ['name' => 'Desktop Web', 'val' => '21.1%', 'color' => 'bg-primary-container'],
                        ['name' => 'Tablets', 'val' => '6.5%', 'color' => 'bg-surface-variant'],
                    ];
                @endphp
                @foreach($devices as $dev)
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full {{ $dev['color'] }}"></span>
                        <span class="font-medium">{{ $dev['name'] }}</span>
                    </div>
                    <span class="font-bold">{{ $dev['val'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Click Tracking Table -->
        <div class="col-span-12 bg-surface-container-lowest rounded-xl shadow-sm shadow-blue-900/5 overflow-hidden">
            <div class="p-6 flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-lg font-headline">Product Click Performance</h3>
                    <p class="text-xs text-on-surface-variant">Detailed tracking per affiliate item</p>
                </div>
                <button class="text-xs font-bold text-primary flex items-center gap-1 hover:underline">
                    Export CSV <span class="material-symbols-outlined text-sm">download</span>
                </button>
            </div>
            <table class="w-full text-left">
                <thead class="bg-surface-container-low text-[10px] uppercase font-bold tracking-widest text-on-surface-variant">
                    <tr>
                        <th class="px-6 py-4">Product Name</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Unique Clicks</th>
                        <th class="px-6 py-4">Trend (7d)</th>
                        <th class="px-6 py-4">Conv. Rate</th>
                        <th class="px-6 py-4 text-right">Revenue</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    @php
                        $products = [
                            ['name' => 'Eco-Wooden Blocks Set', 'cat' => 'STEM Toys', 'clicks' => '12,402', 'trend' => '+14.2%', 'conv' => '35%', 'rev' => '$4,290.00', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAsrMTGJeU7s5Tsg_EIDEQlyKFTbmA4vBgvgjXfRuyMCJr--st8OdqXjj0tsrC0I6SJIodV7GM_GeE8PtppXJECDWgPCMcCyTzUXCIV8tFMhgQ7NP1wgIhQhwi8APy9uen97g3CPDLc7ACoXKhWkCutkAooRnj5y_gKKk4FOUEsuPkNj9jXgUijNcOGfSv2-RqOzjJb_JTkGP0hiZLrJ7f6zCloJP7fvia68DqYIafQEM4z8OfefMF7HY3bZQjsuF5gAQaBXbvqRA'],
                            ['name' => 'Moonlight Nursery Lamp', 'cat' => 'Decor', 'clicks' => '8,912', 'trend' => '-2.4%', 'conv' => '18%', 'rev' => '$1,150.40', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA8cXyUyvemXKHgrkYC0d5hCrrEj_TOg0VoRXl4A1QuvrLzNoY14JKiXbSnrS3su3WNtbvJYJs89pE_Ik4oKraOSy2bsj5izvBwxx1mldn7zpZKs0FUmClxaEJQv_k9BbN84Bd0RsHPUg5rEym2iu19ITKm9_q4gmoHnf7F3lKHBvCyYqNw_CK8bvm42_iElNaBpfy6zqY5HBas4zBrKN8tO-IhmsD-UBN6qwWG45Sap3V2Xx1Bf7fo3FlkB6SHGW8Warrh2wF2dg'],
                            ['name' => 'Organic Cotton Romper', 'cat' => 'Apparel', 'clicks' => '24,560', 'trend' => '+28.9%', 'conv' => '52%', 'rev' => '$8,122.15', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDjvOlmruIIlkYntaQKgztHUyKK0djCwj9b2jU0x2hTk66u58MG7WlYLvDuBdtckqz6SM4RsQDFEoWs0qvGEryMgxjnlGG1yTR5nvdsNMY9ckPLnpFd02UzcdGU863DZ4HGJ76_GVVyJ2ytnFIq3OnBbLJvunGziXn-sszuPAZfqjtodvqtjoSWwrhHn5W5aZG8kecw6bjRovEhEwUoQ90muHa3wIE1hBu7ZZC3ySRLz60XiBZiQJWKXoB5fXNB-uzMTjCHlLW9vA'],
                        ];
                    @endphp
                    @foreach($products as $p)
                    <tr class="hover:bg-surface-container-low/30 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-surface-container overflow-hidden">
                                    <img class="w-full h-full object-cover" src="{{ $p['img'] }}"/>
                                </div>
                                <span class="text-sm font-semibold">{{ $p['name'] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-on-surface-variant">{{ $p['cat'] }}</td>
                        <td class="px-6 py-4 text-sm font-bold">{{ $p['clicks'] }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1 {{ str_contains($p['trend'], '+') ? 'text-green-600' : 'text-error' }} font-bold text-xs">
                                <span class="material-symbols-outlined text-sm">{{ str_contains($p['trend'], '+') ? 'trending_up' : 'trending_down' }}</span>
                                {{ $p['trend'] }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden">
                                <div class="h-full bg-primary rounded-full" style="width: {{ $p['conv'] }}"></div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right font-black text-sm">{{ $p['rev'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- User Behavior Flow -->
        <div class="col-span-12 lg:col-span-7 bg-surface-container-lowest rounded-xl p-6 shadow-sm shadow-blue-900/5">
            <h3 class="font-bold text-lg font-headline mb-1">User Journey Flow</h3>
            <p class="text-xs text-on-surface-variant mb-8">Main paths from entry to checkout</p>
            <div class="flex items-center justify-between gap-4">
                <div class="flex-1 text-center">
                    <div class="bg-surface-container p-4 rounded-xl border-t-4 border-primary shadow-sm">
                        <p class="text-[10px] font-bold uppercase text-on-surface-variant">Blog Article</p>
                        <p class="text-lg font-black">65%</p>
                    </div>
                </div>
                <div class="text-primary-container"><span class="material-symbols-outlined">trending_flat</span></div>
                <div class="flex-1 text-center">
                    <div class="bg-surface-container p-4 rounded-xl border-t-4 border-primary shadow-sm">
                        <p class="text-[10px] font-bold uppercase text-on-surface-variant">Product Page</p>
                        <p class="text-lg font-black">42%</p>
                    </div>
                </div>
                <div class="text-primary-container"><span class="material-symbols-outlined">trending_flat</span></div>
                <div class="flex-1 text-center">
                    <div class="bg-surface-container-high p-4 rounded-xl border-t-4 border-primary-container shadow-sm">
                        <p class="text-[10px] font-bold uppercase text-on-surface-variant">Checkout</p>
                        <p class="text-lg font-black">12%</p>
                    </div>
                </div>
            </div>
            <div class="mt-12 p-4 bg-tertiary-container rounded-xl flex items-center gap-4">
                <span class="material-symbols-outlined text-on-tertiary-container">lightbulb</span>
                <p class="text-xs font-medium text-on-tertiary-container">Insight: Users who visit the "TikTok Trends" blog are 4x more likely to complete a purchase within 24 hours.</p>
            </div>
        </div>

        <!-- Top Visited Pages -->
        <div class="col-span-12 lg:col-span-5 bg-surface-container-lowest rounded-xl p-6 shadow-sm shadow-blue-900/5">
            <h3 class="font-bold text-lg font-headline mb-4">Top Visited Pages</h3>
            <div class="space-y-4">
                @php
                    $pages = [
                        ['path' => '/gift-guides/stem-toys-2024', 'cat' => 'Gift Guides', 'visits' => '45.2k', 'trend' => '+12%'],
                        ['path' => '/categories/nursery-decor', 'cat' => 'Categories', 'visits' => '38.1k', 'trend' => '0%'],
                        ['path' => '/deals/weekly-favorites', 'cat' => 'Landing Pages', 'visits' => '31.9k', 'trend' => '+5%'],
                        ['path' => '/tiktok-tracker/trending-now', 'cat' => 'TikTok Tracker', 'visits' => '28.4k', 'trend' => '-3%'],
                    ];
                @endphp
                @foreach($pages as $idx => $page)
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-surface-container flex items-center justify-center text-[10px] font-bold">{{ $idx + 1 }}</span>
                        <div>
                            <p class="text-sm font-bold">{{ $page['path'] }}</p>
                            <p class="text-[10px] text-on-surface-variant">{{ $page['cat'] }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-black">{{ $page['visits'] }}</p>
                        <p class="text-[10px] {{ str_contains($page['trend'], '+') ? 'text-green-600' : (str_contains($page['trend'], '-') ? 'text-error' : 'text-on-surface-variant') }} font-bold">{{ $page['trend'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="w-full mt-6 py-2 border border-surface-container rounded-xl text-xs font-bold text-on-surface-variant hover:bg-surface-container-low transition-colors">View All Pages</button>
        </div>
    </div>
@endsection
