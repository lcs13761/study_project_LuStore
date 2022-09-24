const mix = require('laravel-mix');

mix.copyDirectory('resources/assets/css','public/css');
mix.copyDirectory('resources/assets/js','public/js');
mix.copyDirectory('resources/assets/images','public/images');