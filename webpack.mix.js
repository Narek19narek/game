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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/game.scss', 'public/css')
    .options({
        autoprefixer: {
            options: {
                Browserslist: [
                    'last 6 versions',
                ]
            }
        }
    });

mix.js('resources/js/bootstrap.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps()
    .options({
        autoprefixer: {
            options: {
                Browserslist: [
                    'last 6 versions',
                ]
            }
        }
    });

mix.js('resources/js/main.js', 'public/js')
    // .babel('public/js/main.js', 'public/js/main.js')
    .sass('resources/sass/main.scss', 'public/css')
    .options({
        autoprefixer: {
            options: {
                Browserslist: [
                    'last 6 versions',
                ]
            }
        }
    });

mix.sass('resources/sass/ie.scss', 'public/css')
    .options({
        autoprefixer: {
            options: {
                Browserslist: [
                    'last 6 versions',
                ]
            }
        }
    });

mix.copyDirectory('resources/js/Slider.js', 'public/js');

