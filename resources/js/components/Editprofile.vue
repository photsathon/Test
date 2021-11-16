<template>
    <div>
        <h4 class="text-center">Edit Profile</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateprofile">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" class="form-control" v-model="profile.firstname">
                    </div>
                    <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control" v-model="profile.lastname">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" v-model="profile.password">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    
    data() {
        return {
            profile: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/profiles/edit/${this.$route.params.id}`)
                .then(response => {
                    this.profile = response.data;
                    this.profile.password="";
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateprofile() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/profiles/update/${this.$route.params.id}`, this.profile)
                    .then(response => {
                        this.$router.push({name: 'profiles'});
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