import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "tailwindcss";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/pinesui/date-picker.js",
            ],
            refresh: true,
        }),
    ],
    css: {
        postCss: [tailwindcss("./tailwind.config.js")],
    },
});
