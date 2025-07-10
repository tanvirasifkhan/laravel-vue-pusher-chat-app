import { defineStore } from 'pinia'
import { ref, type Ref } from 'vue'
import { useAuthStore } from './authStore'
import { getMessages, sendMessage } from '../api/chat'

export interface ChatMessageUserModel {
    id: number,
    name: string,
    email: string
}

export interface NewChatMessageModel {
    receiver_id: number,
    message: string
}

export interface ChatMessageModel {
    id: number,
    sender: ChatMessageUserModel,
    receiver: ChatMessageUserModel,
    message: string,
    datetime: string
}

export const useChatMessageStore = defineStore('chatMessage', () => {

    const chatMessages: Ref<ChatMessageModel[]> = ref([])

    const loadingMessages: Ref<boolean> = ref(false)

    const selectedUser: Ref<ChatMessageUserModel | null> = ref(null)

    const authStore = useAuthStore()

    const scrollToBottom = (id: string) => {
        const messagesContainer = document.getElementById(id)
        if (messagesContainer) {
            messagesContainer.scrollTop = messagesContainer.scrollHeight
        }
    }

    const getChatMessages = async (receiverId: number) => {
        loadingMessages.value = true

        try {
            const response = await getMessages(receiverId, authStore.getToken() as string)
            chatMessages.value = response.data?.data?.messages
            selectedUser.value = response.data?.data?.receiver
            loadingMessages.value = false
            scrollToBottom('messagesContainer')
        } catch (error) {
            console.error(error)
        } finally {
            loadingMessages.value = false
        }
    }

    const sendNewMessage = async (message: NewChatMessageModel) => {
        try {
            const response = await sendMessage(message, authStore.getToken() as string)
            chatMessages.value.push(response.data?.data)
        } catch (error) {
            console.error(error)
        }
    }

    return {
        chatMessages,
        loadingMessages,
        selectedUser,
        getChatMessages,
        sendNewMessage,
        scrollToBottom
    }
})