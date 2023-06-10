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
  variants: {
    extend: {
      /* ... */
    },
    /* Apply group-hover variant to textColor */
    textColor: ['group-hover'],
    /* ... */
  },
  plugins: [
    require('flowbite/plugin'),
    ],
}

