<template>
  <div>
    <h5>Editar Usuario</h5>
    <form @submit.prevent="updateUser">
      <div class="form-group">
        <label for="nctrl">Número de control</label>
        <input v-model="form.nctrl" type="text" class="form-control" disabled />
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
        <input v-model="form.contraseña" type="password" class="form-control" />
      </div>
      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      <button type="button" class="btn btn-secondary" @click="$emit('close')">Cancelar</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: ['user'],
  data() {
    return {
      form: { ...this.user }, // Copia los datos del usuario recibido
    };
  },
  methods: {
    updateUser() {
      axios.post('http://localhost/vue/php/update_user.php', this.form)
        .then(response => {
          console.log('Respuesta del servidor:', response.data);
          if (response.data.success) {
            alert('Usuario actualizado correctamente');
            this.$emit('user-updated', this.form); // Emite el usuario actualizado al componente padre
            this.$emit('close'); // Cierra el modal
          } else {
            alert('Error al actualizar el usuario: ' + response.data.error);
          }
        })
        .catch(error => {
          console.error('Error al actualizar usuario:', error);
        });
    },
  },
};
</script>