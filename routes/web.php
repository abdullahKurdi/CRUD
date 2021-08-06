<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Front\PostController@index')->name('posts.index');

Route::group(['prefix' => '/posts', 'namespace'=> 'Front'], function () {
    Route::get('/','PostController@index')->name('posts.index');
    Route::get('/create','PostController@create')->name('posts.create');
    Route::post('/','PostController@store')->name('posts.store');
    Route::get('/edit/{post}','PostController@edit')->name('posts.edit');
    Route::put('/{post}','PostController@update')->name('posts.update');
    Route::get('/{post}','PostController@show')->name('posts.show');
    Route::delete('/{post}','PostController@destroy')->name('posts.destroy');
});
