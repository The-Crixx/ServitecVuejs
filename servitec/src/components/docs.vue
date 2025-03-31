<template>
  <div class="main-container">
    <div class="container mx-auto p-6">
      <div class="card">
        <h1 class="title">Guía para el Registro del Servicio Social</h1>
        <h2 class="subtitle">Instrucciones de los documentos requeridos</h2>
        <div class="instructions">
          <ol class="pdf-list">
            <li v-for="(doc, index) in documentos" :key="index" class="pdf-item">
              {{ doc.nombre }}
              <iframe class="pdf-viewer" :src="`/docs/${doc.archivo}`" frameborder="0"></iframe>
            </li>
          </ol>
        </div>
        <h2 class="subtitle">Ubicación del Departamento</h2>
        <p>A continuación, se muestra una imagen con la ubicación del departamento:</p>
        <div class="image-container">
          <img src="/img/ofi.jpeg" alt="Ubicación de servicio social" class="location-image">
        </div>
      </div>
      <router-link to="/dashboard" class="back-button">Regresar</router-link>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      documentos: [
        { nombre: "Solicitud de servicio social", archivo: "1 solicitud servicio social.pdf" },
        { nombre: "Carta compromiso", archivo: "2 carta compromiso.pdf" },
        { nombre: "Carta de asignación", archivo: "3 carta asignacion.pdf" },
        { nombre: "Plan de trabajo", archivo: "4 plan de trabajo.pdf" },
        { nombre: "Primer reporte de actividades", archivo: "5 primer reporte.pdf" },
        { nombre: "Segundo reporte de actividades", archivo: "6 segundo reporte.pdf" },
        { nombre: "Tercer reporte de actividades", archivo: "7 tercer reporte.pdf" },
        { nombre: "Reporte final", archivo: "8 reporte final.pdf" }
      ]
    };
  }
};
</script>

<style scoped>
.main-container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 20px;
  background-color: #f5f5f5; /* Fondo opcional */
  min-height: 100vh; /* Asegura que ocupe toda la altura de la pantalla */
  padding-top: 2300px;
  width: 1450px;

}

.container {
  width: 1400px;
  margin: auto;
  padding: 20px;
  text-align: center;
}

.back-button {
  display: inline-block;
  padding: 10px 15px;
  background: #1d4ed8;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  margin-top: 20px;
  transition: background 0.3s;
}

.back-button:hover {
  background: #1e40af;
}

.card {
  background: white;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
  margin-bottom: 20px;
}

.card:hover {
  transform: translateY(-5px);
}

.title {
  font-size: 1.8rem;
  font-weight: bold;
}

.subtitle {
  font-size: 1.4rem;
  margin-top: 10px;
}

.instructions ol {
  list-style-type: decimal;
  text-align: left;
  margin: auto;
  max-width: 600px;
}

.pdf-list {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
}

.pdf-item {
  flex: 1 1 calc(50% - 20px); /* Two items per row with a gap */
  max-width: 600px;
}

.pdf-viewer {
  width: 100%;
  height: 400px;
  margin-top: 10px;
  border: 1px solid #ddd;
  border-radius: 8px;
}

.image-container {
  margin-top: 10px;
  position: relative;
  overflow: hidden;
  border-radius: 12px;
}

.location-image {
  width: 100%;
  max-width: 300px; /* Ajusta el tamaño de la imagen */
  transition: transform 0.3s ease-in-out;
}

.image-container:hover .location-image {
  transform: scale(1.1);
}
</style>