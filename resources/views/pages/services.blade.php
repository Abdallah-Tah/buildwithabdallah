@extends('layouts.app', ['title' => 'Services • Build With Abdallah'])

@section('content')
<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <p class="section-eyebrow">Services</p>
    <h1 class="section-title max-w-3xl">Software, automation, APIs, and delivery that respects business reality</h1>
    <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach($services as $service)
            <article class="card-panel">
                <h2 class="text-xl font-semibold text-white">{{ $service['title'] }}</h2>
                <p class="mt-3 text-sm leading-7 text-slate-400">{{ $service['description'] }}</p>
            </article>
        @endforeach
    </div>
</section>
@endsection
