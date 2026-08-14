@extends('layouts.app', ['title' => 'Contact — Build With Abdallah'])

@section('content')
{{-- Hero --}}
<section class="relative overflow-hidden border-b border-line/70">
    <div class="absolute inset-0 bg-grid-dark bg-grid pointer-events-none [mask-image:radial-gradient(ellipse_70%_60%_at_50%_30%,#000_40%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 pt-20 pb-24">
        <nav class="reveal flex items-center gap-2 text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute mb-8">
            <a href="{{ route('home') }}" class="hover:text-ink2 transition">Home</a>
            <span>/</span>
            <span class="text-ink2">Contact</span>
        </nav>

        <div class="eyebrow reveal">Contact</div>
        <h1 class="reveal mt-4 font-display text-5xl lg:text-6xl text-ink max-w-[800px]" data-delay="1">
            Tell me what you want to <span class="text-brand-500 italic">build</span>.
        </h1>
        <p class="reveal mt-6 text-dim text-lg max-w-[600px]" data-delay="2">
            Need a website, MVP, dashboard, API, AI agent, automation system, or internal business tool? Send the scope and I will review the most practical path.
        </p>
    </div>
</section>

{{-- Contact Form Section --}}
<section class="border-b border-line/70">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-28">
        <div class="grid gap-16 lg:grid-cols-[400px_1fr]">
            {{-- Contact Channels --}}
            <div class="reveal">
                <div class="eyebrow mb-6">Channels</div>

                <div class="space-y-4">
                    <a href="mailto:buildwithabdallah@gmail.com" class="block rounded-lg border border-line bg-surface/60 p-5 hover:border-lineH hover:bg-elev/60 transition group">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-bg border border-line flex items-center justify-center">
                                <svg class="w-5 h-5 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-ink font-medium group-hover:text-brand-400 transition">Email</div>
                                <div class="text-sm text-dim">buildwithabdallah@gmail.com</div>
                            </div>
                        </div>
                    </a>

                    <a href="mailto:buildwithabdallah@gmail.com?subject=20-minute%20intro%20call" class="block rounded-lg border border-line bg-surface/60 p-5 hover:border-lineH hover:bg-elev/60 transition group">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-bg border border-line flex items-center justify-center">
                                <svg class="w-5 h-5 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-ink font-medium group-hover:text-brand-400 transition">Intro call</div>
                                <div class="text-sm text-dim">Email to schedule 20 minutes</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="mt-10 space-y-4">
                    <div class="rounded-lg border border-line bg-bg/40 p-5">
                        <div class="text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute mb-3">Best fit projects</div>
                        <p class="text-sm text-dim">Websites, dashboards, Laravel systems, automation workflows, API layers, content platforms, and business operations tools.</p>
                    </div>

                    <div class="rounded-lg border border-line bg-bg/40 p-5">
                        <div class="text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute mb-3">What helps most</div>
                        <p class="text-sm text-dim">Share your goal, the pain point, current workflow, and any deadline or delivery constraints.</p>
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="reveal" data-delay="1">
                <div class="rounded-lg border border-line bg-surface/80 p-8 lg:p-10">
                    @if(session('success'))
                        <div class="mb-6 rounded-sm border border-live/40 bg-live/10 px-4 py-3 text-sm text-live">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label class="block text-sm font-medium text-ink2 mb-2" for="name">Name</label>
                                <input
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="w-full px-4 py-3 rounded-sm border border-line bg-bg text-ink placeholder-faint focus:border-brand-500 focus:outline-none transition"
                                    placeholder="Your name"
                                    required
                                >
                                @error('name') <p class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-ink2 mb-2" for="email">Email</label>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="w-full px-4 py-3 rounded-sm border border-line bg-bg text-ink placeholder-faint focus:border-brand-500 focus:outline-none transition"
                                    placeholder="you@company.com"
                                    required
                                >
                                @error('email') <p class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-ink2 mb-2" for="subject">Subject</label>
                            <input
                                id="subject"
                                name="subject"
                                value="{{ old('subject') }}"
                                class="w-full px-4 py-3 rounded-sm border border-line bg-bg text-ink placeholder-faint focus:border-brand-500 focus:outline-none transition"
                                placeholder="What's this about?"
                                required
                            >
                            @error('subject') <p class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-ink2 mb-2" for="message">Message</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                class="w-full px-4 py-3 rounded-sm border border-line bg-bg text-ink placeholder-faint focus:border-brand-500 focus:outline-none transition resize-none"
                                placeholder="Tell me about your project, goals, timeline..."
                                required
                            >{{ old('message') }}</textarea>
                            @error('message') <p class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" data-magnetic
                            class="magnetic inline-flex items-center gap-3 bg-brand-500 hover:bg-brand-400 text-brand-ink font-medium px-6 py-3.5 rounded-sm shadow-glow transition">
                            <span>Send Message</span>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M1 8h13M9 3l5 5-5 5" stroke="currentColor" stroke-width="1.5"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
