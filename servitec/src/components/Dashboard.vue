<!-- filepath: c:\xampp\htdocs\vue\servitec\src\components\Dashboard.vue -->
<template>
  <div class="dashboard">
    <!-- Menú de navegación -->
    <Estructura />
  </div>

  <div class="router-container">
    <router-view></router-view>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'
import Estructura from './estructura.vue'
import Principal from './Principal.vue'
import dlab from './dlab.vue'

const router = useRouter()

const logout = () => {
  // Clear authentication token
  localStorage.removeItem('authToken')
  
  // Redirect to login page
  router.push('/')
}
</script>

<style scoped>
.dashboard {
  display: flex;
  flex-direction: column;
  background-color: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.router-container {
  margin-top: 20px;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 10px;
  background-color: #f9f9f9;
}
</style>