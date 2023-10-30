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
                'resources/css/googleMap.css',
                'resources/css/slider.css',
                'resources/css/dashboardNav.css',
                'resources/css/geoInfo.css',
                'resources/js/app.js',
                'resources/js/dashboardMap.js',
                'resources/js/dashboardInfo.js',
            ],
            refresh: true,
        }),
    ],
});