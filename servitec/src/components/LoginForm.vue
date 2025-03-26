<template>
    <div class="login-wrapper">
      <div id="login">
        <h1>Inicio de sesión</h1>
        <form @submit.prevent="handleSubmit">
          <label for="nctrl">Ingresa tu número de control:</label>
          <input 
            type="text" 
            id="nctrl" 
            v-model="formData.nctrl" 
            required
          >
          
          <label for="contraseña">Ingresa tu contraseña:</label>
          <input 
            type="password" 
            id="contraseña" 
            v-model="formData.contraseña" 
            required
          >
          
          <button type="submit">Iniciar Sesión</button>
        </form>
        <a href="registro.html">¿Aún no tienes cuenta?</a>
      </div>
  
      <div class="container_img">
        <img 
          ref="logo" 
          src="../assets/img/logito.png"
          class="logito"
          alt="Logo Servitec"
        >
      </div>
    </div>
  </template>
  
  <script>
  import logito from '../assets/img/logito.png';
  export default {
    data() {
      return {
        formData: {
          nctrl: '',
          contraseña: ''
        }
      }
    },
    mounted() {
      // Animación de fade-in para el logo
      this.$refs.logo.style.transition = 'opacity 2s';
      this.$refs.logo.style.opacity = 1;
    },
    methods: {
      handleSubmit() {
        // Emitir evento con los datos del formulario
        this.$emit('submit', this.formData);
        
        // Opcional: Resetear formulario
        this.formData.nctrl = '';
        this.formData.contraseña = '';
      }
    }
  }
  </script>
  
  <style scoped>
  .login-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    min-height: 100vh;
    padding: 2rem;
    font-family: 'Poppins', sans-serif;
  }
  
  #login {
    width: 400px;
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  h1 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 1.5rem;
  }
  
  form {
    display: flex;
    flex-direction: column;
    gap: 1.2rem;
  }
  
  label {
    font-weight: 500;
    color: #34495e;
  }
  
  input {
    padding: 0.8rem;
    border: 2px solid #bdc3c7;
    border-radius: 5px;
    font-size: 1rem;
    width: 100%;
    margin-top: 0.3rem;
  }
  
  button {
    background-color: #3498db;
    color: white;
    padding: 1rem;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  
  button:hover {
    background-color: #2980b9;
  }
  
  a {
    display: block;
    text-align: center;
    margin-top: 1rem;
    color: #3498db;
    text-decoration: none;
  }
  
  .container_img {
    flex: 1;
    display: flex;
    justify-content: center;
  }
  
  .logito {
    max-width: 600px;
    opacity: 0; /* Inicialmente invisible */
  }
  </style>