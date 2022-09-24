<?php

use App\Support\Env;
use Illuminate\View\View;
use SebastianBergmann\Environment\Console;

if (!function_exists('config')) {
    function config($value)
    {
        if (str_contains($value, ".")) {
            $array = explode(".", $value);
            $configResult = app("/../../config/$array[0].php");
            $values = $configResult;
            unset($array[0]);

            foreach ($array as $value) {
                $values = $values[$value];
            }
            return $values;
        }
        return app("/../$value.php");
    }
}

if (!function_exists('getValueArray')) {
    function app($path)
    {
        return include __DIR__. $path;
    }
}

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        return Env::get($key, $default);
    }
}

if (!function_exists('view')) {
    function view($path, array $args = [])
    {
        $views = __DIR__ ."/../../resources/views/";
        $cache =  __DIR__ ."/../../bootstrap/cache";
        return (new \Jenssegers\Blade\Blade($views, $cache))
      ->make(str_replace('.', '/', $path), $args)->render();
    }
}

if (!function_exists('assets')) {
    function assets($path)
    {
        return env('APP_URL') . "/"  . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
}
