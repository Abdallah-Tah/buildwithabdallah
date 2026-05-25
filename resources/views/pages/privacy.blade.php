@extends('layouts.app', ['title' => 'Privacy — Build With Abdallah'])

@section('content')
<section class="mx-auto max-w-[900px] px-6 lg:px-10 py-20">
    <nav class="flex items-center gap-2 text-xs font-mono uppercase tracking-[0.14em] text-mute mb-8">
        <a href="{{ route('home') }}" class="hover:text-ink2 transition">Home</a>
        <span>/</span>
        <span class="text-ink2">Privacy</span>
    </nav>

    <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500">// privacy</div>
    <h1 class="mt-5 font-display text-5xl text-ink">Privacy policy</h1>
    <div class="mt-8 space-y-7 text-lg leading-8 text-dim">
        <p>Build With Abdallah collects only the information needed to respond to inquiries, manage newsletter subscriptions, and operate the website.</p>
        <p>Contact form submissions may include your name, email, subject, and project message. Newsletter subscriptions store your email, optional name, source, and subscription time.</p>
        <p>Your information is used to reply to you, send requested updates, and improve the service. It is not sold. If you want your information removed, email <a href="mailto:buildwithabdallah@gmail.com" class="text-brand-400 hover:text-brand-300">buildwithabdallah@gmail.com</a>.</p>
    </div>
</section>
@endsection
