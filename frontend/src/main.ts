import { createApp } from 'vue'
import './assets/main.css'
import App from './App.vue'
import ToastPlugin from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-bootstrap.css'
import router from './routes'
import { createPinia } from 'pinia'
import { configureEcho } from "@laravel/echo-vue"
 
configureEcho({
    broadcaster: "reverb",
    appId: import.meta.env.VITE_REVERB_APP_ID,
    appSecret: import.meta.env.VITE_REVERB_APP_SECRET,
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT,
    wssPort: import.meta.env.VITE_REVERB_PORT,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

// import Echo from 'laravel-echo';
 
// import Pusher from 'pusher-js';

// declare const window: Window &
//    typeof globalThis & {
//      Pusher: any,
//      Echo: any
//    }

// window.Pusher = Pusher;
 
// window.Echo = new Echo({
//     broadcaster: 'reverb',
//     appId: import.meta.env.VITE_REVERB_APP_ID,
//     appSecret: import.meta.env.VITE_REVERB_APP_SECRET,
//     key: import.meta.env.VITE_REVERB_APP_KEY,
//     wsHost: import.meta.env.VITE_REVERB_HOST,
//     wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
//     wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

createApp(App).use(ToastPlugin).use(router).use(createPinia()).mount('#app')
