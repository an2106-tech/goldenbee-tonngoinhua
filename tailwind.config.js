/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './**/*.php',
    './assets/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          DEFAULT: '#003481',
          dark: '#002a66',
          light: '#4568ff',
        },
        secondary: {
          DEFAULT: '#6bca1e',
          dark: '#2ba249',
        },
        accent: {
          DEFAULT: '#ff6600',
          phone: '#333399',
        },
      },
      fontFamily: {
        sans: ['Roboto', 'Arial', 'sans-serif'],
        nav: ['Montserrat', 'Arial', 'sans-serif'],
      },
      maxWidth: {
        site: '1250px',
      },
    },
  },
  plugins: [],
};
