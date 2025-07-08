<script setup lang="ts">
    import { onMounted } from 'vue'

    onMounted(()=> {
        document.title = "ChatRoom - Chat Messages"
    })
</script>

<template>
    <div class="flex flex-col items-center justify-between mt-20 space-x-4">
        <div class="w-9/12 h-[600px] bg-white border border-gray-200 shadow">
            <div class="border-b border-b-gray-200 flex items-center justify-between p-3">
                <h1 class="text-center text-4xl text-emerald-500 font-roboto">Chat<strong class="font-bold">Room</strong></h1>
                <div class="flex items-center justify-between space-x-6">
                    <div class="flex flex-col items-start space-x-2">
                        <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                        <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                    </div>
                    <button type="button" class="font-roboto text-white bg-red-500 rounded-2xl px-4 py-2 cursor-pointer">Sign Out</button>
                </div>
            </div>
            <div class="flex items-start justify-between">
                <nav class="w-4/12 h-[500px] border-r-2 border-gray-100 overflow-y-scroll">
                    <ul class="divide-y divide-gray-100">
                        <li>
                            <a href="" class="px-4 py-2 block hover:bg-emerald-50">
                                <div class="flex flex-col items-start space-x-2">
                                    <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                                    <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="px-4 py-2 block hover:bg-emerald-50">
                                <div class="flex flex-col items-start space-x-2">
                                    <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                                    <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="px-4 py-2 block hover:bg-emerald-50">
                                <div class="flex flex-col items-start space-x-2">
                                    <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                                    <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="px-4 py-2 block hover:bg-emerald-50">
                                <div class="flex flex-col items-start space-x-2">
                                    <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                                    <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="px-4 py-2 block hover:bg-emerald-50">
                                <div class="flex flex-col items-start space-x-2">
                                    <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                                    <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="px-4 py-2 block hover:bg-emerald-50">
                                <div class="flex flex-col items-start space-x-2">
                                    <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                                    <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="px-4 py-2 block hover:bg-emerald-50">
                                <div class="flex flex-col items-start space-x-2">
                                    <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                                    <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="px-4 py-2 block hover:bg-emerald-50">
                                <div class="flex flex-col items-start space-x-2">
                                    <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                                    <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="px-4 py-2 block hover:bg-emerald-50">
                                <div class="flex flex-col items-start space-x-2">
                                    <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                                    <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="px-4 py-2 block hover:bg-emerald-50">
                                <div class="flex flex-col items-start space-x-2">
                                    <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                                    <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="w-8/12">
                    <div class="px-4 py-2 w-full bg-gray-100 border-b border-gray-200">
                        <p class="text-gray-500 font-semibold font-roboto">Tanvir Ahmed</p>
                        <p class="text-gray-500 text-base font-roboto">tanvir.ahmed@gmail.com</p>
                    </div>
                    <!-- <div class="h-96 flex flex-col items-center justify-center">
                        <p class="text-lg text-gray-700 font-roboto text-center">Please Wait</p>
                        <p class="text-xs text-gray-700 font-roboto text-center">Loading chat messages...</p>
                    </div> -->
                    <!-- <div class="h-96 flex flex-col items-center justify-center">
                        <p class="text-lg text-gray-500 font-roboto text-center">No Message Found</p>
                    </div> -->
                    <div class="h-96 flex flex-col overflow-y-scroll">
                        <ul class="flex flex-col items-end justify-end space-y-1">
                            <li class="mx-5 my-1.5">
                                <p class="font-roboto text-white bg-emerald-400 text-base rounded-3xl px-3 py-1">Hi there !</p>
                                <p class="font-roboto text-[8px] text-gray-500 text-right">30th Nov, 2025 02:30 PM</p>
                            </li>
                        </ul>
                        <ul class="flex flex-col items-start space-y-1">
                            <li class="mx-10 my-1.5">
                                <p class="font-roboto text-gray-700 bg-gray-200 text-base rounded-3xl px-3 py-1">Hello !</p>
                                <p class="font-roboto text-[8px] text-gray-500 text-right">30th Nov, 2025 02:30 PM</p>
                            </li>
                        </ul>
                        <ul class="flex flex-col items-end justify-end space-y-1">
                            <li class="mx-10 my-1.5">
                                <p class="font-roboto text-white bg-emerald-400 text-base rounded-3xl px-3 py-1">How are doing ?</p>
                                <p class="font-roboto text-[8px] text-gray-500 text-right">30th Nov, 2025 02:30 PM</p>
                            </li>
                        </ul>
                        <ul class="flex flex-col items-start space-y-1">
                            <li class="mx-10 my-1.5">
                                <p class="font-roboto text-gray-700 bg-gray-200 text-base rounded-3xl px-3 py-1">Fine</p>
                                <p class="font-roboto text-[8px] text-gray-500 text-right">30th Nov, 2025 02:30 PM</p>
                            </li>
                        </ul>
                        <ul class="flex flex-col items-start space-y-1">
                            <li class="mx-10 my-1.5">
                                <p class="font-roboto text-gray-700 bg-gray-200 text-base rounded-3xl px-3 py-1">What about you ?</p>
                                <p class="font-roboto text-[8px] text-gray-500 text-right">30th Nov, 2025 02:30 PM</p>
                            </li>
                        </ul>
                        <ul class="flex flex-col items-end justify-end space-y-1">
                            <li class="mx-10 my-1.5">
                                <p class="font-roboto text-white bg-emerald-400 text-base rounded-3xl px-3 py-1">I'm doing greate ?</p>
                                <p class="font-roboto text-[8px] text-gray-500 text-right">30th Nov, 2025 02:30 PM</p>
                            </li>
                        </ul>
                        <ul class="flex flex-col items-end justify-end space-y-1">
                            <li class="mx-10 my-1.5">
                                <p class="font-roboto text-white bg-emerald-400 text-base rounded-3xl px-3 py-1">Let's have a chat today ?</p>
                                <p class="font-roboto text-[8px] text-gray-500 text-right">30th Nov, 2025 02:30 PM</p>
                            </li>
                        </ul>
                        <ul class="flex flex-col items-start space-y-1">
                            <li class="mx-10 my-1.5">
                                <p class="font-roboto text-gray-700 bg-gray-200 text-base rounded-3xl px-3 py-1">Ok. In the afternoon</p>
                                <p class="font-roboto text-[8px] text-gray-500 text-right">30th Nov, 2025 02:30 PM</p>
                            </li>
                        </ul>
                        <ul class="flex flex-col items-start space-y-1">
                            <li class="mx-10 my-1.5">
                                <p class="font-roboto text-gray-700 bg-gray-200 text-base rounded-3xl px-3 py-1">I'll be busy till lunch</p>
                                <p class="font-roboto text-[8px] text-gray-500 text-right">30th Nov, 2025 02:30 PM</p>
                            </li>
                        </ul>
                    </div>
                    <div class="flex border-t border-b border-gray-300 bg-gray-50 p-4 items-center space-x-3">
                        <input type="text" class="text-gray-600 text-lg w-9/12 font-roboto outline-0 focus:ring-2 focus:ring-emerald-300 border-2 border-gray-200 px-3 py-1.5 rounded-xl" placeholder="What's on your mind ?">
                        <button type="submit" class="text-white font-roboto w-3/12 rounded-2xl cursor-pointer bg-emerald-600 px-4 py-2.5" autocomplete="off">Send</button>
                    </div>
                    <!-- <p class="font-roboto text-gray-500 text-sm"><strong>Asif Khan</strong> is typing...</p> -->
                </div>
                <!-- <div class="w-8/12 flex flex-col items-center justify-center">
                    <h1 class="text-center font-roboto text-gray-700 text-2xl">Welcome to ChatRoom</h1>
                    <p class="text-center font-roboto text-gray-500 text-lg">Please select user to chat</p>
                </div> -->
            </div>
        </div>
    </div>
</template>