<template>
    <div class="container">
      <h1 class="department-title">Brigadas de Seguridad Escolar</h1>
  
      <div v-for="(section, index) in sections" :key="index" 
           :class="['info-card', index % 2 === 0 ? 'slide-left' : 'slide-right']">
        <h3 class="section-title">{{ section.title }}</h3>
        <p v-if="section.text">{{ section.text }}</p>
        <ul v-if="section.list">
          <li v-for="(item, i) in section.list" :key="i">{{ item }}</li>
        </ul>
      </div>
  
      <div class="info-card slide-left">
        <h3 class="section-title">Ubicación</h3>
        <p>A continuación, se muestra una imagen con la ubicación del departamento:</p>
        <img src="/img/brig.jpeg" alt="Ubicación del Departamento de Brigadas" class="location-image">
      </div>
  
  
      <div class="button-container">
        <router-link to="/" class="back-button">Regresar</router-link>
        <button @click="mostrarInteres" class="interest-button">Me interesa</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        sections: [
          { title: "Información del Departamento", text: "Participa en actividades orientadas al bienestar de la comunidad universitaria y su entorno. Su labor puede incluir la promoción de la salud, la seguridad, la educación ambiental y la organización de eventos solidarios." },
          { title: "Jefe del Departamento", text: "Elizabeth Cruz Aguilar" },
          { 
            title: "Actividades", 
            list: [
              "Capacitaciones de primeros auxilios",
              "Asistir a eventos internos y externos para actuar en caso de algún problema",
              "Capacitación SEDEMA",
              "Guardias alrededor del tecnológico",
              "Actividades varias dentro del departamento"
            ]
          }
        ]
      };
    },
    methods: {
      mostrarInteres() {
        const departamento = "Departamento de Brigadas";
        const return_url = window.location.href;
        fetch("http://localhost/vue/php/get_interes.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ departamento, return_url })
        })
        .then(response => response.text())
        .then(data => alert(data))
        .catch(error => {
          console.error("Error:", error);
          alert("Ocurrió un error al registrar el interés.");
        });
      }
    }
  };
  </script>
  
  <style scoped>
  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    padding: 20px;
  }
  
  .department-title {
    font-size: 2rem;
    font-weight: bold;
    color: #dc2626; /* Cambiar color del título */
    text-align: center;
    margin-bottom: 20px;
  }
  
  .info-card {
    width: 80%;
    padding: 20px;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    opacity: 0;
    animation: slide-in 1s ease-in-out forwards;
  }
  
  /* Animación de entrada */
  .slide-left {
    transform: translateX(-100%);
  }
  
  .slide-right {
    transform: translateX(100%);
  }
  
  @keyframes slide-in {
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
  
  .section-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #dc2626; /* Cambiar color del título */
    text-align: center;
  }
  
  .location-image {
    width: 100%;
    max-width: 600px;
    border-radius: 12px;
    margin: 15px auto;
    display: block;
    transition: transform 0.3s ease-in-out;
  }
  
  .location-image:hover {
    transform: scale(1.05);
  }
  
  .button-container {
    display: flex;
    justify-content: space-between;
    width: 80%;
  }
  
  .back-button, .interest-button {
    padding: 12px 20px;
    background: #dc2626; /* Cambiar color de los botones */
    color: white;
    text-decoration: none;
    border-radius: 8px;
    transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
  }
  
  .back-button:hover, .interest-button:hover {
    background: #b91c1c; /* Cambiar color de hover de los botones */
    transform: scale(1.1);
  }
  </style>
