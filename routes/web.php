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



Route::name('client.')
    ->prefix('client')
    ->middleware('auth')
    ->group(function () {
        Route::get('/','ClientController@home');
        Route::get('/order/{plan?}','ClientController@order')->name('order');
        Route::get('/program','ClientController@program')->name('program');
        Route::get('/coaches','ClientController@coaches')->name('coaches');
        Route::get('/schedule','ClientController@schedule')->name('schedule');
        Route::get('/contacts','ClientController@contacts')->name('contacts');
    });
Route::post('send','Mail\MailController@send')->name('send')->middleware('auth');
Auth::routes();
Route::name('admin.')
    ->namespace('Admin')
    ->prefix('admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::view('/','admin.index');
        Route::resource('user', 'UserController');
        Route::post("user-update/{user} ",'UserController@update');
        Route::resource('order', 'OrderController');
        Route::resource('programs', 'ProgramController');
        Route::resource('tariffs', 'TariffController');
        Route::post("/program-update/{program} ",'ProgramController@update');
        Route::get('/statistic/export', 'StatisticController@export');
    });
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
