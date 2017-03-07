var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .scripts(['clipboard.js', 'colorfinder.js' ,'other.js', 'tagging.js'], 'resources/assets/js/bundle.js')
        .browserify('bundle.js')
        .version(['css/app.css', 'js/bundle.js'])
        .browserSync({
            proxy: 'homestead.app'
        });
});
