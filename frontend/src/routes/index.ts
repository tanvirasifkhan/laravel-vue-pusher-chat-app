import { createRouter, createWebHistory, type RouteRecordRaw } from "vue-router"
import SignIn from "../pages/SignIn.vue"
import SignUp from "../pages/SignUp.vue"
import ChatRoom from "../pages/ChatRoom.vue"

const routes: RouteRecordRaw[] = [
    {
        path: '/',
        component: SignIn,
        name: 'signin',
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/signup',
        component: SignUp,
        name: 'signup',
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/chat',
        component: ChatRoom,
        name: 'chat',
        meta: {
            requiresAuth: true
        }
    }
]

export const router = createRouter({
    routes,
    history: createWebHistory()
})