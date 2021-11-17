<template>
    <div>
        <h3 class="text-center">Create Artikel</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addArtikel">
                    <div class="form-group">
                        <label>Nama Penulis</label>
                        <input type="text" class="form-control" v-model="Artikel.nama_penulis">
                    </div>
                    <div class="form-group">
                        <label>Isi</label>
                        <input type="text" class="form-control" v-model="Artikel.isi">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
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
        methods: {
            addArtikel() {
                this.axios
                    .post('http://localhost:8000/api/artikels', this.Artikel)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(this.Artikel))
                    .finally(() => this.loading = false)
                console.log("test")
            }
        }
    }
</script>