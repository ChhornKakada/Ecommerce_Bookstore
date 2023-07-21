import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { createPinia } from 'pinia'

import './assets/tailwind.css'
import './assets/main.css'

const app = createApp(App)

app.use(router).use(createPinia())

app.mount('#app')
