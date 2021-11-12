<template>
    <div>
        Hello {{ firstname }} {{ lastname }}<br> <br>
        <button class="btn btn-primary" @click="$router.push('/books')">Proflie</button> <br><br>
        <button class="btn btn-primary" @click="logout">Logout</button>
    </div>
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            username: null,
        }
    },
    created() {
        if (window.Laravel.user) {
            this.id = window.Laravel.user.id
            this.username = window.Laravel.user.username
            this.firstname = window.Laravel.user.firstname
            this.lastname = window.Laravel.user.lastname
        }
    },
    methods: {
        logout(e) {
            console.log('ss')
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
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