<template>
    <div id="registro">
      <h1>Registro</h1>
      <form @submit.prevent="handleRegistro">
        <label for="nctrl">Número de Control:</label>
        <input 
          type="text" 
          id="nctrl" 
          v-model="controlNumber" 
          required
        >
        
        <label for="nombre">Nombre Completo:</label>
        <input 
          type="text" 
          id="nombre" 
          v-model="fullName" 
          required
        >
        
        <label for="contraseña">Contraseña:</label>
        <input 
          type="password" 
          id="contraseña" 
          v-model="password" 
          required
        >
        
        <label for="confirmar-contraseña">Confirmar Contraseña:</label>
        <input 
          type="password" 
          id="confirmar-contraseña" 
          v-model="confirmPassword" 
          required
        >
        
        <button type="submit">Registrarse</button>
      </form>
      <router-link to="/">¿Ya tienes cuenta?</router-link>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { useRouter } from 'vue-router'
  
  const controlNumber = ref('')
  const fullName = ref('')
  const password = ref('')
  const confirmPassword = ref('')
  
  const router = useRouter()
  
  const handleRegistro = () => {
    // Validate passwords match
    if (password.value !== confirmPassword.value) {
      alert('Las contraseñas no coinciden')
      return
    }
  
    // Here you would typically make an API call to register
    // For now, we'll simulate a registration
    try {
      // Simulated registration logic
      if (controlNumber.value && fullName.value && password.value) {
        // In a real app, you'd send this to your backend
        console.log('Registro:', {
          controlNumber: controlNumber.value,
          fullName: fullName.value
        })
  
        // Redirect to login after successful registration
        router.push('/')
      } else {
        alert('Por favor, llena todos los campos')
      }
    } catch (error) {
      console.error('Error en registro:', error)
      alert('Error al registrar')
    }
  }
  </script>
  
  <style scoped>
  #registro {
    max-width: 30vw;
    padding: 15px;
    width: 35vw;
    background-color: white;
    border-radius: 10px;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
  }
  
  #registro form {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  
  #registro input {
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-family: 'Poppins', sans-serif;
  }
  
  #registro button {
    padding: 10px;
    background-color: rgb(24,57,106);
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
  }
  
  #registro a {
    display: block;
    text-align: center;
    margin-top: 10px;
    text-decoration: none;
    color: rgb(24,57,106);
  }
  </style>