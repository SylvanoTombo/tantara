<?php

Route::get('/', 'StoriesController@index')->name('home');
Route::get('/stories/{story}', 'StoriesController@show')->name('stories.show');
