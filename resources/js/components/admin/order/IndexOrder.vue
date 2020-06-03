<template>
    <table-admin :items="orders" :fields="fields" :routes="routes"></table-admin>
</template>

<script>
    export default {
        name: "IndexProgram",
        props:['orders'],
        data() {
            return {
                routes:{
                    Delete:'/admin/order/'
                },
                fields: [
                    { key: 'id',label: 'id', sortable: true,sortDirection: 'desc', class: 'text-center' },
                    { key: 'user', label: 'Користувач', sortable: true, sortDirection: 'desc' ,class: 'text-center'},
                    { key: 'number', label: 'Номер користувача', sortable: true, sortDirection: 'desc' ,class: 'text-center'},
                    { key: 'email', label: 'Email користувача', sortable: true, sortDirection: 'desc' ,class: 'text-center'},
                    { key: 'coach_id', label: 'ID тренера', sortable: true, sortDirection: 'desc',class: 'text-center' },
                    { key: 'date', label: 'Дата', sortable: true, sortDirection: 'desc',class: 'text-center' },
                    { key: 'time', label: 'Час', sortable: true, sortDirection: 'desc',class: 'text-center' },
                    { key: 'tariff', label: 'Тариф', sortable: true, sortDirection: 'desc',class: 'text-center' },
                    { key: 'message', label: 'Опис', sortable: true, sortDirection: 'desc',class: 'text-center' },
                    { key: 'actions', label: 'Дії' }

                ],
                order:true
            }
        },
    }
</script>

<style scoped>

</style>
