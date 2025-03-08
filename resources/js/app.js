import './bootstrap';

import { createApp } from 'vue';
import App from './Components/App.vue';
import { router } from './Components/router';
import './style.scss'
import 'bootstrap/dist/js/bootstrap.min.js'
const app = createApp({});
app.component('App',App)
app.use(router).mount('#app')