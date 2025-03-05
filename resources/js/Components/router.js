import { createRouter, createWebHistory } from "vue-router";
import Vendas from "./Views/Vendas.vue";


export const router = createRouter(
    {
        history: createWebHistory(),
        routes:[
            {
                path: '/vendas',
                component: Vendas,
            }
        ]
    }
)