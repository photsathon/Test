<template>
    <div>
        <h4 class="text-center">Proflie</h4><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                
                <th>username</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <tr> 
                <td>{{ username }}</td>
                <td>{{ firstname }}</td>
                <td>{{ lastname }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editbook', params: { id: id }}" class="btn btn-primary">Edit
                        </router-link>
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
            books: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/books')
                .then(response => {
                    this.books = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
        if (window.Laravel.user) {
            this.id = window.Laravel.user.id
            this.username = window.Laravel.user.username
            this.firstname = window.Laravel.user.firstname
            this.lastname = window.Laravel.user.lastname
            this.created_at = window.Laravel.user.created_at
            this.updated_at = window.Laravel.user.updated_at
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