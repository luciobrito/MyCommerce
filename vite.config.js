import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
export default defineConfig({
    server:{
        hmr:{
            host:'192.168.15.79'
            
        },
        headers:{
            'Access-Control-Allow-Origin': '*'
        }
    },
    plugins: [
        laravel({
            buildDirectory: "js/app",
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template:{
                transformAssetUrls:{
                    base: null,
                    includeAbsolute: null
                }
            },
        })
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js'
        }
    }
});
