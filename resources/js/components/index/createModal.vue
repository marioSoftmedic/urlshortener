<template>
    <div class="right-0 left-0 fixed flex justify-center" v-if="show">
        <div class="absolute rounded border-2 p-1 bg-white shadow-xl">
            <div class="w-full h-full rounded border p-4">
                <form action="" @submit.prevent="submit" class="p-4">
                    <h1 class="text-center font-bold">
                        Create shorten your URL
                    </h1>
                    <div class="my-1">
                        <div>
                            <input
                                type="text"
                                placeholder="Title for your shorten url"
                                class="p-2 rounded-md shadow-md w-64"
                                v-model="form.title"
                            />
                        </div>
                        <span
                            class="text-xs text-red-500"
                            v-if="errors.title"
                            >{{ errors.title[0] }}</span
                        >
                    </div>
                    <div class="my-1">
                        <div>
                            <input
                                type="text"
                                placeholder="Paste your URL"
                                class="p-2 rounded-md shadow-md w-64"
                                v-model="form.original_url"
                            />
                        </div>
                        <span
                            class="text-xs text-red-500"
                            v-if="errors.original_url"
                            >{{ errors.original_url[0] }}</span
                        >
                    </div>
                    <i
                        class="fas fa-times-circle text-gray-500 cursor-pointer float-left my-0"
                        @click="close"
                    ></i>
                    <i
                        class="fas fa-paper-plane text-yellow-500 cursor-pointer float-right my-0"
                        @click="submit"
                    ></i>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["show", "items"],
    data() {
        return {
            form: {
                original_url: "",
                title: ""
            },
            errors: {}
            // show: false
        };
    },
    methods: {
        close() {
            this.errors = {};
            this.$emit("closeModal");
        },
        submit() {
            // if (this.form.original_url == "") return;
            axios
                .post("/url", this.form)
                .then(res => {
                    this.form.title = "";
                    this.form.original_url = "";
                    this.close();
                    this.items.unshift(res.data);
                    this.$notify({ message: "Created succesfully" });
                })
                .catch(err => {
                    this.errors = err.response.data.errors;
                });
        }
    }
};
</script>

<style></style>
