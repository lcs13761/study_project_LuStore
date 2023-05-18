const mix = require("laravel-mix");

mix.copyDirectory("resources/assets/js", "public/js");

mix.postCss("resources/assets/css/app.css", "public/css");

// mix.copyDirectory("resources/assets/css", "public/assets/css");

mix.copyDirectory("resources/assets/images", "public/images");
