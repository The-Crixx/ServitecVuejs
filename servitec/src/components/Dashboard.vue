<template>
    
    
    <div class="dashboard">
      <Estructura />
      <router-view></router-view>
      <button @click="logout">Cerrar Sesión</button>
    </div>
  </template>
  
  <script setup>
  import { useRouter, RouterView } from 'vue-router'
import Estructura from './estructura.vue'
  
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
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    text-align: center;
  }
  
  .dashboard button {
    background-color: rgb(24,57,106);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
  }
  </style>