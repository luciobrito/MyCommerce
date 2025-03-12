import './bootstrap';

import { createApp } from 'vue';
import App from './Components/App.vue';
import { router } from './Components/router';
import './style.scss'
import 'bootstrap/dist/js/bootstrap.min.js'
import axios from 'axios';

axios.defaults.baseURL = 'http://localhost:8000/api'
const app = createApp({});
app.component('App',App)
app.use(router).mount('#app')