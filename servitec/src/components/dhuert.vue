<template>
    <div class="container">
      <h1 class="department-title">Huertos Urbanos</h1>
  
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
        <img src="/img/brig.jpeg" alt="Ubicación del Departamento de Huertos Urbanos" class="location-image">
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
          { title: "Información del Departamento", text: "Oficina del PAI encargada de la educación ambiental y la sustentabilidad dentro de la institución." },
          { title: "Jefe del Departamento", text: "Mari Trini Flores Castañeda" },
          { 
            title: "Actividades", 
            list: [
              "Faena general del HE",
              "Mantenimiento de parches polinizadores",
              "Capacitación SEDEMA",
              "Trabajo comunitario de limpieza en la Laguna del Chirimoyo",
              "Muestreo de polinizadores",
              "Muestreo Naturalista"
            ]
          }
        ]
      };
    },
    methods: {
      mostrarInteres() {
        const departamento = "Departamento de Huertos Urbanos";
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
    color: #16a34a; /* Cambiar color del título */
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
    color: #16a34a; /* Cambiar color del título */
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
    background: #16a34a; /* Cambiar color de los botones */
    color: white;
    text-decoration: none;
    border-radius: 8px;
    transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
  }
  
  .back-button:hover, .interest-button:hover {
    background: #15803d; /* Cambiar color de hover de los botones */
    transform: scale(1.1);
  }
  </style>
