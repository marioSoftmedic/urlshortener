<template>
    <div class="p-3 flex justify-center">
        <div class="w-1/2 py-10 flex flex-wrap justify-center border rounded">
            <h1 class="text-3xl w-full text-center">Login Page</h1>
            <form class="flex flex-wrap justify-center p-2" @submit.prevent="submit">
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

                <a href="">Forgot Password</a>
                <div class="py-2 w-full">
                    <input
                        type="submit"
                        value="Login"
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
    data() {
        return {
            form: {
                email: "",
                password: ""
            }
        };
    },
    methods:{
        submit(){
            axios.post('/login', this.form)
            .then(res=> {
                window.location="/";
            })
            .catch(e=> console.log(e.response));
        }
    }
};
</script>

<style></style>
