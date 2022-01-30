import {createWebHistory, createRouter} from "vue-router";

const routes = [
    {
    name: 'dashboard',
    path: '',
    component: () => import('./components/Dashboard.vue')
    },
    {
        name: 'create',
        path: '/create',
        component: () => import('./components/Create.vue')
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: () => import('./components/Edit.vue')
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;