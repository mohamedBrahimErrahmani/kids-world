@extends('layouts.app')

@section('title', $post->title . ' | Kids World')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-32 pb-24">
        <article class="max-w-4xl mx-auto px-6">
            <header class="mb-12 text-center">
                <div
                    class="inline-block px-4 py-1.5 rounded-full bg-secondary-container text-on-secondary-container text-xs font-bold tracking-wider uppercase mb-6">
                    Editorial Selection
                </div>
                <h1 class="text-4xl md:text-6xl font-headline font-black text-on-surface leading-tight mb-6">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center justify-center gap-6 text-on-surface-variant text-sm font-medium">
                    <span class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">person</span>
                        {{ $post->author->name ?? 'Admin' }}
                    </span>
                    <span class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">calendar_today</span>
                        {{ $post->published_at?->format('F d, Y') }}
                    </span>
                </div>
            </header>

            @if($post->image_path)
                <div class="rounded-2xl overflow-hidden aspect-video mb-12 shadow-xl">
                    <img src="{{ str_starts_with($post->image_path, 'http') ? $post->image_path : Storage::url($post->image_path) }}" class="w-full h-full object-cover" alt="{{ $post->title }}"></div>
                </div>

            @endif

            <div class="prose prose-lg prose-slate max-w-none font-body leading-relaxed text-on-surface-variant">
                {!! nl2br(e($post->content)) !!}
            </div>

            <footer class="mt-16 pt-12 border-t border-surface-variant flex items-center justify-between">
                <a href="{{ route('blog.index') }}" class="flex items-center gap-2 text-primary font-bold hover:underline">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Back to Guides
                </a>
                <div class="flex gap-4">
                    <button class="p-2 rounded-full hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined">share</span>
                    </button>
                    <button class="p-2 rounded-full hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined">bookmark</span>
                    </button>
                </div>
            </footer>
        </article>
    </main>

    @include('layouts.partials.footer')
@endsection