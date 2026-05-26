{{-- Main Navigation --}}
<header x-data="{ open: false }" @keydown.escape.window="open = false" class="sticky top-0 z-40 border-b border-line/70 bg-bg/95 backdrop-blur">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 h-20 flex items-center justify-between">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-4 group">
            <img
                src="{{ asset('brand/logo.jpg') }}"
                alt="Build With Abdallah logo"
                class="h-11 w-11 rounded-full object-cover ring-1 ring-line transition group-hover:ring-brand-500/60"
            >
            <span class="leading-none">
                <span class="block text-base font-semibold text-ink tracking-tight">Build With <span class="text-brand-400">Abdallah</span></span>
                <span class="block mt-1.5 font-mono text-xs uppercase tracking-[0.18em] text-mute">Software · AI · Automation</span>
            </span>
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden lg:flex items-center gap-1 text-base">
            <a href="{{ route('services') }}" class="px-3.5 py-2.5 rounded-sm text-ink2 hover:text-ink hover:bg-elev/60 transition">Services</a>
            <a href="{{ route('home') }}#work" class="px-3.5 py-2.5 rounded-sm text-ink2 hover:text-ink hover:bg-elev/60 transition">Work</a>
            <a href="{{ route('tutorials.index') }}" class="px-3.5 py-2.5 rounded-sm text-ink2 hover:text-ink hover:bg-elev/60 transition">Journal</a>
            <a href="{{ route('videos.index') }}" class="px-3.5 py-2.5 rounded-sm text-ink2 hover:text-ink hover:bg-elev/60 transition">Videos</a>
            <a href="{{ route('status') }}" class="px-3.5 py-2.5 rounded-sm text-ink2 hover:text-ink hover:bg-elev/60 transition flex items-center gap-1.5">
                API
                <span class="font-mono text-xs text-brand-400 px-1.5 py-0.5 rounded-xs border border-brand-500/30 bg-brand-500/10">v1</span>
            </a>
        </nav>

        {{-- Desktop CTA --}}
        <div class="hidden lg:flex items-center gap-2">
            {{-- Theme toggle hidden — dark mode only for now --}}
            <a href="{{ route('contact.index') }}" data-magnetic
               class="magnetic inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-400 text-brand-ink font-semibold text-base px-5 py-3 rounded-sm shadow-glow transition">
                Book a project
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M1 7h11M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="square"/></svg>
            </a>
        </div>

        {{-- Mobile Menu Button --}}
        <button @click="open = !open" type="button" aria-label="Toggle navigation" class="inline-flex rounded-sm border border-line hover:border-lineH bg-surface/40 p-2 text-ink lg:hidden transition">
            <svg x-show="!open" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg x-show="open" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div x-cloak x-show="open" x-transition.origin.top class="border-t border-line bg-surface lg:hidden">
        <div class="mx-auto max-w-[1280px] px-6 py-4 space-y-1">
            <a href="{{ route('services') }}" class="block rounded-sm px-3 py-3 text-base font-medium text-ink2 transition hover:bg-elev/60 hover:text-ink">Services</a>
            <a href="{{ route('home') }}#work" class="block rounded-sm px-3 py-3 text-base font-medium text-ink2 transition hover:bg-elev/60 hover:text-ink">Work</a>
            <a href="{{ route('tutorials.index') }}" class="block rounded-sm px-3 py-3 text-base font-medium text-ink2 transition hover:bg-elev/60 hover:text-ink">Journal</a>
            <a href="{{ route('videos.index') }}" class="block rounded-sm px-3 py-3 text-base font-medium text-ink2 transition hover:bg-elev/60 hover:text-ink">Videos</a>
            <a href="{{ route('newsletter.index') }}" class="block rounded-sm px-3 py-3 text-base font-medium text-ink2 transition hover:bg-elev/60 hover:text-ink">Newsletter</a>
            <a href="{{ route('status') }}" class="block rounded-sm px-3 py-3 text-base font-medium text-ink2 transition hover:bg-elev/60 hover:text-ink">Status</a>
            <div class="pt-3 border-t border-line mt-3 flex items-center gap-3">
                {{-- Theme toggle hidden — dark mode only for now --}}
                <a href="{{ route('contact.index') }}" class="block w-full text-center bg-brand-500 hover:bg-brand-400 text-brand-ink font-semibold text-base px-4 py-3 rounded-sm transition">
                    Book a project
                </a>
            </div>
        </div>
    </div>
</header>
