<!-- filepath: c:\xampp\htdocs\vue\servitec\src\components\TestComponent.vue -->
<template>
    <div>
      <h1>Prueba de Componente</h1>
      <!-- Monta aquí el componente que deseas probar -->
      <UserTable 
        @edit-user="handleEditUser"
        @open-add-modal="handleOpenAddModal"
      />
    </div>
  </template>
  
  <script>
  import UserTable from './UserTable.vue'; // Importa el componente que deseas probar
  
  export default {
    components: {
      UserTable,
    },
    methods: {
      handleEditUser(user) {
        console.log('Editar usuario:', user);
      },
      handleOpenAddModal() {
        console.log('Abrir modal para agregar usuario');
      },
    },
  };
  </script>