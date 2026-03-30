@extends('layouts.app')

@section('title', 'Top 10 Educational Toys for 3-Year-Olds | Kids World')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-24 pb-32">
        <!-- Hero Section -->
        <section class="max-w-7xl mx-auto px-6 mb-16">
            <nav class="flex items-center gap-2 mb-8 text-on-surface-variant font-label text-sm uppercase tracking-widest">
                <a class="hover:text-primary transition-colors" href="{{ route('blog.index') }}">Guides</a>
                <span class="material-symbols-outlined text-xs">chevron_right</span>
                <span class="hover:text-primary transition-colors cursor-pointer">Developmental Play</span>
            </nav>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7">
                    <h1
                        class="font-headline text-5xl md:text-7xl font-extrabold tracking-tight text-on-surface mb-6 leading-[1.1]">
                        Top 10 Educational <span class="text-primary italic">Toys</span> for 3-Year-Olds
                    </h1>
                    <p class="text-xl text-on-surface-variant leading-relaxed max-w-2xl mb-8">
                        Our curated selection of Montessori-inspired playthings designed to spark curiosity, motor skills,
                        and creative problem-solving in toddlers.
                    </p>
                    <div class="flex items-center gap-4">
                        <span
                            class="px-4 py-2 bg-tertiary-container text-on-tertiary-container rounded-full text-xs font-bold uppercase tracking-wider">Parent's
                            Choice 2026</span>
                        <span class="text-on-surface-variant text-sm font-medium">8 min read • Updated Today</span>
                    </div>
                </div>
                <div class="lg:col-span-5 relative">
                    <div class="aspect-[4/5] rounded-xl overflow-hidden shadow-xl bg-surface-container-high relative">
                        <img class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAI6bIOjtVxpA7O2sZHUlk6gl0QA4j4Z0StyrTmTjuGDKgOnl5lEZIb5XfgPUAnBJxvNZzB2DLeD6-hSkS53v0jpKp5F8HDegYbQt3Oq9-aJjQSH-mJy4b08oV8xTpL1GNwtEjoHcrwoj2MA6__fbmv-9eackDi7zxCoVKGkMHiNZLYwfYLGYRKe0ZvsGNU8ofR78lEBLTfos1bN3QxQ5tBp-xZ6zd8Zy4FNTKiyxAHq7UNiDFe-L5HanBL0RYhjTA5R7tty7-1oA" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <!-- Floating Badge -->
                    <div
                        class="absolute -bottom-6 -left-6 bg-surface-container-lowest p-6 rounded-lg shadow-xl max-w-[200px]">
                        <div class="flex items-center gap-2 text-primary mb-2">
                            <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">verified</span>
                            <span class="font-bold text-xs uppercase tracking-tighter">Expert Verified</span>
                        </div>
                        <p class="text-[10px] leading-tight text-on-surface-variant font-medium">Reviewed by Dr. Sarah Chen,
                            Child Developmental Specialist</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Article Content -->
        <article class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-16">
            <!-- Sidebar Navigation (TOC) -->
            <aside class="hidden lg:block lg:col-span-3 sticky top-32 h-fit">
                <div class="bg-surface-container-low p-8 rounded-lg">
                    <h3 class="font-headline font-bold text-lg mb-6 border-b border-outline-variant/20 pb-4">In this Guide
                    </h3>
                    <ul class="space-y-4">
                        <li><a class="text-primary font-bold flex items-center gap-2 text-sm" href="#cognitive"><span
                                    class="w-1.5 h-1.5 rounded-full bg-primary"></span> Cognitive Development</a></li>
                        <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm font-medium"
                                href="#motor">Fine Motor Skills</a></li>
                        <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm font-medium"
                                href="#creative">Creative Arts</a></li>
                        <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm font-medium"
                                href="#sensory">Sensory Play</a></li>
                        <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm font-medium"
                                href="#summary">Buying Checklist</a></li>
                    </ul>
                    <div class="mt-10 p-6 bg-primary-container/20 rounded-lg border border-primary/10">
                        <p class="text-xs font-bold text-primary uppercase tracking-widest mb-2">Join the Club</p>
                        <p class="text-xs text-on-surface-variant mb-4">Get weekly toy drops and curated activity guides.
                        </p>
                        <button
                            class="w-full py-3 bg-primary text-on-primary rounded-full text-xs font-bold hover:scale-105 transition-transform">Subscribe
                            Free</button>
                    </div>
                </div>
            </aside>

            <!-- Main Rich Text -->
            <div class="lg:col-span-9">
                <div class="prose prose-slate max-w-none">
                    <p
                        class="text-lg leading-relaxed text-on-surface-variant mb-12 first-letter:text-7xl first-letter:font-black first-letter:text-primary first-letter:mr-3 first-letter:float-left first-letter:leading-[0.8]">
                        At age three, a child's brain is a sponge for sensory information and logical sequencing. They are
                        moving away from simple cause-and-effect and beginning to explore complex imaginative play. Finding
                        toys that challenge their emerging cognitive abilities without causing frustration is the key to
                        sustained engagement and development.
                    </p>

                    <h2 class="font-headline text-3xl font-bold mb-8 flex items-center gap-3" id="cognitive">
                        <span
                            class="w-8 h-8 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center text-sm">01</span>
                        Cognitive Development Powerhouses
                    </h2>
                    <p class="mb-10 text-on-surface-variant leading-relaxed">
                        Cognitive play involves problem-solving, memory, and logical thinking. At this stage, toys like
                        complex puzzles, sequencing sets, and memory games are ideal.
                    </p>

                    <!-- Affiliate Product Card -->
                    <div
                        class="bg-surface-container-lowest rounded-xl shadow-lg overflow-hidden mb-12 flex flex-col md:flex-row border border-outline-variant/10">
                        <div class="md:w-2/5 relative h-64 md:h-auto overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQ3PE2ghrnYnXDrkQr-LM1DZs9otguTMJVhM7PYflD4Fa-hrG8QVSw3O7vG4bKlnrjMMtUO_6Mc5ecY3VnNK8AyH_NB3pX2rPRbAOv2Y9cEEfCHFvlxtoM2VuZwPQksvRkwZPEo9O62b0513L3nGWvFIp3BmeSZs6mw3QRxira2m7hrP2nxlk4F9A1X0KgXT2hTkrv1wMmJu8ibm-SD7xZpCB60Cb_m0YBd9U3jNFUwe3il_BtlUrh9ITMaLCiT7dJuu6BdGzsdQ" />
                            <span
                                class="absolute top-4 left-4 bg-sky-600 text-white px-3 py-1 rounded-full text-[10px] font-bold uppercase">Top
                                Pick</span>
                        </div>
                        <div class="md:w-3/5 p-8 flex flex-col justify-center">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-headline text-2xl font-bold text-on-surface">The Geometric Sorting Board
                                </h3>
                                <span class="text-primary font-bold">$24.99</span>
                            </div>
                            <p class="text-on-surface-variant text-sm mb-6 leading-relaxed">
                                This Montessori classic helps toddlers recognize shapes, count pieces, and understand
                                spatial relationships through trial and error. Made from sustainably sourced maple wood.
                            </p>
                            <div class="flex gap-4">
                                <a class="flex-1 py-4 bg-primary text-white text-center rounded-full text-sm font-bold shadow-lg hover:brightness-110 transition-all flex items-center justify-center gap-2"
                                    href="#">
                                    Shop on Amazon
                                    <span class="material-symbols-outlined text-sm">open_in_new</span>
                                </a>
                                <button
                                    class="w-14 h-14 rounded-full bg-surface-container flex items-center justify-center text-on-surface hover:bg-surface-container-high transition-colors">
                                    <span class="material-symbols-outlined">favorite</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Author Signature -->
                <div class="mt-20 pt-10 border-t border-outline-variant/20 flex items-center gap-6">
                    <img class="w-16 h-16 rounded-full object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCAVv2YBb53WkRd4OLz0Tzm3Ze-ROC8ZThitPRB0xt0WTAtxttBqobpl_CHIXVA0mTxg4krCbL3BUIYwUGXi8brkKDcFEdbtxLTnNB8Y7dIROEcX-t5X_hIDuEcCnQvMYpneSSWBoPHyDOvGn-v3rJ4v3exSS3MFEFPWTnzFaDnXaYmkvaaNOskZoUrne0ix7t8wYT3BweI_5ZJ15VxTJu_P5_zEAk6Tzl8znHQp0BWGzXcNwIdgW5QSsv9KA1UfhtciXve-WCsqA" />
                    <div>
                        <p class="font-bold text-on-surface">Emma Richardson</p>
                        <p class="text-sm text-on-surface-variant">Early Childhood Educator & Content Director at Kids
                            World.</p>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Content -->
        <section class="max-w-7xl mx-auto px-6 mt-24">
            <h3 class="font-headline text-3xl font-extrabold mb-10 text-center lg:text-left">More for 3-Year-Olds</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $related = [
                        ['category' => 'Nutrition', 'title' => '15 Healthy Snack Ideas Even Picky Toddlers Will Love', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDigV-2bPFKeRYeLhBR08zI53RI6QfvpmqvNJoqE0e_9WaAIevqzCRlgCxMhciouvj97MabOF6lcPtUVweKfSmGki0VgJ9b7uIygStv7axYB0kd7cRb3YL_gcp2azc9Wx3Io3nsqnSozv8386sXAMM0CdfKabA5DDfBmM6SXaJIPjraVCkHWQmy6vnfwwCSzLLNqLWttaFHuZ0NRfgZB9M0Pgc73nG3o440g9Kml1I8ICOU1uk3PoYpNd66FI_Q8Ntex_X14A4lGA'],
                        ['category' => 'Sleep', 'title' => 'The Perfect Bedtime Routine for Busy 3-Year-Olds', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBokuag-ZjRQm1eYKRD-D3v2CdJjk-j6BRsdFki1rY_ItD7DH0YyvRXPoY9MYK7oZaE2CX7pQZ7sdDz3Ib-00ZfRI7BDKX_sUAlhP3GTlVE4MFnIjrSVi0DZePuBfDl6Y7CZLpbwTa5coDDTHD1d7a5ZaRBos-nDHaG957N1SWXL0mfuoHWsVvLYySAcqVg7HYr2JswCbzpbIUaWQ4SWc7CxfFlVuJCYE9HWdf9gUVipISN5DbuZgMYMgyuJLYGx0Ct3TV2HelGkg'],
                        ['category' => 'Outdoors', 'title' => '5 Garden Activities to Encourage Nature Exploration', 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCm0BZxFj5fubQSooFNjiGauAvd5-YRnVZt9LgXfBw2s1lwC1WRg9lCPRDvv7DzvKAx3p4jrNk56knYBnfV37PTBfFdhaJPbLySE44ozRKfufpiKWfQN37o5648hxa5BqVbpZPyPx5HdOEq_0-eB48Lfgww-JjZRZmurjwS9n-udC2dTvnNA8hssm7_wM1POG9BgR-qXWGRtWrviEe_x8sDAJOjd6YIQfVuvimqppWhTPsJat3Jx-PikxIi0HrOeh93kR8z_6EEdA'],
                    ];
                @endphp
                @foreach($related as $item)
                    <a class="group block" href="#">
                        <div class="aspect-video rounded-xl overflow-hidden mb-4 bg-surface-container">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                src="{{ $item['img'] }}" />
                        </div>
                        <p class="text-xs font-bold text-primary uppercase tracking-widest mb-2">{{ $item['category'] }}</p>
                        <h4 class="font-headline font-bold text-lg group-hover:text-primary transition-colors">
                            {{ $item['title'] }}</h4>
                    </a>
                @endforeach
            </div>
        </section>
    </main>

    @include('layouts.partials.mobile_nav')
    @include('layouts.partials.footer')
@endsection