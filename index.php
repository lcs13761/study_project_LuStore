<?php

ob_start();

use Pecee\SimpleRouter\SimpleRouter;

require __DIR__ . "/vendor/autoload.php";
require_once 'routes/web.php';
require_once 'routes/admin.php';

use Source\Core\Session;
use Source\Migrations\CreateAllTables;

$session = new Session();
SimpleRouter::setDefaultNamespace('Source\App');
SimpleRouter::start();

ob_end_flush();
