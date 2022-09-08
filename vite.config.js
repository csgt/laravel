import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue2'
import inject from '@rollup/plugin-inject';

export default defineConfig({
    plugins: [
        inject({
            $: 'jquery',
        }),
        vue(),
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost'
        }
    },
    resolve: {
        alias: [
            {
                find: /^~(.*)$/,
                replacement: '$1',
            },
            {
                find: 'vue',
                replacement: 'vue/dist/vue.js',
            },
        ],
    },
});
