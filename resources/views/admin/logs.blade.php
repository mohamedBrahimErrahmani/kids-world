@extends('layouts.admin')

@section('title', 'Activity Logs - Kids World Admin')

@section('content')
    <!-- Hero/Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
        <div>
            <h2 class="text-4xl font-extrabold tracking-tight text-on-surface mb-2">Activity Logs</h2>
            <p class="text-on-surface-variant max-w-lg">Track real-time administrative actions, security events, and system changes across the platform.</p>
        </div>
        <div class="flex gap-3">
            <button class="flex items-center gap-2 px-5 py-2.5 bg-surface-container-low text-on-surface font-semibold rounded-full hover:bg-surface-container-high transition-colors">
                <span class="material-symbols-outlined text-lg">file_download</span>
                Export Report
            </button>
            <button class="flex items-center gap-2 px-6 py-2.5 bg-gradient-to-b from-primary to-primary-container text-on-primary font-semibold rounded-full shadow-lg shadow-primary/20 hover:scale-105 active:scale-95 transition-all">
                <span class="material-symbols-outlined text-lg">filter_list</span>
                Filter View
            </button>
        </div>
    </div>

    <!-- Bento Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        @php
            $stats = [
                ['label' => "Today's Actions", 'val' => '1,284', 'trend' => '+12%', 'icon' => 'bolt', 'color' => 'text-primary', 'bg' => 'bg-primary/10'],
                ['label' => 'Unique Users', 'val' => '42', 'trend' => 'Active', 'icon' => 'person_search', 'color' => 'text-secondary', 'bg' => 'bg-secondary/10'],
                ['label' => 'Failed Logins', 'val' => '3', 'trend' => 'Critical', 'icon' => 'warning', 'color' => 'text-error', 'bg' => 'bg-error/10'],
                ['label' => 'Storage Used', 'val' => '8.4 GB', 'trend' => 'Total', 'icon' => 'database', 'color' => 'text-on-tertiary-container', 'bg' => 'bg-tertiary-container'],
            ];
        @endphp
        @foreach($stats as $s)
        <div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="p-2 {{ $s['bg'] }} {{ $s['color'] }} rounded-lg">
                    <span class="material-symbols-outlined">{{ $s['icon'] }}</span>
                </span>
                <span class="text-xs font-bold {{ $s['trend'] == 'Critical' ? 'text-error' : 'text-secondary' }}">{{ $s['trend'] }}</span>
            </div>
            <p class="text-sm font-medium text-on-surface-variant">{{ $s['label'] }}</p>
            <h3 class="text-2xl font-bold text-on-surface">{{ $s['val'] }}</h3>
        </div>
        @endforeach
    </div>

    <!-- Main Log Table Section -->
    <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm">
        <div class="px-8 py-6 flex items-center justify-between border-b border-surface-container-low">
            <h3 class="text-xl font-bold text-on-surface">Recent Activity</h3>
            <div class="flex gap-2">
                <span class="px-3 py-1 bg-tertiary-container text-on-tertiary-container text-xs font-bold rounded-full">LIVE UPDATES</span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low/50">
                        <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider text-on-surface-variant">User</th>
                        <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider text-on-surface-variant">Action</th>
                        <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider text-on-surface-variant">Timestamp</th>
                        <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider text-on-surface-variant">IP Address</th>
                        <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider text-on-surface-variant">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    @php
                        $logs = [
                            [
                                'user' => 'Sarah Miller', 'email' => 'sarah.m@kidsworld.com', 'action' => 'Updated <b>Wooden Train Set</b> details', 'icon' => 'edit_square', 'icon_color' => 'text-primary',
                                'time' => 'Today, 2:45 PM', 'ip' => '192.168.1.104', 'status' => 'Success', 'status_bg' => 'bg-secondary-container text-on-secondary-container',
                                'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB8ydYD9NEYWp44AFOOwU6UtuKVjcrKMgsK3dhWVVhvuVZYfCeZL-39j5qw6ZSl_ZUNIwDbQBovSEtvALP0U23Aod_bePuWnX16VQz0BQMk6W4j1cscf52-ODHiAjTggeQ_w56KU9OHx4qzoTvP_HCQMbJaKZ3o35mr9MylZKcg5eDklY7Ab6Uwsl4KYV4aAptDt47DN01SbZuttvLkH0t83U9lkaWyNKii10dBqOdiKwpQRloWBq3EuFY3dLW1LYtTAflNPYu_LA'
                            ],
                            [
                                'user' => 'John Carter', 'email' => 'j.carter@kidsworld.com', 'action' => 'Changed permissions for <b>Moderator Role</b>', 'icon' => 'admin_panel_settings', 'icon_color' => 'text-error',
                                'time' => 'Today, 1:12 PM', 'ip' => '172.16.254.1', 'status' => 'System', 'status_bg' => 'bg-tertiary-container text-on-tertiary-container',
                                'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCf1CadVv-T_IyDt1nOqBrAQcMqzf12ZXK1-lbmW7z5HeQ_lMtcN_zS3K-nIxXvwWX50rBRnwTgWwiE-gL1xh2B3fcMRd0QseieUTY-c0yfJ7kUe3nlB9lxPpz4NAIgqYIM46ps2zIAccYIPg0sRGInGM5iBhMp9m-6gmGv2ZhNKhalGd8IchgSlRAZIfImlRK61h_xlHeH2NBTKRtiRgkPsYPKYAzklo36HfBGRaZZom4uSLKni0i64WL087xsoaevt-xLr0J0mw'
                            ],
                            [
                                'user' => 'Beth T.', 'email' => 'beth.t@kidsworld.com', 'action' => 'Added <b>Eco-Blocks Kit</b> to Inventory', 'icon' => 'add_circle', 'icon_color' => 'text-secondary',
                                'time' => 'Today, 10:30 AM', 'ip' => '10.0.0.15', 'status' => 'Success', 'status_bg' => 'bg-secondary-container text-on-secondary-container',
                                'img' => null
                            ],
                            [
                                'user' => 'Marcus V.', 'email' => 'marcus@kidsworld.com', 'action' => 'Attempted <b>SSH Login</b> (Rejected)', 'icon' => 'key', 'icon_color' => 'text-error',
                                'time' => 'Oct 24, 11:58 PM', 'ip' => '185.234.12.8', 'status' => 'Failed', 'status_bg' => 'bg-error-container text-on-error-container',
                                'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD-hVi7ZFFAlcXVH2eR06DbWLi9-DVs8hu6jM8a6TG98tFS7cVJ72dgE0VW5gH9TAWH8A97AtD5Xu-ko-N1DjcYhwyeLhx1gsFT_WM2i_u17VcpQcJFs8Yn2x11JLudqv4SfmKjgsxzE9JnjsdKv3UxX6C6h9Js0QJK57SjLZhV5UlErz_tciOtkm_AiKr_qeLra0Jw4u0sZBn_bkMOm5QgPNZ6PE6ZroBRTNKHDb5jchdowuHhB4_XqISz9PVjPaQy0PoE8W-Tew'
                            ]
                        ];
                    @endphp
                    @foreach($logs as $log)
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-8 py-4">
                            <div class="flex items-center gap-3">
                                @if($log['img'])
                                <img class="w-8 h-8 rounded-full object-cover" src="{{ $log['img'] }}"/>
                                @else
                                <div class="w-8 h-8 bg-surface-container flex items-center justify-center rounded-full text-on-surface-variant font-bold text-xs">BT</div>
                                @endif
                                <div>
                                    <p class="text-sm font-bold text-on-surface">{{ $log['user'] }}</p>
                                    <p class="text-[10px] text-on-surface-variant">{{ $log['email'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-4">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined {{ $log['icon_color'] }} text-sm">{{ $log['icon'] }}</span>
                                <p class="text-sm text-on-surface">{!! $log['action'] !!}</p>
                            </div>
                        </td>
                        <td class="px-8 py-4">
                            <p class="text-sm text-on-surface-variant">{{ $log['time'] }}</p>
                        </td>
                        <td class="px-8 py-4">
                            <code class="text-xs {{ $log['status'] == 'Failed' ? 'bg-error/10 text-error' : 'bg-surface-container' }} px-2 py-1 rounded">{{ $log['ip'] }}</code>
                        </td>
                        <td class="px-8 py-4">
                            <span class="px-3 py-1 {{ $log['status_bg'] }} text-xs font-bold rounded-full">{{ $log['status'] }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-8 py-4 bg-surface-container-low/30 flex items-center justify-between">
            <p class="text-xs text-on-surface-variant font-medium">Showing 4 of 2,482 logs</p>
            <div class="flex gap-2">
                <button class="p-2 hover:bg-surface-container rounded-lg transition-colors"><span class="material-symbols-outlined text-sm">chevron_left</span></button>
                <button class="px-3 py-1 bg-primary text-on-primary text-xs font-bold rounded-lg">1</button>
                <button class="px-3 py-1 hover:bg-surface-container text-xs font-bold rounded-lg">2</button>
                <button class="px-3 py-1 hover:bg-surface-container text-xs font-bold rounded-lg">3</button>
                <button class="p-2 hover:bg-surface-container rounded-lg transition-colors"><span class="material-symbols-outlined text-sm">chevron_right</span></button>
            </div>
        </div>
    </div>

    <!-- Contextual Insight Card -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gradient-to-br from-primary-container to-primary-dim p-8 rounded-3xl text-on-primary shadow-xl">
            <div class="flex items-center gap-3 mb-4">
                <span class="material-symbols-outlined">auto_awesome</span>
                <h4 class="text-lg font-bold">Smart Insights</h4>
            </div>
            <p class="text-on-primary/90 mb-6 leading-relaxed">System activity has increased by <span class="font-bold underline">18%</span> compared to last Tuesday. Most changes are concentrated in the 'Inventory' department. No unusual security patterns detected.</p>
            <button class="px-6 py-2 bg-white text-primary font-bold rounded-full text-sm hover:scale-105 transition-transform">Detailed Analysis</button>
        </div>
        <div class="bg-surface-container-high/50 p-8 rounded-3xl border border-white/20 backdrop-blur-sm">
            <h4 class="text-lg font-bold text-on-surface mb-4">Security Overview</h4>
            <div class="space-y-4">
                @php
                    $security = [
                        ['label' => 'Authorized Logins', 'val' => '98%', 'p' => '98%', 'color' => 'bg-secondary'],
                        ['label' => 'System Latency', 'val' => '42ms', 'p' => '12%', 'color' => 'bg-primary'],
                        ['label' => 'Policy Violations', 'val' => '0', 'p' => '2%', 'color' => 'bg-error'],
                    ];
                @endphp
                @foreach($security as $item)
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-on-surface-variant">{{ $item['label'] }}</span>
                    <div class="w-48 h-2 bg-surface-container rounded-full overflow-hidden">
                        <div class="h-full {{ $item['color'] }}" style="width: {{ $item['p'] }}"></div>
                    </div>
                    <span class="text-xs font-bold text-on-surface">{{ $item['val'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
