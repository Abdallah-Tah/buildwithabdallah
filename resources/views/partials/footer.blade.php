{{-- Footer --}}
<footer class="bg-bg">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-16 grid grid-cols-2 md:grid-cols-5 gap-10">
        {{-- Brand Column --}}
        <div class="col-span-2">
            <div class="flex items-center gap-3">
                <span class="grid place-items-center w-9 h-9 rounded-full bg-bg ring-1 ring-line">
                    <svg viewBox="0 0 40 40" class="w-6 h-6" fill="none" aria-hidden="true">
                        <path d="M19.2 3.5 L20.8 3.5 L13.8 36.5 L7.4 36.5 Z" fill="#fafafa"/>
                        <path d="M19.2 3.5 L20.8 3.5 L32.6 36.5 L26.2 36.5 Z" fill="#3d7fff"/>
                        <path d="M14.4 21.5 L25.6 21.5 L24.4 25 L15.6 25 Z" fill="#3d7fff"/>
                        <text x="20" y="33" text-anchor="middle" font-family="ui-monospace, 'Geist Mono', monospace" font-size="7.5" font-weight="800" fill="#fafafa">&lt;/&gt;</text>
                    </svg>
                </span>
                <span class="leading-tight">
                    <span class="block text-sm font-medium text-ink">Build With <span class="text-brand-400">Abdallah</span></span>
                    <span class="block mt-0.5 font-mono text-[0.6875rem] uppercase tracking-[0.22em] text-mute">software · automation · apis · solutions</span>
                </span>
            </div>
            <p class="mt-5 text-sm text-dim max-w-[340px]">A senior engineer building custom software, AI agents and automation for small teams. Working from Brunswick, ME — happy in any timezone.</p>
            <div class="mt-6 flex items-center gap-2 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">
                <span class="w-1.5 h-1.5 rounded-full bg-live"></span> Available · Q3 2026
            </div>
        </div>

        {{-- Services Column --}}
        <div>
            <div class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute mb-4">Services</div>
            <ul class="space-y-2.5 text-sm text-ink2">
                <li><a href="{{ route('services') }}" class="hover:text-ink transition">Custom software</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-ink transition">AI & automation</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-ink transition">Content & lead-gen</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-ink transition">Office hours</a></li>
            </ul>
        </div>

        {{-- Studio Column --}}
        <div>
            <div class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute mb-4">Studio</div>
            <ul class="space-y-2.5 text-sm text-ink2">
                <li><a href="{{ route('tutorials.index') }}" class="hover:text-ink transition">Journal</a></li>
                <li><a href="#work" class="hover:text-ink transition">Selected work</a></li>
                <li><a href="{{ route('contact.index') }}" class="hover:text-ink transition">Contact</a></li>
                <li><a href="#" class="hover:text-ink transition">Sign in</a></li>
            </ul>
        </div>

        {{-- Channels Column --}}
        <div>
            <div class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute mb-4">Channels</div>
            <ul class="space-y-2.5 text-sm text-ink2">
                <li><a href="https://github.com/Abdallah-Tah" target="_blank" rel="noopener" class="hover:text-ink transition">GitHub ↗</a></li>
                <li><a href="#" class="hover:text-ink transition">X / Twitter ↗</a></li>
                <li><a href="#" class="hover:text-ink transition">LinkedIn ↗</a></li>
                <li><a href="{{ route('videos.index') }}" class="hover:text-ink transition">YouTube ↗</a></li>
            </ul>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-line/70">
        <div class="mx-auto max-w-[1280px] px-6 lg:px-10 h-14 flex flex-wrap items-center justify-between gap-3 font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-mute">
            <span>© {{ date('Y') }} Build With Abdallah · MMXXVI</span>
            <div class="flex items-center gap-5">
                <a href="#" class="hover:text-ink2 transition">Status</a>
                <a href="#" class="hover:text-ink2 transition">RSS</a>
                <a href="#" class="hover:text-ink2 transition">Privacy</a>
                <a href="#" class="hover:text-ink2 transition">Terms</a>
            </div>
        </div>
    </div>
</footer>
