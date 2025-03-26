<template>
  <div>
    <header class="bg-primary text-white text-center py-3">
      <h1>Bienvenido a ServiTec, {{ username }}</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="principal.php">ServiTec</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Departamentos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="departamento.php?id=dp1">Centro de Computo</a>
                <a class="dropdown-item" href="departamento.php?id=dp2">Alfabetización de Adultos Mayores</a>
                <a class="dropdown-item" href="departamento.php?id=dp3">Huertos Urbanos</a>
                <a class="dropdown-item" href="departamento.php?id=dp4">Brigadista</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="docs.html">Guía para Documentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="interes.php">Interés</a>
            </li>
            <li v-if="isAdmin" class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="adminDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Administrador
              </a>
              <div class="dropdown-menu" aria-labelledby="adminDropdown">
                <a class="dropdown-item" href="admin.php">Usuario</a>
                <a class="dropdown-item" href="comentarios.php">Comentarios</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-4 mb-4" v-for="card in cards" :key="card.title">
          <div class="card h-100">
            <img :src="card.image" class="card-img-top" :alt="card.alt" />
            <div class="card-body">
              <h5 class="card-title">{{ card.title }}</h5>
              <p class="card-text">{{ card.text }}</p>
              <a :href="card.link" class="btn btn-primary">Leer más</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: "Usuario", // Replace with dynamic data as needed
      isAdmin: false, // Replace with dynamic data as needed
      cards: [
        {
          image: "img/lab.jpeg",
          alt: "Centro de Computo",
          title: "Centro de Computo",
          text: "Información sobre el Centro de Computo.",
          link: "dlab.html",
        },
        {
          image: "img/ivea.png",
          alt: "Alfabetización de Adultos Mayores",
          title: "Alfabetización de Adultos Mayores",
          text: "Información sobre la Alfabetización de Adultos Mayores.",
          link: "divea.html",
        },
        {
          image: "img/huertos.jpeg",
          alt: "Huertos Urbanos",
          title: "Huertos Urbanos",
          text: "Información sobre los Huertos Urbanos.",
          link: "dhuert.html",
        },
        {
          image: "img/brigadas.png",
          alt: "Brigadista",
          title: "Brigadista",
          text: "Información sobre el trabajo de Brigadista.",
          link: "dbrig.html",
        },
        {
          image: "img/docs.jpg",
          alt: "Guía para Documentos",
          title: "Guía para Documentos",
          text: "Información sobre la guía para documentos necesarios.",
          link: "docs.html",
        },
      ],
    };
  },
};
</script>

<style scoped>
/* Add any scoped styles here if needed */
</style>
