@extends('layouts.app')

@section('title', 'Expert Parenting Guides & Curation | Kids World')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-32 pb-24 max-w-7xl mx-auto px-6">
        <div class="mb-16 text-center">
            <h1 class="text-5xl font-headline font-black text-on-surface mb-4">Editorial Guides</h1>
            <p class="text-on-surface-variant max-w-2xl mx-auto text-lg leading-relaxed">
                Expert insights on developmental toys, nursery design, and sustainable parenting, curated for the modern
                family.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-8 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            @forelse($posts as $post)
                <article
                    class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow group border border-surface-variant/50">
                    <a href="{{ route('blog.show', $post) }}" class="block aspect-video overflow-hidden">
                        @if($post->image_path)
                            <img src="{{ str_starts_with($post->image_path, 'http') ? $post->image_path : Storage::url($post->image_path) }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                alt="{{ $post->title }}">

                        @else
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                                <span class="material-symbols-outlined text-4xl">image</span>
                            </div>
                        @endif
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-xs font-bold font-label uppercase text-primary tracking-widest">
                                {{ $post->published_at?->format('M d, Y') }}
                            </span>
                        </div>
                        <h2 class="text-2xl font-headline font-bold mb-4 line-clamp-2 hover:text-primary transition-colors">
                            <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="text-on-surface-variant text-sm mb-6 line-clamp-3">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-medium text-on-surface">By {{ $post->author->name ?? 'Admin' }}</span>
                            </div>
                            <a href="{{ route('blog.show', $post) }}"
                                class="text-primary font-bold text-sm hover:underline">Read Full Guide</a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-3 py-20 text-center">
                    <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">auto_stories</span>
                    <p class="text-on-surface-variant text-xl">No editorial guides published yet. Stay tuned!</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </main>

    @include('layouts.partials.footer')
@endsection