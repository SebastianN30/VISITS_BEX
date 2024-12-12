<template>
    <div class="container mt-5">
      <h1>Crear Nueva Visita</h1>
      
      <form @submit.prevent="submitForm" method="POST">
        <!-- Nombre -->
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input
            type="text"
            id="name"
            v-model="form.name"
            class="form-control"
            required
          />
        </div>
  
        <!-- Latitud -->
        <div class="mb-3">
          <label for="latitude" class="form-label">Latitud</label>
          <input
            type="text"
            id="latitude"
            v-model="form.latitude"
            class="form-control"
            required
          />
        </div>
  
        <!-- Longitud -->
        <div class="mb-3">
          <label for="longitude" class="form-label">Longitud</label>
          <input
            type="text"
            id="longitude"
            v-model="form.longitude"
            class="form-control"
            required
          />
        </div>
  
        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input
            type="email"
            id="email"
            v-model="form.email"
            class="form-control"
            required
          />
        </div>
  
        <!-- Contraseña -->
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input
            type="password"
            id="password"
            v-model="form.password"
            class="form-control"
            required
          />
        </div>
  
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('visits.index') }}" class="btn btn-secondary ms-2">Volver</a>
      </form>
    </div>
  </template>
  
<script setup>
import { ref } from 'vue';

// Definimos el formulario en el estado
const form = ref({
name: '',
latitude: '',
longitude: '',
email: '',
password: ''
});

// Función para enviar el formulario
const submitForm = async () => {
try {
    // Enviar datos del formulario a la API de Laravel (backend)
    await axios.post('/api/visits', form.value);
    
    // Redirigir a la lista de visitas después de guardar
    router.push({ name: 'visits.index' });
} catch (error) {
    console.error("Error al crear la visita:", error);
}
};
</script>
  