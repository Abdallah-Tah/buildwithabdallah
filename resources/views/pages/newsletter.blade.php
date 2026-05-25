@extends('layouts.app', ['title' => 'Newsletter • Build With Abdallah'])

@section('content')
<section class="mx-auto max-w-5xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="card-surface grid gap-10 lg:grid-cols-[0.95fr_1.05fr]">
        <div>
            <p class="section-eyebrow">Newsletter</p>
            <h1 class="section-title">Get daily software, automation, and API tips.</h1>
            <p class="mt-5 text-base leading-8 text-slate-600">
                A focused newsletter for builders and business owners who want practical ideas, not fluff.
            </p>
        </div>
        <div>
            @if(session('newsletter_success'))
                <div class="mb-4 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('newsletter_success') }}</div>
            @endif
            <form action="{{ route('newsletter.store') }}" method="POST" class="space-y-5">
                @csrf
                <input type="hidden" name="source" value="newsletter-page">
                <div>
                    <label class="label-text" for="newsletter-name">Name (optional)</label>
                    <input id="newsletter-name" name="name" value="{{ old('name') }}" class="input-field-light" placeholder="Abdallah">
                </div>
                <div>
                    <label class="label-text" for="newsletter-email">Email</label>
                    <input id="newsletter-email" type="email" name="email" value="{{ old('email') }}" class="input-field-light" placeholder="you@example.com" required>
                    @error('email') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="primary-button">Join the Newsletter</button>
            </form>
        </div>
    </div>
</section>
@endsection
