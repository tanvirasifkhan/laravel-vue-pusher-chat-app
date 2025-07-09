import { API, authHeader } from "./base"
import { type LoginUserModel, type RegisterUserModel } from "../store/authStore"

export const login = (user: LoginUserModel) => {
    return API.post("signin", user)
}

export const register = (user: RegisterUserModel) => {
    return API.post("signup", user)
}

export const logout = (token: string) => {
    return API.post("signout", null, authHeader(token))
}