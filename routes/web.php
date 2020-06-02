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

Route::get('/', function () {
    return ;
})->middleware('auth');


Route::name('client.')
    ->prefix('client')
    ->group(function () {
        Route::get('/','ClientController@home');
        Route::get('/order/{plan?}','ClientController@order');
        Route::get('/program','ClientController@program');
        Route::get('/coaches','ClientController@coaches');
        Route::get('/schedule','ClientController@schedule');
        Route::get('/contacts','ClientController@contacts');
    });
Route::post('send','Mail\MailController@send')->name('send');
Auth::routes();
Route::name('admin.')
    ->namespace('Admin')
    ->prefix('admin')
    ->group(function () {
        Route::view('/','admin.index');
        Route::resource('user', 'UserController');
        Route::post("user-update/{user} ",'UserController@update');
        Route::resource('programs', 'ProgramController');
        Route::post("/program-update/{program} ",'ProgramController@update');
    });
Route::get('/home', 'HomeController@index')->name('home');
