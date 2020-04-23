<?php

use App\Http\Controllers\CommentController;




Route::get('/', 'PagesController@lounge'); ## The Lounge, about, and services pages are empty as of now
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');


##Let laravel automatically map routes to their corresponding functions.
##Reference
##Laravel documentation
##https://laravel.com/docs/master/controllers
Route::resource('jobs', 'JobsController');
##



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home'); //The name method helps create URLs using route helpers.
Route::get('[/search', 'JobsController@search')->name('search');
Route::get('/jobs/{job}/like', 'LikesController@upVote');
Route::get('/jobs/{job}/dislike', 'LikesController@downVote');

##Routing everything else to a custom 404 page.
Route::get('/{any}', 'PagesController@noPgaeRedirect')->where('any', '.*');


##Social Authentication
Route::get('social-login/{proivider}', 'Auth\LoginController@redirectToProvider')->name('social-login.redirect');
Route::get('social-login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social-login.callback');
