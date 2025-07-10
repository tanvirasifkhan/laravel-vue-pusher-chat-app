<script setup lang="ts">
    import { onMounted, type Ref, ref } from 'vue'
    import { useAuthStore } from '../store/authStore'
    import { useRouter } from 'vue-router'
    import { useToast } from 'vue-toast-notification'
    import { type RegisterUserModel } from '../store/authStore'
    import { loadEchoConfig } from '../store/authStore'

    const authStore = useAuthStore()
    const router = useRouter()
    const $toast = useToast()
    
    const user: Ref<RegisterUserModel> = ref({} as RegisterUserModel)

    const register = async () => {
        try {
            await authStore.signUp(user.value)

            loadEchoConfig(authStore.getToken())

            if (Object.keys(authStore.errors).length === 0) {
                user.value = {} as RegisterUserModel
                router.push({ name: 'chat' })
                if (authStore.successMessage) {
                    $toast.success(authStore.successMessage)
                }
                if (authStore.errorMessage) {
                    $toast.error(authStore.errorMessage)
                }
            }
        } catch (error) {
            console.error(error)
        }
    }

    onMounted(()=> {
        document.title = "ChatRoom - Sign Up"
    })

    onMounted(() => {
        if (authStore.isAuthenticated()) {
            router.push({ name: 'chat' })
        }
    })
</script>

<template>
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-center text-4xl text-emerald-500 mb-10 font-roboto">Chat<strong class="font-bold">Room</strong></h1>
        <div class="w-3/12 bg-white border border-gray-200 shadow rounded-2xl">
            <div class="border-b border-b-gray-200">
                <h2 class="text-xl text-center text-gray-700 py-3 font-roboto">Sign Up</h2>
            </div>
            <form @submit.prevent="register" class="m-4 flex flex-col space-y-3">
                <div class="flex flex-col space-y-1.5">
                    <label for="name" class="text-lg text-gray-600 cursor-pointer font-roboto">Name <span class="text-red-500">*</span></label>
                    <input type="text" id="name" v-model="user.name" class="text-gray-600 text-lg font-roboto outline-0 focus:ring-2 focus:ring-emerald-300 border-2 border-gray-200 px-3 py-1.5 rounded-xl" autocomplete="off" placeholder="Name">
                    <p class="text-red-700 text-xs font-roboto" v-if="authStore.errors?.name">{{ authStore.errors?.name.toString() }}</p>
                </div>
                <div class="flex flex-col space-y-1.5">
                    <label for="email" class="text-lg text-gray-600 cursor-pointer font-roboto">Email address <span class="text-red-500">*</span></label>
                    <input type="email" id="email" v-model="user.email" class="text-gray-600 text-lg font-roboto outline-0 focus:ring-2 focus:ring-emerald-300 border-2 border-gray-200 px-3 py-1.5 rounded-xl" autocomplete="off" placeholder="Email address">
                    <p class="text-red-700 text-xs font-roboto" v-if="authStore.errors?.email">{{ authStore.errors?.email.toString() }}</p>
                </div>
                <div class="flex flex-col space-y-1.5">
                    <label for="password" class="text-lg text-gray-600 cursor-pointer font-roboto">Password <span class="text-red-500">*</span></label>
                    <input type="password" id="password" v-model="user.password" class="text-gray-600 text-lg font-roboto outline-0 focus:ring-2 focus:ring-emerald-300 border-2 border-gray-200 px-3 py-1.5 rounded-xl" autocomplete="off" placeholder="Password">
                    <p class="text-red-700 text-xs font-roboto" v-if="authStore.errors?.password">{{ authStore.errors?.password.toString() }}</p>
                </div>
                <div class="flex flex-col items-center space-y-1.5 mt-3">
                    <button type="submit" class="w-full text-white rounded-2xl font-roboto cursor-pointer bg-emerald-600 px-4 py-2">Sign Up</button>
                    <RouterLink :to="{name: 'signin'}" class="text-lg text-gray-600 font-roboto hover:text-emerald-600">Sign into your account</RouterLink>
                </div>                
            </form>
        </div>
    </div>
</template>