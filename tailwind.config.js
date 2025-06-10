import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                primary: "#29d847",
                secondary: "#82f095 ",
                accent: "#3ff35e",
                paragraph: "#5c5c5c",
                text: "#2e2e2e",

            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins',...defaultTheme.fontFamily.sans], 
            },
        },
    },

    plugins: [forms],
};
