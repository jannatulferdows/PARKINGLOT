<?php

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

Route::get('/', 'SystemController@runSystem')->name('run-system');
Route::post('/startSystem', 'SystemController@startSystem')->name('start-system');
Route::post('/stopSystem', 'SystemController@stopSystem')->name('stop-system');

Route::get('/cars/{token}/displacing', 'CarController@displacing')->name('cars.displacing');
Route::resource('cars', CarController::class);