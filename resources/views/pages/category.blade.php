@extends('layouts.app')

@section('title', 'Categories | Kids World')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-24 pb-32 px-4 md:px-8 max-w-7xl mx-auto">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 mb-8 text-xs font-bold uppercase tracking-widest text-on-surface-variant">
            <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
            <span class="material-symbols-outlined text-[14px]">chevron_right</span>
            <span class="text-on-surface">Categories</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Sidebar: Filters (Desktop Only) -->
            <aside class="hidden lg:block w-64 flex-shrink-0 space-y-10 sticky top-32 h-fit">
                <!-- Category Filter -->
                <div class="space-y-4">
                    <h3 class="font-headline font-black text-xs uppercase tracking-[0.2em] text-on-surface-variant">
                        Categories</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('category', array_merge(request()->except('category', 'page'))) }}"
                                class="flex items-center justify-between group py-1 text-sm {{ !request('category') ? 'text-primary font-bold' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors">
                                <span>All Products</span>
                                @if(!request('category')) <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> @endif
                            </a>
                        </li>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('category', array_merge(request()->all(), ['category' => $category->slug])) }}"
                                    class="flex items-center justify-between group py-1 text-sm {{ request('category') == $category->slug ? 'text-primary font-bold' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors">
                                    <span>{{ $category->name }}</span>
                                    @if(request('category') == $category->slug) <span
                                    class="w-1.5 h-1.5 rounded-full bg-primary"></span> @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Age Filter -->
                <div class="space-y-4">
                    <h3 class="font-headline font-black text-xs uppercase tracking-[0.2em] text-on-surface-variant">Shop by
                        Age</h3>
                    <div class="grid grid-cols-1 gap-2">
                        <a href="{{ route('category', array_merge(request()->except('age_group', 'page'))) }}"
                            class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ !request('age_group') ? 'bg-primary text-white shadow-sm' : 'bg-surface-container-low text-on-surface hover:bg-surface-container-high' }}">
                            All Ages
                        </a>
                        @foreach($ageGroups as $age)
                            <a href="{{ route('category', array_merge(request()->all(), ['age_group' => $age->slug])) }}"
                                class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ request('age_group') == $age->slug ? 'bg-primary text-white shadow-sm' : 'bg-surface-container-low text-on-surface hover:bg-surface-container-high' }}">
                                {{ $age->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Play Type Filter -->
                <div class="space-y-4">
                    <h3 class="font-headline font-black text-xs uppercase tracking-[0.2em] text-on-surface-variant">Play
                        Type</h3>
                    <div class="space-y-2">
                        @foreach($playTypes as $type)
                            <a href="{{ route('category', array_merge(request()->all(), ['play_type' => $type->slug])) }}"
                                class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all {{ request('play_type') == $type->slug ? 'bg-secondary-container text-on-secondary-container shadow-sm' : 'bg-transparent text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface' }}">
                                <span class="material-symbols-outlined text-[20px]">{{ $type->icon }}</span>
                                {{ $type->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                @if(request()->anyFilled(['category', 'age_group', 'play_type']))
                    <a href="{{ route('category') }}"
                        class="inline-flex items-center gap-2 text-xs font-black text-error hover:underline pt-4">
                        <span class="material-symbols-outlined text-sm">close</span>
                        CLEAR ALL FILTERS
                    </a>
                @endif
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1 space-y-12">
                <!-- Mobile Only: Quick Filter Bar -->
                <div
                    class="lg:hidden flex flex-col gap-4 sticky top-20 z-40 bg-surface/95 backdrop-blur-md -mx-4 px-4 py-4 border-b border-surface-container">
                    <div class="flex gap-2 overflow-x-auto no-scrollbar">
                        <a href="{{ route('category', array_merge(request()->except('category', 'page'))) }}"
                            class="flex-shrink-0 px-5 py-2 rounded-full text-xs font-bold uppercase transition-all {{ !request('category') ? 'bg-primary text-white shadow-md' : 'bg-surface-container-low text-on-surface-variant' }}">
                            All
                        </a>
                        @foreach($categories as $category)
                            <a href="{{ route('category', array_merge(request()->all(), ['category' => $category->slug])) }}"
                                class="flex-shrink-0 px-5 py-2 rounded-full text-xs font-bold uppercase transition-all {{ request('category') == $category->slug ? 'bg-primary text-white shadow-md' : 'bg-surface-container-low text-on-surface-variant' }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex gap-2 overflow-x-auto no-scrollbar max-w-[70%]">
                            @if(request('age_group'))
                                <span
                                    class="flex-shrink-0 px-3 py-1.5 bg-surface-container-highest rounded-lg text-[10px] font-black uppercase flex items-center gap-1">
                                    {{ request('age_group') }}
                                    <a href="{{ route('category', request()->except('age_group')) }}"><span
                                            class="material-symbols-outlined text-xs">close</span></a>
                                </span>
                            @endif
                            @if(request('play_type'))
                                <span
                                    class="flex-shrink-0 px-3 py-1.5 bg-surface-container-highest rounded-lg text-[10px] font-black uppercase flex items-center gap-1">
                                    {{ request('play_type') }}
                                    <a href="{{ route('category', request()->except('play_type')) }}"><span
                                            class="material-symbols-outlined text-xs">close</span></a>
                                </span>
                            @endif
                        </div>
                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-primary/10 text-primary rounded-xl text-xs font-bold uppercase">
                            <span class="material-symbols-outlined text-sm">tune</span>
                            Filters
                        </button>
                    </div>
                </div>

                <!-- Active Filters (Desktop) -->
                <div class="hidden lg:flex flex-wrap items-center gap-3">
                    <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mr-2">Displaying
                        {{ count($products) }} Results</p>
                    @if(request()->anyFilled(['category', 'age_group', 'play_type']))
                        @foreach(['category', 'age_group', 'play_type'] as $p)
                            @if(request($p))
                                <span
                                    class="px-4 py-1.5 bg-surface-container-high text-on-surface rounded-full text-[11px] font-bold uppercase flex items-center gap-2">
                                    <span class="opacity-50 font-medium">{{ str_replace('_', ' ', $p) }}:</span> {{ request($p) }}
                                    <a href="{{ route('category', request()->except($p)) }}" class="hover:text-error transition-colors">
                                        <span class="material-symbols-outlined text-sm">close</span>
                                    </a>
                                </span>
                            @endif
                        @endforeach
                    @endif
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-12">
                    @forelse($products as $product)
                        <div class="group relative flex flex-col">
                            <div
                                class="relative aspect-[4/5] bg-surface-container-low rounded-3xl overflow-hidden mb-6 transition-all duration-700 group-hover:rounded-[2.5rem] group-hover:shadow-2xl group-hover:shadow-primary/10">
                                <img alt="{{ $product->name }}"
                                    class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110"
                                    src="{{ $product->image_path }}" />

                                <!-- Fast View Overlay -->
                                <div
                                    class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center pointer-events-none">
                                    <div
                                        class="bg-white/90 backdrop-blur-md px-6 py-3 rounded-2xl text-primary font-black text-xs uppercase tracking-widest transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500 shadow-xl pointer-events-auto">
                                        <a href="{{ route('product.show', $product->slug) }}">Quick View</a>
                                    </div>
                                </div>

                                <!-- Age Badge -->
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="bg-white/80 backdrop-blur-md text-on-surface px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                        {{ $product->ageGroup->name }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant/60">
                                        {{ $product->category->name }}</p>
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-primary text-[14px]"
                                            style="font-variation-settings: 'FILL' 1;">star</span>
                                        <span
                                            class="text-[12px] font-black text-on-surface">{{ number_format($product->rating, 1) }}</span>
                                    </div>
                                </div>
                                <h3
                                    class="text-xl font-bold font-headline text-on-surface leading-tight group-hover:text-primary transition-colors">
                                    <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <p class="text-2xl font-black text-sky-800">${{ number_format($product->price, 2) }}</p>
                            </div>
                        </div>
                    @empty
                        <div
                            class="col-span-full py-32 text-center bg-surface-container-lowest rounded-[3rem] border-2 border-dashed border-surface-container-high">
                            <div class="max-w-md mx-auto space-y-6">
                                <span
                                    class="material-symbols-outlined text-8xl text-surface-container-high animate-pulse">package_2</span>
                                <h3 class="text-3xl font-headline font-black text-on-surface">Nothing here yet</h3>
                                <p class="text-on-surface-variant text-lg">We couldn't find any products matching your specific
                                    curation. Try clearing some filters to explore more.</p>
                                <a href="{{ route('category') }}"
                                    class="inline-flex items-center gap-3 px-10 py-5 bg-primary text-on-primary rounded-2xl font-black shadow-xl shadow-primary/20 hover:scale-105 active:scale-95 transition-all uppercase tracking-widest text-sm">
                                    <span class="material-symbols-outlined">restart_alt</span>
                                    Reset Discovery
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>

    @include('layouts.partials.mobile_nav')
    @include('layouts.partials.footer')
@endsection

@push('styles')
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endpush