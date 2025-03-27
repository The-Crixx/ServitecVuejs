<template>
  <div class="container mx-auto p-6">
    <div class="flex-container">
      <div v-for="departamento in departamentos" :key="departamento.id" class="card">
        <img :src="departamento.img" :alt="departamento.titulo" class="card-img">
        <div class="card-body">
          <h5 class="card-title">{{ departamento.titulo }}</h5>
          <p class="card-text">{{ departamento.descripcion }}</p>
          <router-link :to="departamento.link" class="btn">Leer más</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      departamentos: [
        { id: 1, titulo: "Centro de Computo", descripcion: "Información sobre el Centro de Computo.", img: "img/lab.jpeg", link: "/dlab" },
        { id: 2, titulo: "Alfabetización de Adultos Mayores", descripcion: "Información sobre la Alfabetización de Adultos Mayores.", img: "img/ivea.png", link: "/divea" },
        { id: 3, titulo: "Huertos Urbanos", descripcion: "Información sobre los Huertos Urbanos.", img: "img/huertos.jpeg", link: "/dhuert" },
        { id: 4, titulo: "Brigadista", descripcion: "Información sobre el trabajo de Brigadista.", img: "img/brigadas.png", link: "/dbrig" },
        { id: 5, titulo: "Guía para Documentos", descripcion: "Información sobre la guía para documentos necesarios.", img: "img/docs.jpg", link: "/docs" }
      ]
    };
  }
};
</script>

<style scoped>
.container {
  max-width: 100%;
}
.flex-container {
  display: flex;
  gap: 1.5rem;
  flex-wrap: wrap; /* Permite que los elementos se ajusten si no caben en una línea */
  justify-content: center; /* Centra los elementos horizontalmente */
}
.card {
  background: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s;
  width: 300px; /* Define un ancho fijo para las tarjetas */
}
.card:hover {
  transform: translateY(-5px);
}
.card-img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}
.card-body {
  padding: 16px;
}
.card-title {
  font-size: 1.25rem;
  font-weight: bold;
  margin-bottom: 8px;
}
.card-text {
  font-size: 1rem;
  color: #555;
  margin-bottom: 12px;
}
.btn {
  display: inline-block;
  background-color: #1d4ed8;
  color: white;
  padding: 10px 16px;
  text-align: center;
  border-radius: 8px;
  text-decoration: none;
  font-weight: bold;
}
.btn:hover {
  background-color: #1e40af;
}
</style>