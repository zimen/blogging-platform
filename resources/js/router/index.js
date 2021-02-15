import Vue       from 'vue'
import VueRouter from 'vue-router'

import Login from '../pages/auth/Login';
import Register from '../pages/auth/Register';
import Logout from '../pages/auth/Logout';
import Home from '../pages/Home';
import Posts from '../pages/posts/List';
import CreatePost from '../pages/posts/Create';

        Vue.use(VueRouter)

function loadView(view) {
    return () => require(`../pages/${view}.vue`);
}

Vue.router = new VueRouter({
    hashbang: false,
    mode: 'history',
    base: __dirname,
    routes: [{
            path: '/',
            name: 'site-home',
            component: Home            
        }, {
            path: '/signin',
            name: 'auth-login',
            component: Login,
            meta: {
                auth: false
            }
        },
        {
            path: '/signup',
            name: 'auth-register',
            component: Register,
            meta: {
                auth: false
            }
        },
        {
            path: '/logout',
            name: 'auth-logout',
            component: Logout,
            meta: {
                auth: true
            }
        },
        {
            path: '/my-posts',
            name: 'user-posts',
            component: Posts,
            meta: {
                auth: true
            }
        },
        {
            path: '/create-post',
            name: 'new-post',
            component: CreatePost,
            meta: {
                auth: true
            }
        }
    ]
});

export default Vue.router;