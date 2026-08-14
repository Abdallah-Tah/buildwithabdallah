@extends('layouts.app', [
    'title' => 'Contact — Build With Abdallah',
    'metaDescription' => 'Book a 20-minute intro call or send a project brief. Custom software, AI agents and automation, built by a senior full-stack engineer.',
])

@section('content')

<section class="relative overflow-hidden border-b border-line">
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid [mask-image:radial-gradient(ellipse_70%_60%_at_50%_20%,#000_35%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-5 py-16 lg:px-10 lg:py-24">
        <nav aria-label="Breadcrumb" class="reveal mb-8 flex items-center gap-2 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
            <a href="{{ route('home') }}" class="transition hover:text-ink2">Home</a>
            <span aria-hidden="true">/</span>
            <span class="text-ink2">Contact</span>
        </nav>

        <div class="grid gap-12 lg:grid-cols-[1fr_minmax(0,560px)] lg:gap-20">

            <div>
                <div class="eyebrow reveal">Contact</div>
                <h1 class="reveal mt-5 max-w-[16ch] font-display text-[2.5rem] leading-[1.06] tracking-tight text-ink sm:text-5xl lg:text-6xl" data-delay="1">
                    Tell me what you're trying to <span class="text-brand-500">build</span>.
                </h1>
                <p class="reveal mt-7 max-w-[52ch] text-lg leading-relaxed text-dim" data-delay="2">
                    The more concrete the better &mdash; what's broken today, who it affects, and what
                    "done" looks like. I reply to everything within two business days.
                </p>

                <dl class="reveal mt-10 space-y-6 border-t border-line pt-8" data-delay="3">
                    <div>
                        <dt class="font-mono text-2xs uppercase tracking-[0.12em] text-mute">Email</dt>
                        <dd class="mt-2">
                            <a href="mailto:buildwithabdallah@gmail.com" class="ul-link text-lg text-brand-read">buildwithabdallah@gmail.com</a>
                        </dd>
                    </div>
                    <div>
                        <dt class="font-mono text-2xs uppercase tracking-[0.12em] text-mute">Based in</dt>
                        <dd class="mt-2 text-ink2">Brunswick, Maine &mdash; comfortable in any timezone</dd>
                    </div>
                    <div>
                        <dt class="font-mono text-2xs uppercase tracking-[0.12em] text-mute">Typical engagements</dt>
                        <dd class="mt-2 text-ink2">Fixed-scope builds from $8k &middot; retainers &middot; $250 office hours</dd>
                    </div>
                    <div>
                        <dt class="font-mono text-2xs uppercase tracking-[0.12em] text-mute">Elsewhere</dt>
                        <dd class="mt-2 flex flex-wrap gap-x-5 gap-y-2">
                            <a href="https://github.com/Abdallah-Tah" target="_blank" rel="noopener" class="ul-link text-ink2">GitHub &nearr;</a>
                            <a href="https://www.linkedin.com/in/abdallahmohamed86/?skipRedirect=true" target="_blank" rel="noopener" class="ul-link text-ink2">LinkedIn &nearr;</a>
                            <a href="https://api.buildwithabdallah.com" target="_blank" rel="noopener" class="ul-link text-ink2">Central API &nearr;</a>
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="reveal rounded-lg border border-line bg-surface p-6 shadow-card lg:p-8" data-delay="1">
                @if (session('success'))
                    <div role="status" class="mb-6 rounded-sm border border-live/40 bg-live/10 px-4 py-3 text-sm text-live">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="mb-2 block font-mono text-2xs uppercase tracking-[0.12em] text-mute">Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                               @error('name') aria-invalid="true" aria-describedby="name-error" @enderror
                               class="w-full rounded-sm border border-line bg-bg px-4 py-3.5 text-ink outline-none transition placeholder:text-faint focus:border-brand-500">
                        @error('name') <p id="name-error" class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block font-mono text-2xs uppercase tracking-[0.12em] text-mute">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                               @error('email') aria-invalid="true" aria-describedby="email-error" @enderror
                               class="w-full rounded-sm border border-line bg-bg px-4 py-3.5 text-ink outline-none transition placeholder:text-faint focus:border-brand-500">
                        @error('email') <p id="email-error" class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="subject" class="mb-2 block font-mono text-2xs uppercase tracking-[0.12em] text-mute">Subject</label>
                        <input id="subject" type="text" name="subject" value="{{ old('subject') }}" required
                               placeholder="e.g. Internal dashboard for our ops team"
                               @error('subject') aria-invalid="true" aria-describedby="subject-error" @enderror
                               class="w-full rounded-sm border border-line bg-bg px-4 py-3.5 text-ink outline-none transition placeholder:text-faint focus:border-brand-500">
                        @error('subject') <p id="subject-error" class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="message" class="mb-2 block font-mono text-2xs uppercase tracking-[0.12em] text-mute">Project brief</label>
                        <textarea id="message" name="message" rows="7" required
                                  placeholder="What's broken today, who it affects, and what done looks like."
                                  @error('message') aria-invalid="true" aria-describedby="message-error" @enderror
                                  class="w-full resize-y rounded-sm border border-line bg-bg px-4 py-3.5 text-ink outline-none transition placeholder:text-faint focus:border-brand-500">{{ old('message') }}</textarea>
                        @error('message') <p id="message-error" class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit"
                            class="inline-flex w-full items-center justify-center gap-3 rounded-sm bg-brand-500 px-6 py-4 font-semibold text-brand-ink shadow-glow transition hover:bg-brand-400">
                        Send the brief
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                            <path d="M1 8h13M9 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <p class="text-center font-mono text-2xs uppercase tracking-[0.12em] text-mute">
                        No newsletter signup &middot; no CRM sequence
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
