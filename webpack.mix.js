const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/js/assets/css/style.css', 'public/css')
    .postCss('resources/js/assets/css/vue-material.min.css', 'public/css')
    .sass('resources/js/assets/scss/material-kit.scss', 'public/css')
    .extract()
    // If you want to receive notification after build, remove it
    .disableNotifications()
    .version()
