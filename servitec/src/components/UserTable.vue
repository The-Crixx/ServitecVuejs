<!-- filepath: c:\xampp\htdocs\vue\servitec\src\components\UserTable.vue -->
<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th>Número de control</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Carrera</th>
          <th>Créditos</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users.data" :key="user.nctrl">
          <td>{{ user.nctrl }}</td>
          <td>{{ user.nombre }}</td>
          <td>{{ user.apellidos }}</td>
          <td>{{ user.carrera }}</td>
          <td>{{ user.cred }}</td>
          <td>
            <button class="btn btn-primary" @click="$emit('edit-user', user)">Modificar</button>
            <button class="btn btn-danger" @click="deleteUser(user.nctrl)">Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <button class="btn btn-success" @click="$emit('open-add-modal')">Agregar Usuario</button>
  </div>
</template>

<script>
import { reactive, onMounted } from 'vue';
import axios from 'axios';

export default {
  setup(_, { emit }) {
    // Variable reactiva para almacenar los usuarios
    const users = reactive({
      data: [], // Arreglo para los datos de los usuarios
    });

    // Método para obtener los usuarios desde el backend
    const fetchUsers = async () => {
      try {
        const response = await axios.get('http://localhost/vue/php/get_user.php');
        console.log('Usuarios obtenidos:', response.data); // Verifica los datos aquí
        users.data = response.data; // Actualiza la variable reactiva
      } catch (error) {
        console.error('Error al obtener usuarios:', error);
      }
    };

    // Método para eliminar un usuario
    const deleteUser = async (nctrl) => {
      if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
        try {
          const response = await axios.post('http://localhost/vue/php/delete_user.php', { nctrl });
          if (response.data.success) {
            alert('Usuario eliminado correctamente');
            // Elimina el usuario directamente de la tabla reactiva
            users.data = users.data.filter(user => user.nctrl !== nctrl);
          } else {
            alert('Error al eliminar el usuario: ' + response.data.error);
          }
        } catch (error) {
          console.error('Error al eliminar usuario:', error);
        }
      }
    };

    // Método para agregar un usuario directamente a la tabla
    const addUser = (newUser) => {
      users.data.push(newUser); // Agrega el nuevo usuario directamente al arreglo reactivo
    };

    // Método para actualizar un usuario directamente en la tabla
    const updateUser = (updatedUser) => {
      const index = users.data.findIndex(user => user.nctrl === updatedUser.nctrl);
      if (index !== -1) {
        users.data[index] = updatedUser; // Actualiza el usuario en la tabla reactiva
      }
    };

    // Llama a `fetchUsers` cuando el componente se monte
    onMounted(fetchUsers);

    return {
      users,
      fetchUsers,
      deleteUser,
      addUser,
      updateUser,
      emit,
    };
  },
};
</script>
<style>
button {
  border-radius: 5px;
  font-weight: bold;
}

button.btn-primary {
  background-color: #003366; /* Azul oscuro */
  color: #ffffff;
  border: none;
}

button.btn-primary:hover {
  background-color: #00509e; /* Azul más claro */
}

button.btn-secondary {
  background-color: #ffc107; /* Amarillo */
  color: #003366;
  border: none;
}

button.btn-secondary:hover {
  background-color: #e0a800; /* Amarillo más oscuro */
}

button.btn-danger {
  background-color: #dc3545; /* Rojo */
  color: #ffffff;
  border: none;
  border-radius: 5px;
  font-weight: bold;
}

button.btn-danger:hover {
  background-color: #c82333; /* Rojo más oscuro */
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

table th {
  background-color: #003366; /* Azul oscuro */
  color: #ffffff;
  padding: 10px;
}

table td {
  border: 1px solid #000000;
  padding: 10px;
  color: #000000;
}

table tr:nth-child(even) {
  background-color: #f2f2f2; /* Fondo gris claro */
}

table tr:hover {
  background-color: #e6f7ff; /* Azul claro */
}

.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.modal-container {
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  padding: 20px;
  max-width: 500px;
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 2px solid #003366;
  padding-bottom: 10px;
  margin-bottom: 15px;
}

.modal-header h5 {
  font-size: 1.5rem;
  color: #003366;
  margin: 0;
}

.close-button {
  background: none;
  border: none;
  font-size: 1.2rem;
  cursor: pointer;
}

.modal-form {
  background-color: #f7f7f7; /* Fondo gris claro para el formulario */
  padding: 15px;
  border-radius: 10px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.form-control {
  padding: 10px;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 100%;
  box-sizing: border-box;
  background-color: #ffffff; /* Fondo blanco */
  color: #000000; /* Texto negro */
}

.form-control:disabled {
  background-color: #eeeeee; /* Fondo gris claro para campos deshabilitados */
  color: #666666; /* Texto gris */
}

.modal-actions {
  display: flex;
  justify-content: space-between;
  margin-top: 15px;
}

.btn {
  padding: 10px 20px;
  font-size: 1rem;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Botón de modificar */
button.btn-primary {
  background-color: #003366; /* Azul oscuro */
  color: #ffffff;
  border: none;
  margin-right: 10px; /* Espacio entre los botones */
  border-radius: 5px;
  font-weight: bold;
}

button.btn-primary:hover {
  background-color: #00509e; /* Azul más claro */
}

.btn-secondary {
  background-color: #cccccc;
  color: #333333;
}

.btn-secondary:hover {
  background-color: #aaaaaa;
}

/* Botón de agregar usuario */
button.btn-success {
  background: linear-gradient(90deg, #28a745, #218838); /* Degradado verde */
  color: #ffffff;
  font-size: 1rem;
  font-weight: bold;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease; /* Transición para animaciones */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra */
}

button.btn-success:hover {
  background: linear-gradient(90deg, #218838, #1e7e34); /* Degradado más oscuro */
  transform: scale(1.05); /* Crece ligeramente */
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); /* Sombra más intensa */
}

button.btn-success:active {
  transform: scale(0.95); /* Se reduce ligeramente al hacer clic */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Sombra más pequeña */
}
</style>