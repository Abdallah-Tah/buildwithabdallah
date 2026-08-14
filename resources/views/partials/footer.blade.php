{{-- Footer --}}
<footer class="bg-bg">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-20 grid grid-cols-1 md:grid-cols-5 gap-10 lg:gap-14">
        {{-- Brand Column --}}
        <div class="md:col-span-2">
            <div class="flex items-center gap-4">
                <img
                    src="{{ asset('brand/logo.jpg') }}"
                    alt="Build With Abdallah logo"
                    width="48"
                    height="48"
                    loading="lazy"
                    decoding="async"
                    class="h-12 w-12 rounded-full object-cover ring-1 ring-line"
                >
                <span class="leading-tight">
                    <span class="block text-lg font-semibold text-ink">Build With <span class="text-brand-400">Abdallah</span></span>
                    <span class="block mt-1 font-mono text-xs uppercase tracking-[0.16em] text-mute">software · automation · apis · solutions</span>
                </span>
            </div>
            <p class="mt-5 text-base leading-7 text-dim max-w-[420px]">A senior engineer building custom software, AI agents and automation for small teams. Working from Brunswick, ME — happy in any timezone.</p>
            <div class="mt-6 flex items-center gap-2 text-xs font-mono uppercase tracking-[0.16em] text-mute">
                <span class="w-1.5 h-1.5 rounded-full bg-live"></span> Available · Q3 2026
            </div>
        </div>

        {{-- Services Column --}}
        <div>
            <div class="text-xs font-mono uppercase tracking-[0.16em] text-mute mb-5">Services</div>
            <ul class="space-y-3 text-base text-ink2">
                <li><a href="{{ route('services') }}" class="hover:text-ink transition">Custom software</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-ink transition">AI & automation</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-ink transition">Content & lead-gen</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-ink transition">Office hours</a></li>
            </ul>
        </div>

        {{-- Studio Column --}}
        <div>
            <div class="text-xs font-mono uppercase tracking-[0.16em] text-mute mb-5">Studio</div>
            <ul class="space-y-3 text-base text-ink2">
                <li><a href="{{ route('tutorials.index') }}" class="hover:text-ink transition">Journal</a></li>
                <li><a href="{{ route('home') }}#work" class="hover:text-ink transition">Selected work</a></li>
                <li><a href="{{ route('contact.index') }}" class="hover:text-ink transition">Contact</a></li>
                <li><a href="{{ route('newsletter.index') }}" class="hover:text-ink transition">Newsletter</a></li>
            </ul>
        </div>

        {{-- Channels Column --}}
        <div>
            <div class="text-xs font-mono uppercase tracking-[0.16em] text-mute mb-5">Channels</div>
            <ul class="space-y-3 text-base text-ink2">
                <li><a href="https://github.com/Abdallah-Tah" target="_blank" rel="noopener" class="hover:text-ink transition">GitHub ↗</a></li>
                <li><a href="https://www.facebook.com/buildwithabdallah" target="_blank" rel="noopener" class="hover:text-ink transition">Facebook ↗</a></li>
                <li><a href="https://www.linkedin.com/in/abdallahmohamed86/?skipRedirect=true" target="_blank" rel="noopener" class="hover:text-ink transition">LinkedIn ↗</a></li>
                <li><a href="{{ route('videos.index') }}" class="hover:text-ink transition">YouTube ↗</a></li>
            </ul>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-line/70">
        <div class="mx-auto max-w-[1280px] px-6 lg:px-10 min-h-16 py-4 flex flex-wrap items-center justify-between gap-4 font-mono text-xs uppercase tracking-[0.12em] text-mute">
            <span>© {{ date('Y') }} Build With Abdallah · MMXXVI</span>
            <div class="flex flex-wrap items-center gap-5">
                <a href="{{ route('status') }}" class="hover:text-ink2 transition">Status</a>
                <a href="{{ route('tutorials.index') }}" class="hover:text-ink2 transition">Journal</a>
                <a href="{{ route('privacy') }}" class="hover:text-ink2 transition">Privacy</a>
                <a href="{{ route('terms') }}" class="hover:text-ink2 transition">Terms</a>
            </div>
        </div>
    </div>
</footer>
