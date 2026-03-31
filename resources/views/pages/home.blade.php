@extends('layouts.app')

@section('title', 'Kids World | High-End Editorial Curations')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-24 pb-32">
        <!-- Hero Section -->
        <section class="max-w-7xl mx-auto px-6 mb-20">
            <div class="relative h-[600px] rounded-xl overflow-hidden bg-surface-container-low group">
                <img alt="Hero Background" class="absolute inset-0 w-full h-full object-cover"
                    src="{{ asset('frontend/assets/images/hero_toys.png') }}" />
                <div
                    class="absolute inset-0 bg-gradient-to-r from-surface/80 via-surface/20 to-transparent flex items-center">
                    <div class="max-w-xl px-12">
                        <span
                            class="inline-block px-4 py-1.5 rounded-full bg-tertiary-container text-on-tertiary-container text-sm font-bold tracking-wider uppercase mb-6 font-label">2026
                            Curated Selection</span>
                        <h1
                            class="text-5xl md:text-7xl font-headline font-extrabold text-on-surface leading-[1.1] tracking-tight mb-6">
                            Best Products for Your Kids <span class="text-primary italic">in 2026</span>
                        </h1>
                        <p class="text-lg text-on-surface-variant mb-10 font-body leading-relaxed max-w-md">
                            Discover high-end, editorial-approved gear and toys that inspire wonder and support healthy
                            development.
                        </p>
                        <div class="flex gap-4">
                            <a href="{{ route('category') }}"
                                class="px-8 py-4 rounded-xl bg-gradient-to-b from-primary to-primary-container text-on-primary font-bold shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all text-center">
                                Shop Now
                            </a>
                            <a href="{{ route('blog.index') }}"
                                class="px-8 py-4 rounded-xl bg-surface-container-lowest text-on-surface font-semibold shadow-sm hover:bg-surface-container transition-colors text-center">
                                View Lookbook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Categories -->
        <section class="max-w-7xl mx-auto px-6 mb-24">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/3 flex flex-col gap-8">
                    <h2 class="text-4xl font-headline font-bold text-on-surface leading-tight">Curated<br />Categories</h2>
                    <p class="text-on-surface-variant max-w-xs">Hand-picked selections categorized for Every stage of
                        growth.</p>
                    @php $toys = $categories->where('slug', 'toys')->first(); @endphp
                    <a href="{{ $toys ? route('category', ['category' => $toys->slug]) : '#' }}"
                        class="flex-1 rounded-lg bg-secondary-container p-8 flex flex-col justify-between group cursor-pointer overflow-hidden relative">
                        <img alt="Toys"
                            class="absolute right-[-20px] bottom-[-20px] w-48 opacity-40 group-hover:scale-110 transition-transform"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-dMO4wTK4f2cFMHQdFcX-I02Ggj6YEdpwyFT1rut-blUwQWmsTkYk4ZTBfrfqn-uFMjE8vAcEx1BLuVFFfdtEEYbuyiZsYaw21dAqzG4LHadR2ilZfgoyBc5GPjfihp0MXK0Hl1HTvH_4hpcbQipkfpZTku1ytLIRoNQ7FPIiF8DMvNzG618CSes4isnssq9QDeHbgUY9b3hHxYoie5In8FOJo2zLeklCZbNhYXXoVrYhPNl_qSLBJlsi4qDXHPojeFNp1mBJnA" />
                        <h3 class="text-2xl font-headline font-bold text-on-secondary-container relative z-10">Toys</h3>
                        <span class="material-symbols-outlined text-4xl text-on-secondary-container">rocket_launch</span>
                    </a>
                </div>
                <div class="md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-8">
                    @php $baby = $categories->where('slug', 'baby-care')->first(); @endphp
                    <a href="{{ $baby ? route('category', ['category' => $baby->slug]) : '#' }}"
                        class="h-80 rounded-lg bg-surface-container-low p-8 flex flex-col justify-end relative overflow-hidden group cursor-pointer">
                        <img alt="Baby Care"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWOY-yqIsnuYJ2yyj29B_1xnhjE9KAJyntbPQ3WhdlnFXvP9Q7lz9BtHM3mCwNJzQZb7N4PnWt-sSiNwM_RLJGCDKTxRnZHy0zDNqakofmLxC3I68uNTkkVVHPdb_Leqw_sci4tPNmg4ALdbP8swWXE9ptx0eDQqiTHaeXqswtk8Wijc2X01IAGGOn80MFdOa8fJWSXGLabfWc275ojwyERXMAHG0GN5vySosSWKxopfqTalHRgBd711tV957HeHupTWlYQuw2Ng" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <h3 class="text-2xl font-headline font-bold text-white relative z-10">Baby Care</h3>
                    </a>
                    @php $clothing = $categories->where('slug', 'clothing')->first(); @endphp
                    <a href="{{ $clothing ? route('category', ['category' => $clothing->slug]) : '#' }}"
                        class="h-80 rounded-lg bg-surface-container-low p-8 flex flex-col justify-end relative overflow-hidden group cursor-pointer">
                        <img alt="Clothing"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcX7W1Kz_6J48E2rfmbzbtDVXa1ZXHUT_1z4RKeewU_zQpqBbUE3eS1CSv_S1dhX312907Sya4tJcHlqBs9ZJflEbLXGlOEWYS04qok05kBZmpPLJCciwzndyutgN6yOChEyW6AT5Lo2yBnKxApiNuWO9Si9sx5d2m-bV2aW3ls0CKQJJm4ea9suAxjd7qHZTSyLjmqzXFwx2Sx1u9ahdvIyU-gfYTj8U-2vAENXjhWHTJFSZnX9KdgAQ1ioeFBV3DqSQmTnvVGA" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <h3 class="text-2xl font-headline font-bold text-white relative z-10">Clothing</h3>
                    </a>
                    @php $school = $categories->where('slug', 'school-items')->first(); @endphp
                    <a href="{{ $school ? route('category', ['category' => $school->slug]) : '#' }}"
                        class="md:col-span-2 h-64 rounded-lg bg-surface-container-high p-8 flex items-center justify-between relative overflow-hidden group cursor-pointer">
                        <img alt="School Items"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuABueK50nh4sL3Smhp-bGc0FNbNEyPDfcueERnJ7EUqSdSrClW7SH4aC0Myu836MdLhzpjVb_A54VxB_Lw7-pVhRWeO_Encv3BNYdBi6aSmGvEiMyvKoavFXBfM9sbB7-RA4GsdqZe9g9xyZ2hgyGn2MT19eoZKnIlh6cr3bByc6uEzlV9Hbzh1TZnroiTKfNKmaRKaP-7krhbnhQ25BfnnROckZUv1ZZytH31mJohbu-4yENSvM6y1NmsXntdi5wc39nUZ9envdA" />
                        <div class="absolute inset-0 bg-primary/20 mix-blend-multiply"></div>
                        <div class="relative z-10">
                            <h3 class="text-3xl font-headline font-bold text-white">School Items</h3>
                            <p class="text-white/90 mt-2">Gear for the modern learner.</p>
                        </div>
                        <span class="material-symbols-outlined text-white text-5xl relative z-10">school</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section id="featured-products" class="bg-surface-container-low py-24 mb-24">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-end mb-12">
                    <div>
                        <h2 class="text-4xl font-headline font-bold text-on-surface">Editor's Featured Selection</h2>
                        <p class="text-on-surface-variant mt-2 font-body">High-end products curated for quality and
                            innovation.</p>
                    </div>
                    <a href="{{ route('category') }}"
                        class="text-primary font-bold flex items-center gap-2 hover:underline">
                        View All Products <span class="material-symbols-outlined">trending_flat</span>
                    </a>
                </div>
                <div class="space-y-6">
                    @foreach($featuredProducts as $index => $product)
                        <div
                            class="bg-surface-container-lowest p-4 rounded-xl flex flex-col md:flex-row items-center gap-6 group hover:shadow-xl transition-shadow border border-white/10">
                            <div
                                class="w-16 h-16 flex items-center justify-center {{ $index == 0 ? 'bg-primary text-on-primary' : 'bg-surface-container-high text-on-surface' }} rounded-full font-headline font-black text-2xl flex-shrink-0">
                                {{ $index + 1 }}</div>
                            <div class="w-24 h-24 rounded-lg bg-slate-100 overflow-hidden flex-shrink-0">
                                <img alt="{{ $product->name }}" class="w-full h-full object-cover"
                                    src="{{ $product->image_path }}" />
                            </div>
                            <div class="flex-grow">
                                <div class="flex items-center gap-2 mb-1">
                                    <span
                                        class="text-xs font-bold font-label uppercase text-on-surface-variant tracking-widest">{{ $product->category->name }}</span>
                                    <div class="flex text-amber-400">
                                        @for($j = 1; $j <= 5; $j++)
                                            <span class="material-symbols-outlined text-sm"
                                                style="font-variation-settings: 'FILL' {{ $j <= round($product->rating) ? 1 : 0 }};">star</span>
                                        @endfor
                                    </div>
                                </div>
                                <h3 class="text-xl font-headline font-bold">{{ $product->name }}</h3>
                            </div>
                            <div class="flex-shrink-0 text-right md:pr-4">
                                <span
                                    class="block text-2xl font-black text-on-surface mb-2 font-headline">${{ number_format($product->price, 2) }}</span>
                                <a href="{{ route('product.show', $product->slug) }}"
                                    class="px-6 py-2 rounded-full bg-surface-container text-on-surface-variant font-bold text-sm hover:bg-primary hover:text-white transition-colors inline-block">View
                                    Product</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    @include('layouts.partials.mobile_nav')
    @include('layouts.partials.footer')
@endsection