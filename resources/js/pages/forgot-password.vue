<template>
    <div class="p-3 flex justify-center">
        <div class="w-1/2 py-10 flex flex-wrap justify-center border rounded">
            <h1 class="text-3xl w-full text-center">
                Send Password Reset Link
            </h1>
            <form
                class="flex flex-wrap justify-center p-2"
                @submit.prevent="submit"
            >
                <div class="py-2 w-full">
                    <input
                        type="email"
                        placeholder="Your email"
                        class="p-2 w-full rounded border shadow"
                        v-model="form.email"
                    />
                </div>
                <span class="text-xs text-red-500" v-if="errors.email">{{
                    errors.email[0]
                }}</span>
                <div class="py-2 w-full">
                    <input
                        type="submit"
                        value="Send Reset Password Link"
                        class="px-3 py-2 bg-blue-500 rounded shadow border text-white w-full"
                    />
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: ""
            },
            errors: {}
        };
    },
    methods: {
        submit() {
            axios
                .post("/password/email", this.form)
                .then(res => {
                    this.$notify({ message: res.data.message });
                })
                .catch(e => (this.errors = e.response.data.errors));
        }
    }
};
</script>

<style></style>
