@php
    $footerColumns = [
        'Services' => [
            ['Custom software', route('services')],
            ['AI &amp; automation', route('services')],
            ['Content &amp; lead-gen', route('services')],
            ['Office hours', route('services')],
        ],
        'Studio' => [
            ['Selected work', route('home').'#work'],
            ['Journal', route('tutorials.index')],
            ['Videos', route('videos.index')],
            ['Newsletter', route('newsletter.index')],
        ],
        'Elsewhere' => [
            ['Central API &nearr;', 'https://api.buildwithabdallah.com'],
            ['GitHub &nearr;', 'https://github.com/Abdallah-Tah'],
            ['LinkedIn &nearr;', 'https://www.linkedin.com/in/abdallahmohamed86/?skipRedirect=true'],
            ['Facebook &nearr;', 'https://www.facebook.com/buildwithabdallah'],
        ],
    ];
@endphp

<footer class="border-t border-line bg-surface">
    <div class="mx-auto grid max-w-[1280px] grid-cols-2 gap-x-8 gap-y-12 px-5 py-16 md:grid-cols-5 lg:gap-x-14 lg:px-10 lg:py-20">

        <div class="col-span-2">
            <div class="flex items-center gap-4">
                <img src="{{ asset('brand/logo.jpg') }}" alt="" width="48" height="48" loading="lazy" decoding="async"
                     class="h-12 w-12 rounded-full object-cover ring-1 ring-line">
                <span class="leading-tight">
                    <span class="block text-lg font-semibold text-ink">Build With <span class="text-brand-500">Abdallah</span></span>
                    <span class="mt-1 block font-mono text-2xs uppercase tracking-[0.16em] text-mute">Software &middot; AI &middot; Automation</span>
                </span>
            </div>

            <p class="mt-5 max-w-[420px] text-base leading-7 text-dim">
                A senior engineer building custom software, AI agents and automation for small
                teams. Working from Brunswick, ME &mdash; happy in any timezone.
            </p>

            <p class="mt-6 inline-flex items-center gap-2 rounded-sm border border-live/30 bg-live/8 px-3 py-2 font-mono text-2xs uppercase tracking-[0.14em] text-live">
                <span class="h-1.5 w-1.5 rounded-full bg-live"></span> Available for new work
            </p>
        </div>

        @foreach ($footerColumns as $heading => $links)
            <div>
                <h2 class="mb-5 font-mono text-2xs uppercase tracking-[0.16em] text-mute">{{ $heading }}</h2>
                <ul class="space-y-3 text-[0.9375rem]">
                    @foreach ($links as [$label, $href])
                        <li>
                            <a href="{{ $href }}"
                               @if (str_starts_with($href, 'http') && ! str_contains($href, 'buildwithabdallah.com/')) target="_blank" rel="noopener" @endif
                               class="text-dim transition hover:text-ink">{!! $label !!}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

    <div class="border-t border-line">
        <div class="mx-auto flex min-h-16 max-w-[1280px] flex-wrap items-center justify-between gap-x-6 gap-y-3 px-5 py-4 font-mono text-2xs uppercase tracking-[0.12em] text-faint lg:px-10">
            <span>&copy; {{ date('Y') }} Build With Abdallah</span>
            <div class="flex flex-wrap items-center gap-x-5 gap-y-2">
                <a href="{{ route('status') }}" class="transition hover:text-ink2">Status</a>
                <a href="{{ route('privacy') }}" class="transition hover:text-ink2">Privacy</a>
                <a href="{{ route('terms') }}" class="transition hover:text-ink2">Terms</a>
                <a href="{{ route('contact.index') }}" class="transition hover:text-ink2">Contact</a>
            </div>
        </div>
    </div>
</footer>
