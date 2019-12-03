<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/admin', 'as' => 'admin.', 'namespace' => 'Backend', 'middleware' => 'admin'], function () {
    require __DIR__.'/backend/route.php';
});
