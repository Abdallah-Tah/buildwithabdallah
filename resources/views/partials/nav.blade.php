@php
    $navLinks = [
        ['label' => 'Services',  'href' => route('services'),         'active' => request()->routeIs('services')],
        ['label' => 'Work',      'href' => route('home').'#work',     'active' => false],
        ['label' => 'Journal',   'href' => route('tutorials.index'),  'active' => request()->routeIs('tutorials.*')],
        ['label' => 'Videos',    'href' => route('videos.index'),     'active' => request()->routeIs('videos.*')],
        ['label' => 'About',     'href' => route('about'),            'active' => request()->routeIs('about')],
    ];
@endphp

<header x-data="{ open: false }" @keydown.escape.window="open = false"
        class="sticky top-0 z-40 border-b border-line bg-bg/85 backdrop-blur-md">
    <div class="mx-auto flex h-20 max-w-[1280px] items-center justify-between gap-4 px-5 lg:px-10">

        <a href="{{ route('home') }}" class="group flex items-center gap-3.5">
            <img src="{{ asset('brand/logo.jpg') }}" alt="" width="44" height="44" decoding="async"
                 class="h-10 w-10 rounded-full object-cover ring-1 ring-line transition group-hover:ring-brand-500/60 lg:h-11 lg:w-11">
            <span class="leading-none">
                <span class="block text-[0.9375rem] font-semibold tracking-tight text-ink lg:text-base">
                    Build With <span class="text-brand-500">Abdallah</span>
                </span>
                <span class="mt-1.5 hidden font-mono text-2xs uppercase tracking-[0.16em] text-mute sm:block">
                    Software &middot; AI &middot; Automation
                </span>
            </span>
        </a>

        <nav class="hidden items-center gap-1 lg:flex" aria-label="Primary">
            @foreach ($navLinks as $link)
                <a href="{{ $link['href'] }}" @if ($link['active']) aria-current="page" @endif
                   class="nav-link px-3.5 py-2.5 text-[0.9375rem] text-dim hover:bg-elev hover:text-ink">{{ $link['label'] }}</a>
            @endforeach
            <a href="https://api.buildwithabdallah.com" rel="noopener"
               class="nav-link flex items-center gap-2 px-3.5 py-2.5 text-[0.9375rem] text-dim hover:bg-elev hover:text-ink">
                API
                <span class="rounded-xs bg-brand-500/12 px-1.5 py-0.5 font-mono text-2xs font-medium text-brand-read">v1</span>
            </a>
        </nav>

        {{-- The toggle sits outside the mobile menu: theme is a comfort setting,
             and burying it behind a hamburger meant phone visitors never found it. --}}
        <div class="flex items-center gap-2">
            @include('partials.theme-toggle')

            <a href="{{ route('contact.index') }}" data-magnetic
               class="magnetic hidden items-center gap-2 rounded-sm bg-brand-500 px-5 py-3 text-[0.9375rem] font-semibold text-brand-ink shadow-glow transition hover:bg-brand-400 lg:inline-flex">
                Book a project
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                    <path d="M1 7h11M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            <button @click="open = !open" type="button" aria-label="Toggle navigation"
                    :aria-expanded="open ? 'true' : 'false'" aria-controls="mobile-nav"
                    class="inline-flex rounded-sm border border-line bg-surface p-2.5 text-ink2 transition hover:border-lineH hover:text-ink lg:hidden">
                <svg x-show="!open" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
                <svg x-show="open" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <div x-cloak x-show="open" x-transition.origin.top id="mobile-nav" class="border-t border-line bg-surface lg:hidden">
        <div class="mx-auto max-w-[1280px] space-y-1 px-5 py-4">
            @foreach ($navLinks as $link)
                <a href="{{ $link['href'] }}" @if ($link['active']) aria-current="page" @endif
                   class="nav-link block px-3 py-3 font-medium text-dim hover:bg-elev hover:text-ink">{{ $link['label'] }}</a>
            @endforeach
            <a href="{{ route('newsletter.index') }}" class="nav-link block px-3 py-3 font-medium text-dim hover:bg-elev hover:text-ink">Newsletter</a>
            <a href="https://api.buildwithabdallah.com" rel="noopener" class="nav-link block px-3 py-3 font-medium text-dim hover:bg-elev hover:text-ink">API</a>
            <a href="{{ route('contact.index') }}"
               class="mt-3 block rounded-sm bg-brand-500 px-4 py-3.5 text-center font-semibold text-brand-ink transition hover:bg-brand-400">
                Book a project
            </a>
        </div>
    </div>
</header>
