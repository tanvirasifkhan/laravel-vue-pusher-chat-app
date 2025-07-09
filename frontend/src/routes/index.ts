import { createRouter, createWebHistory, type RouteRecordRaw } from "vue-router"
import SignIn from "../pages/SignIn.vue"
import SignUp from "../pages/SignUp.vue"
import ChatRoom from "../pages/ChatRoom.vue"
import { useAuthStore } from "../store/authStore"

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
    },
    {
        path: '/chat/:receiverId',
        component: ChatRoom,
        name: 'chat_messages',
        meta: {
            requiresAuth: true
        }
    }
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

router.beforeEach((to, from, next) => {
    const authStore = useAuthStore()

    if(to.meta.requiresAuth && !authStore.isAuthenticated()){
        next({ name: 'signin' })
    }else{
        next()
    }
})

export default router