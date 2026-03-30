@extends('layouts.app')

@section('title', 'Eco-Friendly Wooden Arch | Kids World')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-24 pb-32 px-4 md:px-8 max-w-7xl mx-auto">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 mb-8 text-sm font-label text-on-surface-variant overflow-x-auto no-scrollbar whitespace-nowrap">
            <a href="{{ route('home') }}" class="hover:text-primary transition-colors cursor-pointer">Shop</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <a href="{{ route('category') }}" class="hover:text-primary transition-colors cursor-pointer">Developmental Toys</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-on-surface font-semibold">Eco-Friendly Wooden Arch</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left: Gallery Section -->
            <div class="lg:col-span-7 space-y-6">
                <div class="relative group">
                    <div class="flex gap-4 overflow-x-auto snap-x snap-mandatory no-scrollbar rounded-lg md:rounded-xl">
                        @php
                            $images = [
                                'https://lh3.googleusercontent.com/aida-public/AB6AXuDEli9yd5oyc3YaGgSmVcqHk091HzwXq_IGV4Gfrezzij43WLLYhYqtxhWX3a4foHEbMFPqhBNOAyOrLkSIzFrm_86YVSkQSfO6PFMZhNAuHdwh3ZYE9NPbjncb-qtN1VqbVtCZj-dW7-8DGbwaQB5HWcIR0tBktJ87-rHS5TUvfLpOOeUqa49QDmnF0Vj_EA8z-fubA1ywDjocz6Lmxw9aUh4hoJ5EAVOw0T3s3OFBThGUsyaH_nnNiTGTx4Sg8YmtnV2ir-xHQA',
                                'https://lh3.googleusercontent.com/aida-public/AB6AXuCJJrvgJ3Ydjf6LLDGAvnx3UaL3lQcUMDiTpvQWr5jb8bbZhHRaK_IAx8arq7zUUBML3WRbutIrAUn_8SsG0f1Z-tsGyWo9fWCbk49QDmnF0Vj_EA8z-fubA1ywDjocz6Lmxw9aUh4hoJ5EAVOw0T3s3OFBThGUsyaH_nnNiTGTx4Sg8YmtnV2ir-xHQA', // Reused for demo
                                'https://lh3.googleusercontent.com/aida-public/AB6AXuAknhrgv447Wj_xRkkQ51tS5Ievem8kqpyfBg1vVUSb9F1yH8giD0y7-cq7O-SQWmFMtyMys5aUDm_KPeE0ztPx4Az3OsNACC1u6YSbd_PnxBC_Oes3nxWMsDGUG3UH7H7C9qOF7nlxTQ0iySoVnd0nWxNq6xGEI5_PS1vyXk99LX127_tZkIb_4cTRJvKh3yjLy0O56FJJ-S0pje6By9OcMx1ZMxiXxlD4ZBvL-r3vJFYYMoxpq4w8iSJZaia9J0Sc_n65um4CTA'
                            ];
                        @endphp
                        @foreach($images as $img)
                        <div class="snap-center shrink-0 w-full aspect-square bg-surface-container-low overflow-hidden rounded-xl">
                            <img alt="Product" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" src="{{ $img }}"/>
                        </div>
                        @endforeach
                    </div>
                    <!-- Swipe Indicator -->
                    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-2">
                        <div class="w-8 h-1.5 rounded-full bg-primary"></div>
                        <div class="w-1.5 h-1.5 rounded-full bg-white/50"></div>
                        <div class="w-1.5 h-1.5 rounded-full bg-white/50"></div>
                    </div>
                </div>
                <!-- Featured Editorial Chips -->
                <div class="flex flex-wrap gap-3">
                    <span class="bg-tertiary-container text-on-tertiary-container px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                        <span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">stars</span>
                        Parent's Choice
                    </span>
                    <span class="bg-secondary-container text-on-secondary-container px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                        <span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">eco</span>
                        Eco-Friendly
                    </span>
                    <span class="bg-surface-container-highest text-on-surface-variant px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                        <span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">verified</span>
                        Safe
                    </span>
                </div>
            </div>

            <!-- Right: Details Section -->
            <div class="lg:col-span-5 space-y-8 lg:sticky lg:top-32">
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="flex text-primary">
                            @for($i=0; $i<4; $i++) <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">star</span> @endfor
                            <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">star_half</span>
                        </div>
                        <span class="text-sm font-semibold text-on-surface-variant">(128 reviews)</span>
                    </div>
                    <h2 class="text-4xl font-extrabold font-headline tracking-tight text-on-surface">Curated Montessori Wooden Arch</h2>
                    <p class="text-3xl font-bold text-sky-700">$189.00</p>
                </div>
                <!-- Benefits Points -->
                <div class="bg-surface-container-low rounded-lg p-6 space-y-4">
                    <h3 class="font-bold text-lg font-headline">Key Benefits</h3>
                    <ul class="space-y-3">
                        @foreach(['Develops gross motor skills and spatial awareness.', 'FSC Certified sustainable birch wood.', 'Non-toxic, water-based satin finish.'] as $benefit)
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-primary mt-0.5">check_circle</span>
                            <span class="text-on-surface-variant font-medium">{{ $benefit }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Highlight Box -->
                <div class="relative overflow-hidden bg-primary text-on-primary p-8 rounded-xl shadow-xl">
                    <div class="absolute -top-6 -right-6 w-24 h-24 bg-primary-container/20 rounded-full blur-2xl"></div>
                    <h4 class="text-xl font-bold font-headline mb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined">favorite</span>
                        Why parents love this
                    </h4>
                    <p class="leading-relaxed font-medium text-on-primary/90 italic">
                        "The quality is unmatched. It feels like a piece of designer furniture that our toddler actually uses for hours every single day. Easy to assemble and even easier on the eyes."
                    </p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold">SM</div>
                        <p class="text-sm font-semibold">— Sarah M., Verified Parent</p>
                    </div>
                </div>
                <div class="hidden md:block">
                    <button class="w-full bg-gradient-to-b from-primary to-primary-container text-on-primary py-5 rounded-xl font-bold text-lg hover:shadow-lg transition-all active:scale-95">
                        Add to Registry
                    </button>
                </div>
            </div>
        </div>

        <!-- Comparison Table Section -->
        <section class="mt-24">
            <h3 class="text-3xl font-black font-headline mb-10 text-center">Compare the Best</h3>
            <div class="overflow-x-auto bg-white rounded-lg p-1">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low">
                            <th class="p-6 font-bold text-sm uppercase tracking-widest text-on-surface-variant">Feature</th>
                            <th class="p-6 font-bold text-primary font-headline">Montessori Arch</th>
                            <th class="p-6 font-bold text-on-surface-variant font-headline">Plastic Climber</th>
                            <th class="p-6 font-bold text-on-surface-variant font-headline">Foam Pit</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-container">
                        @php
                            $features = [
                                ['label' => 'Material', 'v1' => 'Sustainable Wood', 'v2' => 'Recycled HDPE', 'v3' => 'CertiPUR-US Foam'],
                                ['label' => 'Max Weight', 'v1' => '120 lbs', 'v2' => '50 lbs', 'v3' => 'No limit'],
                                ['label' => 'Longevity', 'v1' => '10+ Years', 'v2' => '2-3 Years', 'v3' => '5 Years'],
                                ['label' => 'Aesthetic', 'v1' => 'High-End Editorial', 'v2' => 'Bright/Playful', 'v3' => 'Soft/Neutral', 'v1_bold' => true],
                            ];
                        @endphp
                        @foreach($features as $f)
                        <tr>
                            <td class="p-6 font-semibold">{{ $f['label'] }}</td>
                            <td class="p-6 {{ ($f['v1_bold'] ?? false) ? 'font-bold text-primary' : 'text-on-surface-variant' }}">{{ $f['v1'] }}</td>
                            <td class="p-6 text-on-surface-variant">{{ $f['v2'] }}</td>
                            <td class="p-6 text-on-surface-variant">{{ $f['v3'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Trust Elements Grid -->
        <section class="mt-24 grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $trust = [
                    ['title' => 'Certified Safe', 'desc' => 'Meets or exceeds all CPSC and ASTM safety standards for toddler play.', 'icon' => 'verified_user', 'color' => 'bg-secondary-container text-on-secondary-container'],
                    ['title' => 'Recommended', 'desc' => 'Voted top developmental toy by over 50 pediatric occupational therapists.', 'icon' => 'recommend', 'color' => 'bg-tertiary-container text-on-tertiary-container'],
                    ['title' => 'Most Popular', 'desc' => 'Our #1 selling item for three consecutive years in the Nursery category.', 'icon' => 'trending_up', 'color' => 'bg-primary-container/20 text-primary'],
                ];
            @endphp
            @foreach($trust as $t)
            <div class="bg-surface-container-lowest p-8 rounded-lg text-center space-y-4 shadow-sm">
                <div class="w-16 h-16 {{ $t['color'] }} rounded-full flex items-center justify-center mx-auto">
                    <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">{{ $t['icon'] }}</span>
                </div>
                <h4 class="font-bold text-xl font-headline">{{ $t['title'] }}</h4>
                <p class="text-on-surface-variant text-sm">{{ $t['desc'] }}</p>
            </div>
            @endforeach
        </section>
    </main>

    <!-- Mobile Sticky CTA -->
    <div class="md:hidden fixed bottom-0 left-0 w-full p-4 bg-white/90 backdrop-blur-xl border-t border-surface-container z-50">
        <div class="flex items-center gap-4">
            <div class="flex-1">
                <p class="text-xs font-bold text-on-surface-variant uppercase tracking-tighter">Current Price</p>
                <p class="text-xl font-black text-sky-800">$189.00</p>
            </div>
            <button class="flex-[2] bg-gradient-to-b from-primary to-primary-container text-on-primary py-4 rounded-full font-bold shadow-lg shadow-primary/20 active:scale-95 transition-transform">
                Buy Now
            </button>
        </div>
    </div>

    @include('layouts.partials.mobile_nav')
    @include('layouts.partials.footer')
@endsection

@push('styles')
<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endpush
