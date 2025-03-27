<template>
  <div class="container">
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
      <img src="/img/lab.jpeg" alt="Ubicación del Departamento de Cómputo" class="location-image">
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
        { title: "Información del Departamento", text: "Centro de Cómputo con 10 laboratorios para clase y 3 equipos disponibles para préstamo a los alumnos del ITO." },
        { title: "Jefe del Departamento", text: "Ignacio López Martínez" },
        { 
          title: "Actividades", 
          list: [
            "Control de Entradas de Alumnos y Docentes",
            "Control de Salidas de Alumnos y Docentes",
            "Limpieza de Laboratorios",
            "Control de Inventario",
            "Atención básica a Alumnos y Docentes",
            "Verificar posibles objetos perdidos"
          ]
        }
      ]
    };
  },
  methods: {
    mostrarInteres() {
      const departamento = "Laboratorio de Cómputo";
      const return_url = window.location.href;
      fetch("http://localhost/ServitecVuejs/php/get_interes.php", {
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

.info-card {
  width: 80%;
  padding: 20px;
  background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  opacity: 0;
  transform: translateX(-100%);
  animation: slide-in 1s ease-in-out forwards;
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
  color: #0d9488; /* Cambiar color del título */
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
  background: #0d9488; /* Cambiar color de los botones */
  color: white;
  text-decoration: none;
  border-radius: 8px;
  transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
}

.back-button:hover, .interest-button:hover {
  background: #0f766e; /* Cambiar color de hover de los botones */
  transform: scale(1.1);
}
</style>
