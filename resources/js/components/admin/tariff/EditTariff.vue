<template>
    <div class="form_container">
        <form class="form-horizontal" role="form" @submit.prevent="updateSubject">
            <span class="d-block mb-4 title">Редагування тарифу</span>
            <div class="form-group">
                <div class="row">
                    <label for="Name" class="col-sm-4 control-label">Тариф</label>
                    <div class="col-sm-8">
                        <input
                            v-validate="'required|max:20'"
                            :class="{'input': true, 'alert-danger':errors.has('name')}"
                            type="text"
                            name="name"
                            id="Name"
                            placeholder="Тариф..."
                            class="form-control"
                            v-model="editTariff.name"
                        >
                        <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="Name" class="col-sm-4 control-label">Тариф</label>
                    <div class="col-sm-8">
                        <input
                            v-validate="'required|max:20'"
                            :class="{'input': true, 'alert-danger':errors.has('price')}"
                            type="number"
                            name="price"
                            placeholder="Цiна..."
                            class="form-control"
                            v-model="editTariff.price"
                        >
                        <span v-show="errors.has('price')" class="help is-danger">{{ errors.first('price') }}</span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-4">Редагувати</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "EditSubject",
        props:['tariff'],
        data(){
            return {
                editTariff:{
                    name:'',
                    price:''
                },
            }
        },
        created(){
            this.editTariff = this.tariff;
        },
        methods:{
            updateSubject(){
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios.put('/admin/tariffs/' + this.tariff.id, this.editTariff)
                            .then((response) => {
                                if (response.data.response == 'updated') {

                                    this.$toaster.success('Дані успішно відредаговані');
                                    document.location.href = "/admin/tariffs"
                                }
                                else {

                                    this.$toaster.error('Помилка');
                                }

                            })
                            .catch(e => {
                                this.$toaster.error(e.response.data.errors.name[0]);
                            })
                        }
                    else {

                        this.$toaster.warning("Заповніть всі поля!");
                    }
                })
            }
        }
    }
</script>

<style scoped>
    .form_container {
        padding: 25px;
        border:1px solid grey;
        margin-bottom:30px;
        border-radius:10px;
    }
    .title {
        font-size: 30px;
    }
    .is-danger {
        color: red;
    }
    .alert-danger{
        border:1px solid red!important;
    }
</style>
