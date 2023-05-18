<?php

use App\Http\Controllers\Admin\DashBoard\DashBoardController;
use App\Http\Controllers\Admin\User\UserController;
use Pecee\SimpleRouter\SimpleRouter;

// 'middleware' => App\Http\Middleware\Auth::class, 'namespace' => 'admin'
SimpleRouter::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin'], function () {

    SimpleRouter::get('/', [DashBoardController::class, 'index'])->name('dashboard');

    SimpleRouter::get('/account', [MyAccountController::class, 'index'])->name('account');

    SimpleRouter::get('/users', [UserController::class, 'index'])->name('users.index');
    SimpleRouter::get('/users/create', [UserController::class, 'create'])->name('users.create');
    SimpleRouter::post('/users/store', [UserController::class, 'store'])->name('users.store');
    SimpleRouter::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    SimpleRouter::put('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
    SimpleRouter::delete('/users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    // SimpleRouter::resource('users', UserController::class);

    //     SimpleRouter::group(['prefix' => '/product'], function () {
    //         SimpleRouter::get('/', 'ProductController@index')->name('product.index');
    //         SimpleRouter::get('/create', 'ProductController@create')->name('product.create');
    //         SimpleRouter::post('/store', 'ProductController@store')->name('product.store');
    //         SimpleRouter::get('/edit/{id}', 'ProductController@edit')->name('product.edit')->where(['id' => '[0-9]+']);
    //         SimpleRouter::put('/update/{id}', 'ProductController@update')->name('product.update')->where(['id' => '[0-9]+']);
    //         SimpleRouter::delete('/destroy/{id}', 'ProductController@destroy')->name('product.destroy')->where(['id' => '[0-9]+']);
    //     });

    //     SimpleRouter::group(['prefix' => '/category'], function () {
    //         SimpleRouter::get('/', 'CategoryController@index')->name('category.index');
    //         SimpleRouter::get('/{id}', 'CategoryController@show')->name('category.show')->where(['id' => '[0-9]+']);
    //         SimpleRouter::get('/create', 'CategoryController@create')->name('category.create');
    //         SimpleRouter::post('/store', 'CategoryController@store')->name('category.store');
    //         SimpleRouter::get('/edit/{id}', 'CategoryController@edit')->name('category.edit')->where(['id' => '[0-9]+']);
    //         SimpleRouter::put('/update/{id}', 'CategoryController@update')->name('category.update')->where(['id' => '[0-9]+']);
    //         SimpleRouter::delete('/destroy/{id}', 'CategoryController@destroy')->name('category.destroy')->where(['id' => '[0-9]+']);
    //     });

    //     SimpleRouter::group(['prefix' => '/user'], function () {
    //         SimpleRouter::get('/', 'AdminController@index')->name('user.index');
    //         SimpleRouter::get('/{id}', 'AdminController@show')->name('user.show')->where(['id' => '[0-9]+']);
    //         SimpleRouter::get('/create', 'AdminController@create')->name('user.create');
    //         SimpleRouter::post('/store', 'AdminController@store')->name('user.store');
    //         SimpleRouter::get('/edit/{id}', 'AdminController@edit')->name('user.edit')->where(['id' => '[0-9]+']);
    //         SimpleRouter::put('/update/{id}', 'AdminController@update')->name('user.update')->where(['id' => '[0-9]+']);
    //         SimpleRouter::delete('/destroy/{id}', 'AdminController@destroy')->name('user.destroy')->where(['id' => '[0-9]+']);
    //     });
});

// /**perguntas&respostas */
// $route->get("/perguntas-respostas", "Faq:home");
// $route->post("/perguntas-respostas", "Faq:home");
// $route->get("/perguntas-respostas/adicionar", "Faq:include");
// $route->post("/perguntas-respostas/adicionar", "Faq:include");
// $route->get("/perguntas-respostas/update", "Faq:update");
// $route->post("/perguntas-respostas/update", "Faq:update");
// $route->get("/perguntas-respostas/delete", "Faq:delete");
// $route->post("/perguntas-respostas/delete", "Faq:delete");