/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./frontend/**/*.{html,js}", "node_modules/preline/dist/*.js"],
  darkMode: 'media', // or 'media' or 'class'
  plugins: [
     require('@tailwindcss/forms'),
    require("preline/plugin"),
  ],
};
