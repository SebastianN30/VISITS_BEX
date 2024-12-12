<template>
    <div class="container mt-5">
        <h1 class="mb-4">Visit List</h1>
        <Link href="/visits/new" class="btn btn-primary mb-3">Crear Visita</Link>
        <table class="table table-striped table-bordered m-4">
            <thead class="thead-dark">
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="visit in visits.data" :key="visit.id">
                <td>{{ visit.id }}</td>
                <td>{{ visit.name }}</td>
                <td>{{ visit.latitude }}</td>
                <td>{{ visit.longitude }}</td>
                <td>{{ visit.email }}</td>
                <td>{{ visit.created_at }}</td>
                <td>
                    <button @click="editVisit(visit.id)" class="btn btn-info btn-sm">Edit</button>
                    <button @click="deleteVisit(visit.id)" class="btn btn-danger btn-sm">Delete</button>
                </td>
                </tr>
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="d-flex justify-content-between mt-4">
        <button @click="changePage(visits.prev_page_url)" :disabled="!visits.prev_page_url" class="btn btn-secondary btn-sm">
            Previous
        </button>
        <button @click="changePage(visits.next_page_url)" :disabled="!visits.next_page_url" class="btn btn-secondary btn-sm">
            Next
        </button>
        </div>
    </div>
</template>
  
<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';


const props = defineProps({
visits: Object,
});

const changePage = (url) => {
if (url) {
    window.location.href = url;
}
};

const editVisit = (id) => {
console.log('Edit visit with id:', id);
};

const deleteVisit = (id) => {
console.log('Delete visit with id:', id);
};
</script>
  
<style scoped>
.btn-info:hover {
background-color: #17a2b8;
}

.btn-danger:hover {
background-color: #dc3545;
}

.table th, .table td {
vertical-align: middle;
}

button:disabled {
cursor: not-allowed;
opacity: 0.6;
}
</style>
  