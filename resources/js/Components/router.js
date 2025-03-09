import { createRouter, createWebHistory } from "vue-router";
import Vendas from "./Views/Vendas.vue";
import Home from "./Views/Home.vue";
import Produtos from "./Views/Produtos.vue";
import Stats from "./Views/Stats.vue";


export const router = createRouter(
    {
        history: createWebHistory(),
        routes:[
            {
                path: '/',
                component: Home
            },
            {
                path: '/vendas',
                component: Vendas,
            },
            {
                path: '/produtos',
                component: Produtos
            },
            {
                path: '/stats',
                component: Stats
            }

        ]
    }
)