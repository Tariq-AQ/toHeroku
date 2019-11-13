<?php



// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome'); // "Method chaining" makes sure the desired page will be reached even when the "get" parameters change.

Route::get('/', 'CommentController@index');

Route::get('/aboutPage', function () {
    return view('about');
})->name('about');
