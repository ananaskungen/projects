let mix = require('laravel-mix');

mix.sass('assets/css/main.scss', 'dist')
   .js('assets/js/main.js', 'dist');