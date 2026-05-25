@extends('layouts.app', ['title' => 'Services • Build With Abdallah'])

@section('content')
<section class="page-section pt-16 sm:pt-20">
    <div class="max-w-3xl">
        <p class="section-eyebrow">Services</p>
        <h1 class="section-title">Services for businesses that need clearer websites, better tools, and less manual work</h1>
        <p class="mt-5 text-base leading-8 text-slate-600">Fixed-scope delivery when possible, honest quotes when discovery is needed, and practical implementation over buzzwords.</p>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach($services as $service)
            <article class="card-surface">
                <div class="mb-5 text-sm font-semibold uppercase tracking-[0.2em] text-brand-blue">Build</div>
                <h2 class="text-xl font-semibold text-brand-navy">{{ $service['title'] }}</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600">{{ $service['description'] }}</p>
            </article>
        @endforeach
    </div>

    <div class="mt-10 grid gap-6 lg:grid-cols-3">
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">Ideal for</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Small businesses, solo founders, local services, and teams that need a working system without hiring a full dev team.</p>
        </article>
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">Delivery style</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Clear scope, clean implementation, professional UI, deployment help, and documentation you can understand.</p>
        </article>
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">What matters</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Saving time, reducing mistakes, improving follow-up, and making the business easier to operate.</p>
        </article>
    </div>
</section>
@endsection
