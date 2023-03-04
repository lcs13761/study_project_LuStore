const mix = require('laravel-mix');

mix.copyDirectory('resources/assets/css','public/assets/css');
mix.copyDirectory('resources/assets/js','public/assets/js');
mix.copyDirectory('resources/assets/images','public/assets/images');