import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css','resources/css/main.css','resources/css/sign.css','resources/css/style.css','resources/css/youth.css','resources/css/gallery.css','resources/js/script.js', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
