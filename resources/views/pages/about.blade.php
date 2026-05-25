@extends('layouts.app', ['title' => 'About • Build With Abdallah'])

@section('content')
<section class="page-section pt-16 sm:pt-20">
    <div class="max-w-3xl">
        <p class="section-eyebrow">About</p>
        <h1 class="section-title">I build practical software for businesses that need working systems, not hype.</h1>
        <p class="mt-5 text-base leading-8 text-slate-600">Build With Abdallah is the service brand of Abdallah Mohamed: full-stack developer at Kyocera AVX and Computer Science student at the University of Southern Maine.</p>
    </div>

    <div class="mt-10 grid gap-8 lg:grid-cols-[1.05fr_0.95fr]">
        <div class="space-y-6 text-base leading-8 text-slate-600">
            <p>
                I work on Laravel systems, APIs, dashboards, AI agents, Telegram bots, payment workflows, and business automation.
            </p>
            <p>
                The goal is simple: build tools that save time, reduce mistakes, and help a business respond faster.
            </p>
            <p>
                I use the same workflow on my own systems before offering it to clients: agents, GitHub automation, dashboards, API integrations, and self-hosted deployment on real hardware.
            </p>
        </div>
        <div class="card-surface">
            <img src="{{ asset('brand/banner.jpg') }}" alt="Build With Abdallah brand banner" class="w-full border border-blue-100">
        </div>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-3">
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">Ship useful MVPs</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Start with the right scope, database, admin workflow, and clean public interface.</p>
        </article>
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">Automate real work</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Use APIs, agents, and alerts to reduce manual steps and missed follow-ups.</p>
        </article>
        <article class="card-surface">
            <h2 class="text-xl font-semibold text-brand-navy">Explain the work</h2>
            <p class="mt-3 text-sm leading-7 text-slate-600">Publish useful tutorials and build notes that show how the systems are actually made.</p>
        </article>
    </div>
</section>
@endsection
