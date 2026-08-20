import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import { glob } from 'glob';
// import tailwindcss from '@tailwindcss/vite';

const images = glob.sync(
    'resources/images/**/*.{png,jpg,jpeg,svg,gif,webp}',
    'resources/icon/**/*.{png,jpg,jpeg,svg,gif,webp}'
);


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', ...images,],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        // tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
