@extends('layouts.app', ['title' => 'Services • Build With Abdallah'])

@section('content')
<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <p class="section-eyebrow">Services</p>
    <h1 class="section-title max-w-3xl">Software, automation, APIs, and delivery that respect business reality</h1>
    <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach($services as $service)
            <article class="card-surface">
                <div class="mb-5 h-10 w-10 rounded-2xl bg-blue-50"></div>
                <h2 class="text-xl font-semibold text-brand-navy">{{ $service['title'] }}</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600">{{ $service['description'] }}</p>
            </article>
        @endforeach
    </div>
</section>
@endsection
