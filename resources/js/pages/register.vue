<template>
    <div class="p-3 flex justify-center">
        <div class="w-1/2 py-10 flex flex-wrap justify-center border rounded">
            <h1 class="text-3xl w-full text-center">Register Page</h1>
            <form class="flex flex-wrap justify-center p-2" @submit.prevent="submit">
                <div class="py-2 w-full">
                    <input
                        type="text"
                        placeholder="Your name"
                        class="p-2 w-full rounded border shadow"
                        v-model="form.name"
                    />
                </div>
                <div class="py-2 w-full">
                    <input
                        type="email"
                        placeholder="Your email"
                        class="p-2 w-full rounded border shadow"
                        v-model="form.email"
                    />
                </div>
                <div class="py-2 w-full">
                    <input
                        type="password"
                        placeholder="******"
                        class="p-2 w-full rounded border shadow"
                        v-model="form.password"
                    />
                </div>
                <div class="py-2 w-full">
                    <input
                        type="text"
                        placeholder="confirm password"
                        class="p-2 w-full rounded border shadow"
                        v-model="form.password_confirmation"
                    />
                </div>
                <div class="py-2 w-full">
                    <input
                        type="submit"
                        value="Register"
                        class="px-3 py-2 bg-blue-500 rounded shadow border text-white w-full"
                    />
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    middleware:"guest",
    data(){
        return {
            form: {
                email :"",
                name:"",
                password:"",
                password_confirmation:""
            }
        }
    },
    methods:{
        submit(){
            axios.post('/register', this.form)
            .then(res=> {
                this.$router.push("/");
            }).catch(e=>console.log(e.response))
        }
    }
};
</script>

<style></style>
