<?php

Route::get('/', 'GuestsController@index')->name('welcome');
Route::get('/stories/{story}', 'StoriesController@show')->name('stories.show');
Route::get('/stories', 'StoriesController@index')->name('stories.index');

Auth::routes();

