import { API, authHeader } from "./base"
import { type NewChatMessageModel } from "../store/chatMessageStore"

export const getMessages = (receiverId: number, token: string) => {
    return API.get(`messages/${receiverId}`, authHeader(token))
}

export const sendMessage = (message: NewChatMessageModel, token: string) => {
    return API.post('messages', message, authHeader(token))
}