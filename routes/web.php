<?php

use App\Http\Controllers\Web\HomeController;
use Pecee\SimpleRouter\SimpleRouter;

include('auth.php');

include('admin.php');

SimpleRouter::get("/", [HomeController::class, 'index'])->name('web.home');

//SimpleRouter::error(function(Request $request,\Exception $exception){
//    switch($exception->getCode()) {
//        // Page not found
//        case 404:
//            response()->redirect('/ops/not-found');
//            break;
//            break;
//        case 503:
//            response()->redirect('/ops/service-unavailable');
//            break;
//        default:
//            response()->redirect('/ops/' , $exception->getCode());
//            break;
//    }
//});