<template>
  <div class="app-container">
    <h1 class="header">Administración de usuarios</h1>
    <div>
      <UserTable
        ref="userTable"
        @edit-user="handleEditUser"
        @open-add-modal="showAddModal = true"
      />
      
      <!-- Transición para el modal de agregar usuario -->
      <transition name="modal">
        <div v-if="showAddModal" class="modal-wrapper">
          <AddUserModal
            @user-added="handleUserAdded"
            @close="showAddModal = false"
          />
        </div>
      </transition>

      <!-- Transición para el modal de editar usuario -->
      <transition name="modal">
        <div v-if="showEditModal" class="modal-wrapper">
          <EditUserModal
            :user="selectedUser"
            @user-updated="handleUserUpdated"
            @close="showEditModal = false"
          />
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
import UserTable from './UserTable.vue';
import AddUserModal from './AddUserModal.vue';
import EditUserModal from './EditUserModal.vue';

export default {
  components: {
    UserTable,
    AddUserModal,
    EditUserModal,
  },
  data() {
    return {
      showAddModal: false,
      showEditModal: false,
      selectedUser: null,
    };
  },
  methods: {
    handleEditUser(user) {
      this.selectedUser = user;
      this.showEditModal = true;
    },
    handleUserAdded(newUser) {
      this.$refs.userTable.addUser(newUser); // Llama al método `addUser` del componente UserTable
      this.showAddModal = false;
    },
    handleUserUpdated(updatedUser) {
      this.$refs.userTable.updateUser(updatedUser); // Llama al método `updateUser` del componente UserTable
      this.showEditModal = false;
    },
  },
};
</script>

<style>
/* Estilos globales */
body {
  background-color: #ffffff;
}

.app-container {
  background-color: #ffffff; /* Fondo blanco */
  color: #003366; /* Texto azul oscuro */
  font-family: Arial, sans-serif;
  padding: 20px;
}

/* Estilo del encabezado */
.header {
  text-align: center;
  color: #003366; /* Azul oscuro */
  font-size: 2.5rem;
  margin-bottom: 20px;
  text-transform: uppercase;
  font-weight: bold;
}

/* Animaciones para los modales */
.modal-enter-active, .modal-leave-active {
  transition: all 0.5s ease;
}
.modal-enter {
  opacity: 0;
  transform: scale(0.9);
}
.modal-leave-to {
  opacity: 0;
  transform: scale(0.9);
}

/* Estilo adicional para el contenedor del modal */
.modal-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
}
</style>