<?php

use Source\Core\Session;

use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Url;
use Pecee\Http\Response;
use Pecee\Http\Request;

if (!function_exists('abort')) {

    function abort($message = '')
    {
        session()->set('flash', $message);
        return url_back();
    }
}


/**
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


function str_search(?string $search): string
{
    $search = preg_replace("/[^a-z0-9A-Z\@\ ]/", "", $search);
    return $search;
}

/**
 * URL_BACK
 * @return string
 */
function url_back(): string
{
    return ($_SERVER['HTTP_REFERER'] ?? url());
}
/**
 * walks to the content of the view
 */
/**
 * theme
 * @return string
 */
function theme(string $path = null): string
{
    if (strpos($_SERVER["HTTP_HOST"], "localhost")) {
        if ($path) {
            return CONF_URL_TEST . "/themes/" . CONF_VIEW_THEME . "/" .  ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST . "/themes/" . CONF_VIEW_THEME;
    }
    if ($path) {
        return CONF_URL_BASE . "/themes/" . CONF_VIEW_THEME . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE . "/themes/" . CONF_VIEW_THEME;
}


function image(?string $image, int $width, int $height = null): ?string
{
    if ($image) {
        return url() . "/" . (new \Source\Support\Thumb())->make($image, $width, $height);
    }
    return null;
}


if (!function_exists('csrf_field')) {

    function csrf_field()
    {
        return '<input type="hidden" name="_token" value="' . csrf_token() . '" />';
    }
}


if (!function_exists('csrf_token')) {

    function csrf_token()
    {
        $session = new Session();
        $session->csrf();
        if (isset($session->csrf_token)) {
            return $session->csrf_token;
        }

        throw new Exception('Application session store not set.');
    }
}

if (!function_exists('csrf_verify')) {

    /**
     * @param $request
     * @return bool
     */
    function csrf_verify($request): bool
    {
        $session = new \Source\Core\Session();
        if (empty($session->csrf_token) || $request != $session->csrf_token) {
            return false;
        }
        return true;
    }
}


if (!function_exists('session')) {

    function session()
    {
        return new Session();
    }
}


if (!function_exists('auth')) {

    function auth()
    {
    }
}

function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if (!function_exists("errors_validation")) {

    function errors_validation()
    {
        if (session()->validate) {
            $errors = session()->validate;
            session()->unset("validate");
            foreach ($errors as $key => $value) {
                echo "<p  class='text-light'>{$value}</p>";
            }
            return;
        }

        if(session()->message){
            $message = session()->message;
            session()->unset("message");
            return "<p  class='text-light'>{$message}</p>";
        }
    }
}
