@extends('layouts.app', ['title' => 'Terms — Build With Abdallah'])

@section('content')
<section class="mx-auto max-w-[900px] px-6 lg:px-10 py-20">
    <nav class="flex items-center gap-2 text-xs font-mono uppercase tracking-[0.14em] text-mute mb-8">
        <a href="{{ route('home') }}" class="hover:text-ink2 transition">Home</a>
        <span>/</span>
        <span class="text-ink2">Terms</span>
    </nav>

    <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500">// terms</div>
    <h1 class="mt-5 font-display text-5xl text-ink">Terms of service</h1>
    <div class="mt-8 space-y-7 text-lg leading-8 text-dim">
        <p>The public website describes software, AI, automation, content, and consulting services offered by Build With Abdallah.</p>
        <p>Project scope, pricing, timelines, ownership, and support terms are confirmed in writing before paid work begins. Public website content is informational and does not create a client relationship by itself.</p>
        <p>For questions, email <a href="mailto:buildwithabdallah@gmail.com" class="text-brand-400 hover:text-brand-300">buildwithabdallah@gmail.com</a>.</p>
    </div>
</section>
@endsection
