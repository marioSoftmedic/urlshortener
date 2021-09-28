<template>
    <div class="flex flex-wrap">
        <div class="w-full p-4">
            <button
                class="float-right px-1 py-2 bg-yellow-600 rounded shadow w-32 text-white"
                @click="openModal"
            >
                New
            </button>
        </div>
        <div class="w-full flex">
            <left-bar
                @urlSelected="showDetails"
                :allItems="items"
                :items="items.data"
            />
            <right-bar :data="selectedItem" @deleteItem="destroy" />
        </div>
        <transition name="fade">
            <create-modal
                :show="modalOpen"
                @closeModal="modalOpen = false"
                :items="items.data"
            />
        </transition>
    </div>
</template>

<script>
import CreateModal from "../components/index/createModal.vue";
import LeftBar from "../components/index/leftBar.vue";
import RightBar from "../components/index/rightBar.vue";
export default {
    components: { LeftBar, RightBar, CreateModal },
    middleware: "auth",
    data() {
        return {
            errors: {},
            items: { data: [] },
            selectedItem: null,
            modalOpen: false,
            form: {
                title: "",
                original_url: ""
            }
        };
    },
    mounted() {
        this.fetchData(this.$route.query.page);
        Event.$on("prevPage", this.prev);
        Event.$on("nextPage", this.next);
    },
    methods: {
        fetchData(page) {
            // let queryPage = this.$route.query.page;
            // page = queryPage ? queryPage:page;
            axios
                .get(`/url?page=${page}`)
                .then(res => {
                    this.items = res.data;
                    // console.log(res.data);
                })
                .catch(e => {
                    // this.errors =e.response.data.errors
                });
        },
        destroy(item) {
            if (confirm("Are you sure you want to Delete?")) {
                axios.delete(`url/${item.shorten_url}`).then(() => {
                    this.items.data = this.items.data.filter(
                        i => i.id != item.id
                    );
                    this.$notify({ message: "Deleted", type: "warning" });
                });
            }
        },
        showDetails(item) {
            this.selectedItem = item;
        },
        openModal() {
            this.modalOpen = true;
        },
        next() {
            if (this.items.current_page == this.items.last_page) return;
            let nextPageNumber = this.items.current_page + 1;

            this.fetchData(nextPageNumber);
            this.$router.replace({ query: { page: nextPageNumber } });
        },
        prev() {
            let prevPageNumber = this.items.current_page - 1;
            if (prevPageNumber == 0) return;

            this.fetchData(prevPageNumber);
            this.$router.replace({ query: { page: prevPageNumber } });
        }
    }
};
</script>

<style></style>
