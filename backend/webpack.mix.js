const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/indexChart.js", "public/js")
    .js("resources/js/imageCompress.js", "public/js")
    .js("resources/js/lineBreakPrevention.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
    ]);
mix.browserSync({
    proxy: "localhost:213",
    files: [
        "resources/views/**/*.blade.php",
        "public/css/*.css",
        "public/js/*.js",
    ],
    open: true,
    reloadOnRestart: true,
});

if (mix.inProduction()) {
    mix.version();
}
