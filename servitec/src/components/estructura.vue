<script setup>
import { RouterLink, RouterView } from 'vue-router';
import { ref } from 'vue';

const showDropdown = ref(false);
</script>

<template>
  <div class="container">
    <header class="header">
      <h1>Bienvenido a ServiTec</h1>
      <nav class="navbar">
        <div class="logo">ServiTec</div>
        <div class="nav-links">
          <router-link to="/Dashboard" class="nav-link">Inicio</router-link>
          <div class="nav-link dropdown" @mouseover="showDropdown = true" @mouseleave="showDropdown = false">
            Departamentos
            <div v-if="showDropdown" class="dropdown-menu">
              <router-link to="/dashboard/dhuert" class="dropdown-item">Huertos Urbanos</router-link>
              <router-link to="/dashboard/dlab" class="dropdown-item">Laboratorio de Cómputo</router-link>
              <router-link to="/dashboard/divea" class="dropdown-item">IVEA</router-link>
              <router-link to="/dashboard/dbrig" class="dropdown-item">Brigadas</router-link>
            </div>
          </div>
          </div>
        <router-link to="/" class="logout">Cerrar sesión</router-link>
      </nav>
    </header>
  </div>
</template>

<style scoped>
.container {
  width: 100%;
  background-color: #0b3d91;
  padding-bottom: 10px;
}

.header {
  text-align: center;
  color: white;
  padding: 15px 0;
  font-size: 24px;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
  background: #ffffff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.logo {
  font-size: 20px;
  font-weight: bold;
  color: #0b3d91;
}

.nav-links {
  display: flex;
  gap: 20px;
}

.nav-link {
  text-decoration: none;
  color: #0b3d91;
  font-weight: bold;
  padding: 10px;
  transition: color 0.3s ease;
}

.nav-link:hover {
  color: #ff5733;
}

.logout {
  text-decoration: none;
  color: red;
  font-weight: bold;
}

.logout:hover {
  text-decoration: underline;
}

.dropdown {
  position: relative;
  cursor: pointer;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  background: white;
  border: 1px solid #ccc;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  z-index: 10;
}

.dropdown-item {
  display: block;
  padding: 10px;
  text-decoration: none;
  color: #0b3d91;
  white-space: nowrap;
}

.dropdown-item:hover {
  background: #f0f0f0;
  color: #ff5733;
}
</style>