const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/delete.js", "public/js")
    .js("resources/js/users.js", "public/js")
    .js("resources/js/search.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .postCss("resources/css/style.css", "public/css")
    .postCss("resources/css/layoutApp.css", "public/css")
    .postCss("resources/css/layoutLogin.css", "public/css")
    .postCss("resources/css/layoutHome.css", "public/css");

mix.browserSync("http://localhost:8000/");
