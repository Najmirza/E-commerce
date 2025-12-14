/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Outfit', 'ui-sans-serif', 'system-ui', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
        serif: ['Playfair Display', 'serif'],
      },
      colors: {
        brand: {
          beige: '#F9F7F2',
          blue: '#E3EEF5',
          sage: '#A8C2BD',
          copper: '#D4A373',
          dark: '#2D3A3F',
        }
      }
    },
  },
  plugins: [],
}
