const mix = require('laravel-mix')

mix.js('src/js/index.js', 'dist/bootstrap.js')
   .js('src/js/index-with-recipe.js', 'dist/recipe.js')
   .sass('src/scss/bootstrap.scss', 'dist')
   .js('gutenberg/src/index.js', 'gutenberg/blocks.js').react()
//    .setPublicPath('dist')