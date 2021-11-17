<template>
    <div>
        <h2 class="text-center">Artikel List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama Penulis</th>
                <th>Isi</th>
                <th>Foto</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="Artikel in Artikel" :key="Artikel.id">
                <td>{{ Artikel.id }}</td>
                <td>{{ Artikel.nama_penulis }}</td>
                <td>{{ Artikel.isi }}</td>
                <td>{{ Artikel.foto }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: Artikel.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteArtikel(Artikel.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                Artikel: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/artikels/')
                .then(response => {
                    this.Artikel = response.data;
                });
        },
        methods: {
            deleteArtikel(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/artikels/${id}`)
                    .then(response => {
                        let i = this.Artikel.map(data => data.id).indexOf(id);
                        this.Artikel.splice(i, 1)
                    });
            }
        }
    }
</script>