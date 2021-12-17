<?php

use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/admin','middleware' => Source\Support\MiddlewareAuth::class,'namespace' => 'admin'], function () {

      SimpleRouter::get('/','DashboardController@index');

      SimpleRouter::group(['prefix' => '/product'],function(){
          SimpleRouter::get('/','ProductController@index')->name('product.index');
          SimpleRouter::get('/create','ProductController@create')->name('product.create');
          SimpleRouter::post('/store','ProductController@store')->name('product.store');
          SimpleRouter::get('/edit/{id}','ProductController@edit')->name('product.edit')->where(['id' => '[0-9]+']);
          SimpleRouter::put('/update/{id}','ProductController@update')->name('product.update')->where(['id' => '[0-9]+']);
          SimpleRouter::delete('/destroy/{id}','ProductController@destroy')->name('product.destroy')->where(['id' => '[0-9]+']);
      });

      SimpleRouter::group(['prefix' => '/category'],function(){
          SimpleRouter::get('/','CategoryController@index')->name('category.index');
          SimpleRouter::get('/{id}','CategoryController@show')->name('category.show')->where(['id' => '[0-9]+']);
          SimpleRouter::get('/create','CategoryController@create')->name('category.create');
          SimpleRouter::post('/store','CategoryController@store')->name('category.store');
          SimpleRouter::get('/edit/{id}','CategoryController@edit')->name('category.edit')->where(['id' => '[0-9]+']);
          SimpleRouter::put('/update/{id}','CategoryController@update')->name('category.update')->where(['id' => '[0-9]+']);
          SimpleRouter::delete('/destroy/{id}','CategoryController@destroy')->name('category.destroy')->where(['id' => '[0-9]+']);
      });

});