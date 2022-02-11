<?php

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

/*********** Login & Registration ***********/
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

/******* clusters ***********/
Route::prefix('cluster/')->group(function(){
// all post and get requests will be handled here
    Route::post('ajaxMessageSend', 'ClusterController@ajaxMessageSend');

});
Route::resource('cluster','ClusterController');

