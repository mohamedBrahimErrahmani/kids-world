@extends('layouts.admin')

@section('title', 'Product Management - Kids World Admin')

@section('content')
    <!-- Product Management Content -->
    <section class="space-y-8">
        <!-- Page Header & Actions -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h2 class="font-headline text-3xl font-extrabold tracking-tight text-on-background">Product Management</h2>
                <p class="text-on-surface-variant font-body mt-1">Curate and manage your high-end product selection.</p>
            </div>
            <div class="flex items-center gap-3">
                <button
                    class="flex items-center gap-2 px-6 py-3 bg-secondary-container text-on-secondary-container rounded-xl font-semibold hover:brightness-105 transition-all">
                    <span class="material-symbols-outlined">upload_file</span>
                    Bulk Import
                </button>
                <button
                    class="flex items-center gap-2 px-6 py-3 bg-gradient-to-b from-primary to-primary-container text-on-primary rounded-xl font-semibold shadow-lg hover:brightness-105 transition-all">
                    <span class="material-symbols-outlined">add</span>
                    Add Product
                </button>
            </div>
        </div>

        <!-- Filters Bar -->
        <div class="flex flex-wrap items-center gap-4 p-2 bg-surface-container-low rounded-2xl">
            <div class="flex items-center gap-2 px-4 py-2 bg-surface-container-lowest rounded-xl min-w-[180px]">
                <span class="material-symbols-outlined text-outline text-sm">filter_list</span>
                <select class="bg-transparent border-none text-sm font-medium focus:ring-0 w-full p-0">
                    <option>All Categories</option>
                    <option>Educational Toys</option>
                    <option>Nursery Decor</option>
                    <option>Apparel</option>
                </select>
            </div>
            <div class="flex items-center gap-2 px-4 py-2 bg-surface-container-lowest rounded-xl min-w-[180px]">
                <span class="material-symbols-outlined text-outline text-sm">child_care</span>
                <select class="bg-transparent border-none text-sm font-medium focus:ring-0 w-full p-0">
                    <option>All Ages</option>
                    <option>0-2 Years</option>
                    <option>3-5 Years</option>
                    <option>6-8 Years</option>
                </select>
            </div>
            <button class="ml-auto text-primary text-sm font-semibold px-4 hover:underline">Clear Filters</button>
        </div>

        <!-- Data Table Section -->
        <div class="bg-surface-container-lowest rounded-lg shadow-sm overflow-hidden border border-white/40">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr
                        class="bg-surface-container-low text-on-surface-variant text-xs font-bold uppercase tracking-widest">
                        <th class="px-8 py-5">Product Name</th>
                        <th class="px-6 py-5">Category</th>
                        <th class="px-6 py-5">Age Group</th>
                        <th class="px-6 py-5">Price</th>
                        <th class="px-6 py-5 text-center">Rating</th>
                        <th class="px-6 py-5 text-center">Status</th>
                        <th class="px-8 py-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    @forelse($products as $p)
                        <tr class="hover:bg-surface-bright transition-colors group">
                            <td class="px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-lg overflow-hidden bg-surface-container-high flex-shrink-0">
                                        @if($p['img'])
                                            <img class="w-full h-full object-cover" src="{{ $p['img'] }}" />
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-primary/10 text-primary">
                                                <span class="material-symbols-outlined text-xs">image</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-semibold text-on-surface leading-tight">{{ $p['name'] }}</p>
                                        <p class="text-xs text-on-surface-variant font-label mt-1">SKU: {{ $p['sku'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-surface-container text-on-surface-variant rounded-full text-xs font-medium">{{ $p['cat'] }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-on-surface-variant">{{ $p['age'] }}</td>
                            <td class="px-6 py-4 text-sm font-bold text-on-surface">{{ $p['price'] }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-1">
                                    <span class="material-symbols-outlined text-amber-400 text-lg"
                                        style="font-variation-settings: 'FILL' 1;">star</span>
                                    <span class="text-sm font-bold">{{ $p['rating'] }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    @if($p['status'])
                                        <span
                                            class="px-3 py-1 {{ $p['status'] == 'Featured' ? 'bg-tertiary-container text-on-tertiary-container' : 'bg-secondary-container text-on-secondary-container' }} rounded-full text-[10px] font-bold uppercase tracking-wider">{{ $p['status'] }}</span>
                                    @else
                                        <div class="w-16 h-4 bg-transparent"></div>
                                    @endif
                                    <button
                                        class="w-10 h-5 {{ $p['active'] ? 'bg-primary' : 'bg-outline-variant' }} rounded-full relative transition-all">
                                        <div
                                            class="absolute {{ $p['active'] ? 'right-1' : 'left-1' }} top-1 w-3 h-3 bg-white rounded-full">
                                        </div>
                                    </button>
                                </div>
                            </td>
                            <td class="px-8 py-4 text-right">
                                <div
                                    class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 hover:bg-surface-container rounded-lg text-on-surface-variant"><span
                                            class="material-symbols-outlined">edit</span></button>
                                    <button class="p-2 hover:bg-error-container/10 rounded-lg text-error"><span
                                            class="material-symbols-outlined">delete</span></button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-8 py-10 text-center text-on-surface-variant italic">No products found in
                                database.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination -->
            <div
                class="flex items-center justify-between px-8 py-5 bg-surface-container-low border-t border-surface-container">
                <p class="text-sm text-on-surface-variant">Showing <span class="font-bold">1-{{ count($products) }}</span>
                    of <span class="font-bold">{{ count($products) }}</span> products</p>
                <div class="flex gap-2">
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-surface-container text-on-surface-variant disabled:opacity-30"
                        disabled>
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary text-on-primary font-bold">1</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-surface-container-lowest text-on-surface-variant font-medium">2</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-surface-container-lowest text-on-surface-variant font-medium">3</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-surface-container text-on-surface-variant">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Dashboard Insight Bento Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="{{ 'bg-primary-container/10' }} p-6 rounded-lg flex items-center gap-5">
                <div
                    class="w-12 h-12 rounded-full {{ 'bg-primary-container text-on-primary-container' }} flex items-center justify-center shadow-lg">
                    <span class="material-symbols-outlined">visibility</span>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest {{ 'text-primary-dim' }}">Monthly Views</p>
                    <p class="text-2xl font-extrabold text-on-primary-container leading-none mt-1">{{ $totalViews }}</p>
                </div>
            </div>
            <div class="{{ 'bg-secondary-container/20' }} p-6 rounded-lg flex items-center gap-5">
                <div
                    class="w-12 h-12 rounded-full {{ 'bg-secondary-container text-on-secondary-container' }} flex items-center justify-center shadow-lg">
                    <span class="material-symbols-outlined">shopping_cart</span>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest {{ 'text-secondary-dim' }}">Conversions</p>
                    <p class="text-2xl font-extrabold text-on-primary-container leading-none mt-1">{{ $convRate }}</p>
                </div>
            </div>
            <div class="{{ 'bg-tertiary-container/30' }} p-6 rounded-lg flex items-center gap-5">
                <div
                    class="w-12 h-12 rounded-full {{ 'bg-tertiary-container text-on-tertiary-container' }} flex items-center justify-center shadow-lg">
                    <span class="material-symbols-outlined">verified</span>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest {{ 'text-tertiary-dim' }}">Featured Assets</p>
                    <p class="text-2xl font-extrabold text-on-primary-container leading-none mt-1">{{ $featuredCount }}</p>
                </div>
            </div>
    </section>
@endsection