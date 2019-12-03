<?php

Route::get('/', ['as' => 'index', 'uses' => 'DashboardController@index']);
Route::resource('section', 'SectionController');
Route::resource('user', 'UserController');
Route::get('delete-image', ['as' => 'delete-image', 'uses' => 'DeleteImageController@__invoke']);
Route::get('lang/{lang}', ['as' => 'lang', 'uses' => 'LocalController@__invoke']);