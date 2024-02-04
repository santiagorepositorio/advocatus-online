const defaultTheme = require('tailwindcss/defaultTheme');


/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        // container: {
        //     padding: {
        //         DEFAULT: '1rem',
        //         sm: '2rem',
        //         lg: '4rem',
        //         xl: '5rem',
        //         '2xl': '6rem',
        //       },
        //   },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    corePlugins: {
        container: false,
      },
    
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
