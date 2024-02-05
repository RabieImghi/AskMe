import { createRouter, createWebHistory } from 'vue-router';
import AppHome from '../components/componentsHome/AppHome.vue';

const routes = [
    {name: 'Home', path: '/', component: AppHome},
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;