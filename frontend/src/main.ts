import { createApp } from 'vue'
import './assets/main.css'
import App from './App.vue'
import ToastPlugin from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-bootstrap.css'
import router from './routes'
import { createPinia } from 'pinia'

createApp(App).use(ToastPlugin).use(router).use(createPinia()).mount('#app')
