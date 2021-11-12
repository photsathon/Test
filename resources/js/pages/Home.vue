<template>
    <div>
        Hello <br>
        <button class="btn btn-primary" @click="$router.push('/login')">login</button> <br><br>
        <button class="btn btn-primary" @click="$router.push('/register')">register</button>
    </div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            //
        }
    },
    created() {
    },
    methods: {}
}
</script>