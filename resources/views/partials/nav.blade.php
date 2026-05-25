<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-brand-gray/70 bg-white/90 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('brand/logo.jpg') }}" alt="Build With Abdallah logo" class="h-11 w-11 rounded-xl object-contain">
            <div>
                <div class="text-base font-semibold tracking-tight text-brand-navy">Build With Abdallah</div>
                <div class="text-xs text-slate-500">Software • Automation • APIs • Solutions</div>
            </div>
        </a>

        <button @click="open = !open" class="inline-flex rounded-xl border border-brand-gray bg-white p-2 text-brand-navy lg:hidden">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <div class="hidden items-center gap-7 lg:flex">
            <a href="{{ route('about') }}" class="nav-link">About</a>
            <a href="{{ route('services') }}" class="nav-link">Services</a>
            <a href="{{ route('tutorials.index') }}" class="nav-link">Tutorials</a>
            <a href="{{ route('videos.index') }}" class="nav-link">Videos</a>
            <a href="{{ route('newsletter.index') }}" class="nav-link">Newsletter</a>
            <a href="{{ route('contact.index') }}" class="nav-link">Contact</a>
            <a href="{{ url('/admin') }}" class="inline-flex items-center rounded-full bg-brand-blue px-4 py-2 text-sm font-semibold text-white shadow-sm shadow-blue-200 transition hover:bg-blue-700">Admin</a>
        </div>
    </div>

    <div x-cloak x-show="open" x-transition class="border-t border-brand-gray bg-white lg:hidden">
        <div class="space-y-1 px-4 py-4 sm:px-6">
            <a href="{{ route('about') }}" class="mobile-nav-link">About</a>
            <a href="{{ route('services') }}" class="mobile-nav-link">Services</a>
            <a href="{{ route('tutorials.index') }}" class="mobile-nav-link">Tutorials</a>
            <a href="{{ route('videos.index') }}" class="mobile-nav-link">Videos</a>
            <a href="{{ route('newsletter.index') }}" class="mobile-nav-link">Newsletter</a>
            <a href="{{ route('contact.index') }}" class="mobile-nav-link">Contact</a>
            <a href="{{ url('/admin') }}" class="mobile-nav-link">Admin</a>
        </div>
    </div>
</nav>
