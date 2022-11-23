const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    // darkMode: ['class', '[data-mode="dark"]'],

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './src/**/*.{html,js}', './node_modules/tw-elements/dist/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        // mode: 'light',
        // palette: 'palette1',
        // monochrome: {
        //     enabled: false,
        //     color: '#255aee',
        //     shadeTo: 'light',
        //     shadeIntensity: 0.65
        // },
        // typography: (theme) => ({
        //     dark: {
        //         css: {
        //             h1: {
        //                 color: theme('colors.white'),
        //                 fontWeight: 800,
        //                 fontSize: '2.25em',
        //                 marginTop: 0,
        //                 marginBottom: '0.8em',
        //                 lineHeight: 1.1,
        //             },
        //
        //             body: {
        //                 backgroundColor: '#3aebca',
        //             }
        //         },
        //     },
        // }),
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('tw-elements/dist/plugin')
    ],
};
