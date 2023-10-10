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
    .sass('resources/sass/app.scss', 'public/css')
    .browserSync({
        proxy: 'laravel-docker', // Substitua com o domínio da sua aplicação
        port: 8000,
        open: false, // Não abra automaticamente o navegador
        files: [
            'app/**/*.php', // Monitora arquivos PHP
            'resources/views/**/*.php', // Monitora arquivos de visualização PHP
            'public/**/*.js', // Monitora arquivos JS
            'public/**/*.css', // Monitora arquivos CSS
        ],
    });
