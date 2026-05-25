import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

/* ========================================================================
   Build With Abdallah — Global JS
   Vanilla, framework-free. Alpine handles per-component state.
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

        // Update theme-color meta tag
        const themeMeta = document.querySelector('meta[name="theme-color"]');
        if (themeMeta) {
            themeMeta.setAttribute('content', wantDark ? '#09090b' : '#fafafa');
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
            const order = ['auto', 'dark', 'light'];
            const i = order.indexOf(get());
            const next = order[(i + 1) % order.length];
            localStorage.setItem(KEY, next);
            apply(next);
            return next;
        },
    };

    // Back-compat
    window.__bwaToggleTheme = window.__bwaTheme.cycle;
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

// 6) Re-initialize after Livewire updates (for dynamic content)
document.addEventListener('livewire:navigated', () => {
    // Re-observe reveal elements after Livewire navigation
    document.querySelectorAll('.reveal:not(.in)').forEach(el => {
        if (typeof IntersectionObserver !== 'undefined') {
            const io = new IntersectionObserver((entries, observer) => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('in');
                        observer.unobserve(e.target);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
            io.observe(el);
        } else {
            el.classList.add('in');
        }
    });

    // Re-attach magnetic listeners
    document.querySelectorAll('[data-magnetic]').forEach(el => {
        if (el._magneticInit) return;
        el._magneticInit = true;
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
});
