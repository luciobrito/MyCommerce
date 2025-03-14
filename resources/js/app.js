import './bootstrap';

import { createApp } from 'vue';
import App from './Components/App.vue';
import { router } from './Components/router';
import './style.scss'
import 'bootstrap/dist/js/bootstrap.min.js'
import axios from 'axios';
//var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);


axios.defaults.baseURL = 'http://192.168.15.79:8000/api'
const app = createApp({});
app.component('App',App)
app.use(router).mount('#app')