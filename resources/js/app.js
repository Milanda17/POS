import VueAxios from "vue-axios";
import Vue from 'vue'
import VueRouter from 'vue-router'
import {Form} from 'vform'
import {routes} from './router'
import axios from 'axios'
import JsonCSV from 'vue-json-csv'
import VueGoogleCharts from 'vue-google-charts'
require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter)
Vue.use(VueAxios, axios)
Vue.component('downloadCsv', JsonCSV)
Vue.use(VueGoogleCharts)

Vue.router = router
window.Form = Form;

const router = new VueRouter({
    mode: 'history',
    routes
});



Vue.component('app-component', require('./views/App').default);
Vue.component('navbar', require('./components/Navbar').default);
Vue.component('sidebar', require('./components/Sidebar').default);



const app = new Vue({
    el: '#app',
    router,
    app,

});
