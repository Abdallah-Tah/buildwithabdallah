@extends('layouts.app', ['title' => $post->meta_title ?: $post->title])

@section('content')
<section class="mx-auto max-w-4xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="text-sm text-cyan-200">{{ $post->category?->name ?? 'Tutorial' }}</div>
    <h1 class="mt-4 text-4xl font-semibold tracking-tight text-white">{{ $post->title }}</h1>
    <p class="mt-6 text-lg leading-8 text-slate-300">{{ $post->excerpt }}</p>
    <article class="prose prose-invert mt-10 max-w-none prose-headings:text-white prose-p:text-slate-300 prose-strong:text-white prose-a:text-cyan-300 prose-code:text-cyan-200">
        {!! \Illuminate\Support\Str::markdown($post->body, ['html_input' => 'strip', 'allow_unsafe_links' => false]) !!}
    </article>

    @if($relatedPosts->isNotEmpty())
        <div class="mt-16">
            <h2 class="text-2xl font-semibold text-white">More tutorials</h2>
            <div class="mt-6 grid gap-6 md:grid-cols-3">
                @foreach($relatedPosts as $relatedPost)
                    <a href="{{ route('tutorials.show', $relatedPost->slug) }}" class="card-panel block">
                        <h3 class="text-lg font-semibold text-white">{{ $relatedPost->title }}</h3>
                        <p class="mt-3 text-sm text-slate-400">{{ \Illuminate\Support\Str::limit($relatedPost->excerpt, 100) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection
