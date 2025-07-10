import { defineStore } from "pinia"
import { login, logout, register, registeredUserList } from "../api/auth"
import { ref, type Ref } from "vue"
import { useChatMessageStore } from "./chatMessageStore"
import { configureEcho } from "@laravel/echo-vue"

export interface AuthModel {
    id: number,
    name: string,
    email: string,
    token: string
}

export interface RegisteredUserModel {
    id: number,
    name: string,
    email: string
}

export interface LoginUserModel {
    email: string,
    password: string
}

export interface RegisterUserModel {
    name: string,
    email: string,
    password: string
}

export const loadEchoConfig = (token: string | null) => {
    return configureEcho({
        broadcaster: "reverb",      
        appId: import.meta.env.VITE_REVERB_APP_ID,
        appSecret: import.meta.env.VITE_REVERB_APP_SECRET,
        key: import.meta.env.VITE_REVERB_APP_KEY,
        wsHost: import.meta.env.VITE_REVERB_HOST,
        wsPort: import.meta.env.VITE_REVERB_PORT,
        wssPort: import.meta.env.VITE_REVERB_PORT,
        forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
        enabledTransports: ['ws', 'wss'],
        authEndpoint: import.meta.env.VITE_REVERB_AUTH_ENDPOINT,
        auth: {
            headers: {
                Authorization: "Bearer " + token,
                Accept: "application/json"
            }
        }
    })
}

export const useAuthStore = defineStore("auth", ()=> {

    const setUser = (user: AuthModel | null) => localStorage.setItem("user", JSON.stringify(user))

    const getUser = (): AuthModel | null => localStorage.getItem("user") ? JSON.parse(localStorage.getItem("user") as string) : null

    const getToken = (): string | null => getUser()?.token || null

    const registeredUsers: Ref<RegisteredUserModel[]> = ref([])

    const loadingRegisteredUsers = ref<boolean>(false)

    const errors = ref<any>({})

    const errorMessage = ref<string>("")

    const successMessage = ref<string>("")

    const isAuthenticated = (): boolean => getUser() !== null

    const chatMessageStore = useChatMessageStore()

    const signIn = async (user: LoginUserModel) => {
        try{
            const response = await login(user)
            
            setUser(response.data?.data?.authenticatedUser)

            registeredUsers.value = response.data?.data?.users

            chatMessageStore.selectedUser = null

            if(response.data?.successMessage && response.data?.data !== null) {
                successMessage.value = response.data?.successMessage
                errors.value = {}
            }else {
                successMessage.value = ""
                errors.value = {}
            }

            if(response.data?.errorMessage && response.data?.data === null){
                errorMessage.value = response.data?.errorMessage
                errors.value = {}
            }else{
                errors.value = {}
                errorMessage.value = ''
            }   

        }catch(error: any) {
            errors.value = error.response.data?.errors
        }
    }

    const signUp = async (user: RegisterUserModel) => {
        try{
            const response = await register(user)
            
            setUser(response.data?.data?.authenticatedUser)

            registeredUsers.value = response.data?.data?.users

            chatMessageStore.selectedUser = null

            if(response.data?.successMessage && response.data?.data !== null) {
                successMessage.value = response.data?.successMessage
                errors.value = {}
            }else {
                successMessage.value = ""
                errors.value = {}
            }

            if(response.data?.errorMessage && response.data.data === null){
                errorMessage.value = response.data?.errorMessage
                errors.value = {}
            }else{
                errors.value = {}
                errorMessage.value = ''
            }   

        }catch(error: any) {
            errors.value = error.response.data?.errors
        }
    }

    const getRegisteredUsers = async () => {
        loadingRegisteredUsers.value = true

        try{
            const response = await registeredUserList(getToken() as string)
            registeredUsers.value = response.data.data
            loadingRegisteredUsers.value = false
        }catch(error: any) {
            console.log(error)
        }
    }

    const signOut = async () => {
        try{
            const response = await logout(getToken() as string)            
            setUser(null)
            localStorage.removeItem("user")
            successMessage.value = response.data.successMessage
            errorMessage.value = ''
        }catch(error: any) {
            console.log(error)
        }
    }

    return {
        getToken,
        getUser,
        registeredUsers,
        errors,
        successMessage,
        errorMessage,
        isAuthenticated,
        signIn,
        signUp,
        loadingRegisteredUsers,
        getRegisteredUsers,
        signOut
    }
})