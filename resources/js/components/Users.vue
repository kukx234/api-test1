<template>
    <div>
        <h1>ovo je user componenta</h1>
        <div v-for="user in users">
            <div v-for="(value, key) in user">
                {{ key }}: {{ value }}
            </div>
        </div>
        <div v-for="pages in last_page" @click="changePage(pages)">{{ pages }}</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: "",
            pagination: 5,
            current_page: 1,
            last_page: "",
        }
    },
    beforeMount(){
        this.getUsers();
    },
    methods: {
        getUsers() {
            axios.get('api/first', {
                params: {
                    page: this.current_page,
                    pagination: this.pagination,
                },
            })
            .then((response) => {
                console.log(response);
                this.users = response.data.data;
                this.last_page = response.data.meta.last_page;
            });
        },

        changePage(page){
            this.current_page = page;
            this.getUsers();
        }
    },
}
</script>

<style lang="">
    
</style>