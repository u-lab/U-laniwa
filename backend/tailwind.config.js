const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                main: {
                    DEFAULT: '#26251F',
                    hover: '#FF6F6F',
                    em: '#B73A5B',
                    btn: '#FFFEFE',
                    border: '#FFF3F3',
                },
                bg: {
                    DEFAULT: '#FEDFDF',
                    sub: '#FFF3F3',
                    main: '#F1F1F1',
                },
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
