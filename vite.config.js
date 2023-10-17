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
                'resources/css/tab-kWH.css',
                'resources/css/country-dropdown.css',
                'resources/css/charger-type.css',
                'resources/css/app.css',
                'resources/css/slider.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});