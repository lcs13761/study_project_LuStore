<?php


define("CONF_URL_BASE","http://localhost");
define("CONF_URL_TEST" , "http://localhost");


/**
 * Authorization Google
 */
define("CONF_GOOGLE",[
  'clientId'     => '',
  'clientSecret' => '',
  'redirectUri'  => 'http://localhost/login/google',
]);


/**
* Aws s3
 */

define('AWS_BUCKET','lustore');
define('AWS_KEY','');
define('AWS_SECRET','');
define('AWS_REGION','us-east-2');


/**
 * MAIL
 */

define("MAIL_MAILER","smtp");
define("MAIL_HOST","smtp.sendgrid.net");
define("MAIL_PORT",587);
define("MAIL_USERNAME","apikey");
define("MAIL_PASSWORD","");
define("MAIL_ENCRYPTION","tls");
define("MAIL_FROM_ADDRESS","r");
define("MAIL_FROM_NAME","LuStore");

/**
 * View
 */
define("CONF_VIEW_PATH" , "/../../shared/view");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "web");
define("CONF_VIEW_ADMIN", "admin");

/**
 * SITE
 */
define("CONF_SITE_NAME", "LuStore");
define("CONF_SITE_TITLE", "Descubra sua roupa ideal");
define("CONF_SITE_DESC" , "Conheça nosso catalogo de roupas ,é bolsas");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "luStore.com.br");
define("CONF_SITE_ADDR_STREET", "SC 406 - ");
define("CONF_SITE_ADDR_NUMBER", "2810");
define("CONF_SITE_ADDR_COMPLEMENT", "");
define("CONF_SITE_ADDR_CITY", "AA");
define("CONF_SITE_ADDR_STATE", "PA");
define("CONF_SITE_ADDR_ZIPCODE", "68300-235");


/**
 * Passoword
 */

define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);
