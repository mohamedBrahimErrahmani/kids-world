@extends('layouts.admin')

@section('title', 'Roles & Permissions - Kids World Admin')

@section('content')
    <!-- Editorial Header Section -->
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <nav class="flex items-center gap-2 text-sm text-on-surface-variant mb-3">
                <span>Management</span>
                <span class="material-symbols-outlined text-xs">chevron_right</span>
                <span class="text-primary font-medium">Access Control</span>
            </nav>
            <h2 class="text-4xl font-extrabold tracking-tight text-on-surface mb-2">Roles & Permissions</h2>
            <p class="text-lg text-on-surface-variant max-w-2xl">Define what team members can see and do within the Kids World platform. High-level security with granular control.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-6 py-3 bg-secondary-container text-on-secondary-container font-semibold rounded-xl hover:brightness-105 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined">history</span>
                Audit Log
            </button>
            <button class="px-8 py-3 bg-gradient-to-b from-primary to-primary-container text-white font-bold rounded-xl shadow-lg hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center gap-2">
                <span class="material-symbols-outlined">add</span>
                Create New Role
            </button>
        </div>
    </div>

    <!-- Bento-Style Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="md:col-span-2 bg-surface-container-lowest p-8 rounded-xl shadow-sm border border-transparent hover:border-primary/10 transition-colors relative overflow-hidden">
            <div class="relative z-10">
                <span class="px-4 py-1.5 bg-tertiary-container text-on-tertiary-container rounded-full text-xs font-bold uppercase tracking-widest mb-4 inline-block">Security Insight</span>
                <h3 class="text-2xl font-bold mb-2">Role Integrity Check</h3>
                <p class="text-on-surface-variant mb-6 max-w-md">The "Editor" role currently has overlapping permissions with "Author". Consider merging or refining these scopes to maintain clear accountability.</p>
                <div class="flex -space-x-3">
                    <img class="w-10 h-10 rounded-full border-2 border-white" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDEbQ6JoBqyvb0U-b4iUdmuVsLN9vFtzqCo7suugSs7WKLIx_dRTH5J6KbFlB8hPCrJFegbGDlJApjrBNoX2wt8Tgp6HoRKTzmCamOwrEBvcfE3eVzwcg0eFEdpIv1SyZEG95z_lEygI6DMeUtWO1PMfHHLMAZDDVOR0Fp9xEp21DVleFoDA0klaQ1AnuxPRzrF87D8qmVAV54A6zkWHS4l3FttorNNQn-gXxgJk5jUPg6lSviamaurd1iK4nJ7668FJimxu3iISA"/>
                    <img class="w-10 h-10 rounded-full border-2 border-white" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAz0_Vwy3rhpSRcfK1UVPzss-4L6TEViVyYwCaggmAhhQRyWjXHD3VLS1OluCa6S1EXVz9eA0-nbGVi68JJIg_DiRZDdTc5IToYu3pxzvWNjRDAEtm4yqdK2pVxHzOku8AXQGM6ITXW8C0gm3DC_hMRL7gNJ3k_diS8u_1L5iNFQk5qXQw6dv_rMyYzm1dc1zKV9k3ZLOF96aD7FlR7xod-EdNJQC1tYbVU_xfVcufdESxlugWfi1FUZ-uPbu4hayLtJ4KUTN4tRg"/>
                    <div class="w-10 h-10 rounded-full bg-slate-100 border-2 border-white flex items-center justify-center text-xs font-bold text-slate-500">+12</div>
                </div>
            </div>
            <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
        </div>
        <div class="bg-primary text-white p-8 rounded-xl shadow-lg flex flex-col justify-between">
            <div>
                <span class="material-symbols-outlined text-4xl mb-4" style="font-variation-settings: 'FILL' 1;">shield_person</span>
                <h3 class="text-xl font-bold">Active Roles</h3>
                <p class="text-primary-container text-sm">4 core roles, 2 custom roles defined.</p>
            </div>
            <div class="text-4xl font-black">06</div>
        </div>
    </div>

    <!-- Permissions Matrix -->
    <section class="bg-surface-container-lowest rounded-lg overflow-hidden shadow-sm">
        <!-- Matrix Header -->
        <div class="grid grid-cols-12 border-b border-surface-container gap-4 p-6 bg-surface-container-low/50 sticky top-16 z-30">
            <div class="col-span-5">
                <span class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">Permission Scope</span>
            </div>
            <div class="col-span-2 text-center">
                <span class="text-sm font-bold text-on-surface">Admin</span>
                <p class="text-[10px] text-on-surface-variant uppercase">Full Access</p>
            </div>
            <div class="col-span-2 text-center">
                <span class="text-sm font-bold text-on-surface">Editor</span>
                <p class="text-[10px] text-on-surface-variant uppercase">Content Focus</p>
            </div>
            <div class="col-span-2 text-center">
                <span class="text-sm font-bold text-on-surface">Viewer</span>
                <p class="text-[10px] text-on-surface-variant uppercase">Read Only</p>
            </div>
            <div class="col-span-1 text-right">
                <span class="material-symbols-outlined text-on-surface-variant cursor-pointer">more_horiz</span>
            </div>
        </div>

        <div class="divide-y divide-surface-container">
            @php
                $sections = [
                    [
                        'title' => 'Product Management',
                        'icon' => 'inventory_2',
                        'permissions' => [
                            ['name' => 'Edit Products', 'desc' => 'Modify descriptions, pricing, and age categories.', 'roles' => [true, true, false]],
                            ['name' => 'Delete Products', 'desc' => 'Permanent removal of product entries.', 'roles' => [true, false, false]],
                        ]
                    ],
                    [
                        'title' => 'Content & Editorial',
                        'icon' => 'rss_feed',
                        'permissions' => [
                            ['name' => 'Publish Blog', 'desc' => 'Push draft posts to live production environment.', 'roles' => [true, true, false]],
                        ]
                    ],
                    [
                        'title' => 'Data & Analytics',
                        'icon' => 'monitoring',
                        'permissions' => [
                            ['name' => 'View Analytics', 'desc' => 'Access dashboard metrics and sales reports.', 'roles' => [true, true, true]],
                        ]
                    ]
                ];
            @endphp
            
            @foreach($sections as $sec)
            <div class="bg-surface-container-low px-6 py-3 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-lg">{{ $sec['icon'] }}</span>
                <span class="font-bold text-sm tracking-tight text-on-surface">{{ $sec['title'] }}</span>
            </div>
            @foreach($sec['permissions'] as $perm)
            <div class="grid grid-cols-12 items-center gap-4 p-6 hover:bg-surface transition-colors group">
                <div class="col-span-5">
                    <h4 class="font-semibold text-on-surface mb-1">{{ $perm['name'] }}</h4>
                    <p class="text-xs text-on-surface-variant">{{ $perm['desc'] }}</p>
                </div>
                @foreach($perm['roles'] as $roleIdx => $hasAccess)
                <div class="col-span-2 flex justify-center">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" {{ $hasAccess ? 'checked' : '' }} {{ $roleIdx === 0 ? 'disabled' : '' }}>
                        <div class="w-11 h-6 {{ $roleIdx === 0 ? 'bg-primary' : 'bg-surface-container-highest' }} rounded-full peer peer-checked:bg-primary after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full peer-checked:after:border-white"></div>
                    </label>
                </div>
                @endforeach
                <div class="col-span-1 text-right opacity-0 group-hover:opacity-100 transition-opacity">
                    <span class="material-symbols-outlined text-on-surface-variant text-sm">info</span>
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </section>

    <!-- Bottom Floating Action Bar -->
    <div class="fixed bottom-8 left-1/2 -translate-x-1/2 md:left-[calc(50%+128px)] bg-surface/80 backdrop-blur-xl px-8 py-4 rounded-full shadow-2xl border border-white/50 flex items-center gap-8 z-50">
        <div class="flex items-center gap-3">
            <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
            <span class="text-sm font-semibold">4 Unsaved Changes</span>
        </div>
        <div class="flex items-center gap-4">
            <button class="text-on-surface-variant text-sm font-bold hover:text-on-surface transition-colors">Discard</button>
            <button class="bg-primary text-white px-6 py-2 rounded-full font-bold shadow-md hover:brightness-110 active:scale-95 transition-all">Save Changes</button>
        </div>
    </div>
@endsection
