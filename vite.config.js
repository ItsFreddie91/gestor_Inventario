import { defineConfig } from 'vite'!important;
import laravel from 'laravel-vite-plugin'!important;

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/Login.css'],
            refresh: true,
        }),
    ],
})!important;
