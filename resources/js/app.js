import Vue    from 'vue';
import 'es6-promise/auto';
import axios from 'axios';
import './bootstrap';
import moment from 'moment';


import http   from './http';
import store  from './store';
import router from './router';
import config from './config';

import Index from './pages/Index.vue';

import Login from './pages/auth/Login'
import Navbar from './partials/navbar'
import Menu from './partials/menu'
import Footer from './partials/footer'

        Vue.config.productionTip = false;

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.filter('formatDate', function (value) {
    if (value) {
        return moment(String(value)).format('YYYY-MM-DD hh:mm:ss');
    }
});

// Load Login
Vue.component('login', Login);
Vue.component('app-navbar', Navbar);
Vue.component('app-menu', Menu);
Vue.component('app-footer', Footer);

new Vue({
    el: '#app',
    http: http,
    store: store,
    router: router,
    config: config,
    render: h => h(Index)
});