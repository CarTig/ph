/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./node_modules/tw-elements/dist/js/**/*.js",
  ],
  theme: {
    extend: {
      colors:{
        'brown':'#52474d',
        'lightbrown1':'',
        'lightbrown2':'',
        'lightbrown3':'',
        'lightbrown4':'',
        
        'green':'#66ad8b',
        'lightgreen1':'#93c5ad',
        'lightgreen2':'#b2d6c5',
        'lightgreen3':'#e0eee7',
        'lightgreen4':'#eff6f3',
        
        'ocre':'#E87669',
        'lightocre1':'#ee9f96',
        'lightocre2':'#f3bab4',
        'lightocre3':'#fae3e1',
        'lightocre4':'#fcf1f0',

        'yellow':'#fcd04a',
        'lightyellow1':'#fcde80',
        'lightyellow2':'#fde7a4',
        'lightyellow3':'#fef5da',
        'lightyellow4':'#fefaec',

        'beige':'#fffff1',

      },


    },
  },
  plugins: [
    [require("tw-elements/dist/plugin")]
  ],
}
