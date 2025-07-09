import axios from "axios"

export const API = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL
})

export const authHeader = (token: string) => {
    return {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }        
    }
}