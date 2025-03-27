<template>
  <div id="login">
    <h1>Inicio de sesión</h1>
    <form @submit.prevent="handleLogin">
      <label for="nctrl">Ingresa tu numero de control:</label>
      <input 
        type="text" 
        id="nctrl" 
        v-model="controlNumber" 
        required
      >
      <label for="contraseña">Ingresa tu contraseña</label>
      <input 
        type="password" 
        id="contraseña" 
        v-model="password" 
        required
      >
      <button type="submit">Iniciar Sesion</button>
    </form>
    <router-link to="/registro">¿Aun no tienes cuenta?</router-link>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

// Define reactive variables for form inputs
const controlNumber = ref('')
const password = ref('')

// Initialize router
const router = useRouter()

// Login handler method
const handleLogin = async () => {
  try {
    // Create FormData to send data
    const formData = new FormData()
    formData.append('nctrl', controlNumber.value)
    formData.append('contraseña', password.value)

    // Make POST request using Fetch API
    const response = await fetch('http://localhost/vue/backend/login.php', {
      method: 'POST',
      body: formData
    })

    // Parse JSON response
    const data = await response.json()

    // Handle different login scenarios
    if (data.status === 'success') {
      // Store user information in localStorage
      localStorage.setItem('username', data.username)
      localStorage.setItem('nctrl', data.nctrl)

      // Redirect based on user type
      if (controlNumber.value === '21011015' && password.value === 'admin') {
        router.push('/admin')
      } else {
        router.push('/dashboard')
      }
    } else {
      // Show error message
      alert(data.message || 'Error de inicio de sesión')
    }
  } catch (error) {
    console.error('Login error:', error)
    alert('Error al intentar iniciar sesión')
  }
}
</script>

<style scoped>
#login {
  max-width: 30vw;
  padding: 15px;
  width: 35vw;
  height: 70vh;
  background-color: white;
  border-radius: 10px;
  box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
}

#login h1 {
  text-align: center;
  color: black;
  font-weight: 100;
}

#login form {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

#login label {
  color: black;
  font-size: 16px;
}

#login input {
  padding: 8px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-family: 'Poppins', sans-serif;
  color: #00000098;
}

#login button {
  padding: 10px;
  background-color: rgb(24,57,106);
  color: white;
  font-size: 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 8vw;
  font-family: 'Poppins', sans-serif;
}

#login a {
  text-decoration: none;
  font-size: 15px;
  color: rgb(24,57,106);
  font-family: 'Poppins', sans-serif;
}

#login a:hover {
  text-decoration: underline;
}
</style>