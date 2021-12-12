<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['prefix' => '/admin','middleware' => Source\Support\MiddlewareAuth::class,'namespace' => 'admin'], function () {
  
      SimpleRouter::get('/','DashboardController@index');

});