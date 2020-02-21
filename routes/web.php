<?php

Route::get('/', 'GuestsController@index')->name('welcome');
Route::get('/stories/{story}', 'StoriesController@show')->name('stories.show');

Auth::routes();

