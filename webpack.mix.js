const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/bootstrap.min.js','public/js')
    .js('resources/js/nifty.min.js','public/js')
    .js('resources/js/tables-datatables.js','public/js')
    .js('resources/js/form-file-upload.js','public/js')
    .js('resources/js/dropzone.min.js','public/js')
    .sass('resources/sass/bootstrap.min.scss','public/css')
    .sass('resources/sass/nifty.min.scss','public/css')
    .sass('resources/sass/nifty-demo-icons.min.scss','public/css')