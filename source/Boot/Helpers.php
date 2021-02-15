<?php


function str_search(?string $search): string
{
    $search = preg_replace("/[^a-z0-9A-Z\@\ ]/", "", $search);
    return $search;
}

/**
 * URL
 * @return string
 */
function url(string $path = null): string
{
    if (strpos($_SERVER["HTTP_HOST"], "localhost")) {
        if ($path) {
            return CONF_URL_TEST . "/"  . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST;
    }
    if ($path) {
        return CONF_URL_BASE . "/"  . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE;
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
            return CONF_URL_TEST . "/themes/" . CONF_VIEW_THEME . "/".  ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST . "/themes/" . CONF_VIEW_THEME;
    }
    if ($path) {
        return CONF_URL_BASE . "/themes/" . CONF_VIEW_THEME . "/" .($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE . "/themes/" . CONF_VIEW_THEME;
}
/**themes 2 */
function theme2(string $path = null): string
{
    if (strpos($_SERVER["HTTP_HOST"], "localhost")) {
        if ($path) {
            return CONF_URL_TEST . "/". ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST ;
    }
    if ($path) {
        return CONF_URL_BASE . "/" .($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE;
}
/**
 * redirect
 * @return void
 */
function redirect(string $url): void
{
    header("HTTP/1.1 302 Redicert");
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }
    if (filter_input(INPUT_GET, "router", FILTER_DEFAULT) != $url) {
        $location = url($url);
        header("Location: {$location}");
        exit;
    }
}

function image(?string $image, int $widht, int $height = null): ?string
{
    if($image)
    {
        return url() . "/" . (new \Source\Core\Thumb())->make($image, $widht, $height);
        
    }
    return null;
}

