/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import App from './views/App';


import App from './views/App';
import Home from './pages/Home';
import About from './pages/About';
import Posts from './pages/Posts';
import Post from './pages/Post';
import Contacts from './pages/Contacts';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:  [
            {
                path: '/',
                name: 'home',
                component: Home
            },
            {
                path: '/posts',
                name: 'posts',
                component: Posts
            },
            {
                path: '/posts/:id',
                name: 'post',
                props: true, 
                component: Post
            },
            {
                path: '/about',
                name: 'about',
                component: About
            },
            {
                path: '/contacts',
                name: 'contacts',
                component: Contacts
            },
            
        ]
});
 
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});