<!-- filepath: c:\xampp\htdocs\vue\servitec\src\components\Admincomment.vue -->
<template>
    <div class="app-container">
      <h1 class="header">Administración de comentarios</h1>
      <div>
        <table class="table">
          <thead>
            <tr>
              <th>ID de comentario</th>
              <th>Número de control</th>
              <th>Nombre</th>
              <th>Departamento</th>
              <th>Comentario</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="comments.length === 0">
              <td colspan="6" class="text-center">No hay comentarios disponibles</td>
            </tr>
            <tr v-for="comment in comments" :key="comment.id_comentario">
              <td>{{ comment.id_comentario }}</td>
              <td>{{ comment.nctrl }}</td>
              <td>{{ comment.nombre }}</td>
              <td>{{ comment.departamento }}</td>
              <td>{{ comment.comentario }}</td>
              <td>
                <button class="btn btn-danger" @click="deleteComment(comment.id_comentario)">Eliminar</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        comments: [], // Lista de comentarios
      };
    },
    methods: {
      // Método para obtener los comentarios desde el backend
      fetchComments() {
        axios
          .get('http://localhost/vue/php/get_comments.php')
          .then((response) => {
            this.comments = response.data; // Asigna los comentarios obtenidos
          })
          .catch((error) => {
            console.error('Error al obtener los comentarios:', error);
          });
      },
      // Método para eliminar un comentario
      deleteComment(id_comentario) {
        if (confirm('¿Estás seguro de que deseas eliminar este comentario?')) {
          axios
            .post('http://localhost/vue/php/delete_comments.php', { id: id_comentario })
            .then((response) => {
              if (response.data.success) {
                alert('Comentario eliminado correctamente');
                this.comments = this.comments.filter((comment) => comment.id_comentario !== id_comentario); // Elimina el comentario de la lista
              } else {
                alert('Error al eliminar el comentario: ' + response.data.error);
              }
            })
            .catch((error) => {
              console.error('Error al eliminar el comentario:', error);
            });
        }
      },
    },
    mounted() {
      this.fetchComments(); // Carga los comentarios al montar el componente
    },
  };
  </script>
  
  <style>
  /* Estilos para la tabla */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  
  table th {
    background-color: #003366; /* Azul oscuro */
    color: #ffffff;
    padding: 10px;
    text-align: center;
  }
  
  table td {
    border: 1px solid #000000;
    padding: 10px;
    text-align: center;
    color: #000000;
  }
  
  table tr:nth-child(even) {
    background-color: #f2f2f2; /* Fondo gris claro */
  }
  
  table tr:hover {
    background-color: #e6f7ff; /* Azul claro */
  }
  
  /* Botón de eliminar */
  button.btn-danger {
    background-color: #dc3545; /* Rojo */
    color: #ffffff;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    padding: 10px 15px;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  button.btn-danger:hover {
    background-color: #c82333; /* Rojo más oscuro */
    transform: scale(1.05); /* Crece ligeramente */
  }
  
  button.btn-danger:active {
    transform: scale(0.95); /* Se reduce ligeramente al hacer clic */
  }
  </style>