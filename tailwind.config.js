import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                navy: {
                    DEFAULT: "#081F5C",
                    light: "#0B2A78",
                    dark: "#07112B",
                },
                gold: {
                    DEFAULT: "#D4AF37",
                    light: "#E8C84A",
                    dark: "#B8961E",
                },
            },
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [forms, require("flowbite/plugin")],
};
