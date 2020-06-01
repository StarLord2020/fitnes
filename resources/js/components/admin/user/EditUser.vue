<template>
    <div>
        <div class="form_container">
            <form ref="user" class="form-horizontal" role="form" id="form" @submit.prevent="edit">
                <div class="row">
                    <div class="col-9">
                        <span class="d-block mb-4 title">Редагування користувача</span>
                    </div>
                    <div class="col-3">
                        <avatar-load :update="true" :src="user.avatar"></avatar-load>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="firstName" class="col-sm-4 control-label">Прізвище</label>
                        <div class="col-sm-8 ">
                            <input
                                v-validate="'required|alpha|max:20'"
                                :class="{'input': true, 'alert-danger':errors.has('surname')}"
                                name="surname"
                                type="text"
                                id="firstName"
                                placeholder="Фамилия"
                                class="form-control"
                                v-model="editUser.surname"
                            >
                            <span v-show="errors.has('surname')" class="help is-danger">{{ errors.first('surname') }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="middleName" class="col-sm-4 control-label">Iм'я</label>
                        <div class="col-sm-8">
                            <input
                                v-validate="'required|alpha|max:20'"
                                :class="{'input': true, 'alert-danger':errors.has('name')}"
                                name="name"
                                type="text"
                                id="middleName"
                                placeholder="Имя"
                                class="form-control"
                                v-model="editUser.name"
                            >
                            <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="lastName" class="col-sm-4 control-label">По батькові</label>
                        <div class="col-sm-8">
                            <input
                                v-validate="'required|alpha|max:20'"
                                :class="{'input': true, 'alert-danger':errors.has('patronymic')}"
                                name="patronymic"
                                type="text"
                                id="lastName"
                                placeholder="Отчество"
                                class="form-control"
                                v-model="editUser.patronymic"
                            >
                            <span v-show="errors.has('patronymic')" class="help is-danger">{{ errors.first('patronymic') }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input
                                v-validate="'required|email'"
                                :class="{'input': true, 'alert-danger':errors.has('email')}"
                                name="email"
                                type="email"
                                id="email"
                                placeholder="Email"
                                class="form-control"
                                v-model="editUser.email"
                            >
                            <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 control-label" for="address">Описание</label>
                        <div class="col-md-8">
                        <textarea
                            v-validate="'required|max:255'"
                            :class="{'input': true, 'alert-danger':errors.has('description')}"
                            name="description"
                            class="form-control"
                            id="description"
                            placeholder="Описание"
                            v-model="user.description"
                        >
                        </textarea>
                            <span v-show="errors.has('description')" class="help is-danger">{{ errors.first('description') }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="password" class="col-sm-4 control-label">Пароль</label>
                        <div class="col-sm-8 position-relative">
                            <input
                                v-validate="'min:8|max:16'"
                                :class="{'input': true, 'alert-danger':errors.has('password')}"
                                name="password"
                                type="password"
                                id="password"
                                placeholder="Пароль"
                                class="form-control password"
                                v-model="editUser.password"
                                ref="password"
                                oncopy="return false"
                            >
                            <div class="visible position-absolute" @click="showPassword()">
                                <b-icon-eye-fill v-if="!visiblePassword&&editUser.password"></b-icon-eye-fill>
                                <b-icon-eye-slash-fill v-if="visiblePassword&&editUser.password"></b-icon-eye-slash-fill>
                            </div>
                            <b-icon-arrow-repeat
                                v-if="!editUser.password"
                                @click="genPassword()"
                                class="rand-password"
                            >
                            </b-icon-arrow-repeat>
                            <span v-show="errors.has('password')" class="help is-danger">{{ errors.first('password') }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="confirm-password" class="col-sm-4 control-label">Подтверждение пароля</label>
                        <div class="col-sm-8 position-relative">
                            <input
                                v-validate="'confirmed:password|'+(editUser.password ? 'required' : '')"
                                :class="{'input': true, 'alert-danger':errors.has('confirm-password')}"
                                name="confirm-password"
                                type="password"
                                id="confirm-password"
                                placeholder="Подтвердите пароль"
                                class="form-control"
                                ref="confirmPassword"
                                v-model="confirmPassword"
                            >
                            <div class="visible position-absolute" @click="showConfirmPassword()">
                                <b-icon-eye-fill v-if="!visibleConfirmPassword"></b-icon-eye-fill>
                                <b-icon-eye-slash-fill v-if="visibleConfirmPassword" ></b-icon-eye-slash-fill>
                            </div>
                            <span v-show="errors.has('confirm-password')" class="help is-danger">Пароли не совпадают</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="phoneNumber" class="col-sm-4 control-label">Номер телефону</label>
                        <div class="col-sm-8">
                            <input
                                @keyup="phoneValidator(editUser.number)"
                                v-validate="'required|max:17'"
                                :class="{'input': true, 'alert-danger':errors.has('number')}"
                                name="number"
                                type="phoneNumber"
                                id="phoneNumber"
                                placeholder="Номер телефона"
                                class="form-control"
                                v-model="editUser.number"
                            >
                            <span v-show="errors.has('number')" class="help is-danger">{{ errors.first('number') }}</span>
                            <span v-if="errorNumber" class="help is-danger">Не є дійсним номером телефону</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 control-label" for="address">Адреса</label>
                        <div class="col-md-8">
                        <textarea
                            v-validate="'required|max:255'"
                            :class="{'input': true, 'alert-danger':errors.has('address')}"
                            name="address"
                            class="form-control"
                            id="address"
                            placeholder="Адресс"
                            v-model="editUser.address"
                        >
                        </textarea>
                            <span v-show="errors.has('address')" class="help is-danger">{{ errors.first('address') }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-4">Укажите пол</label>
                        <div class="col-sm-8">
                            <label class="radio-inline mr-5">
                                <input
                                    v-validate="'required'"
                                    :class="{'input': true, 'alert-danger':errors.has('sex')}"
                                    name='sex'
                                    type="radio"
                                    id="femaleRadio"
                                    value="Женщина"
                                    v-model="editUser.sex"
                                >
                                Женский
                            </label>
                            <label class="radio-inline">
                                <input
                                    v-validate="'required'"
                                    :class="{'input': true, 'alert-danger':errors.has('sex')}"
                                    name='sex'
                                    type="radio"
                                    id="maleRadio"
                                    value="Мужчина"
                                    v-model="editUser.sex"
                                >
                                Мужской
                            </label>
                            <span v-show="errors.has('address')" class="help is-danger d-block">{{ errors.first('sex') }}</span>
                        </div>
                    </div>
                </div>
                <!--<input type="file" name="image" v-model="user.file">-->
                <button type="submit" class="btn btn-primary btn-block">Редагувати</button>
            </form> <!-- /form -->

        </div>
    </div>
</template>

<script>
    import AvatarLoad from './../AvatarLoad'
    export default {
        name: "EditUser",
        props:['user'],
        components:{
            AvatarLoad,
        },
        data(){
            return {
                editUser:{
                    name:'',
                    surname:'',
                    patronymic:'',
                    email:'',
                    number:'',
                    address:'',
                    sex:'',
                    password:'',
                    description:'',
                },
                visibleConfirmPassword:false,
                visiblePassword:false,
                confirmPassword:'',
                errorNumber:false
            }
        },
        created(){

            this.editUser=this.user;

        },
        methods:{
            showPassword(){
                this.visiblePassword = !this.visiblePassword;
                this.$refs.password.type=this.visiblePassword?'text':'password';
            },
            showConfirmPassword(){
                this.visibleConfirmPassword = !this.visibleConfirmPassword;
                this.$refs.confirmPassword.type=this.visibleConfirmPassword?'text':'password';
            },
            genPassword(){
                let len=12;
                let password = "";
                let symbols = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                for (let i = 0; i < len; i++){
                    password += symbols.charAt(Math.floor(Math.random() * symbols.length));
                }

                this.editUser.password = password;
                this.confirmPassword = password;
            },
        edit(){
            this.$validator.validateAll().then((result) => {
                if (result) {
                    const data = new FormData(document.getElementById('form'));
                   data.append('id', this.user.id);
                    data.append('role','Тренер');

                    axios.post('/admin/user-update/' + this.user.id, data,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then((response) => {
                                if (response.data.response == 'updated') {

                                    this.$toaster.success('Данные успешно отредактированы');
                                    document.location.href = "/admin/user"
                                }
                                else {

                                    this.$toaster.error('Ошибка');
                                }
                            })
                            .catch(e => {
                                this.$toaster.error(e.response.data.errors.email[0]);
                            })

                        }
                    else {

                        this.$toaster.warning("Заполните все поля!");
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
    textarea {
        height: 80px!important;
        resize: none!important;
    }
    .visible {
        width: 16px;
        top: 7px;
        right: 27px;
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
        right: 22px;
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
</style>
