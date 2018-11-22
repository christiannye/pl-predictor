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

Route::get('/', 'FixturesController@index');

// Route::get('/', 'PageController@index')->name('welcome');
//
// Route::prefix('api')->group(function () {
//    Route::get('/fixtures', 'FixturesController@index');
//    Route::get('/results', 'ResultsController@index');
// });
