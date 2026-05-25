@extends('layouts.app', ['title' => 'Tutorials • Build With Abdallah'])

@section('content')
<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <p class="section-eyebrow">Tutorials</p>
    <h1 class="section-title max-w-3xl">Practical tutorials, build notes, and implementation lessons</h1>
    <div class="mt-10 grid gap-6 lg:grid-cols-3">
        @foreach($posts as $post)
            <article class="card-panel flex flex-col">
                <div class="text-xs uppercase tracking-[0.2em] text-cyan-200">{{ $post->category?->name ?? 'Tutorial' }}</div>
                <h2 class="mt-4 text-2xl font-semibold text-white">{{ $post->title }}</h2>
                <p class="mt-3 flex-1 text-sm leading-7 text-slate-400">{{ $post->excerpt }}</p>
                <a href="{{ route('tutorials.show', $post->slug) }}" class="mt-6 inline-flex text-sm font-medium text-cyan-300">Read tutorial →</a>
            </article>
        @endforeach
    </div>
    <div class="mt-10">{{ $posts->links() }}</div>
</section>
@endsection
