@extends('layouts.app')

@section('title', 'Edit Post | Kids World Admin')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-32 pb-24 max-w-4xl mx-auto px-6">
        <div class="mb-12">
            <h1 class="text-4xl font-headline font-black text-on-surface mb-2">Edit Editorial Guide</h1>
            <p class="text-on-surface-variant font-medium text-lg leading-relaxed">Updating: <span
                    class="text-primary italic">{{ $post->title }}</span></p>
        </div>

        @if($errors->any())
            <div class="mb-8 p-4 bg-error-container text-on-error-container rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-8 bg-surface-container-lowest p-8 md:p-12 rounded-2xl border border-surface-variant/50 shadow-sm">
            @csrf
            @method('PUT')

            <div>
                <label for="title"
                    class="block text-sm font-bold font-label uppercase tracking-wider text-on-surface-variant mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                    class="w-full rounded-xl border-surface-variant focus:ring-primary focus:border-primary px-4 py-3 font-body"
                    required>
            </div>

            <div>
                <label for="slug"
                    class="block text-sm font-bold font-label uppercase tracking-wider text-on-surface-variant mb-2">Slug
                    (URL)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}"
                    class="w-full rounded-xl border-surface-variant focus:ring-primary focus:border-primary px-4 py-3 font-body"
                    required>
            </div>

            <div>
                <label for="image"
                    class="block text-sm font-bold font-label uppercase tracking-wider text-on-surface-variant mb-2">Featured
                    Image</label>
                @if($post->image_path)
                    <div class="mb-4 rounded-lg overflow-hidden w-48 aspect-video">
                        <img src="{{ str_starts_with($post->image_path, 'http') ? $post->image_path : Storage::url($post->image_path) }}" class="w-full h-full object-cover" alt="Current image">
                    </div>
                @endif
                <input type="file" name="image" id="image"
                    class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:uppercase file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-all cursor-pointer">
            </div>

            <div>
                <label for="published_at"
                    class="block text-sm font-bold font-label uppercase tracking-wider text-on-surface-variant mb-2">Publish
                    Date</label>
                <input type="datetime-local" name="published_at" id="published_at"
                    value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}"
                    class="rounded-xl border-surface-variant focus:ring-primary focus:border-primary px-4 py-3 font-body">
            </div>

            <div>
                <label for="content"
                    class="block text-sm font-bold font-label uppercase tracking-wider text-on-surface-variant mb-2">Content</label>
                <textarea name="content" id="content" rows="12"
                    class="w-full rounded-xl border-surface-variant focus:ring-primary focus:border-primary px-4 py-3 font-body"
                    required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="pt-6 flex gap-4">
                <button type="submit"
                    class="px-8 py-4 bg-primary text-on-primary font-bold rounded-xl shadow-lg shadow-primary/20 hover:brightness-110 active:scale-95 transition-all">
                    Update Post
                </button>
                <a href="{{ route('blog.index') }}"
                    class="px-8 py-4 bg-surface-container text-on-surface font-bold rounded-xl hover:bg-surface-variant transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </main>

    @include('layouts.partials.footer')
@endsection