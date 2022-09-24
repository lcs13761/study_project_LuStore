<?php

ob_start();

use Database\Connect;
use Pecee\SimpleRouter\SimpleRouter;

use App\Core\Session;

require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

require_once '../routes/web.php';

Connect::getInstance();

(new Session());

SimpleRouter::setDefaultNamespace('App\Http\Controllers');
SimpleRouter::start();

ob_end_flush();
