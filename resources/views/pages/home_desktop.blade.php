@extends('layouts.app')

@section('title', 'Kids World | The Curated Playroom')

@section('body-class', 'bg-surface font-body text-on-surface antialiased')

@section('layout-content')
    @include('layouts.partials.header_desktop')

    <main>
        <!-- Hero Section -->
        <section class="relative overflow-hidden pt-12 pb-24 px-8 max-w-screen-2xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="z-10">
                    <span class="inline-block px-4 py-1.5 bg-tertiary-container text-on-tertiary-container rounded-full text-xs font-bold tracking-widest uppercase mb-6">Curated 2026 Edition</span>
                    <h1 class="font-headline text-6xl lg:text-7xl font-extrabold text-on-surface tracking-tighter leading-[1.05] mb-8">
                        Best Products for <br/><span class="text-primary italic">Your Kids</span> in 2026
                    </h1>
                    <p class="text-on-surface-variant text-xl max-w-lg mb-10 leading-relaxed">
                        Discover a hand-picked collection of premium nursery essentials, developmental toys, and eco-conscious clothing designed for the modern family.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('category.desktop') }}" class="bg-gradient-to-b from-primary-dim to-primary px-8 py-4 rounded-xl text-on-primary font-bold text-lg shadow-lg hover:brightness-110 transition-all flex items-center gap-2">
                            Explore Recommendations
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </a>
                        <a href="#top-10" class="bg-surface-container-high px-8 py-4 rounded-xl text-on-surface font-bold text-lg hover:bg-surface-container-highest transition-all">
                            View Top 10 List
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-[4/5] rounded-xl overflow-hidden editorial-shadow transform rotate-2">
                        <img class="w-full h-full object-cover" src="{{ asset('frontend/assets/images/hero_toys.png') }}"/>
                    </div>
                    <div class="absolute -bottom-10 -left-10 w-64 h-64 rounded-lg overflow-hidden editorial-shadow transform -rotate-6 hidden lg:block border-8 border-white">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCztnmsf5n-t6_osXe12foCy9XHPROKiUm1_WQ0uETajWYhO7_iWXKZ8BtaBmUT6iz_l_t-0UkEUmPhiO12lukGL0QIEwHeS7eZL77kGLUSEB6xf1l4btU5xIiB8oLOE7BXiw4FzjtBrjeg4sczE8F2We-HZEo4VQWwDY98QP4Pc4WNg3PVV8VWm5yiokupSGvK0upB5wus1deDi69kKwCqU2G7tkwCefLbOxr-SZCKLGVCJTIIAYap6MwwFtjSXKdJGY97H50WWA"/>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories Bento Grid -->
        <section class="bg-surface-container-low py-24 px-8">
            <div class="max-w-screen-2xl mx-auto">
                <div class="flex justify-between items-end mb-16">
                    <div>
                        <h2 class="font-headline text-4xl font-bold tracking-tight mb-4">Shop by Category</h2>
                        <p class="text-on-surface-variant max-w-md">Every item in our playroom is selected for quality, safety, and aesthetic appeal.</p>
                    </div>
                    <a class="text-primary font-bold flex items-center gap-1 hover:underline" href="{{ route('category.desktop') }}">
                        View All Categories <span class="material-symbols-outlined text-sm">open_in_new</span>
                    </a>
                </div>
                <!-- Categories etc... (simplified for brevity, keeping structure) -->
                @php
                    $cats = [
                        ['id' => 'toys', 'label' => 'Toys', 'sub' => 'Developmental & Sustainable Play', 'items' => '240+ Items', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDQzv5-cv9pOFTfcKjzSXTiNbE_8kNBiBTWqQyfLr9adaaqRDS8fTEoC2OD62yTRBkbt5cO5l2YrPI0MV9st8v-76p1-MenTCPNSgXy2lybaRP3bsPAZOiOrPbtMmxd_rYsK9P32I7nzibePxJqqiXQVZtI4c41vVYj6AGkdxPabKgyLIoplh2ivy54GInYwu6mbGV_zx9HI8W7vYx8NOcbNkXjnnV7N8S6_ZMZk6O-0VYVHuG9oIeDXWEAuq4tcqOhYrJA6E57Ag', 'large' => true],
                        ['id' => 'care', 'label' => 'Baby Care', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBN40GRH2GV_gCBiCnvYgQJYzIao3_i07MbcxA_2Ivg-NQ-LULh7HKUWbYVfSo1EE-vyo23UKaKo2j5XxDvb53wpAbBL3LTD7cw27aZ0czg5cfZqpYqwEbV09YAEHITTJ8Ek8XT_PHZQkAjZWTSWiqXCu-Cbe2Z3h2suhqSZwWhVn33FFzn-LP9zsXgGg6FkBi1JekKKHw-ZGS4CmiOYzfXgBbBBocBmK-aj-QPgEzGZKghlVa7WCzNLra1je216OkuaXLiHCaT9Q', 'color' => 'bg-primary/20'],
                        ['id' => 'clothing', 'label' => 'Clothing', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCqq0M5f8zuFrb7HDHMYiVNhJuuJg4cemufDngltmULx4vVsiPd-W2N5BD0SNDAVWreTfXGpGb3Fya9zG-MKAQ3efHXYIrZKKrHMHWU5uExi1VM-O0wXfTrQleaLHBhP1C7iEocOop3dgkAOKCJ8rmiln6OqKVBV_vp327gEN847fG72gXEgS1zlAC33EaH53RqUxmo8V_3mY0OQxqvAtfKM254TysLIIgIy_6pO6ZWXwGOJgDb19HmEGCuXl-jnF24dDuuxf-gtA', 'color' => 'bg-secondary/20'],
                        ['id' => 'school', 'label' => 'School Essentials', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBX1nt2D_OQQtIFbau77EI8LzLlLrzPgwoygsmp3etg0AdE2Yxb7IgffYmERbsgbmPE64Q1pHpzPk_jn_RYb7jkescFTc0TmB3CaGh-ub34PtuW-k_2nILRwee-qqWkYQkK7HGtgOca8QEpo2jE1v65uhXEwkvtI1shZ36mmy3OGNZr28O4v8pftM5rPVhf54ZCoKmqe1Er-NziNAfgGw8EnPMtvJ8utvur3zD_0eRhENlhazL3BwSLLFgkXPJ1qn7bXodv70hp6g', 'span' => true],
                    ];
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 h-[600px]">
                    @foreach($cats as $cat)
                    <div class="{{ ($cat['large'] ?? false) ? 'md:col-span-2 md:row-span-2' : (($cat['span'] ?? false) ? 'md:col-span-2' : '') }} relative group cursor-pointer overflow-hidden rounded-lg">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $cat['img'] }}"/>
                        <div class="absolute inset-0 {{ $cat['color'] ?? 'bg-gradient-to-t from-black/60 via-transparent to-transparent' }} {{ isset($cat['color']) ? 'group-hover:bg-transparent transition-colors' : '' }}"></div>
                        @if($cat['large'] ?? false)
                        <div class="absolute bottom-8 left-8 text-white">
                            <h3 class="font-headline text-3xl font-bold mb-2">{{ $cat['label'] }}</h3>
                            <p class="opacity-90 mb-4">{{ $cat['sub'] }}</p>
                            <span class="bg-white/20 backdrop-blur-md px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider">Browse {{ $cat['items'] }}</span>
                        </div>
                        @else
                        <div class="absolute {{ ($cat['span'] ?? false) ? 'inset-0 flex items-center justify-center' : 'bottom-6 left-6' }} text-white">
                            <h3 class="font-headline {{ ($cat['span'] ?? false) ? 'text-2xl' : 'text-xl' }} font-bold">{{ $cat['label'] }}</h3>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Top 10 Products -->
        <section id="top-10" class="py-24 px-8 max-w-screen-2xl mx-auto">
            <!-- Products etc... -->
            <div class="text-center mb-16">
                <h2 class="font-headline text-4xl font-bold tracking-tight mb-4 text-on-surface">The 2026 Elite Ten</h2>
                <p class="text-on-surface-variant max-w-2xl mx-auto italic text-lg">"Our rigorous testing process involves child psychologists, safety experts, and real parents to bring you the definitive list."</p>
            </div>
            @include('layouts.partials.product_rows_desktop')
        </section>
        
        <!-- TikTok Trending Section -->
        <section id="trending" class="py-24 bg-surface-container-highest px-8 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-24 opacity-5 pointer-events-none">
                <span class="material-symbols-outlined text-[300px]" style="font-variation-settings: 'FILL' 1;">music_note</span>
            </div>
            <div class="max-w-screen-2xl mx-auto">
                <div class="mb-12">
                    <h2 class="font-headline text-4xl font-bold tracking-tight mb-2 text-on-surface">Trending on TikTok</h2>
                    <p class="text-on-surface-variant">The viral sensations that parents are obsessed with right now.</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @php
                        $tiktokVideos = [
                            ['views' => '1.2M', 'title' => 'Best sensory toy for travel hacks! #MomTok #ToddlerLife', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDhq43SgvQZpIa8y6le3xVmttvj7l2wo9_gZexkBqfV--Xgg13D22yuPn5AzLVbRGv8zA2GWo0Ysm-msnLJ390Z_OPJGBw9sHqsszqrhc6aYLPG-Rkm9HdF8O9wywB2pTa1UTAnxGtpi7IEKHh32Z5b8mTzAdCp7D3S9DLI2I6VtLp3DNGT8Rry5lkzr02CqEv7seAgL3oE6Hjv-TI0KiyKoW-PccKY0GgUlc2-rNL6qZcq7ZluvHVRYJ-XzMg25XpNjdYZumOv6A', 'mt' => '0'],
                            ['views' => '850k', 'title' => 'Packing school lunch but make it aesthetic. ✨ #BentoBox', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB6K6R_6xrazIFZQA5EQ5_47Mr84WXpg7zRsxEn9kG16RR5KGtcj98w9Oog_BLJkkFQWjfL4BM8UcJf4m4PiQbuk-gouhjvRgh6U7r41ALn-Ufnz4P22nSO9wF1TihbLrenF9wL9jZgu193WVPMdTjhIPxyfT6aLKyPUV9yg8p7xDPf2uRlLZutxZholYVpTOFvla3mFBD7Fwlgx3ckVyquQqUfY-PTGTnSpkfog_6I_ZEHS1f_E53QKaBTgjwZvv7sGD_lMTwPYg', 'mt' => '8'],
                            ['views' => '3.4M', 'title' => 'Nursery transformation under $200! #DreamNursery', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBGNITm_shTQ-PP_8qUD7xddndiaXrNASv68PV8lDQqSZURjpN0niyEEH6oAr89t3kgIb0MkeXEcw9w_tWx9pLvg1shA-0yRrXq-4-cQfOK5zfxrMC2cEBZ9A6KjsCHtnZZbNOZdbN5_vYkh-D9cZBUOjgUslewfgBEmF9xQkwdheIAt6QEFV42Xvg6dad4E4XYJsSNIM8ATka74eYRH52TXJepWx2NIwBF1WiF6Z7Wn30FIlOdM6w9FTfmRpI3MumNqbGFP7dKkw', 'mt' => '0'],
                            ['views' => '2.1M', 'title' => 'Why we switched to silicone bowls. #ParentingTips', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC8DPK5yoWF5qeIQ0wBTT13EUX9FRETTfqXlnGfNba8YzBtDbfumu1NzaoSgKtRHSN66rqF2IvJSwM5CBflhYOZINcjqcCgrkfgiLn5ngaaD99Q4S2e1qBtfGroGcOaj79IOPeiOEfXNMA6GbOI3g-yToezOeO8WgkrZG23pafh58q7OKuQiw4yi82vTP3002WotX4fPEJHXRV7V3EYrowfRyBj-jIlEQSR_J20z9hPZ5thdxoNjdnL-PBp9GtNt0r5oSv9P0vJfA', 'mt' => '8']
                        ];
                    @endphp
                    @foreach($tiktokVideos as $video)
                        <div class="aspect-[9/16] rounded-xl overflow-hidden relative group cursor-pointer editorial-shadow {{ $video['mt'] != '0' ? 'md:mt-8' : '' }}">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ $video['img'] }}"/>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="material-symbols-outlined text-white text-sm" style="font-variation-settings: 'FILL' 1;">play_circle</span>
                                    <span class="text-white text-[10px] font-bold">{{ $video['views'] }} Views</span>
                                </div>
                                <p class="text-white text-xs font-medium line-clamp-2">{{ $video['title'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="py-24 px-8 max-w-screen-xl mx-auto">
            <div class="bg-primary rounded-xl p-12 lg:p-20 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-primary-container/30 to-transparent"></div>
                <div class="relative z-10">
                    <h2 class="font-headline text-4xl font-bold text-on-primary mb-6 tracking-tight">Join the Inner Circle</h2>
                    <p class="text-on-primary/80 text-lg mb-10 max-w-xl mx-auto">Receive early access to our seasonal curated guides and exclusive discount codes from our partner brands.</p>
                    <form class="flex flex-col md:flex-row gap-4 max-w-lg mx-auto">
                        <input class="flex-1 rounded-xl bg-white/10 border-white/20 text-white placeholder:text-white/60 focus:ring-primary-container focus:border-primary-container px-6 py-4 backdrop-blur-sm" placeholder="Your email address" type="email"/>
                        <button class="bg-white text-primary font-bold px-8 py-4 rounded-xl hover:bg-surface-bright transition-all whitespace-nowrap">
                            Get Guides
                        </button>
                    </form>
                    <p class="text-on-primary/60 text-xs mt-6">We respect your privacy. No spam, ever.</p>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.partials.footer_desktop')
@endsection

@push('styles')
<style>
    .editorial-shadow { box-shadow: 0 20px 50px -12px rgba(44, 47, 48, 0.06); }
</style>
@endpush
