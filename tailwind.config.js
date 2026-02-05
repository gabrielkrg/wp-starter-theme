/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './**/*.php',
    './assets/js/**/*.js',
    './partials/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#0b67a8',
        secondary: '#e0e1dd',
        'dark-gray': '#353535',
        'medium-gray': '#6d6d6d',
        'light-gray': '#e0e0e0',
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
      },
      fontSize: {
        'default': '16px',
        'large': '35px',
        'medium': '25px',
        'small': '14px',
      },
    },
  },
  plugins: [],
}
