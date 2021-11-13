<?php


if (strpos($_SERVER["HTTP_HOST"], "localhost")) {
    define("CONF_DB_HOST","127.0.0.1");
define("CONF_DB_USER","root");
define("CONF_DB_NAME","LuVariedad");
define("CONF_DB_PASSWD","");

}else{
    define("CONF_DB_HOST","mysql");
define("CONF_DB_USER","root");
define("CONF_DB_NAME","lutest");
define("CONF_DB_PASSWD","root");

}

define("CONF_URL_BASE","http://www.localhost:8080");
define("CONF_URL_TEST" , "http://www.localhost:8080");



/**
 * MAIL
 */

define("MAIL_MAILER","smtp");
define("MAIL_HOST","smtp.gmail.com");
define("MAIL_PORT",587);
define("MAIL_USERNAME","lcs13761@gmail.com");
define("MAIL_PASSWORD","mpylgbilvfxdpggn");
define("MAIL_ENCRYPTION","tls");
define("MAIL_FROM_ADDRESS","lcs13761@gmail.com");
define("MAIL_FROM_NAME","LuStore");

/**
 * View
 */
define("CONF_VIEW_PATH" , "/../../shared/view");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "web");
define("CONF_VIEW_ADMIN", "admin");

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


/**
 * SITE
 */
define("CONF_SITE_NAME", "LuStore");
define("CONF_SITE_TITLE", "Descubra sua roupa ideal");
define("CONF_SITE_DESC" , "Conheça nosso catalogo de roupas ,é bolsas");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "luStore.com.br");
define("CONF_SITE_ADDR_STREET", "SC 406 - ");
define("CONF_SITE_ADDR_NUMBER", "3588");
define("CONF_SITE_ADDR_COMPLEMENT", "");
define("CONF_SITE_ADDR_CITY", "Altamira");
define("CONF_SITE_ADDR_STATE", "PA");
define("CONF_SITE_ADDR_ZIPCODE", "68374-732");