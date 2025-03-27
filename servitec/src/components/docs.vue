<template>
  <div class="container mx-auto p-6">
    <div class="card">
      <h1 class="title">Guía para el Registro del Servicio Social</h1>
      <h2 class="subtitle">Instrucciones de los documentos requeridos</h2>
      <div class="instructions">
        <ol>
          <li v-for="(doc, index) in documentos" :key="index">
            {{ doc.nombre }}
            <iframe class="pdf-viewer" :src="require(`/assets/docs/${doc.archivo}`)" frameborder="0"></iframe>
          </li>
        </ol>
      </div>
      <h2 class="subtitle">Ubicación del Departamento</h2>
      <p>A continuación, se muestra una imagen con la ubicación del departamento:</p>
      <div class="image-container">
        <img src="/img/ofi.jpeg" alt="Ubicación de servicio social" class="location-image">
      </div>
    </div>
    <router-link to="/" class="back-button">Regresar</router-link>
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
.container {
  max-width: 800px;
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
  max-width: 600px;
  transition: transform 0.3s ease-in-out;
}
.image-container:hover .location-image {
  transform: scale(1.1);
}
</style>