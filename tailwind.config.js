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
            screens: {
                xs: "475px",
            },
            animation: {
                wiggle: "wiggle .5s forwards",
                borderanim: "borderanim .5s forwards",
            },
            keyframes: {
                wiggle: {
                    "0%": {
                        width: "4px",
                    },

                    "100%": {
                        width: "100%",
                        borderRadius: "0px",
                    },
                },
                borderanim: {
                    "0%": {
                        opacity: "0",
                    },

                    "100%": {
                        opacity: "1",
                    },
                },
            },
            colors: {
                primary: "#31473A",
                secondary: "#fff ",
            },
            gridTemplateColumns: {
                mamutsm: "repeat(1, minmax(0, 300px))",
                mamutmd: "repeat(2, minmax(0, 300px))",
                mamutlg: "repeat(3, minmax(0, 300px))",
                mamutxl: "repeat(5, minmax(0, 300px))",
                mamut2xl: "repeat(4, minmax(0, 300px))",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
