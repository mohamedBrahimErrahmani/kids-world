@extends('layouts.app')

@section('title', 'Kids World | High-End Editorial Curations')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-24 pb-32">
        <!-- Hero Section -->
        <section class="max-w-7xl mx-auto px-6 mb-20">
            <div class="relative h-[600px] rounded-xl overflow-hidden bg-surface-container-low group">
                <img alt="Hero Background" class="absolute inset-0 w-full h-full object-cover" src="{{ asset('frontend/assets/images/hero_toys.png') }}"/>
                <div class="absolute inset-0 bg-gradient-to-r from-surface/80 via-surface/20 to-transparent flex items-center">
                    <div class="max-w-xl px-12">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-tertiary-container text-on-tertiary-container text-sm font-bold tracking-wider uppercase mb-6 font-label">2026 Curated Selection</span>
                        <h1 class="text-5xl md:text-7xl font-headline font-extrabold text-on-surface leading-[1.1] tracking-tight mb-6">
                            Best Products for Your Kids <span class="text-primary italic">in 2026</span>
                        </h1>
                        <p class="text-lg text-on-surface-variant mb-10 font-body leading-relaxed max-w-md">
                            Discover high-end, editorial-approved gear and toys that inspire wonder and support healthy development.
                        </p>
                        <div class="flex gap-4">
                            <a href="{{ route('category') }}" class="px-8 py-4 rounded-xl bg-gradient-to-b from-primary to-primary-container text-on-primary font-bold shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all text-center">
                                Shop Now
                            </a>
                            <a href="{{ route('blog.index') }}" class="px-8 py-4 rounded-xl bg-surface-container-lowest text-on-surface font-semibold shadow-sm hover:bg-surface-container transition-colors text-center">
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
                    <h2 class="text-4xl font-headline font-bold text-on-surface leading-tight">Curated<br/>Categories</h2>
                    <p class="text-on-surface-variant max-w-xs">Hand-picked selections categorized for Every stage of growth.</p>
                    <div class="flex-1 rounded-lg bg-secondary-container p-8 flex flex-col justify-between group cursor-pointer overflow-hidden relative">
                        <img alt="Toys" class="absolute right-[-20px] bottom-[-20px] w-48 opacity-40 group-hover:scale-110 transition-transform" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-dMO4wTK4f2cFMHQdFcX-I02Ggj6YEdpwyFT1rut-blUwQWmsTkYk4ZTBfrfqn-uFMjE8vAcEx1BLuVFFfdtEEYbuyiZsYaw21dAqzG4LHadR2ilZfgoyBc5GPjfihp0MXK0Hl1HTvH_4hpcbQipkfpZTku1ytLIRoNQ7FPIiF8DMvNzG618CSes4isnssq9QDeHbgUY9b3hHxYoie5In8FOJo2zLeklCZbNhYXXoVrYhPNl_qSLBJlsi4qDXHPojeFNp1mBJnA"/>
                        <h3 class="text-2xl font-headline font-bold text-on-secondary-container relative z-10">Toys</h3>
                        <span class="material-symbols-outlined text-4xl text-on-secondary-container">rocket_launch</span>
                    </div>
                </div>
                <div class="md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="h-80 rounded-lg bg-surface-container-low p-8 flex flex-col justify-end relative overflow-hidden group cursor-pointer">
                        <img alt="Baby Care" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWOY-yqIsnuYJ2yyj29B_1xnhjE9KAJyntbPQ3WhdlnFXvP9Q7lz9BtHM3mCwNJzQZb7N4PnWt-sSiNwM_RLJGCDKTxRnZHy0zDNqakofmLxC3I68uNTkkVVHPdb_Leqw_sci4tPNmg4ALdbP8swWXE9ptx0eDQqiTHaeXqswtk8Wijc2X01IAGGOn80MFdOa8fJWSXGLabfWc275ojwyERXMAHG0GN5vySosSWKxopfqTalHRgBd711tV957HeHupTWlYQuw2Ng"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <h3 class="text-2xl font-headline font-bold text-white relative z-10">Baby Care</h3>
                    </div>
                    <div class="h-80 rounded-lg bg-surface-container-low p-8 flex flex-col justify-end relative overflow-hidden group cursor-pointer">
                        <img alt="Clothing" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcX7W1Kz_6J48E2rfmbzbtDVXa1ZXHUT_1z4RKeewU_zQpqBbUE3eS1CSv_S1dhX312907Sya4tJcHlqBs9ZJflEbLXGlOEWYS04qok05kBZmpPLJCciwzndyutgN6yOChEyW6AT5Lo2yBnKxApiNuWO9Si9sx5d2m-bV2aW3ls0CKQJJm4ea9suAxjd7qHZTSyLjmqzXFwx2Sx1u9ahdvIyU-gfYTj8U-2vAENXjhWHTJFSZnX9KdgAQ1ioeFBV3DqSQmTnvVGA"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <h3 class="text-2xl font-headline font-bold text-white relative z-10">Clothing</h3>
                    </div>
                    <div class="md:col-span-2 h-64 rounded-lg bg-surface-container-high p-8 flex items-center justify-between relative overflow-hidden group cursor-pointer">
                        <img alt="School Items" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuABueK50nh4sL3Smhp-bGc0FNbNEyPDfcueERnJ7EUqSdSrClW7SH4aC0Myu836MdLhzpjVb_A54VxB_Lw7-pVhRWeO_Encv3BNYdBi6aSmGvEiMyvKoavFXBfM9sbB7-RA4GsdqZe9g9xyZ2hgyGn2MT19eoZKnIlh6cr3bByc6uEzlV9Hbzh1TZnroiTKfNKmaRKaP-7krhbnhQ25BfnnROckZUv1ZZytH31mJohbu-4yENSvM6y1NmsXntdi5wc39nUZ9envdA"/>
                        <div class="absolute inset-0 bg-primary/20 mix-blend-multiply"></div>
                        <div class="relative z-10">
                            <h3 class="text-3xl font-headline font-bold text-white">School Items</h3>
                            <p class="text-white/90 mt-2">Gear for the modern learner.</p>
                        </div>
                        <span class="material-symbols-outlined text-white text-5xl relative z-10">school</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Top 10 Products List -->
        <section id="top-10" class="bg-surface-container-low py-24 mb-24">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-end mb-12">
                    <div>
                        <h2 class="text-4xl font-headline font-bold text-on-surface">Top 10 Products</h2>
                        <p class="text-on-surface-variant mt-2 font-body">Ranked by performance, safety, and parent satisfaction.</p>
                    </div>
                    <button class="text-primary font-bold flex items-center gap-2 hover:underline">
                        View All Rankings <span class="material-symbols-outlined">trending_flat</span>
                    </button>
                </div>
                <div class="space-y-6">
                    <!-- Product Item 1 -->
                    @for($i = 1; $i <= 2; $i++)
                    <div class="bg-surface-container-lowest p-4 rounded-xl flex flex-col md:flex-row items-center gap-6 group hover:shadow-xl transition-shadow border border-white/10">
                        <div class="w-16 h-16 flex items-center justify-center {{ $i == 1 ? 'bg-primary text-on-primary' : 'bg-surface-container-high text-on-surface' }} rounded-full font-headline font-black text-2xl flex-shrink-0">{{ $i }}</div>
                        <div class="w-24 h-24 rounded-lg bg-slate-100 overflow-hidden flex-shrink-0">
                            <img alt="Product {{ $i }}" class="w-full h-full object-cover" src="{{ $i == 1 ? 'https://lh3.googleusercontent.com/aida-public/AB6AXuDFCv3AZjsjFPlw_7rYnP2evef01vVdlYOngJ3LsFRBXlKE52_XbKqqlJnE5ICBxSAqkPLLQy0oMOt5AWfEAHSUhFkF6U5YZxD9nYUTOWLsqtkCBj5rRRMJ99zk0Dn01H3xRRCLIAn8Fv4Ug5ckjqI6jFtJeFm0xadli7_cCxvfXGJHt3stDKx9mfNK1qG8NUi_D6sETm6zbJwNEEWVPGCx21DgX5H3S_8caez3_uQ9MitTnWkioKqPQ5Zgnx0dz-mnERP9RQbz4A' : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBetQKrA6vIrMxaxT7sBrXyvWukbPF0lqpisIp_JqFnRHZ574457rq1mrHSKZ7yn7H2ndBoPms8zkwe6p45nSkpk0uhJvBTnf4L-rD-CPHcIKcUlgHf9M5cHoL3HFI0rvu9En3yiasas0klFjzBQ1eP-UwlUURr4_KPCUlbak9dYf0g0r-mm2Qrai8GxR44tAG_MdCPp8TD5SsuWEhXMG-984aHcB7l7YNHzMO0KcoZttgWHoegbFwJF3IJ3v6B0f0MZOMxg3VgPg' }}"/>
                        </div>
                        <div class="flex-grow">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-xs font-bold font-label uppercase text-on-surface-variant tracking-widest">{{ $i == 1 ? 'Baby Care' : 'Toys' }}</span>
                                <div class="flex text-amber-400">
                                    @for($j = 1; $j <= 5; $j++)
                                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' {{ ($i == 2 && $j == 5) ? 0 : 1 }};">star</span>
                                    @endfor
                                </div>
                            </div>
                            <h3 class="text-xl font-headline font-bold">{{ $i == 1 ? 'Lullaby Cloud Organic Night Lamp' : 'Bio-Plastic Modular Sand Castle Set' }}</h3>
                        </div>
                        <div class="flex-shrink-0 text-right md:pr-4">
                            <span class="block text-2xl font-black text-on-surface mb-2 font-headline">{{ $i == 1 ? '$49.00' : '$35.99' }}</span>
                            <button class="px-6 py-2 rounded-full bg-surface-container text-on-surface-variant font-bold text-sm hover:bg-primary hover:text-white transition-colors">View Product</button>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </section>

        <!-- Trending Section -->
        <section class="max-w-7xl mx-auto px-6 mb-24">
            <div class="flex items-center gap-4 mb-10">
                <span class="flex items-center justify-center w-12 h-12 rounded-full bg-error-container text-on-error">
                    <span class="material-symbols-outlined">local_fire_department</span>
                </span>
                <h2 class="text-4xl font-headline font-bold text-on-surface">Popular on TikTok</h2>
            </div>
            <div id="trending" class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Video Cards (Simplified for Blade) -->
                @php
                    $videos = [
                        ['title' => "Unboxing the magic drawing board that everyone's talking about!", 'views' => '1.2M', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDie7Iovk1wwScv6ukVsen93c0NeER5AdGmuxB5MBbg-kXsjbhpxilK6UFlJcokXEInJ3xBqSilY3TgqxKxFLuaeyp5KhVSI5rI2Lje74Z0dxMU2g3ycw1f_SwfzMffwd44ZbWVsVyIbrB-iBOlPmb0bMXmCZGLMj5VMqAwEbPf3UDN0VaY4htoNXqIOUktHmF81ZrnCzkT45m1j3BGZTrZ8BlQN6-hH7pZDMjaG2yUnr2TnGbYwftx372NuY4aTV1HiZ3__BUM5Q'],
                        ['title' => "My morning routine with the smartest lunchbox ever \ud83e\udd6a", 'views' => '850K', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCvALwHzORjicXMwqNMWYQE96H0cPQn8RAWlsUB0TMopomEwOH8hoshlQ5CpU9EPrDobpdJrx1KDM6MqrAUp9ZcOynATPdP9CxQpjjcA4IVMLtw_qaEAq_xHlxNpj43K9z-P7qETFyh6MEblHFRYUObeeXNgKaMtkZwf7-Klew21SrcFYUaRFWfz1EnPdoaa87xnRjMQg99ClzIcZCVU9XwwvZHMT48KORMwZbKPPyRh1S-lQj9KLBjd1a0nYo_OPyKbHo53kWu7g'],
                        ['title' => "Cozy room makeover using only Kids World essentials \u2728", 'views' => '3.1M', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDwklpZMSOGR57QuqLK8UOnORtYewRkIPxtcp7SIvC-6DILoZizePWZ8lienR3meykdt6woUT4deEUZQITNlnyVRoUgISeNMyzo-Q0V642Ie0DXuPLJbF0BB6uwdwTRO2G5BJ-gNV-cR-0nPd0sMRhbzhYkXXFsaJq5mA28_0g3aMEpDAswuCGYVzMlcN-Z6Z8YFRJhnQPkE3I3P0thj_Ndir4so3Uyud4mxCqMR4aPu_bYz1hzGiH_M6fhGT8u0xXZoQtYDSd2dA', 'hidden' => true],
                        ['title' => "Puddle jumping tested! These boots are life savers \ud83c\udf27", 'views' => '542K', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAR30_dDW6JNxQK_6xhx2aafqhRjR7AgnghyPc89ulbm_R1W9Vf2oilr7_Hzfne7udFb_oVMoa09P93sWCt6xkGEe4F5aocSoHl5euhz2J29uF1nucwsHbR4bb6_AR6ZtbpKotKQ8ZFCyt4Z0-mt7DWtHCRxzo0M4hBdpmMnQUMxl-oYT2It140s7RjDETUDsNCXAqzSTAkfanL0fmsBehKsOclb57SosgYfiMfgKxRzyy1L4Uvd8Y2R6ITVXu-usjw3zFtqpxTMQ', 'hidden' => true]
                    ];
                @endphp
                @foreach($videos as $video)
                <div class="aspect-[9/16] rounded-lg overflow-hidden relative group cursor-pointer {{ ($video['hidden'] ?? false) ? 'hidden md:block' : '' }}">
                    <img alt="TikTok Video" class="w-full h-full object-cover" src="{{ $video['img'] }}"/>
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors"></div>
                    <div class="absolute top-4 right-4 bg-black/60 backdrop-blur-md rounded-full px-3 py-1 flex items-center gap-1">
                        <span class="material-symbols-outlined text-white text-xs">visibility</span>
                        <span class="text-white text-xs font-bold">{{ $video['views'] }}</span>
                    </div>
                    <div class="absolute bottom-0 w-full p-4 bg-gradient-to-t from-black/80 to-transparent">
                        <p class="text-white text-sm font-bold line-clamp-2 mb-2 font-body">{{ $video['title'] }}</p>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary-fixed">shopping_bag</span>
                            <span class="text-primary-fixed text-xs font-bold font-headline">Shop Tagged Items</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </main>

    @include('layouts.partials.mobile_nav')
    @include('layouts.partials.footer')
@endsection
