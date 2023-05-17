/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    fontFamily:{
        'sans':'Poppins'
    },
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

