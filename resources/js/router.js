import {createWebHistory, createRouter} from "vue-router";
import Dashboard from "./components/Dashboard.vue";
import Create from "./components/Create.vue";

const routes = [
    {
    name: 'dashboard',
    path: '',
    component: Dashboard
    },
    {
        name: 'create',
        path: '/create',
        component: Create
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;