@extends('layouts.app', [
    'title' => 'Contact — Build With Abdallah',
    'metaDescription' => 'Discuss a custom software, modernization, systems integration, automation, application support or public-sector project with Build With Abdallah.',
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
                    Tell us what your organization needs to <span class="motion-accent text-brand-500">accomplish.</span>
                </h1>
                <p class="reveal mt-7 max-w-[52ch] text-lg leading-relaxed text-dim" data-delay="2">
                    Share the current problem, affected users and desired outcome. Your inquiry will
                    receive a response within two business days.
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
                        <dd class="mt-2 text-ink2">Fixed-scope projects &middot; milestone-based SOWs &middot; ongoing support &middot; technical consulting</dd>
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
                        <label for="organization" class="mb-2 block font-mono text-2xs uppercase tracking-[0.12em] text-mute">Organization</label>
                        <input id="organization" type="text" name="organization" value="{{ old('organization') }}" required autocomplete="organization"
                               @error('organization') aria-invalid="true" aria-describedby="organization-error" @enderror
                               class="w-full rounded-sm border border-line bg-bg px-4 py-3.5 text-ink outline-none transition placeholder:text-faint focus:border-brand-500 focus-visible:ring-2 focus-visible:ring-brand-500/40">
                        @error('organization') <p id="organization-error" class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="organization_type" class="mb-2 block font-mono text-2xs uppercase tracking-[0.12em] text-mute">Organization type <span class="normal-case tracking-normal">(optional)</span></label>
                        <select id="organization_type" name="organization_type" class="w-full rounded-sm border border-line bg-bg px-4 py-3.5 text-ink outline-none transition focus:border-brand-500">
                            <option value="">Select organization type</option>
                            @foreach (['Business', 'Manufacturing', 'Government', 'Municipality', 'Education', 'Nonprofit', 'Startup', 'Other'] as $type)
                                <option value="{{ $type }}" @selected(old('organization_type') === $type)>{{ $type }}</option>
                            @endforeach
                        </select>
                        @error('organization_type') <p class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block font-mono text-2xs uppercase tracking-[0.12em] text-mute">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                               @error('email') aria-invalid="true" aria-describedby="email-error" @enderror
                               class="w-full rounded-sm border border-line bg-bg px-4 py-3.5 text-ink outline-none transition placeholder:text-faint focus:border-brand-500">
                        @error('email') <p id="email-error" class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="phone" class="mb-2 block font-mono text-2xs uppercase tracking-[0.12em] text-mute">Phone <span class="normal-case tracking-normal">(optional)</span></label>
                        <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" autocomplete="tel"
                               @error('phone') aria-invalid="true" aria-describedby="phone-error" @enderror
                               class="w-full rounded-sm border border-line bg-bg px-4 py-3.5 text-ink outline-none transition placeholder:text-faint focus:border-brand-500">
                        @error('phone') <p id="phone-error" class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="project_type" class="mb-2 block font-mono text-2xs uppercase tracking-[0.12em] text-mute">Project type</label>
                        <select id="project_type" name="project_type" required
                                @error('project_type') aria-invalid="true" aria-describedby="project-type-error" @enderror
                                class="w-full rounded-sm border border-line bg-bg px-4 py-3.5 text-ink outline-none transition focus:border-brand-500">
                            <option value="">Select a service</option>
                            @foreach (['Government / Public Sector', 'Manufacturing', 'Commercial Software', 'Subcontracting / Prime Contractor Partnership', 'Support / Modernization', 'InfinityQS / Quality Integration', 'Device / Serial Integration', 'Database & Automation', 'Other'] as $type)
                                <option value="{{ $type }}" @selected(old('project_type', $requestedProjectType) === $type)>{{ $type }}</option>
                            @endforeach
                        </select>
                        @error('project_type') <p id="project-type-error" class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="timeline" class="mb-2 block font-mono text-2xs uppercase tracking-[0.12em] text-mute">Approximate timeline</label>
                        <select id="timeline" name="timeline" required
                                @error('timeline') aria-invalid="true" aria-describedby="timeline-error" @enderror
                                class="w-full rounded-sm border border-line bg-bg px-4 py-3.5 text-ink outline-none transition focus:border-brand-500">
                            <option value="">Select a timeline</option>
                            @foreach (['As soon as practical', 'Within 1–3 months', 'Within 3–6 months', '6+ months', 'Exploring options'] as $timeline)
                                <option value="{{ $timeline }}" @selected(old('timeline') === $timeline)>{{ $timeline }}</option>
                            @endforeach
                        </select>
                        @error('timeline') <p id="timeline-error" class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
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
                        Send Project Inquiry
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                            <path d="M1 8h13M9 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <p class="text-center font-mono text-2xs uppercase tracking-[0.12em] text-mute">
                        No budget field required
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
