@extends('layouts.app')

@section('title', 'Categories | Kids World')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-24 pb-32 px-4 md:px-8 max-w-7xl mx-auto">
        <!-- Editorial Header Section -->
        <section class="mb-12">
            <div class="bg-surface-container-low rounded-xl p-8 md:p-12 relative overflow-hidden">
                <div class="relative z-10 max-w-2xl">
                    <span class="inline-block bg-tertiary-container text-on-tertiary-container text-[11px] font-bold uppercase tracking-[0.15em] px-4 py-1.5 rounded-full mb-6">Curated Selection</span>
                    <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-on-surface mb-4 leading-[1.1]">The Modern Toy Box</h1>
                    <p class="text-on-surface-variant text-lg leading-relaxed max-w-lg">Thoughtfully curated essentials designed to spark curiosity, movement, and joy. No clutter, just high-quality play.</p>
                </div>
                <div class="absolute right-[-5%] bottom-[-10%] md:bottom-[-20%] w-1/2 opacity-20 md:opacity-100 mix-blend-multiply pointer-events-none">
                    <img alt="Abstract Toy Shapes" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCipRO4oav-uTqobintGkoVAyC2W6qt7kpXSRqnL1i2qeofM9LV83wibEO40r3oa_9sZALrKsPZmT7pbULPRUc5CBFvr0boCulTqiqzx1XErp8zDL-9m5n_hazcX6JClneGlI56xEMwsCU05ab12xsvCBhPeHS1M77kAV21CS7ETJgOdc7iQ9sO5D3YE5K_rzdGxO15sJ6aCchEks2ZRuEB50lzU6IP2jSvbFnydZ-XAXgtcG87giRTiiQp_AfFSFzaKnn8Sn_0XA"/>
                </div>
            </div>
        </section>

        <!-- Filters Section -->
        <section class="sticky top-[80px] z-40 mb-10 bg-background/90 backdrop-blur-md py-4">
            <div class="flex flex-col gap-6">
                <!-- Age Filter -->
                <div class="flex flex-col gap-3">
                    <label class="font-headline font-bold text-sm tracking-wide text-on-surface-variant uppercase flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">child_care</span>
                        Shop by Age
                    </label>
                    <div class="flex gap-3 overflow-x-auto no-scrollbar pb-1">
                        @foreach(['0-1 Years', '2-3 Years', '4-6 Years', '7+ Years'] as $age)
                            <button class="flex-shrink-0 px-6 py-2.5 rounded-full {{ $age == '2-3 Years' ? 'bg-primary text-white shadow-md' : 'bg-surface-container-lowest border border-outline-variant/20 text-on-surface hover:bg-primary-container hover:text-white' }} font-semibold transition-all">
                                {{ $age }}
                            </button>
                        @endforeach
                    </div>
                </div>
                <!-- Type Filter -->
                <div class="flex flex-col gap-3">
                    <label class="font-headline font-bold text-sm tracking-wide text-on-surface-variant uppercase flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">category</span>
                        Play Type
                    </label>
                    <div class="flex gap-3 overflow-x-auto no-scrollbar pb-1">
                        @php
                            $types = [
                                ['label' => 'Educational', 'icon' => 'school', 'active' => true],
                                ['label' => 'Fun & Games', 'icon' => 'celebration', 'active' => false],
                                ['label' => 'Outdoor', 'icon' => 'forest', 'active' => false],
                            ];
                        @endphp
                        @foreach($types as $type)
                            <button class="flex-shrink-0 flex items-center gap-2 px-5 py-2.5 rounded-xl {{ $type['active'] ? 'bg-secondary-container text-on-secondary-container' : 'bg-surface-container-lowest text-on-surface border border-outline-variant/10' }} font-medium">
                                <span class="material-symbols-outlined text-[20px]">{{ $type['icon'] }}</span> {{ $type['label'] }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
            @php
                $products = [
                    ['name' => 'Nordic Pine Discovery Blocks', 'price' => '$45.00', 'rating' => '4.9', 'reviews' => '124', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCzgmVtiI6sGdYH9Qn-jgDZi3qNVpmC17Xc7gbsF7zzdAWnNNnMgP2uhWpdXt8rw1JOsqPCrq-EYrm2sRV2duWBb1KjUOjGz4kEySJyz4WXux333g5tqXIjyrD7VEdNrBCuaMtNncOYSA9hbHYYpVUrAu9K8MHgFiv15qqM_quRjtkwdS8Sg78HgGhU9GgulizGRNdKHbwYNlJQQ7niX_E9XB3gTqTKgNMYyP1lHyosqcXA4DBknbLT47lGtBY3zlFtBQzMHnniIw', 'trending' => true],
                    ['name' => 'Organic Cotton Sleepy Bear', 'price' => '$32.00', 'rating' => '4.8', 'reviews' => '89', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuALCoklgGmCVkwheGwtu0nlvRBva33lhMMQWKsqM4TVmFlDr4NJF_FpZLZPLWI6HDoxfOMHYsZg2YUn1-lSWtMwqHVW_y4Se7Eom4Oy47zqJE47ABscY2GnrrKlAIkN3B16NGYQn7QmWx4f_Pcpw9TIabbC1kfePb7DXcJJpTkd1SIFzvMdm7h0zB-ufGiQpWR5_n000Q73l2eqBimoaqg7xOsWjL6eGuF26rEfZTsEq107_vGnt7iR7nL7oB8ONHQrKaicU7YNJQ'],
                    ['name' => 'Cognitive Stacking Tower', 'price' => '$28.50', 'rating' => '5.0', 'reviews' => '256', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBFw3BqSabSSoRtwLcJCjDE0YbaExD60_jD-rlXgr9MkxBHAGFSfh-HJMFCohlRK1YsRkGiFX_bNnWuk6Vn13NMe52efvJvb-jsF7lI-7GQ5CQ-47TVqV-RdXHvL_pqv6CenBuXMmOPKyZ4W-YPByb7CjLY4gN2PlYITm7vSlEWAvoQZGWMuaV2eXle1ir6O1A7iYTc6l1pW8uNVnoHU5M5cizb6_N6VqK-eT0IocyiqU8IUWAq2SHoMl9D2VyjggDVDGs4Rrx-Kw', 'trending' => true],
                    ['name' => 'Mess-Free Canvas Explorer', 'price' => '$54.00', 'rating' => '4.7', 'reviews' => '42', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDuZFfcrsLMEI-2-n2My92TOQwLppDhA90ujLdgVrhWXxEQZyPlSEhmkVPSuokpybsVibb-TUD-II-Bw0O_Co3yEdUeotBI36ADYkHLzy5Qjs6coXF3BnzahJ-wulG4ODglULvcIN5p2xFasSUdB5kySa6gk6qzUDLE0KDTtyOvQ5S681cd01tt4Gf_LeBGjcJTO_ks3zZF1Cyn248L9Tf3Upf80UX4gmPEEOklcIWIg6I0g72qioAXqqfIAjK7MivE6Kq58MQ8_A'],
                ];
            @endphp

            @foreach($products as $product)
            <div class="group flex flex-col gap-3 {{ ($loop->index >= 4) ? 'md:mt-8' : '' }}">
                <div class="relative aspect-[4/5] bg-surface-container-low rounded-lg md:rounded-xl overflow-hidden shadow-sm transition-transform duration-500 group-hover:scale-[1.02]">
                    @if($product['trending'] ?? false)
                    <div class="absolute top-3 left-3 z-10">
                        <span class="bg-primary text-white text-[10px] md:text-[11px] font-bold px-3 py-1 rounded-full flex items-center gap-1 shadow-lg">
                            <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
                            TRENDING
                        </span>
                    </div>
                    @endif
                    <img alt="{{ $product['name'] }}" class="w-full h-full object-cover transition-opacity duration-300 group-hover:opacity-90" src="{{ $product['img'] }}"/>
                    <a href="{{ route('product') }}" class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur-md text-primary font-bold py-3 rounded-lg opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 flex items-center justify-center gap-2">
                        BUY NOW
                        <span class="material-symbols-outlined text-[18px]">shopping_bag</span>
                    </a>
                </div>
                <div class="px-1">
                    <div class="flex items-center gap-1 mb-1">
                        <span class="material-symbols-outlined text-yellow-500 text-[14px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="text-[12px] font-bold text-on-surface">{{ $product['rating'] }}</span>
                        <span class="text-[12px] text-on-surface-variant ml-1">({{ $product['reviews'] }})</span>
                    </div>
                    <h3 class="text-on-surface font-bold text-sm md:text-base leading-tight mb-1 group-hover:text-primary transition-colors">{{ $product['name'] }}</h3>
                    <p class="text-primary-dim font-black text-lg">{{ $product['price'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    @include('layouts.partials.mobile_nav')
    @include('layouts.partials.footer')
@endsection

@push('styles')
<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
</style>
@endpush
