import indexComponent from './components/indexComponent';
import loginComponent from './components/loginComponent';
import { createRouter, createWebHistory } from "vue-router";

const routeInfos = [
    {
        path: '/',
        name: 'index',
        component: indexComponent
    },
    {
        path: '/login',
        name: 'login',
        component: loginComponent
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes: routeInfos
})

export default router;