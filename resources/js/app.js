import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

const media = window.matchMedia('(prefers-color-scheme: dark)');
const applyTheme = (isDark) => {
    document.documentElement.classList.toggle('theme-dark', isDark);
    const themeMeta = document.querySelector('meta[name="theme-color"]');
    if (themeMeta) {
        themeMeta.setAttribute('content', isDark ? '#0F172A' : '#2563EB');
    }
};

applyTheme(media.matches);

if (typeof media.addEventListener === 'function') {
    media.addEventListener('change', (event) => applyTheme(event.matches));
} else if (typeof media.addListener === 'function') {
    media.addListener((event) => applyTheme(event.matches));
}
