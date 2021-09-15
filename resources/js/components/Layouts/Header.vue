<template>
    <nav class="bg-blue-400 p-4 text-white text-xl flex justify-between">
        <router-link class="px-3 cursor-pointer" to="/">Home</router-link>
        <div class="flex" v-if="loggedIn">
            <p class="mx-3">Hi! {{user.name}}</p>
            <a href="" @click.prevent="logout">Logout</a>
        </div>
        <div v-else>
            <router-link class="px-3 cursor-pointer" to="/login">Login</router-link>
            <router-link class="px-3 cursor-pointer" to="/register">Register</router-link>
        </div>
    </nav>
</template>

<script>
export default {
    data(){
        return {
            loggedIn : window.loggedIn,
            user: window.user
        }
    },
    methods:{
        logout(){
            axios.post('logout')
            .then(res => (window.location="/login"))
        }
    }
};
</script>

<style></style>
