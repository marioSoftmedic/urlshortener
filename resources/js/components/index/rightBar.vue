<template>
    <section class="m-1 p-2 w-9/12 border rounded">
        <div v-if="data">
            <div class="flex justify-between">
                <h1>{{ data.title }}</h1>
                <i
                    class="fas fa-times text-red-300 float-right hover:text-red-600 cursor-pointer"
                    @click="destroy"
                ></i>
            </div>
            <p class="text-xs text-gray-300">
                {{ data.original_url }}
            </p>
            <div class="flex my-5">
                <p class="text-xs text-yellow-300">
                    {{ data.shorten_url }}
                </p>
                <i
                    @click="copyToClipboard(data.path)"
                    class="fas fa-copy text-yellow-300 mx-2 py-1 cursor-pointer"
                ></i>
            </div>
            <div class="my-5">
                <p class="text-xs text-gray-300">Visits : {{ data.visits }}</p>
            </div>
        </div>
        <div v-else class="text-center text-xl text-gray-300">
            <h2>Select URL to show details</h2>
        </div>
    </section>
</template>

<script>
export default {
    props: ["data"],
    methods: {
        copyToClipboard(url) {
            // console.log(url);
            // document.execCommand("copy");
            navigator.clipboard.writeText(url);
        },
        destroy() {
            this.$emit("deleteItem", this.data);
        }
    }
};
</script>

<style></style>
