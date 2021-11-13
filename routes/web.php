<?php


use Pecee\SimpleRouter\SimpleRouter;
use Source\Core\View;

SimpleRouter::group(['prefix' => '/'], function () {


  SimpleRouter::group(["namespace" => "Auth"], function () {

    SimpleRouter::get("/confirma","VerifyEmailController@index"); 
    SimpleRouter::get("/verifiy/{token}" , "VerifyEmailController@verifiy");
    

  });

  

    SimpleRouter::get("/login", "AuthController@index");
    SimpleRouter::post("/login", "AuthController@login");

    

    SimpleRouter::group(["namespace" => "Web"], function () {
        SimpleRouter::get("/", "HomeController@index");

        SimpleRouter::get("/user", "UserController@index");
        SimpleRouter::post("/user", "UserController@store");
    });
});
