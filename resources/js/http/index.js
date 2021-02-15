import Vue from 'vue';

// Vue Resource
//import VueResource from 'vue-resource';

//Vue.use(VueResource);
//Vue.http.options.root = process.env.MIX_APP_URL;

// Axios
import axios    from 'axios';
import VueAxios from 'vue-axios';

axios.defaults.baseURL = document.head.querySelector('meta[name="api-base-url"]').content + '/api';
Vue.use(VueAxios, axios);

export default {
    root: process.env.MIX_APP_URL
};