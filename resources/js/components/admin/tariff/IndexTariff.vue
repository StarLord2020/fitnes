<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/html">
    <div>
        <table-admin
            :items="tariffs"
            :fields="fields"
            :routes="routes"
        >
        </table-admin>
    </div>
</template>

<script>
    export default {
        name:'IndexSubject',
        props:['tariffs'],
        data() {
            return {
                routes:{
                    Create:'/admin/tariffs/create',
                    Edit:'/admin/tariffs/',
                    Delete:'/admin/tariffs/'
                },
                fields: [
                    { key: 'id', label: 'id', sortable: true, class: 'text-center' },
                    { key: 'name', label: "Назва", sortable: true, class: 'text-center' },
                    { key: 'price', label: "Цiна", sortable: true, class: 'text-center' },
                    { key: 'actions', label: 'Действия' }
                ],
            }
        },
    }
</script>

<style scoped>

</style>
