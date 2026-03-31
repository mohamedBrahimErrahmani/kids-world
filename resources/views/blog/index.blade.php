@extends('layouts.app')

@section('title', 'Expert Parenting Guides & Curation | Kids World')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-28 pb-24">

        {{-- ══════════════════════════════════════════════════════
             PAGE HEADER
        ══════════════════════════════════════════════════════ --}}
        <section class="max-w-7xl mx-auto px-6 mb-14 text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-4">
                Editorial
            </span>
            <h1 class="text-5xl md:text-6xl font-headline font-black text-on-surface mb-4 tracking-tight">
                Our Guides
            </h1>
            <p class="text-on-surface-variant max-w-2xl mx-auto text-lg leading-relaxed">
                Expert insights on developmental toys, nursery design, and sustainable parenting — curated for the modern family.
            </p>
        </section>

        @if(session('success'))
            <div class="max-w-7xl mx-auto px-6 mb-8">
                <div class="p-4 bg-green-100 text-green-800 rounded-xl font-medium">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @php
            $featured = $posts->first();
            $rest     = $posts->skip(1);
        @endphp

        {{-- ══════════════════════════════════════════════════════
             FEATURED / HERO POST
        ══════════════════════════════════════════════════════ --}}
        @if($featured)
        <section class="max-w-7xl mx-auto px-6 mb-20">
            <a href="{{ route('blog.show', $featured) }}" class="group block rounded-3xl overflow-hidden shadow-2xl shadow-black/10 relative bg-slate-900 aspect-[16/7] md:aspect-[16/6]">

                {{-- Cover Image --}}
                @if($featured->image_path)
                    <img
                        src="{{ str_starts_with($featured->image_path, 'http') ? $featured->image_path : Storage::url($featured->image_path) }}"
                        alt="{{ $featured->title }}"
                        class="absolute inset-0 w-full h-full object-cover opacity-70 group-hover:opacity-60 group-hover:scale-[1.03] transition-all duration-700 ease-out"
                    >
                @else
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/60 to-secondary/40"></div>
                @endif

                {{-- Gradient overlay for text legibility --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

                {{-- Content --}}
                <div class="absolute inset-0 flex flex-col justify-end p-8 md:p-12">
                    {{-- Badge --}}
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary text-on-primary text-[10px] font-black uppercase tracking-widest w-fit mb-4">
                        <span class="material-symbols-outlined text-xs" style="font-size:12px">auto_awesome</span>
                        Featured
                    </span>

                    {{-- Title --}}
                    <h2 class="text-3xl md:text-5xl font-headline font-black text-white leading-tight mb-4 max-w-3xl drop-shadow-lg">
                        {{ $featured->title }}
                    </h2>

                    {{-- Excerpt --}}
                    <p class="text-white/80 text-base md:text-lg leading-relaxed max-w-2xl mb-6 line-clamp-2 hidden sm:block">
                        {{ Str::limit(strip_tags($featured->content), 160) }}
                    </p>

                    {{-- Meta + CTA --}}
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center gap-2 text-white/70 text-sm">
                            <span class="material-symbols-outlined text-sm" style="font-size:14px">person</span>
                            {{ $featured->author->name ?? 'Admin' }}
                        </div>
                        <div class="flex items-center gap-2 text-white/70 text-sm">
                            <span class="material-symbols-outlined text-sm" style="font-size:14px">calendar_today</span>
                            {{ $featured->published_at?->format('M d, Y') }}
                        </div>
                        <span class="ml-auto flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-slate-900 text-sm font-bold shadow-lg group-hover:bg-primary group-hover:text-on-primary transition-colors duration-300">
                            Read Guide
                            <span class="material-symbols-outlined text-sm transition-transform duration-300 group-hover:translate-x-1" style="font-size:16px">arrow_forward</span>
                        </span>
                    </div>
                </div>
            </a>
        </section>
        @endif

        {{-- ══════════════════════════════════════════════════════
             SECONDARY POSTS GRID
        ══════════════════════════════════════════════════════ --}}
        @if($rest->count())
        <section class="max-w-7xl mx-auto px-6">
            <div class="flex items-center gap-4 mb-10">
                <h2 class="text-2xl font-headline font-bold text-on-surface">Latest Articles</h2>
                <div class="flex-1 h-px bg-surface-variant/60"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($rest as $post)
                <article class="group bg-surface-container-lowest rounded-2xl overflow-hidden border border-surface-variant/40 shadow-sm hover:shadow-xl hover:shadow-black/8 transition-all duration-300 hover:-translate-y-1 flex flex-col">

                    {{-- Image --}}
                    <a href="{{ route('blog.show', $post) }}" class="block aspect-video overflow-hidden bg-surface-container relative">
                        @if($post->image_path)
                            <img
                                src="{{ str_starts_with($post->image_path, 'http') ? $post->image_path : Storage::url($post->image_path) }}"
                                alt="{{ $post->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                            >
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/10 to-secondary/10 text-slate-300">
                                <span class="material-symbols-outlined text-5xl">image</span>
                            </div>
                        @endif

                        {{-- Subtle gradient on hover --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>

                    {{-- Body --}}
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-xs font-bold font-label uppercase text-primary tracking-widest">
                                {{ $post->published_at?->format('M d, Y') }}
                            </span>
                        </div>

                        <h3 class="text-xl font-headline font-bold text-on-surface mb-3 line-clamp-2 group-hover:text-primary transition-colors duration-200 flex-1">
                            <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                        </h3>

                        <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-2 mb-5">
                            {{ Str::limit(strip_tags($post->content), 100) }}
                        </p>

                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-surface-variant/40">
                            <span class="text-sm font-medium text-on-surface-variant flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm" style="font-size:14px">person</span>
                                {{ $post->author->name ?? 'Admin' }}
                            </span>
                            <a href="{{ route('blog.show', $post) }}" class="text-primary font-bold text-sm flex items-center gap-1 hover:gap-2 transition-all duration-200">
                                Read
                                <span class="material-symbols-outlined" style="font-size:16px">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </section>
        @endif

        {{-- No posts state --}}
        @if($posts->isEmpty())
        <div class="max-w-7xl mx-auto px-6 py-32 text-center">
            <span class="material-symbols-outlined text-7xl text-slate-200 mb-6 block">auto_stories</span>
            <p class="text-on-surface-variant text-xl">No editorial guides published yet. Stay tuned!</p>
        </div>
        @endif

        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="max-w-7xl mx-auto px-6 mt-16">
            {{ $posts->links() }}
        </div>
        @endif

    </main>

    @include('layouts.partials.mobile_nav')
    @include('layouts.partials.footer')
@endsection

@push('styles')
<style>
    /* Fade-in-up animation for cards */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    article {
        animation: fadeInUp 0.5s ease both;
    }
    article:nth-child(1) { animation-delay: 0.05s; }
    article:nth-child(2) { animation-delay: 0.12s; }
    article:nth-child(3) { animation-delay: 0.19s; }
    article:nth-child(4) { animation-delay: 0.26s; }
    article:nth-child(5) { animation-delay: 0.33s; }
    article:nth-child(6) { animation-delay: 0.40s; }
</style>
@endpush