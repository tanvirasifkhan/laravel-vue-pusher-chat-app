<script setup lang="ts">
  import { configureEcho } from "@laravel/echo-vue"
  import { useAuthStore } from "./store/authStore"

  const  authStore = useAuthStore()
 
  configureEcho({
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
          Authorization: "Bearer " + authStore.getToken(),
          Accept: "application/json"
        }
      }
  });
</script>

<template>
  <RouterView />
</template>