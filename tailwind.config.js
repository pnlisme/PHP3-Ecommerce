/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            keyframes: {
                shine: {
                    "0%": { transform: "translateX(0%) skewX(20deg)" },
                    "100%": { transform: "translateX(200%) skewX(20deg)" },
                },
            },
            animation: {
                shine: "shine 300ms linear forwards",
            },
        },
    },
    plugins: [],
};
