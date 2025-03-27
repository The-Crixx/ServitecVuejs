<template>
  <div class="modal-overlay" @click.self="$emit('close')">
    <div class="modal-container">
      <div class="modal-header">
        <h5>Agregar Usuario</h5>
        <button class="close-button" @click="$emit('close')">X</button>
      </div>
      <form @submit.prevent="addUser">
        <div class="form-group">
          <label for="nctrl">Número de control</label>
          <input v-model="form.nctrl" type="text" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input v-model="form.nombre" type="text" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="apellidos">Apellidos</label>
          <input v-model="form.apellidos" type="text" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="carrera">Carrera</label>
          <select v-model="form.carrera" class="form-control" required>
            <option value="">Selecciona una carrera</option>
            <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
            <option value="Ingeniería Industrial">Ingeniería Industrial</option>
            <option value="Ingeniería Electrónica">Ingeniería Electrónica</option>
            <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
          </select>
        </div>
        <div class="form-group">
          <label for="cred">Créditos</label>
          <input v-model="form.cred" type="number" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="contraseña">Contraseña</label>
          <input v-model="form.contraseña" type="password" class="form-control" required />
        </div>
        <div class="modal-actions">
          <button type="submit" class="btn btn-primary">Agregar</button>
          <button type="button" class="btn btn-secondary" @click="$emit('close')">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      form: {
        nctrl: '',
        nombre: '',
        apellidos: '',
        carrera: '',
        cred: '',
        contraseña: '',
      },
    };
  },
  methods: {
    addUser() {
      axios.post('http://localhost/vue/php/add_user.php', this.form)
        .then(response => {
          console.log('Respuesta del servidor:', response.data);
          if (response.data.success) {
            alert('Usuario agregado correctamente');
            this.$emit('user-added', { ...this.form }); // Emite el nuevo usuario al componente padre
            this.resetForm(); // Limpia el formulario
            this.$emit('close'); // Cierra el modal
          } else {
            alert('Error al agregar el usuario: ' + response.data.error);
          }
        })
        .catch(error => {
          console.error('Error al agregar usuario:', error);
        });
    },
    resetForm() {
      this.form = {
        nctrl: '',
        nombre: '',
        apellidos: '',
        carrera: '',
        cred: '',
        contraseña: '',
      };
    },
  },
};
</script>

