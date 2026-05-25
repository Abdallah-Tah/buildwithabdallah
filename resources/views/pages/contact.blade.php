@extends('layouts.app', ['title' => 'Contact • Build With Abdallah'])

@section('content')
<section class="mx-auto max-w-5xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr]">
        <div>
            <p class="section-eyebrow">Contact</p>
            <h1 class="section-title">Tell me what you want to build</h1>
            <p class="mt-6 text-base leading-8 text-slate-600">
                Need an MVP, dashboard, API, automation system, technical content workflow, or internal business tool? Send the scope and I’ll review the practical path.
            </p>
        </div>
        <div class="card-surface">
            @if(session('success'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="label-text" for="name">Name</label>
                    <input id="name" name="name" value="{{ old('name') }}" class="input-field-light" required>
                    @error('name') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="label-text" for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="input-field-light" required>
                    @error('email') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="label-text" for="subject">Subject</label>
                    <input id="subject" name="subject" value="{{ old('subject') }}" class="input-field-light" required>
                    @error('subject') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="label-text" for="message">Message</label>
                    <textarea id="message" name="message" rows="6" class="input-field-light" required>{{ old('message') }}</textarea>
                    @error('message') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="primary-button">Send Message</button>
            </form>
        </div>
    </div>
</section>
@endsection
