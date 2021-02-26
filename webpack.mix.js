const mix = require('laravel-mix')

mix.js('src/js/index.js', 'dist/bootstrap.js')
   .sass('src/scss/bootstrap.scss', 'dist')
//    .setPublicPath('dist')