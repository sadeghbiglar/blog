import './bootstrap';
console.log("Vue is loading...");
import { createApp } from 'vue';
import WordCards from './components/word-cards.vue';

// اگر از axios استفاده می‌کنید، می‌توانید CSRF را اینجا ست کنید.
// اما ما در این نسخه از fetch با هدر X-CSRF-TOKEN استفاده کردیم.

const mountEl = document.getElementById('vue-words');
if (mountEl) {
    const app = createApp({});
    app.component('word-cards', WordCards);
    app.mount('#vue-words');
}
