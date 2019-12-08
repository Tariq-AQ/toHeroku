<?php



// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome'); // "Method chaining" makes sure the desired page will be reached even when the "get" parameters change.

use App\Http\Controllers\CommentController;

Route::get('/', 'CommentController@index');

Route::get('/aboutPage', function () {
    return view('about');
})->name('about');


Route::get('/comment/{comment}/', 'CommentController@show');
Route::get('/comment/{comment}/like/', 'LikesController@upVote');
Route::get('/comment/{comment}/delete', 'CommentController@destroy');
Route::get('/comment/{comment}/edit', 'CommentController@edit');
Route::post('comment/{comment}/edit', 'CommentController@update');
