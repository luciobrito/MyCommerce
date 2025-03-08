import { createRouter, createWebHistory } from "vue-router";
import Vendas from "./Views/Vendas.vue";
import Home from "./Views/Home.vue";


export const router = createRouter(
    {
        history: createWebHistory(),
        routes:[
            {
                path: '/vendas',
                component: Vendas,
            },
            {
                path: '/',
                component: Home
            }
        ]
    }
)