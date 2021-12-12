<?php


use Pecee\SimpleRouter\SimpleRouter;
use Source\Core\View;

SimpleRouter::group(['prefix' => '/'], function () {

  SimpleRouter::get("/login", "AuthController@index");
  SimpleRouter::post("/login", "AuthController@login");
  SimpleRouter::get("/logout", "AuthController@logout");
  SimpleRouter::get('/login/{auth}','AuthController@loginAuth');

  SimpleRouter::group(["namespace" => "Auth"], function () {
    SimpleRouter::get("/confirmar", "VerifyEmailController@index");
    SimpleRouter::get("email/verify/{id}/{token}", "VerifyEmailController@verifiy");
  });

  SimpleRouter::group(["namespace" => "Web"], function () {
    SimpleRouter::get("/", "HomeController@index");
    SimpleRouter::group(["prefix" => "user"], function () {
      SimpleRouter::get("/create", "UserController@create");
      SimpleRouter::post("/store", "UserController@store");
    });
  });
});
