<?php


use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['prefix' => '/'], function () {
  SimpleRouter::get("/login", "AuthController@index")->name('login');
  SimpleRouter::post("/login", "AuthController@login")->name('login.store');
  SimpleRouter::get("/logout", "AuthController@logout")->name('logout');
  SimpleRouter::get('/login/{auth}','AuthController@loginAuth');

  SimpleRouter::group(["namespace" => "Auth"], function () {
    SimpleRouter::get("/confirmar", "VerifyEmailController@index");
    SimpleRouter::get("email/verify/{id}/{token}", "VerifyEmailController@verifiy");
    SimpleRouter::get('forgot-password','PasswordController@index')->name('forgot.index');
  });

  SimpleRouter::group(["namespace" => "Web"], function () {

      SimpleRouter::get('/ops/{errorCode}','ErrorController@index')->name('error.index');
      SimpleRouter::get("/", "HomeController@index");
      SimpleRouter::get('/search/{search}',"HomeController@index");



    SimpleRouter::group(["prefix" => "user"], function () {
      SimpleRouter::get("/create", "UserController@create")->name('user.create');
      SimpleRouter::post("/store", "UserController@store")->name('user.store');
    });
  });
});

SimpleRouter::error(function(Request $request,\Exception $exception){
    switch($exception->getCode()) {
        // Page not found
        case 404:
            response()->redirect('/ops/not-found');
            break;
            break;
        case 503:
            response()->redirect('/ops/service-unavailable');
            break;
        default:
            response()->redirect('/ops/' , $exception->getCode());
            break;
    }
});

