/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./app/Enums/InscriptionRarity.php",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
          'marslanders-blue': '#122542',
        }
      }
  },
  plugins: [],
}
