<template>
    <div>
        <h1>ovo je user componenta</h1>
        <div v-for="user in users">
            <div v-for="(value, key) in user">
                {{ key }}: {{ value }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: "",
        }
    },
    mounted() {
        axios.get("api/first", {
            params: {
                data: "test",
            }
        })
        .then(response => (this.users = response.data.data));
    },
}
</script>

<style lang="">
    
</style>