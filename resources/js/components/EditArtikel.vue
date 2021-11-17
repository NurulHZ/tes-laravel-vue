<template>
    <div>
        <h3 class="text-center">Edit Artikel</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateArtikel">
                    <div class="form-group">
                        <label>Nama Penulis</label>
                        <input type="text" class="form-control" v-model="Artikel.nama_penulis">
                    </div>
                    <div class="form-group">
                        <label>Isi</label>
                        <input type="text" class="form-control" v-model="Artikel.isi">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                Artikel: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/artikels/${this.$route.params.id}`)
                .then((res) => {
                    this.Artikel = res.data;
                });
        },
        methods: {
            updateArtikel() {
                this.axios
                    .patch(`http://localhost:8000/api/artikels/${this.$route.params.id}`, this.Artikel)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>