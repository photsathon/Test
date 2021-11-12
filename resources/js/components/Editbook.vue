<template>
    <div>
        <h4 class="text-center">Edit Proflie</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateBook">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" class="form-control" v-model="book.firstname">
                    </div>
                    <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control" v-model="book.lastname">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" v-model="book.password">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Proflie</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    
    data() {
        return {
            book: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/books/edit/${this.$route.params.id}`)
                .then(response => {
                    this.book = response.data;
                    this.book.password="";
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateBook() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/books/update/${this.$route.params.id}`, this.book)
                    .then(response => {
                        this.$router.push({name: 'books'});
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}

</script>