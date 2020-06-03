<template>
    <div class="form_container">
        <form class="form-horizontal" role="form" @submit.prevent="sendSubject">
            <span class="d-block mb-4 title">Добавити тариф</span>
            <div class="form-group">
                <div class="row">
                    <label for="Name" class="col-sm-4 control-label">Тариф</label>
                    <div class="col-sm-8">
                        <input
                            v-validate="'required'"
                            :class="{'input': true, 'alert-danger':errors.has('name')}"
                            type="text"
                            name="name"
                            id="Name"
                            placeholder="Тариф..."
                            class="form-control"
                            v-model="tariff.name"
                        >
                        <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="Name" class="col-sm-4 control-label">Цiна</label>
                    <div class="col-sm-8">
                        <input
                            v-validate="'required'"
                            :class="{'input': true, 'alert-danger':errors.has('price')}"
                            type="number"
                            name="price"
                            placeholder="Цiна..."
                            class="form-control"
                            v-model="tariff.price"
                        >
                        <span v-show="errors.has('price')" class="help is-danger">{{ errors.first('price') }}</span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-4">Добавити</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "CreateSubject",
        data(){
            return {
               tariff:{
                   name:'',
                   price:''
               },

            }
        },
        created(){
        },
        methods: {
            sendSubject() {

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios.post('/admin/tariffs', this.tariff)
                            .then((response) => {
                                if (response.data == 'ok') {

                                    this.$toaster.success('Тариф успішно доданий');
                                    document.location.href = "/admin/tariffs"
                                }
                                else {

                                    this.$toaster.error('Помилка');
                                }
                            })
                            .catch(e => {
                                console.log(e);
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
    .is-danger {
        color: red;
    }
    .alert-danger{
        border:1px solid red!important;
    }
    .form_container {
        padding: 25px;
        border:1px solid grey;
        margin-bottom:30px;
        border-radius:10px;
    }
    .title {
        font-size: 30px;
    }
</style>
