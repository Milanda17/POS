require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import { routes } from './router'

const router = new VueRouter({
    mode: 'history',
    routes
});

Vue.router = router

Vue.component('app-component', require('./views/App').default);
Vue.component('navbar', require('./components/Navbar').default);



const app = new Vue({
    el: '#app',
    router
});
