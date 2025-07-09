import { defineStore } from "pinia"
import { login, logout, register } from "../api/auth"
import { ref, type Ref } from "vue"

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

export const useAuthStore = defineStore("auth", ()=> {

    const setUser = (user: AuthModel | null) => localStorage.setItem("user", JSON.stringify(user))

    const getUser = (): AuthModel | null => localStorage.getItem("user") ? JSON.parse(localStorage.getItem("user") as string) : null

    const getToken = (): string | null => getUser()?.token || null

    const registeredUsers: Ref<RegisteredUserModel[]> = ref([])

    const errors = ref<any>({})

    const errorMessage = ref<string>("")

    const successMessage = ref<string>("")

    const isAuthenticated = (): boolean => getUser() !== null

    const signIn = async (user: LoginUserModel) => {
        try{
            const response = await login(user)
            
            setUser(response.data?.data?.authenticatedUser)

            registeredUsers.value = response.data?.data?.users

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
        signOut
    }
})