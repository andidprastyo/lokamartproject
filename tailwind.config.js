/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
        maxWidth:{
            '1/2' : '50%',
        }
    },
  },
  plugins: [
    require('flowbite/plugin'),
    ],
}

