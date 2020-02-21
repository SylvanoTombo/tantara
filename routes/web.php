<?php

Route::get('/', 'GuestsController@index')->name('welcome');
Route::get('/stories/{story}', 'StoriesController@show')->name('stories.show');
Route::get('/stories', 'StoriesController@index')->name('stories.index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
Route::get('/dashboard/stories', 'DashboardStoriesController@index')->name('dashboard.stories.index');
Route::get('/dashboard/stories/new', 'DashboardStoriesController@create')->name('dashboard.stories.create');
Route::post('/dashboard/stories/new', 'DashboardStoriesController@store')->name('dashboard.stories.store');
