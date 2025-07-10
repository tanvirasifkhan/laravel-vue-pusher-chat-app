<script setup lang="ts">
    import { onMounted, type Ref, ref } from 'vue'
    import { useAuthStore } from '../store/authStore'
    import { useChatMessageStore } from '../store/chatMessageStore'
    import { useRoute, useRouter } from 'vue-router'
    import { useToast } from 'vue-toast-notification'
    import { useEcho } from '@laravel/echo-vue'
    
    const authStore = useAuthStore()
    const chatMessageStore = useChatMessageStore()
    const router = useRouter()
    const route = useRoute()
    const $toast = useToast()

    const inputMessage: Ref<string> = ref('')

    onMounted(()=> {
        document.title = "ChatRoom - Chat Messages"
    })

    onMounted(() => {
        if (!authStore.isAuthenticated()) {
            router.push({ name: 'signin' })
        }
    })

    onMounted(() => {
        if(chatMessageStore.selectedUser === null) {
            router.push({ name: 'chat'})
        }
    })    

    const logout = async () => {
        try{
            await authStore.signOut()
            router.push({ name: 'signin' })
            $toast.success(authStore.successMessage)
        } catch (error) {
            console.error(error)
        }
    }

    const sendMessage = async () => {
        try {
            const newMessage = {
                receiver_id: Number.parseInt(route.params.receiverId.toString()),
                message: inputMessage.value
            }
            await chatMessageStore.sendNewMessage(newMessage)
            inputMessage.value = ''
            chatMessageStore.scrollToBottom('messagesContainer')
        } catch (error) {
            console.error(error)
        }       
    }  

    onMounted(async () => await authStore.getRegisteredUsers())     

    useEcho(`chat.${authStore.getUser()?.id}`, ".chat.message.sent", (event: any) => {
        chatMessageStore.chatMessages.push(event.message)
        chatMessageStore.scrollToBottom('messagesContainer')
    })
</script>

<template>
    <div class="flex flex-col items-center justify-between mt-20 space-x-4">
        <div class="w-9/12 h-[600px] bg-white border border-gray-200 shadow">
            <div class="border-b border-b-gray-200 flex items-center justify-between p-3">
                <h1 class="text-center text-4xl text-emerald-500 font-roboto">Chat<strong class="font-bold">Room</strong></h1>
                <div class="flex items-center justify-between space-x-6">
                    <div class="flex flex-col items-start space-x-2">
                        <p class="text-gray-500 font-semibold font-roboto">{{ authStore.getUser()?.name }}</p>
                        <p class="text-gray-500 text-base font-roboto">{{ authStore.getUser()?.email }}</p>
                    </div>
                    <button type="button" @click.prevent="logout" class="font-roboto text-white bg-red-500 rounded-2xl px-4 py-2 cursor-pointer">Sign Out</button>
                </div>
            </div>
            <div class="flex" :class="authStore.loadingRegisteredUsers || authStore.registeredUsers.length === 0 || chatMessageStore.selectedUser === null ? 'items-center justify-center' : 'items-start justify-between'">
                <div class="w-4/12" v-if="authStore.loadingRegisteredUsers">
                    <h1 class="text-lg text-gray-500 font-roboto text-center">Loading users...</h1>
                </div>
                <div class="w-4/12" v-else-if="authStore.registeredUsers.length === 0">
                    <h1 class="text-gray-500 font-roboto text-center">No user found to chat</h1>
                </div>                
                <nav v-else class="w-4/12 h-[500px] border-r-2 border-gray-100 overflow-y-scroll">
                    <ul class="divide-y divide-gray-100">
                        <li v-for="user in authStore.registeredUsers" :key="user.id">
                            <RouterLink :to="{name: 'chat_messages', params: {receiverId: user.id}}" @click.prevent="chatMessageStore.getChatMessages(user.id)" class="px-4 py-2 block hover:bg-emerald-50" :class="chatMessageStore.selectedUser?.id === user.id ? 'bg-emerald-50' : ''">
                                <div class="flex flex-col items-start space-x-2">
                                    <p class="text-gray-500 font-semibold font-roboto">{{ user.name }}</p>
                                    <p class="text-gray-500 text-base font-roboto">{{ user.email }}</p>
                                </div>
                            </RouterLink>
                        </li>
                    </ul>
                </nav>
                <div class="w-8/12" v-if="chatMessageStore.selectedUser !== null">
                    <div class="px-4 py-2 w-full bg-gray-100 border-b border-gray-200">
                        <p class="text-gray-500 font-semibold font-roboto">{{ chatMessageStore.selectedUser?.name }}</p>
                        <p class="text-gray-500 text-base font-roboto">{{ chatMessageStore.selectedUser?.email }}</p>
                    </div>
                    <div v-if="chatMessageStore.loadingMessages" class="h-96 flex flex-col items-center justify-center">
                        <p class="text-lg text-gray-700 font-roboto text-center">Please Wait</p>
                        <p class="text-xs text-gray-700 font-roboto text-center">Loading chat messages...</p>
                    </div>
                    <div v-if="!chatMessageStore.loadingMessages && chatMessageStore.chatMessages.length === 0" class="h-96 flex flex-col items-center justify-center">
                        <p class="text-lg text-gray-500 font-roboto text-center">No Message Found</p>
                    </div>
                    <div id="messagesContainer" v-if="!chatMessageStore.loadingMessages && chatMessageStore.chatMessages.length > 0" class="h-96 flex flex-col overflow-y-scroll">
                        <ul v-for="message in chatMessageStore.chatMessages" :key="message.id"
                         class="flex flex-col space-y-1" :class="message.sender?.id === authStore.getUser()?.id ? 'items-end justify-end' : 'items-start'">
                            <li class="mx-5 my-1.5">
                                <p :class="message.sender?.id === authStore.getUser()?.id ? 'text-white bg-emerald-400' : 'text-gray-700 bg-gray-200'" class="font-roboto text-base rounded-3xl px-3 py-1">{{ message.message }}</p>
                                <p class="font-roboto text-[8px] text-gray-500 text-right">{{ message.datetime }}</p>
                            </li>
                        </ul>
                    </div>
                    <form @submit.prevent="sendMessage" class="flex border-t border-b border-gray-300 bg-gray-50 p-4 items-center space-x-3">
                        <input type="text" v-model="inputMessage" class="text-gray-600 text-lg w-9/12 font-roboto outline-0 focus:ring-2 focus:ring-emerald-300 border-2 border-gray-200 px-3 py-1.5 rounded-xl" placeholder="What's on your mind ?">
                        <button type="submit" class="text-white font-roboto w-3/12 rounded-2xl cursor-pointer bg-emerald-600 px-4 py-2.5" autocomplete="off">Send</button>
                    </form>
                    <!-- <p class="font-roboto text-gray-500 text-sm"><strong>Asif Khan</strong> is typing...</p> -->
                </div>
                <div v-else class="w-8/12 flex flex-col items-center justify-center">
                    <h1 class="text-center font-roboto text-gray-700 text-2xl">Welcome to ChatRoom</h1>
                    <p class="text-center font-roboto text-gray-500 text-lg">Please select user to chat</p>
                </div>
            </div>
        </div>
    </div>
</template>