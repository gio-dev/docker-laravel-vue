import ListAllHomeAppliances from './components/ListAllHomeAppliances.vue';
import CreateHomeAppliances from "./components/CreateHomeAppliances";
import EditHomeAppliances from "./components/EditHomeAppliances";
import PathNotFound from "./components/PathNotFound";
import { createRouter, createWebHistory } from 'vue-router'
const routes = [
    {
        name: 'list',
        path: '/',
        component: ListAllHomeAppliances
    }
    ,{
        name: 'create',
        path: '/create',
        component: CreateHomeAppliances
    }
    ,{
        name: 'edit',
        path: '/edit/:id',
        component: EditHomeAppliances
    },
    { path: '/:pathMatch(.*)*', component: PathNotFound },
];

export default createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass:'active'
})
