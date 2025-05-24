import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                'font-jost': ['Hanken Grotesk', ...defaultTheme.fontFamily.sans],
                'font-second': ['Albert Sans', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'primary-color':'#5C5C5C',
                'black-color':'#000000'
    
            }
        },
        
    },
    plugins: [],
};
