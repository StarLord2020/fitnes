/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'

import Toaster from 'v-toaster'
import VeeValidate from 'vee-validate';
// You need a specific loader for CSS files like https://github.com/webpack/css-loader
import 'v-toaster/dist/v-toaster.css'
Vue.use(VeeValidate, {
    fieldsBagName: 'veeFields',
    locale: 'ukr',
    dictionary: {
        ukr: {
            messages:{
                confirmed: 'Паролі не совдают',
                required:'Поле не може залишатися порожнім',
                alpha:"Поле може містити лише алфавітні символи",
                max: 'Перевищує ліміт',
                excluded:'Виберіть дані',
                email:"Поле електронної пошти має бути дійсним"
            },
            attributes:{
                surname:" ",
                name:" ",
                patronymic:" ",
                email:' ',
                address:" ",
                role:" ",
                sex:" ",
                number:" ",
                'confirm-password': " ",
                password: " ",
            }
        },

    }
});
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
// optional set default imeout, the default is 10000 (10 seconds).
Vue.use(Toaster, {timeout: 5000})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('table-admin',require('./components/admin/TableAdmin').default);
Vue.component('create-user',require('./components/admin/user/CreateUser').default);
Vue.component('edit-user',require('./components/admin/user/EditUser').default);
Vue.component('index-user',require('./components/admin/user/IndexUser').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
