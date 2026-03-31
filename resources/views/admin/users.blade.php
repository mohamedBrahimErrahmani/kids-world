@extends('layouts.admin')

@section('title', 'User Management - Kids World Admin')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
        <div>
            <h2 class="text-4xl font-extrabold tracking-tight text-on-surface mb-2">User Management</h2>
            <p class="text-on-surface-variant max-w-md">Oversee your community management team and assign specific
                playground permissions.</p>
        </div>
        <button
            class="bg-gradient-to-b from-primary to-primary-container text-white px-8 py-3.5 rounded-xl font-bold flex items-center gap-2 shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all">
            <span class="material-symbols-outlined">person_add</span>
            Add New Admin
        </button>
    </div>

    <!-- Dashboard Stats Bento -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div
            class="md:col-span-2 bg-surface-container-lowest p-8 rounded-lg shadow-sm flex flex-col justify-between overflow-hidden relative border border-white/50">
            <div class="relative z-10">
                <p class="text-on-surface-variant font-medium mb-1">Total Management Staff</p>
                <h3 class="text-5xl font-extrabold text-primary mb-4">{{ $totalStaff }}</h3>
                <div class="flex items-center gap-2 text-secondary text-sm font-semibold">
                    <span class="material-symbols-outlined text-sm"
                        style="font-variation-settings: 'FILL' 1;">insights</span>
                    <span>+4 added this month</span>
                </div>
            </div>
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-primary-container/10 rounded-full blur-3xl"></div>
        </div>
        <div class="bg-tertiary-container p-8 rounded-lg flex flex-col justify-center items-center text-center">
            <span class="material-symbols-outlined text-4xl text-on-tertiary-container mb-2"
                style="font-variation-settings: 'FILL' 1;">verified_user</span>
            <h4 class="text-2xl font-bold text-on-tertiary-container">{{ $activeAdmins }}</h4>
            <p class="text-sm text-on-tertiary-container/80 font-medium">Active Admins</p>
        </div>
        <div class="bg-secondary-container p-8 rounded-lg flex flex-col justify-center items-center text-center">
            <span class="material-symbols-outlined text-4xl text-on-secondary-container mb-2"
                style="font-variation-settings: 'FILL' 1;">pending_actions</span>
            <h4 class="text-2xl font-bold text-on-secondary-container">{{ $contentManagers }}</h4>
            <p class="text-sm text-on-secondary-container/80 font-medium">Content Managers</p>
        </div>
    </div>

    <!-- Table Filters -->
    <div class="flex flex-wrap items-center gap-4 mb-6">
        <div class="flex bg-surface-container-low rounded-full p-1 border border-outline-variant/10">
            <button class="px-6 py-2 rounded-full text-sm font-bold bg-white shadow-sm text-primary">All Users</button>
            <button
                class="px-6 py-2 rounded-full text-sm font-medium text-on-surface-variant hover:text-on-surface">Active</button>
            <button
                class="px-6 py-2 rounded-full text-sm font-medium text-on-surface-variant hover:text-on-surface">Inactive</button>
        </div>
        <div class="h-6 w-[1px] bg-outline-variant/30 hidden md:block mx-2"></div>
        <div class="flex items-center gap-3">
            <select
                class="bg-surface-container-lowest border-none text-sm font-medium rounded-full px-4 py-2 ring-1 ring-outline-variant/20 focus:ring-primary/30">
                <option>All Roles</option>
                <option>Admin</option>
                <option>Content Manager</option>
                <option>Product Manager</option>
            </select>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-surface-container-lowest rounded-lg shadow-sm overflow-hidden border border-white/40">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-low/50">
                    <th class="px-8 py-5 text-sm font-extrabold text-on-surface tracking-wide uppercase text-[11px]">User
                        Profile</th>
                    <th class="px-8 py-5 text-sm font-extrabold text-on-surface tracking-wide uppercase text-[11px]">Role
                    </th>
                    <th class="px-8 py-5 text-sm font-extrabold text-on-surface tracking-wide uppercase text-[11px]">Status
                    </th>
                    <th class="px-8 py-5 text-sm font-extrabold text-on-surface tracking-wide uppercase text-[11px]">Last
                        Login</th>
                    <th class="px-8 py-5 text-right"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-transparent">
                @forelse($usersData as $user)
                    <tr class="hover:bg-surface-container-low/30 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-slate-200 overflow-hidden ring-2 ring-white">
                                    <img class="w-full h-full object-cover" src="{{ $user['img'] }}" />
                                </div>
                                <div>
                                    <p class="font-bold text-on-surface group-hover:text-primary transition-colors">
                                        {{ $user['name'] }}
                                    </p>
                                    <p class="text-xs text-on-surface-variant">{{ $user['email'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span
                                class="{{ $user['badge'] }} text-[11px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">{{ $user['role'] }}</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-2 h-2 rounded-full {{ $user['status'] == 'Active' ? 'bg-secondary' : 'bg-outline' }}">
                                </div>
                                <span
                                    class="text-sm font-semibold {{ $user['status'] == 'Active' ? 'text-secondary' : 'text-on-surface-variant' }}">{{ $user['status'] }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <p class="text-sm font-medium text-on-surface-variant">{{ $user['login'] }}</p>
                            <p class="text-[10px] text-outline">{{ $user['date'] }}</p>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <button
                                class="w-10 h-10 rounded-full hover:bg-surface-container flex items-center justify-center transition-all">
                                <span class="material-symbols-outlined text-slate-400">more_vert</span>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-8 py-10 text-center text-on-surface-variant italic">No management staff found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="px-8 py-6 bg-surface-container-low/50 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm text-on-surface-variant">Showing <span
                    class="font-bold text-on-surface">{{ count($usersData) }}</span> of <span
                    class="font-bold text-on-surface">{{ $totalStaff }}</span> managers</p>
            <div class="flex items-center gap-2">
                <button
                    class="w-10 h-10 rounded-full border border-outline-variant/20 flex items-center justify-center hover:bg-white disabled:opacity-30"
                    disabled>
                    <span class="material-symbols-outlined text-xl">chevron_left</span>
                </button>
                <div class="flex gap-1">
                    <button class="w-10 h-10 rounded-full bg-primary text-white text-sm font-bold">1</button>
                    <button class="w-10 h-10 rounded-full text-sm font-bold hover:bg-white">2</button>
                    <button class="w-10 h-10 rounded-full text-sm font-bold hover:bg-white">3</button>
                </div>
                <button
                    class="w-10 h-10 rounded-full border border-outline-variant/20 flex items-center justify-center hover:bg-white">
                    <span class="material-symbols-outlined text-xl">chevron_right</span>
                </button>
            </div>
        </div>
    </div>
@endsection