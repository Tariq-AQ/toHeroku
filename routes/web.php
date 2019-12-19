<?php




use App\Http\Controllers\CommentController;


Route::get('/', 'jobsController@lounge');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');


##Let laravel automatically map routes to functions.
##Reference
##Laravel documentation
##https://laravel.com/docs/master/controllers
Route::resource('jobs', 'JobsController');
##



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('[/search', 'JobsController@search')->name('search');
Route::get('/jobs/{job}/like', 'LikesController@upVote');
Route::get('/jobs/{job}/dislike', 'LikesController@downVote');
##Routing everything else
Route::get('/{any}', 'jobsController@noPgaeRedirect')->where('any', '.*');
