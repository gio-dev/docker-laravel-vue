import './bootstrap';
import { createApp } from 'vue'
import App from './App.vue'
import router from './routes'
import VueAxios from 'vue-axios'
import axios from 'axios'
import Notifications from '@kyvg/vue3-notification'
import toast  from '@k90mirzaei/vue-toast'


createApp(App)
    .use(VueAxios, axios)
    .use(router)
    .use(Notifications)
    .use(toast)
    .mount('#app')


// app.mount("#app")

