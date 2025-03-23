import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import vueDevTools from 'vite-plugin-vue-devtools';
import path from 'path';
import tailwindcss from '@tailwindcss/vite';
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template:{ 
                base: null,
                includeAbsolute: false
            }
        }),
        vueDevTools(),
        tailwindcss(),
    ],
    resolve:{
        alias:{
            '@': path.resolve(__dirname, 'resources/js'),
            'ziggy': path.resolve(__dirname, 'vendor/tightenco/ziggy/dist/index.esm.js'),
        }
    }
});