@extends('layouts.app')

@section('title', $product->name . ' | Kids World')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-24 pb-32 px-4 md:px-8 max-w-7xl mx-auto">
        <!-- Breadcrumbs -->
        <nav
            class="flex items-center gap-2 mb-8 text-sm font-label text-on-surface-variant overflow-x-auto no-scrollbar whitespace-nowrap">
            <a href="{{ route('home') }}" class="hover:text-primary transition-colors cursor-pointer">Shop</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <a href="{{ route('category', ['category' => $product->category->slug]) }}"
                class="hover:text-primary transition-colors cursor-pointer">{{ $product->category->name }}</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-on-surface font-semibold">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left: Gallery Section -->
            <div class="lg:col-span-7 space-y-6">
                <div class="relative group">
                    <div class="flex gap-4 overflow-x-auto snap-x snap-mandatory no-scrollbar rounded-lg md:rounded-xl">
                        <div
                            class="snap-center shrink-0 w-full aspect-square bg-surface-container-low overflow-hidden rounded-xl">
                            <img alt="{{ $product->name }}"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-700"
                                src="{{ $product->image_path }}" />
                        </div>
                    </div>
                </div>
                <!-- Featured Editorial Chips -->
                <div class="flex flex-wrap gap-3">
                    <span
                        class="bg-tertiary-container text-on-tertiary-container px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                        <span class="material-symbols-outlined text-base"
                            style="font-variation-settings: 'FILL' 1;">child_care</span>
                        {{ $product->ageGroup->name }}
                    </span>
                    @foreach($product->playTypes as $type)
                        <span
                            class="bg-secondary-container text-on-secondary-container px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                            <span class="material-symbols-outlined text-base"
                                style="font-variation-settings: 'FILL' 1;">{{ $type->icon }}</span>
                            {{ $type->name }}
                        </span>
                    @endforeach
                    <span
                        class="bg-surface-container-highest text-on-surface-variant px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                        <span class="material-symbols-outlined text-base"
                            style="font-variation-settings: 'FILL' 1;">verified</span>
                        Safe
                    </span>
                </div>
            </div>

            <!-- Right: Details Section -->
            <div class="lg:col-span-5 space-y-8 lg:sticky lg:top-32">
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="flex text-primary">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="material-symbols-outlined text-lg"
                                    style="font-variation-settings: 'FILL' {{ $i <= round($product->rating) ? 1 : 0 }};">star</span>
                            @endfor
                        </div>
                        <span class="text-sm font-semibold text-on-surface-variant">({{ $product->rating }} rating)</span>
                    </div>
                    <h2 class="text-4xl font-extrabold font-headline tracking-tight text-on-surface">{{ $product->name }}
                    </h2>
                    <p class="text-3xl font-bold text-sky-700">${{ number_format($product->price, 2) }}</p>
                </div>
                <!-- Description -->
                <div class="bg-surface-container-low rounded-lg p-6 space-y-4">
                    <h3 class="font-bold text-lg font-headline">About this product</h3>
                    <p class="text-on-surface-variant leading-relaxed">
                        {{ $product->description }}
                    </p>
                </div>
                <!-- Highlight Box -->
                <div class="relative overflow-hidden bg-primary text-on-primary p-8 rounded-xl shadow-xl">
                    <div class="absolute -top-6 -right-6 w-24 h-24 bg-primary-container/20 rounded-full blur-2xl"></div>
                    <h4 class="text-xl font-bold font-headline mb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined">favorite</span>
                        Why parents love this
                    </h4>
                    <p class="leading-relaxed font-medium text-on-primary/90 italic">
                        "The quality is unmatched. It feels like a piece of designer furniture that our toddler actually
                        uses for hours every single day. Easy to assemble and even easier on the eyes."
                    </p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold">SM
                        </div>
                        <p class="text-sm font-semibold">— Sarah M., Verified Parent</p>
                    </div>
                </div>
                <div class="hidden md:block">
                    <button
                        class="w-full bg-gradient-to-b from-primary to-primary-container text-on-primary py-5 rounded-xl font-bold text-lg hover:shadow-lg transition-all active:scale-95">
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
                                <td
                                    class="p-6 {{ ($f['v1_bold'] ?? false) ? 'font-bold text-primary' : 'text-on-surface-variant' }}">
                                    {{ $f['v1'] }}
                                </td>
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
                        <span class="material-symbols-outlined text-3xl"
                            style="font-variation-settings: 'FILL' 1;">{{ $t['icon'] }}</span>
                    </div>
                    <h4 class="font-bold text-xl font-headline">{{ $t['title'] }}</h4>
                    <p class="text-on-surface-variant text-sm">{{ $t['desc'] }}</p>
                </div>
            @endforeach
        </section>
    </main>

    <!-- Mobile Sticky CTA -->
    <div
        class="md:hidden fixed bottom-0 left-0 w-full p-4 bg-white/90 backdrop-blur-xl border-t border-surface-container z-50">
        <div class="flex items-center gap-4">
            <div class="flex-1">
                <p class="text-xs font-bold text-on-surface-variant uppercase tracking-tighter">Current Price</p>
                <p class="text-xl font-black text-sky-800">${{ number_format($product->price, 2) }}</p>
            </div>
            <button
                class="flex-[2] bg-gradient-to-b from-primary to-primary-container text-on-primary py-4 rounded-full font-bold shadow-lg shadow-primary/20 active:scale-95 transition-transform">
                Buy Now
            </button>
        </div>
    </div>

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