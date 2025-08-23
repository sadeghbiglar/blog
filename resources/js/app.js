import './bootstrap';
console.log("Vue is loading...");
import { createApp } from 'vue';


import WordCards from './components/WordCards.vue';

const app = createApp({});
app.component('word-cards', WordCards);
app.mount('#vue-words');