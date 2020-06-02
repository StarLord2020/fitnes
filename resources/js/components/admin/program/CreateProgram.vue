<template>
    <div class="formContainer">
        <div class="form_container">
            <form  ref="program" class="form-horizontal" role="form" id="form" @submit.prevent="sendProgram">
                <div class="row">
                    <span class="d-block mb-4 title">Додавання програми</span>
                </div>
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-sm-4 d-flex align-items-center">Зображення</div>
                        <div class="col-sm-8 d-flex justify-content-end">
                            <avatar-load></avatar-load>
                        </div>
                    </div>
                    <div class="row">
                        <label for="firstName" class="col-sm-4 control-label">Назва</label>
                        <div class="col-sm-8 ">
                            <input
                                v-validate="'required|max:40'"
                                :class="{'input': true, 'alert-danger':errors.has('name')}"
                                name="name"
                                type="text"
                                id="firstName"
                                placeholder="Назва..."
                                class="form-control"
                            >
                            <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('surname') }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 control-label" for="description">Опис</label>
                        <div class="col-md-8">
                        <textarea
                            v-validate="'required|max:255'"
                            :class="{'input': true, 'alert-danger':errors.has('description')}"
                            name="description"
                            class="form-control"
                            id="description"
                            placeholder="Опис..."
                        >
                        </textarea>
                            <span v-show="errors.has('description')" class="help is-danger">{{ errors.first('description') }}</span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Додати</button>
            </form>
        </div>
    </div>
</template>

<script>
    import AvatarLoad from './../AvatarLoad'
    export default {
        name: "CreateUser",
        components:{
            AvatarLoad,
        },
        data(){
            return {

            }
        },
        methods: {
            sendProgram(){
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        const data = new FormData(this.$refs.program);
                        axios.post('/admin/programs',data,
                            {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                            .then((response)=>{
                                if(response.data == 'ok'){

                                    document.location.href = "/admin/programs"
                                }
                                else{

                                    this.$toaster.error('Ошибка');
                                }
                            })
                            .catch( e=>{

                            })
                    }
                    else {

                        this.$toaster.warning("Заполните все поля!");
                    }
                })
            }
        },
    }
</script>

<style scoped>
    .is-danger {
        color: red;
    }
    textarea {
        height: 80px!important;
        resize: none!important;
    }
    .visible {
        width: 16px;
        top: 12px;
        right: 25px;
        cursor: pointer;
    }
    .visible:hover {
        opacity:0.9;
    }
    .rand-password {
        position: absolute;
        height: 25px;
        width: 25px;
        z-index: 10;
        right: 21px;
        top: 6px;
        transition: 600ms;
        cursor:pointer;
    }
    .rand-password:hover {
        transform: rotate(360deg);
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
        font-size: 26px;
    }
    .formContainer {
        max-width: 500px;
        margin: 0 auto;
    }
    .avatar[data-v-37be5f8a] {
        border: none;
        z-index: 3;
        max-width: 272px;
        -o-object-fit: cover;
        object-fit: cover;
        display: block;
        margin: 0 auto 15px;
    }
</style>
