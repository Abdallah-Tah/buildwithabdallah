import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

/* ========================================================================
   Build With Abdallah — Global JS
   Keep the public site light: Alpine is fine here, but no global Livewire.
   ======================================================================== */

// 1) Scroll fade-ups via IntersectionObserver
(function () {
    if (typeof IntersectionObserver === 'undefined') {
        document.querySelectorAll('.reveal').forEach(el => el.classList.add('in'));
        return;
    }
    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('in');
                io.unobserve(e.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    const init = () => document.querySelectorAll('.reveal').forEach(el => io.observe(el));
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();

// 2) Magnetic CTA — apply [data-magnetic] to any clickable.
//    Strength via data-magnetic-strength (default 0.35).
(function () {
    const init = () => {
        document.querySelectorAll('[data-magnetic]').forEach(el => {
            const k = parseFloat(el.dataset.magneticStrength || '0.35');
            el.addEventListener('pointermove', (e) => {
                const r = el.getBoundingClientRect();
                const x = e.clientX - (r.left + r.width / 2);
                const y = e.clientY - (r.top + r.height / 2);
                el.style.setProperty('--mx', (x * k).toFixed(2) + 'px');
                el.style.setProperty('--my', (y * k).toFixed(2) + 'px');
            });
            el.addEventListener('pointerleave', () => {
                el.style.setProperty('--mx', '0px');
                el.style.setProperty('--my', '0px');
            });
        });
    };
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();

// 3) Theme handling. Supports 'auto' (follows system), 'dark', 'light'.
//    Stored in localStorage. Default 'auto' so the OS decides on first visit.
(function () {
    const KEY = 'bwa.theme';
    const mql = window.matchMedia('(prefers-color-scheme: dark)');

    const apply = (t) => {
        const html = document.documentElement;
        const wantDark = t === 'dark' || (t === 'auto' && mql.matches);
        html.classList.toggle('dark', wantDark);
        html.dataset.theme = t;
        html.dataset.resolvedTheme = wantDark ? 'dark' : 'light';

        // Update theme-color meta tag (match the actual page backgrounds)
        const themeMeta = document.querySelector('meta[name="theme-color"]');
        if (themeMeta) {
            themeMeta.setAttribute('content', wantDark ? '#09090b' : '#eaf0ff');
        }
    };

    const get = () => localStorage.getItem(KEY) || 'auto';
    apply(get());

    // React to OS changes while user is on 'auto'
    mql.addEventListener?.('change', () => {
        if (get() === 'auto') apply('auto');
    });

    // Public API
    window.__bwaTheme = {
        get,
        set: (t) => {
            localStorage.setItem(KEY, t);
            apply(t);
        },
        cycle: () => {
            const order = ['auto', 'light', 'dark'];
            const i = order.indexOf(get());
            const next = order[(i + 1) % order.length];
            localStorage.setItem(KEY, next);
            apply(next);
            return next;
        },
    };

    // Back-compat
    window.__bwaToggleTheme = window.__bwaTheme.cycle;

    // Wire up nav theme toggle buttons. The visible icon is driven by CSS off
    // html[data-theme]; here we just cycle and keep the a11y label in sync.
    const labelFor = (t) => `Theme: ${t} (click to change)`;
    const initToggles = () => {
        document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
            btn.setAttribute('aria-label', labelFor(get()));
            btn.addEventListener('click', () => {
                btn.setAttribute('aria-label', labelFor(window.__bwaTheme.cycle()));
            });
        });
    };
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initToggles);
    } else {
        initToggles();
    }
})();

// 4) Live "now" clock (used in hero status strip) — pure cosmetic.
(function () {
    const fmt = () => {
        const d = new Date();
        try {
            const parts = new Intl.DateTimeFormat('en-US', {
                hour12: false,
                hour: '2-digit',
                minute: '2-digit',
                timeZone: 'America/New_York'
            }).format(d);
            return parts + ' ET';
        } catch (_) {
            return d.toLocaleTimeString('en-US', {
                hour12: false,
                hour: '2-digit',
                minute: '2-digit'
            }) + ' ET';
        }
    };

    const tick = () => {
        document.querySelectorAll('[data-now]').forEach(el => {
            el.textContent = fmt();
        });
    };

    tick();
    setInterval(tick, 30000);
})();

// 5) Smooth in-page anchor scroll
document.addEventListener('click', (e) => {
    const a = e.target.closest('a[href^="#"]');
    if (!a) return;
    const id = a.getAttribute('href').slice(1);
    if (!id) return;
    const el = document.getElementById(id);
    if (!el) return;
    e.preventDefault();
    const top = el.getBoundingClientRect().top + window.scrollY - 80;
    window.scrollTo({ top, behavior: 'smooth' });
});

// 6) GitHub-style code blocks — wrap every <pre> in article content with a
//    header (language label + copy button). Works for both raw-HTML and
//    markdown-rendered post bodies.
(function () {
    const COPY_ICON = '<svg class="gh-code__copy-icon" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M0 6.75C0 5.784.784 5 1.75 5h1.5a.75.75 0 0 1 0 1.5h-1.5a.25.25 0 0 0-.25.25v7.5c0 .138.112.25.25.25h7.5a.25.25 0 0 0 .25-.25v-1.5a.75.75 0 0 1 1.5 0v1.5A1.75 1.75 0 0 1 9.25 16h-7.5A1.75 1.75 0 0 1 0 14.25Z"/><path d="M5 1.75C5 .784 5.784 0 6.75 0h7.5C15.216 0 16 .784 16 1.75v7.5A1.75 1.75 0 0 1 14.25 11h-7.5A1.75 1.75 0 0 1 5 9.25Zm1.75-.25a.25.25 0 0 0-.25.25v7.5c0 .138.112.25.25.25h7.5a.25.25 0 0 0 .25-.25v-7.5a.25.25 0 0 0-.25-.25Z"/></svg>';
    const CHECK_ICON = '<svg class="gh-code__check" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M13.78 4.22a.75.75 0 0 1 0 1.06l-7.25 7.25a.75.75 0 0 1-1.06 0L1.72 8.78a.751.751 0 0 1 .018-1.042.751.751 0 0 1 1.042-.018L6 10.94l6.72-6.72a.75.75 0 0 1 1.06 0Z"/></svg>';

    // Normalize the label-facing language and the highlighter language id.
    const LANG_ALIAS = {
        sh: 'bash', shell: 'bash', zsh: 'bash', console: 'bash', env: 'bash',
        dotenv: 'bash', js: 'javascript', mjs: 'javascript', cjs: 'javascript',
        ts: 'typescript', py: 'python', rb: 'ruby', yml: 'yaml',
        html: 'xml', vue: 'xml', svelte: 'xml', jsonc: 'json', 'c#': 'csharp',
    };

    const langFromPre = (pre) => {
        const code = pre.querySelector('code');
        const cls = (code && code.className) || pre.className || '';
        const m = cls.match(/(?:language|lang)-([\w+#-]+)/i);
        if (m) return m[1];
        if (pre.dataset.lang) return pre.dataset.lang;
        return 'code';
    };

    const enhance = (pre, hljs) => {
        if (pre.closest('.gh-code')) return; // already wrapped

        const lang = langFromPre(pre);

        // Syntax-highlight the code (GitHub token classes) when a highlighter
        // is available and the language is recognised.
        const code = pre.querySelector('code');
        if (hljs && code) {
            const raw = code.textContent;
            const id = LANG_ALIAS[lang.toLowerCase()] || lang.toLowerCase();
            try {
                code.innerHTML = hljs.getLanguage(id)
                    ? hljs.highlight(raw, { language: id, ignoreIllegals: true }).value
                    : hljs.highlightAuto(raw).value;
                code.classList.add('hljs');
            } catch (_) { /* leave code as plain text */ }
        }

        const wrap = document.createElement('div');
        wrap.className = 'gh-code';

        const header = document.createElement('div');
        header.className = 'gh-code__header';

        const label = document.createElement('span');
        label.className = 'gh-code__lang';
        label.textContent = lang;

        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'gh-code__copy';
        btn.setAttribute('aria-label', 'Copy code to clipboard');
        btn.innerHTML = COPY_ICON + CHECK_ICON + '<span class="gh-code__copy-text">Copy</span>';

        btn.addEventListener('click', async () => {
            const code = (pre.querySelector('code') || pre).innerText.replace(/\n$/, '');
            try {
                if (navigator.clipboard && window.isSecureContext) {
                    await navigator.clipboard.writeText(code);
                } else {
                    const ta = document.createElement('textarea');
                    ta.value = code;
                    ta.style.position = 'fixed';
                    ta.style.opacity = '0';
                    document.body.appendChild(ta);
                    ta.select();
                    document.execCommand('copy');
                    ta.remove();
                }
                btn.classList.add('is-copied');
                btn.querySelector('.gh-code__copy-text').textContent = 'Copied!';
                setTimeout(() => {
                    btn.classList.remove('is-copied');
                    btn.querySelector('.gh-code__copy-text').textContent = 'Copy';
                }, 2000);
            } catch (_) {
                btn.querySelector('.gh-code__copy-text').textContent = 'Error';
            }
        });

        header.appendChild(label);
        header.appendChild(btn);

        pre.parentNode.insertBefore(wrap, pre);
        wrap.appendChild(header);
        wrap.appendChild(pre);
    };

    // Lazy-load highlight.js + a curated language set ONLY on pages that
    // actually contain code (Vite splits this into a separate chunk).
    const loadHighlighter = async () => {
        try {
            const hljs = (await import('highlight.js/lib/core')).default;
            const langs = await Promise.all([
                import('highlight.js/lib/languages/bash'),
                import('highlight.js/lib/languages/php'),
                import('highlight.js/lib/languages/javascript'),
                import('highlight.js/lib/languages/typescript'),
                import('highlight.js/lib/languages/json'),
                import('highlight.js/lib/languages/xml'),
                import('highlight.js/lib/languages/css'),
                import('highlight.js/lib/languages/scss'),
                import('highlight.js/lib/languages/sql'),
                import('highlight.js/lib/languages/yaml'),
                import('highlight.js/lib/languages/python'),
                import('highlight.js/lib/languages/dockerfile'),
                import('highlight.js/lib/languages/markdown'),
                import('highlight.js/lib/languages/ini'),
                import('highlight.js/lib/languages/diff'),
            ]);
            const names = ['bash', 'php', 'javascript', 'typescript', 'json', 'xml',
                'css', 'scss', 'sql', 'yaml', 'python', 'dockerfile', 'markdown', 'ini', 'diff'];
            langs.forEach((m, i) => hljs.registerLanguage(names[i], m.default));
            return hljs;
        } catch (_) {
            return null; // highlighting is a progressive enhancement — code still renders
        }
    };

    const init = async () => {
        const pres = document.querySelectorAll('article pre, .prose pre');
        if (!pres.length) return;
        const hljs = await loadHighlighter();
        pres.forEach((pre) => enhance(pre, hljs));
    };
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();

