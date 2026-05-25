@extends('layouts.app', ['title' => 'Services • Build With Abdallah'])

@section('content')
<section class="page-section pt-16 sm:pt-20">
    <div class="max-w-3xl">
        <p class="section-eyebrow">Services</p>
        <h1 class="section-title">Software, automation, APIs, and delivery that respect business reality</h1>
        <p class="mt-5 text-base leading-8 text-slate-600">Focused delivery for businesses that need clean systems, not bloated tech experiments.</p>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach($services as $service)
            <article class="card-surface">
                <div class="mb-5 h-10 w-10 rounded-2xl bg-blue-50"></div>
                <h2 class="text-xl font-semibold text-brand-navy">{{ $service['title'] }}</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600">{{ $service['description'] }}</p>
            </article>
        @endforeach
    </div>

    <div class="mt-10 grid gap-6 lg:grid-cols-3">
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">Ideal for</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Internal tools, dashboards, admin panels, API integrations, automation workflows, and professional MVPs.</p>
        </article>
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">Delivery style</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Practical scope, clean implementation, professional UI, and architecture that stays understandable.</p>
        </article>
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">What matters</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Shipping useful business value fast while keeping the codebase stable enough to grow later.</p>
        </article>
    </div>
</section>
@endsection
