import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "tailwindcss";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/date-picker.js",
                "resources/css/app.css",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
    css: {
        postCss: [tailwindcss("./tailwind.config.js")],
    },
});
