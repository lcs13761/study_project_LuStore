<?php


if (strpos($_SERVER["HTTP_HOST"], "localhost")) {
    define("CONF_DB_HOST","127.0.0.1");
define("CONF_DB_USER","root");
define("CONF_DB_NAME","LuVariedad");
define("CONF_DB_PASSWD","0131");

}else{
    define("CONF_DB_HOST","localhost");
define("CONF_DB_USER","lucasdevjr_lucasdevjr");
define("CONF_DB_NAME","lucasdevjr_LuVariedad");
define("CONF_DB_PASSWD","ptevnjpszfpi7xuguy");

}

define("CONF_URL_BASE","https://www.lucasdevjr.com.br");
define("CONF_URL_TEST" , "https://www.localhost/Project4");



/**
 * bd
 */


/**
 * View
 */
define("CONF_VIEW_PATH" , "/../../shared/view");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "cbweb");
define("CONF_VIEW_ADMIN", "admin");

/**
 * Support
 */
define("CONF_SITE_NAME", "LuVariedade");
define("CONF_SITE_TITLE", "Descubra sua roupa ideal");
define("CONF_SITE_DESC" , "Conheça nosso catalogo de roupas ,é bolsas");
define("CONF_SITE_LANG", "pt_BR");
/**Uploads */
define("CONF_UPLOAD_DIR","storage");
define("CONF_UPLOAD_IMAGE_DIR","imagem");
/**Imagem */
/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

