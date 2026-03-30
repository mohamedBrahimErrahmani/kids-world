@extends('layouts.app')

@section('title', 'Create New Post | Kids World Admin')

@section('layout-content')
    @include('layouts.partials.header')

    <main class="pt-32 pb-24 max-w-4xl mx-auto px-6">
        <div class="mb-12">
            <h1 class="text-4xl font-headline font-black text-on-surface mb-2">Create New Editorial Guide</h1>
            <p class="text-on-surface-variant font-medium">Craft a new story for our parent community.</p>
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

        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 bg-surface-container-lowest p-8 md:p-12 rounded-2xl border border-surface-variant/50 shadow-sm">
            @csrf
            
            <div>
                <label for="title" class="block text-sm font-bold font-label uppercase tracking-wider text-on-surface-variant mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="The Ultimate Guide to Montessori Toys" 
                    class="w-full rounded-xl border-surface-variant focus:ring-primary focus:border-primary px-4 py-3 font-body" required>
            </div>

            <div>
                <label for="slug" class="block text-sm font-bold font-label uppercase tracking-wider text-on-surface-variant mb-2">Slug (URL)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="ultimate-guide-montessori-toys" 
                    class="w-full rounded-xl border-surface-variant focus:ring-primary focus:border-primary px-4 py-3 font-body" required>
            </div>

            <div>
                <label for="image" class="block text-sm font-bold font-label uppercase tracking-wider text-on-surface-variant mb-2">Featured Image</label>
                <input type="file" name="image" id="image" class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:uppercase file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-all cursor-pointer">
            </div>

            <div>
                <label for="published_at" class="block text-sm font-bold font-label uppercase tracking-wider text-on-surface-variant mb-2">Publish Date</label>
                <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}" 
                    class="rounded-xl border-surface-variant focus:ring-primary focus:border-primary px-4 py-3 font-body">
            </div>

            <div>
                <label for="content" class="block text-sm font-bold font-label uppercase tracking-wider text-on-surface-variant mb-2">Content</label>
                <textarea name="content" id="content" rows="12" placeholder="Write your editorial insights here..." 
                    class="w-full rounded-xl border-surface-variant focus:ring-primary focus:border-primary px-4 py-3 font-body" required>{{ old('content') }}</textarea>
            </div>

            <div class="pt-6 flex gap-4">
                <button type="submit" class="px-8 py-4 bg-primary text-on-primary font-bold rounded-xl shadow-lg shadow-primary/20 hover:brightness-110 active:scale-95 transition-all">
                    Publish Post
                </button>
                <a href="{{ route('blog.index') }}" class="px-8 py-4 bg-surface-container text-on-surface font-bold rounded-xl hover:bg-surface-variant transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </main>

    @include('layouts.partials.footer')
@endsection

@push('scripts')
<script>
    // Simple slug generator for convenience
    document.getElementById('title').addEventListener('input', function() {
        let slug = this.value
            .toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>
@endpush
