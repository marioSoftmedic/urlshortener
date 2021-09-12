<template>
    <div>
        <div class="text-center mt-5">
            <form action="" @submit.prevent="submit">
                <h1 class="text-2xl">Shorten Your Big URL</h1>
                <input type="text" placeholder="Paste your URL" class="p-2 rounded-md shadow-md w-64"/>
                <i class="fas fa-paper-plane text-yellow-500 cursor-pointer" @click="submit"></i>
            </form>
            <span class="text-xs text-red-500" v-if="errors.original_url">{{errors.original_url[0]}}</span>

        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            original_url:"",
            errors: {}
        }
    },
    methods:{
        submit(){
            axios.post('/api/url',{
                original_url: this.original_url
            } ).then(res=>{
                console.log(res);
            }).catch((err)=>{
                this.errors =err.response.data.errors

            });
        }
    }
};
</script>

<style></style>
