<template>
    <div class="admin-dashboard">
      <h1>Panel de Administración</h1>
      <div class="admin-info">
        <p>Bienvenido, Administrador</p>
        <p>Número de Control: {{ adminControlNumber }}</p>
      </div>
      
      <div class="admin-actions">
        <h2>Acciones de Administrador</h2>
        <div class="action-buttons">
          <button @click="manageUsers">Gestionar Usuarios</button>
          <button @click="viewReports">Gestionar Comentarios</button>
        </div>
      </div>
  
      <router-view></router-view>
  
      <button @click="logout" class="logout-button">Cerrar Sesión</button>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  import { useRouter } from 'vue-router'
  
  const router = useRouter()
  
  // Datos de ejemplo para el administrador
  const adminControlNumber = ref(localStorage.getItem('nctrl') || 'N/A')
  const totalUsers = ref(50)
  const activeUsers = ref(38)
  const inactiveUsers = ref(12)
  
  // Métodos de acciones de administrador
  const manageUsers = () => {
    // Lógica para gestionar usuarios
    router.push('/Admintabla')
    alert('Funcionalidad de gestión de usuarios')
  }
  
  const viewReports = () => {
    // Lógica para ver reportes
    alert('Funcionalidad de reportes')
    router.push('/Admincomments')
  }

  const logout = () => {
    // Limpiar datos de localStorage
    localStorage.removeItem('username')
    localStorage.removeItem('nctrl')
    
    // Redireccionar a login
    router.push('/')
  }
  
  // Ejemplo de cómo podrías cargar datos al montar el componente
  onMounted(() => {
    // Aquí podrías hacer una llamada a tu backend para obtener estadísticas reales
    console.log('Admin dashboard mounted')
  })
  </script>
  
  <style scoped>
  .admin-dashboard {
    background-color: white;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  
    width: 100%;
    text-align: center;
  }
  
  .admin-info {
    background-color: #f4f4f4;
    padding: 10px;
    border-radius: 8px;
    margin-bottom:10px;
  }
  
  .admin-actions {
    margin-bottom: 30px;
  }
  
  .action-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
  }
  
  .action-buttons button {
    background-color: rgb(24,57,106);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
    transition: background-color 0.3s ease;
  }
  
  .action-buttons button:hover {
    background-color: rgb(36, 85, 159);
  }
  
  .quick-stats {
    margin-bottom: 15px;
  }
  
  .stats-grid {
    display: flex;
    justify-content: center;
    gap: 20px;
  }
  
  .stat-card {
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 8px;
    width: 200px;
  }
  
  .stat-card h3 {
    margin-bottom: 10px;
    color: rgb(24,57,106);
  }
  
  .logout-button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
  }
  
  .logout-button:hover {
    background-color: #c82333;
  }
  </style>