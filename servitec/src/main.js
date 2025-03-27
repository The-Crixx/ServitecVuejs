import { createApp } from 'vue'
import App from './App.vue'
import router from './router' // Importa la configuración de router

// Crea la aplicación
const app = createApp(App)

// Usa el router
app.use(router)

// Monta la aplicación
app.mount('#app')