@extends('layouts.app', ['title' => 'About • Build With Abdallah'])

@section('content')
<section class="mx-auto max-w-5xl px-4 py-20 sm:px-6 lg:px-8">
    <p class="section-eyebrow">About</p>
    <h1 class="section-title max-w-3xl">Professional software for real business operations</h1>
    <div class="mt-8 grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="space-y-6 text-base leading-8 text-slate-600">
            <p>
                Build With Abdallah focuses on software, automation, APIs, and technical content that solve real operational problems without overcomplicating the stack.
            </p>
            <p>
                The goal is simple: build something clean, useful, maintainable, and trustworthy from day one.
            </p>
            <p>
                That means modern Laravel delivery, clear admin workflows, automation-ready APIs, and tutorials based on practical engineering work instead of generic hype.
            </p>
        </div>
        <div class="card-surface">
            <img src="{{ asset('brand/banner.png') }}" alt="Build With Abdallah brand banner" class="w-full rounded-[1.5rem] border border-blue-100">
        </div>
    </div>
</section>
@endsection
