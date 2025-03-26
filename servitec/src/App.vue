<template>
  <div>
    <LoginForm @submit="handleLogin"/>
    <UserTable
      ref="userTable"
      @edit-user="handleEditUser"
      @open-add-modal="showAddModal = true"
    />
    <AddUserModal
      v-if="showAddModal"
      @user-added="handleUserAdded"
      @close="showAddModal = false"
    />
    <EditUserModal
      v-if="showEditModal"
      :user="selectedUser"
      @user-updated="handleUserUpdated"
      @close="showEditModal = false"
    />
  </div>
</template>

<script>
import UserTable from './components/UserTable.vue';
import AddUserModal from './components/AddUserModal.vue';
import EditUserModal from './components/EditUserModal.vue';
import LoginForm from './components/LoginForm.vue';

export default {
  components: {
    UserTable,
    AddUserModal,
    EditUserModal,
    LoginForm,
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
body{
  background-color: #ffffff; 
}
/* Estilos globales */
.app-container {
  background-color: #ffffff; /* Fondo blanco */
  color: #003366; /* Texto azul oscuro */
  font-family: Arial, sans-serif;
  padding: 20px;
}
</style>