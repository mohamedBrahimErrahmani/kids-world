@extends('layouts.admin')

@section('title', 'Dashboard Overview - Kids World')

@section('content')
    <!-- Hero Stats Row -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Clicks Card (Bento Style) -->
        <div class="lg:col-span-2 bg-surface-container-lowest p-6 rounded-lg relative overflow-hidden group shadow-sm">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-110"></div>
            <div class="flex justify-between items-start relative z-10">
                <div>
                    <p class="text-on-surface-variant text-sm font-medium mb-1">Total Clicks</p>
                    <h2 class="text-3xl font-bold tracking-tight">124,892</h2>
                    <div class="flex items-center gap-2 mt-4">
                        <span class="px-2 py-0.5 bg-secondary-container text-on-secondary-container text-[10px] font-bold rounded-full">+12.4%</span>
                        <span class="text-on-surface-variant text-[10px]">vs last month</span>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <span class="px-3 py-1 bg-surface-container-low text-[10px] font-bold rounded-full text-center">Daily: 4.2k</span>
                    <span class="px-3 py-1 bg-surface-container-low text-[10px] font-bold rounded-full text-center">Weekly: 28k</span>
                </div>
            </div>
        </div>
        <!-- Total Conversions -->
        <div class="bg-surface-container-lowest p-6 rounded-lg shadow-sm border-none">
            <div class="w-10 h-10 bg-secondary-container text-on-secondary-container rounded-xl flex items-center justify-center mb-4">
                <span class="material-symbols-outlined">shopping_bag</span>
            </div>
            <p class="text-on-surface-variant text-sm font-medium mb-1">Total Conversions</p>
            <h2 class="text-3xl font-bold tracking-tight">8,241</h2>
            <p class="text-[10px] text-on-surface-variant mt-2">Conversion Rate: <span class="text-secondary font-bold">6.6%</span></p>
        </div>
        <!-- Active Campaigns -->
        <div class="bg-surface-container-lowest p-6 rounded-lg shadow-sm border-none">
            <div class="w-10 h-10 bg-tertiary-container text-on-tertiary-container rounded-xl flex items-center justify-center mb-4">
                <span class="material-symbols-outlined">campaign</span>
            </div>
            <p class="text-on-surface-variant text-sm font-medium mb-1">Active Campaigns</p>
            <h2 class="text-3xl font-bold tracking-tight">42</h2>
            <p class="text-[10px] text-on-surface-variant mt-2">Live Now: <span class="text-primary font-bold">18</span></p>
        </div>
    </section>

    <!-- Main Analytics Graph Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">Performance Overtime</h3>
                    <p class="text-xs text-slate-400">Monthly traffic and click distribution</p>
                </div>
                <select class="bg-slate-50 border-none rounded-lg text-xs font-bold text-slate-500 focus:ring-0 cursor-pointer">
                    <option>Last 6 Months</option>
                    <option>Last 12 Months</option>
                </select>
            </div>
            <!-- Mock Graph Placeholder -->
            <div class="h-64 flex items-end justify-between gap-2">
                @php
                    $heights = [45, 62, 58, 85, 74, 92];
                    $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
                @endphp
                @foreach($heights as $index => $h)
                <div class="flex-1 flex flex-col items-center gap-4 group">
                    <div class="w-full bg-blue-50 group-hover:bg-blue-100 rounded-t-xl transition-all relative" style="height: {{ $h }}%;">
                        <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                            {{ $h }}k
                        </div>
                    </div>
                    <p class="text-[10px] font-bold text-slate-400">{{ $months[$index] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 flex flex-col">
            <h3 class="text-lg font-bold text-slate-800 mb-6">Top Platforms</h3>
            <div class="space-y-6 flex-1">
                @php
                    $platforms = [
                        ['name' => 'TikTok', 'share' => 64, 'color' => 'bg-slate-900', 'icon' => 'movie_filter'],
                        ['name' => 'Instagram', 'share' => 22, 'color' => 'bg-pink-500', 'icon' => 'camera'],
                        ['name' => 'Pinterest', 'share' => 14, 'color' => 'bg-red-600', 'icon' => 'grid_view'],
                    ];
                @endphp
                @foreach($platforms as $p)
                <div class="space-y-2">
                    <div class="flex justify-between items-center text-xs font-bold">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm {{ str_replace('bg-', 'text-', $p['color']) }}">{{ $p['icon'] }}</span>
                            {{ $p['name'] }}
                        </div>
                        <span>{{ $p['share'] }}%</span>
                    </div>
                    <div class="w-full h-2 bg-slate-50 rounded-full overflow-hidden">
                        <div class="h-full {{ $p['color'] }}" style="width: {{ $p['share'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="w-full py-4 mt-8 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition-colors">
                View Full Platform Breakdown
            </button>
        </div>
    </div>

    <!-- Recent Activities Table -->
    <section class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-50 flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-800">Recent Link Activity</h3>
            <button class="text-blue-600 text-xs font-bold hover:underline">Export CSV</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                        <th class="px-8 py-4">Product</th>
                        <th class="px-8 py-4">Creator</th>
                        <th class="px-8 py-4">Platform</th>
                        <th class="px-8 py-4">Clicks</th>
                        <th class="px-8 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @php
                        $activities = [
                            ['product' => 'Montessori Arch', 'creator' => '@momma_joy', 'platform' => 'TikTok', 'clicks' => '1.2k', 'status' => 'Active'],
                            ['product' => 'CloudKnit Suit', 'creator' => '@baby_style', 'platform' => 'Instagram', 'clicks' => 854, 'status' => 'Active'],
                            ['product' => 'LumiStack Blocks', 'creator' => '@artful_toddler', 'platform' => 'Pinterest', 'clicks' => 432, 'status' => 'Paused'],
                        ];
                    @endphp
                    @foreach($activities as $act)
                    <tr class="text-sm text-slate-600 hover:bg-slate-50/30 transition-colors">
                        <td class="px-8 py-6 font-medium text-slate-900">{{ $act['product'] }}</td>
                        <td class="px-8 py-6">{{ $act['creator'] }}</td>
                        <td class="px-8 py-6">
                            <span class="px-2 py-1 bg-slate-100 rounded text-[10px] font-bold">{{ $act['platform'] }}</span>
                        </td>
                        <td class="px-8 py-6 font-bold">{{ $act['clicks'] }}</td>
                        <td class="px-8 py-6">
                            <span class="flex items-center gap-1.5 {{ $act['status'] == 'Active' ? 'text-emerald-500' : 'text-slate-400' }} text-[10px] font-bold uppercase tracking-wider">
                                <span class="w-1.5 h-1.5 rounded-full {{ $act['status'] == 'Active' ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                {{ $act['status'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
