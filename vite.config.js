import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
            host: 'laravel.test',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/price.css',
                'resources/js/app.js',
                'resources/js/calculator.js',
            ],
            refresh: true,
        }),
    ],
});