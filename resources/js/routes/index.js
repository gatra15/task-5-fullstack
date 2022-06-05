require('../bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Home from '../pages/Home.vue';
import Category from '../pages/Category.vue';
import Article from '../pages/Article.vue';
import NotFound from '../pages/NotFound.vue';

const routes = [
    {
        path: '/home',
        component: Home
    },
    {
        path: '/posts',
        component: Article
    },
    {
        path: '/categories',
        component: Category
    },
    {
        path: '*',
        component: NotFound,
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router