<template>
  <div class="modal-overlay" @click.self="$emit('close')">
    <div class="modal-container">
      <div class="modal-header">
        <h5>Editar Usuario</h5>
        <button class="close-button" @click="$emit('close')">X</button>
      </div>
      <form @submit.prevent="updateUser" class="modal-form">
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
        <div class="modal-actions">
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          <button type="button" class="btn btn-secondary" @click="$emit('close')">Cancelar</button>
        </div>
      </form>
    </div>
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
            this.$emit('user-updated', { ...this.form }); // Emite el usuario actualizado al componente padre
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

<style>
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

.btn-primary {
  background-color: #003366;
  color: #ffffff;
}

.btn-primary:hover {
  background-color: #002244;
}

.btn-secondary {
  background-color: #cccccc;
  color: #333333;
}

.btn-secondary:hover {
  background-color: #aaaaaa;
}
</style>