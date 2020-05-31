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

var $ = require( "jquery" );
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/jquery.min.js', 'public/js')

    .js('resources/js/popper.min.js', 'public/js')
    .js('resources/js/jquery.easing.1.3.js', 'public/js')
    .js('resources/js/jquery-migrate-3.0.1.min.js', 'public/js')
    .js('resources/js/jquery.waypoints.min.js', 'public/js')
    .js('resources/js/jquery.stellar.min.js', 'public/js')
    .js('resources/js/owl.carousel.min.js', 'public/js')

    .js('resources/js/aos.js', 'public/js')
    .js('resources/js/jquery.animateNumber.min.js', 'public/js')
    .js('resources/js/bootstrap-datepicker.js', 'public/js')
    .js('resources/js/jquery.timepicker.min.js', 'public/js')
    .js('resources/js/main.js', 'public/js')
    // .js('resources/js/jquery.magnific-popup.min.js', 'public/js')
    .js('resources/js/scrollax.min.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles('resources/css/animate.css', 'public/css/animate.css')
    .styles('resources/css/owl.carousel.min.css', 'public/css/owl.carousel.min.css')
    .styles('resources/css/owl.theme.default.min.css', 'public/css/owl.theme.default.min.css')
    .styles('resources/css/magnific-popup.css', 'public/css/magnific-popup.css')
    .styles('resources/css/aos.css', 'public/css/aos.css')
    .styles('resources/css/ionicons.min.css', 'public/css/ionicons.min.css')
    .styles('resources/css/bootstrap-datepicker.css', 'public/css/bootstrap-datepicker.css')
    .styles('resources/css/jquery.timepicker.css', 'public/css/jquery.timepicker.css')
    .styles('resources/css/flaticon.css', 'public/css/flaticon.css')
    .styles('resources/css/icomoon.css', 'public/css/icomoon.css')
    .styles('resources/css/style.css', 'public/css/style.css')

