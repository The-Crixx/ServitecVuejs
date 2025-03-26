<!-- filepath: c:\xampp\htdocs\vue\servitec\src\components\TestComponent.vue -->
<template>
    <div>
      <h1>Prueba de Componente: UserTable</h1>
      <!-- Monta aquí el componente UserTable -->
      <UserTable 
        @edit-user="handleEditUser"
        @open-add-modal="handleOpenAddModal"
      />
    </div>
  </template>
  
  <script>
  import { reactive } from 'vue';
  import UserTable from './UserTable.vue'; // Importa el componente que deseas probar
  
  export default {
    components: {
      UserTable,
    },
    setup() {
      // Datos simulados para la tabla
      const mockUsers = reactive({
        data: [
          { nctrl: '12345', nombre: 'Juan', apellidos: 'Pérez', carrera: 'Sistemas', cred: 200 },
          { nctrl: '67890', nombre: 'Ana', apellidos: 'López', carrera: 'Industrial', cred: 180 },
          { nctrl: '11223', nombre: 'Luis', apellidos: 'Martínez', carrera: 'Electrónica', cred: 150 },
        ],
      });
  
      // Métodos para manejar eventos
      const handleEditUser = (user) => {
        console.log('Editar usuario:', user);
      };
  
      const handleOpenAddModal = () => {
        console.log('Abrir modal para agregar usuario');
      };
  
      return {
        mockUsers,
        handleEditUser,
        handleOpenAddModal,
      };
    },
  };
  </script>
  
  <style>
  /* Estilos opcionales para el componente de prueba */
  body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 20px;
  }
  
  h1 {
    color: #003366; /* Azul oscuro */
    margin-bottom: 20px;
  }
  </style>