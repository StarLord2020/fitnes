<template>
    <table-admin :items="programs" :fields="fields" :routes="routes"></table-admin>
</template>

<script>
    export default {
        name: "IndexProgram",
        props:['programs'],
        data() {
            return {
                routes:{
                    Create:'/admin/programs/create',
                    Edit:'/admin/programs/',
                    Delete:'/admin/programs/'
                },
                fields: [
                    { key: 'id',label: 'id', sortable: true,sortDirection: 'desc', class: 'text-center' },
                    { key: 'name', label: 'Назва', sortable: true, sortDirection: 'desc' ,class: 'text-center'},
                    { key: 'description', label: 'Опис', sortable: true, sortDirection: 'desc',class: 'text-center' },
                    { key: 'actions', label: 'Дії' }

                ],
            }
        },
    }
</script>

<style scoped>

</style>
