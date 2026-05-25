@extends('layouts.app', ['title' => 'About • Build With Abdallah'])

@section('content')
<section class="page-section pt-16 sm:pt-20">
    <div class="max-w-3xl">
        <p class="section-eyebrow">About</p>
        <h1 class="section-title">Professional software for real business operations</h1>
        <p class="mt-5 text-base leading-8 text-slate-600">Build With Abdallah focuses on practical engineering work: systems that look professional, stay maintainable, and solve actual business pain.</p>
    </div>

    <div class="mt-10 grid gap-8 lg:grid-cols-[1.05fr_0.95fr]">
        <div class="space-y-6 text-base leading-8 text-slate-600">
            <p>
                The focus is software, automation, APIs, tutorials, and business solutions that remove friction instead of adding complexity.
            </p>
            <p>
                That means modern Laravel delivery, clear admin workflows, automation-ready APIs, and technical content based on implementation experience instead of vague theory.
            </p>
            <p>
                The priority is shipping useful systems with clean structure, professional presentation, and room to scale when the business grows.
            </p>
        </div>
        <div class="card-surface">
            <img src="{{ asset('brand/banner.jpg') }}" alt="Build With Abdallah brand banner" class="w-full rounded-[1.4rem] border border-blue-100">
        </div>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-3">
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">Build clean MVPs</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Start with the right scope, strong foundations, and a UI that already feels trustworthy.</p>
        </article>
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">Automate real work</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Use APIs and automation to reduce manual steps, improve visibility, and save time.</p>
        </article>
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">Teach while building</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Turn real implementation experience into tutorials and technical assets that are actually useful.</p>
        </article>
    </div>
</section>
@endsection
