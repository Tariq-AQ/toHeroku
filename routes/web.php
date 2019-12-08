<?php



// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome'); // "Method chaining" makes sure the desired page will be reached even when the "get" parameters change.

use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');


##Let laravel automatically map routes to functions.
Route::resource('jobs', 'JobsController');
