<script setup lang="ts">
    import { onMounted } from 'vue'

    onMounted(()=> {
        document.title = "ChatRoom - Sign In"
    })
</script>

<template>
    <div class="flex flex-col items-center justify-center h-screen space-x-4">
        <h1 class="text-center text-4xl text-emerald-500 mb-10 font-roboto">Chat<strong class="font-bold">Room</strong></h1>
        <div class="w-3/12 bg-white border border-gray-200 shadow rounded-2xl">
            <div class="border-b border-b-gray-200">
                <h2 class="text-xl text-center text-gray-700 py-3 font-roboto">Sign In</h2>
            </div>
            <!-- <div class="bg-red-100">
                <p class="text-red-700 px-4 py-2 font-roboto">Wrong credentials</p>
            </div> -->
            <form action="" class="m-4 flex flex-col space-y-3">
                <div class="flex flex-col space-y-1.5">
                    <label for="email" class="text-lg text-gray-600 cursor-pointer font-roboto">Email address <span class="text-red-500">*</span></label>
                    <input type="text" id="email" class="text-gray-600 text-lg font-roboto outline-0 focus:ring-2 focus:ring-emerald-300 border-2 border-gray-200 px-3 py-1.5 rounded-xl" autocomplete="off" placeholder="Email address">
                    <p class="text-red-700 text-xs font-roboto"></p>
                </div>
                <div class="flex flex-col space-y-1.5">
                    <label for="password" class="text-lg text-gray-600 cursor-pointer font-roboto">Password <span class="text-red-500">*</span></label>
                    <input type="password" id="password" class="text-gray-600 text-lg font-roboto outline-0 focus:ring-2 focus:ring-emerald-300 border-2 border-gray-200 px-3 py-1.5 rounded-xl" autocomplete="off" placeholder="Password">
                    <p class="text-red-700 text-xs font-roboto"></p>
                </div>
                <div class="flex flex-col items-center space-y-1.5 mt-3">
                    <button type="submit" class="w-full text-white font-roboto rounded-2xl cursor-pointer bg-emerald-600 px-4 py-2">Sign In</button>
                    <RouterLink :to="{name: 'signup'}" class="text-lg font-roboto text-gray-600 hover:text-emerald-600">Create an Account</RouterLink>
                </div>                
            </form>
        </div>
    </div>
</template>