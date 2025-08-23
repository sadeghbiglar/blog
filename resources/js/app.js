import './bootstrap';
console.log("Vue is loading...");
import { createApp } from 'vue';

// یک نمونه Vue بساز
import ExampleComponent from './components/ExampleComponent.vue';

const app = createApp({});

// کامپوننت رو رجیستر کن
app.component('example-component', ExampleComponent);

// روی یک المنت سوارش کن
app.mount('#vue-app');