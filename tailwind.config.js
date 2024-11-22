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
        backgroundImage: {
          'light': "url('https://cdn.marslanders.world/images/bg-light.webp')",
          'dark': "url('https://cdn.marslanders.world/images/bg-dark.webp')",
        },
        colors: {
          'marslanders-blue': '#122542',
        }
      }
  },
  plugins: [],
}
