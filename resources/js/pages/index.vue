<template>
    <div>
        <div class="text-center mt-5">
            <form action="" @submit.prevent="submit">
                <h1 class="text-2xl">Shorten Your Big URL</h1>
                <input type="text" placeholder="Paste your URL" class="p-2 rounded-md shadow-md w-64" v-model="original_url"/>
                <i class="fas fa-paper-plane text-yellow-500 cursor-pointer" @click="submit"></i>
            </form>
            <span class="text-xs text-red-500" v-if="errors.original_url">{{errors.original_url[0]}}</span>

        </div>
        <section class="mt-5 flex justify-center">
            <div class="border rounded-md p-4">
            <table >
                <thead>
                    <tr>
                        <th>Original URL</th>
                        <th>Shorten URL</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in items" :key="item.id">
                        <td class="p-2 rounded border text-sm">{{item.original_url}}</td>
                        <td class="p-2 rounded border text-sm">{{item.shorten_url}}</td>
                        <td class="p-2 rounded border text-sm">{{item.created_at}}</td>
                    </tr>
                </tbody>
            </table>
            </div>

        </section>
    </div>
</template>

<script>
export default {
    data(){
        return{
            original_url:"",
            errors: {},
            items:[]
        }
    },
    mounted(){
        this.fetchData()
    },
    methods:{
        submit(){
            if (this.original_url =="") return;
            axios.post('/api/url',{
                original_url: this.original_url
            } ).then(res=>{
                this.original_url ='';
                this.items.push(res.data);
            }).catch((err)=>{
                this.errors =err.response.data.errors

            });
        },
        fetchData(){
            axios.get("/api/url").then(res=> {
                this.items=res.data
                // console.log(res.data);
            }).catch(e=>{
                // this.errors =e.response.data.errors
            });
        }
    }
};
</script>

<style></style>
