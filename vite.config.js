import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import { viteStaticCopy } from "vite-plugin-static-copy";

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "node_modules/admin-lte/dist/js/adminlte.min.js",
            ],
            refresh: true,
            fonts: [
                bunny("Instrument Sans", {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        viteStaticCopy({
            targets: [
                {
                    src: "node_modules/@fortawesome/fontawesome-free/webfonts",
                    dest: "resources",
                },
            ],
        }),
    ],
    server: {
        hmr: {
            host: "localhost",
        },
    },
    resolve: {
        alias: [
            {
                find: /^~(.*)$/,
                replacement: "$1",
            },
            {
                find: "vue",
                replacement: "vue/dist/vue.esm-bundler.js",
            },
        ],
    },
    watch: {
        ignored: ["**/storage/framework/views/**"],
    },
});
