const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('public');

mix.sass('resources/sass/frontend/app.scss', 'css/frontend.css')
    .sass('resources/sass/backend/app.scss', 'css/backend.css')
    .js([
        'resources/js/frontend/app.js',
    ], 'js/frontend.js')
    .js([
        'resources/js/backend/before.js',
        'resources/js/backend/app.js',
        'resources/js/backend/after.js',
        'resources/js/backend/smartwizard/dist/js/validator.min.js',
        'resources/js/backend/smartwizard/dist/js/jquery.smartWizard.min.js',
        'resources/js/backend/jquery-ui/external/requirejs/jquery-ui.js',
        'resources/js/backend/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
        'resources/js/backend/remodal/dist/remodal.min.js', 
        'resources/js/backend/scripts.js'
    ], 'js/backend.js')
    .extract([
        'jquery',
        'bootstrap',
        'popper.js/dist/umd/popper',
        'axios',
        'sweetalert2',
        'lodash',
        '@fortawesome/fontawesome-svg-core',
        '@fortawesome/free-brands-svg-icons',
        '@fortawesome/free-regular-svg-icons',
        '@fortawesome/free-solid-svg-icons'
    ]);



if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}