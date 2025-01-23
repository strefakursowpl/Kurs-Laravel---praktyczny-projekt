import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		 './storage/framework/views/*.php',
		 './resources/**/*.blade.php',
		 './resources/**/*.js',
		 './resources/**/*.vue',
		 './app/View/Components/**/*.php',
		 "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
	],
    darkMode: 'class',
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#1B00BF',
                secondary: '#E2FFAC',
                'dark-blue': '#0A0049',
                gray: '#71717A',
                'light-gray': '#A1A1AA',
                silver: '#F4F4F4',
            }
        },
    },
    plugins: [
		require("daisyui"),
		require("@tailwindcss/typography"),
	],
};
