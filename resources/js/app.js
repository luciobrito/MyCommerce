import './bootstrap';

import { createApp } from 'vue';
import App from './Components/App.vue';
import { router } from './Components/router';

const app = createApp({});
app.component('App',App)
app.use(router).mount('#app')