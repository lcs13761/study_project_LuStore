<?php

ob_start();


use Pecee\SimpleRouter\SimpleRouter;
use App\Core\Session;
use Bootstrap\Database\Connect;

require __DIR__ . "/../vendor/autoload.php";

date_default_timezone_set(config('app.timezone'));

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

require_once '../routes/web.php';

Connect::getInstance();

(new Session());

SimpleRouter::start();

ob_end_flush();