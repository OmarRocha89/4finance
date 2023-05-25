/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('datos-clientes', require('./components/DatosClientes.vue').default);
Vue.component('estados-cuenta', require('./components/EstadosCuenta.vue').default);
Vue.component('clientes', require('./components/Clientes.vue').default);
Vue.component('info-corte', require('./components/InfoCorte.vue').default);
Vue.component('info-operaciones', require('./components/InfoOperaciones.vue').default);
Vue.component('todas-facturas', require('./components/facturas.vue').default);
Vue.component('vista-acuse', require('./components/acuse.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import "./bootstrap"
import Vue from "vue"
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import "bootstrap-vue/dist/bootstrap-vue.css"
import axios from "axios";

Vue.use(BootstrapVueIcons)
Vue.use(BootstrapVue)


    const app = new Vue({
        el: '#app',
        created(){

        },
        data: {

        },
        methods:{

        }

    });




