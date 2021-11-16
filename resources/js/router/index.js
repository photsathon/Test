import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home.vue';
import Register from '../pages/Register.vue';
import Login from '../pages/Login.vue';
import Dashboard from '../pages/Dashboard.vue';

import Profiles from '../components/Profiles.vue';
import Editprofile from '../components/Editprofile.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'profiles',
        path: '/profiles',
        component: Profiles
    },
    {
        name: 'editprofile',
        path: '/profiles/edit/:id',
        component: Editprofile
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
