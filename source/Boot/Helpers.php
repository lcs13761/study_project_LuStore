<?php

use Source\Core\Session;

use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Url;
use Pecee\Http\Response;
use Pecee\Http\Request;
use Source\Models\User;

if(!function_exists('auth')){
    function auth(){
        $session = new \App\Core\Session();
        if (!$session->has("authUser")) {
            return null;
        }
        return User::find($session->authUser);
    }
}

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
function theme(string $path = null,$theme =  CONF_VIEW_THEME): string
{
    if (strpos($_SERVER["HTTP_HOST"], "localhost")) {
        if ($path) {
            return CONF_URL_TEST . "/themes/{$theme}/" .  ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST . "/themes/{$theme}";
    }
    if ($path) {
        return CONF_URL_BASE . "/themes/{$theme}/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE . "/themes/{$theme}";
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
        $session = new \App\Core\Session();
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
        $session = new \App\Core\Session();
        if (empty($session->csrf_token) || $request != $session->csrf_token) {
            return false;
        }
        return true;
    }
}


if (!function_exists('session')) {

    function session()
    {
        return new \App\Core\Session();
    }
}



function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if (!function_exists("errors_validation")) {

    function errors_validation()
    {


        if (session()->errors) {
            $errors = session()->errors;
            session()->unset("error");
            foreach ($errors as $key => $value) {
                echo "<p  class='text-dark'>{$value}</p>";
            }
            return;
        }

        if(session()->message){
            $message = session()->message;
            session()->unset("message");
            return "<p  class='text-dark'>{$message}</p>";
        }
    }
}


if(!function_exists('errors')){

    function errors() {
        $errors = session()->errors;
        session()->unset("errors");
        return $errors;
    }
}

if(!function_exists('tokenEmailVerification')) {

    function tokenEmailVerification($email): bool|string
    {
        return  hash("sha256", base64_encode($email));
    }
}


/**
 * ####################
 * ###   PASSWORD   ###
 * ####################
 */

/**
 * @param string $password
 * @return string
 */
function passwd(string $password): string
{
    if (!empty(password_get_info($password)['algo'])) {
        return $password;
    }

    return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}


function format_money(string $data): float
{
    if (strpos($data, ".")) {
        $data = str_replace(".", "", $data);
    }
    if (strpos($data, ",")) {
        $data = str_replace(",", ".", $data);
    }
    if(strpos($data, "$")){
        $data = str_replace("R$", " ", $data);
    }

    return $data;
}

function money(float $value): string
{
    return number_format($value, 2, ',', '.');
}
