<?php

use App\Supports\Env;
use App\Supports\Lang;
use App\Supports\View;
use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Url;
use Pecee\Http\Response;
use Pecee\Http\Request;

/**
 * Get url for a route by using either name/alias, class or method name.
 *
 * The name parameter supports the following values:
 * - Route name
 * - Controller/resource name (with or without method)
 * - Controller class name
 *
 * When searching for controller/resource by name, you can use this syntax "route.name@method".
 * You can also use the same syntax when searching for a specific controller-class "MyController@home".
 * If no arguments is specified, it will return the url for the current loaded route.
 *
 * @param string|null $name
 * @param string|array|null $parameters
 * @param array|null $getParams
 * @return \Pecee\Http\Url
 * @throws \InvalidArgumentException
 */
function url(?string $name = null, $parameters = null, ?array $getParams = null): Url
{
    return Router::getUrl($name, $parameters, $getParams);
}

/**
 * @return \Pecee\Http\Response
 */
function response(): Response
{
    return Router::response();
}

/**
 * @return \Pecee\Http\Request
 */
function request(): Request
{
    return Router::request();
}

/**
 * Get input class
 * @param string|null $index Parameter index name
 * @param string|mixed|null $defaultValue Default return value
 * @param array ...$methods Default methods
 * @return \Pecee\Http\Input\InputHandler|array|string|null
 */
function input($index = null, $defaultValue = null, ...$methods)
{
    if ($index !== null) {
        return request()->getInputHandler()->value($index, $defaultValue, ...$methods);
    }

    return request()->getInputHandler();
}

/**
 * @param string $url
 * @param int|null $code
 */
function redirect(string $url, ?int $code = null): void
{
    if ($code !== null) {
        response()->httpCode($code);
    }

    response()->redirect($url);
}

/**
 * Get current csrf-token
 * @return string|null
 */
function csrf_token(): ?string
{
    $baseVerifier = Router::router()->getCsrfVerifier();
    if ($baseVerifier !== null) {
        return $baseVerifier->getTokenProvider()->getToken();
    }

    return null;
}

/**
 * 
 */
if (!function_exists('config')) {
    function config($value)
    {
        if (str_contains($value, ".")) {
            $array = explode(".", $value);
            $configResult = include base_app("config/$array[0].php");
            $values = $configResult;
            unset($array[0]);

            foreach ($array as $value) {
                $values = $values[$value];
            }
            return $values;
        }
        return include base_app("config/$value.php");
    }
}

/**
 * 
 */
if (!function_exists('base_app')) {
    function base_app(string $path): string
    {
        return realpath('../' . $path);
    }
}

if (!function_exists('env')) {
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

/**
 * 
 */
if (!function_exists('view')) {
    function view(string $path, array $args = [])
    {
        $views = base_app("resources/views");

        return (new View($views))->render($path, $args);
    }
}

/**
 * 
 */
if (!function_exists('__')) {
    function __(string $string, array $options = [])
    {
        return (new Lang)->getLang($string, $options);
    }
}

/**
 * 
 */
if (!function_exists('assets')) {
    function assets($path)
    {
        return env('APP_URL') . "/"  . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
}

/**
 * 
 */
if (!function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function value($value, ...$args)
    {
        return $value instanceof Closure ? $value(...$args) : $value;
    }
}
