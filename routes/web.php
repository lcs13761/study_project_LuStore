<?php


use Pecee\SimpleRouter\SimpleRouter;
use Source\Core\View;

SimpleRouter::group(['prefix' => '/'], function () {


  SimpleRouter::group(["namespace" => "Auth"], function () {

    SimpleRouter::get("/confirma","VerifyEmailController@index"); 
    SimpleRouter::get("email/verify/{id}/{token}" , "VerifyEmailController@verifiy");
  });

  

    SimpleRouter::get("/login", "AuthController@index");
    SimpleRouter::post("/login", "AuthController@login");
    SimpleRouter::get("/logout","AuthController@logout");
    

    SimpleRouter::group(["namespace" => "Web"], function () {

        SimpleRouter::get("/", "HomeController@index");

        SimpleRouter::group(["prefix" => "user"],function(){
          SimpleRouter::get("/create", "UserController@create");
          SimpleRouter::post("/", "UserController@store");
        });
      
    });
});
