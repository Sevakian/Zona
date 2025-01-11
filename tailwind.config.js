/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.ts',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        'zona-blue-1': {
          DEFAULT: '#004d80',
        },
        'zona-blue-2': {
          DEFAULT: '#006eb8',
        },
        'zona-blue-3': {
          DEFAULT: '#0092f3',
        },
      },
    },
  },
  plugins: [],
};
