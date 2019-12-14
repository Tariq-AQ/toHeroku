<?php




use App\Http\Controllers\CommentController;



Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');


##Let laravel automatically map routes to functions.
Route::resource('jobs', 'JobsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jobs/{job}/like', 'LikesController@upVote');
Route::get('/jobs/{job}/dislike', 'LikesController@downVote');
Route::get('[/search', 'JobsController@search')->name('search');
