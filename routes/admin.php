<?php

use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/admin','middleware' => Source\Support\MiddlewareAuth::class,'namespace' => 'admin'], function () {
  
      SimpleRouter::get('/','DashboardController@index');

      SimpleRouter::get('/product','ProductController@index');
      SimpleRouter::get('/product/create','ProductController@create');
      SimpleRouter::post('/product/store','ProductController@store');
});