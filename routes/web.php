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

// Home
Route::get('/', 'PageController@index')->name('welcome');

// If already logged in - redirect to predictions
Route::get('/', function () {
    if(Auth::check()) {
        return redirect()->route('predictions');
    }
    return view('welcome');
})->name('welcome');

// Main Prediction Area
Route::get('/predictions', 'PageController@predictions')->name('predictions');

// Register Page
Route::get('/register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');


// Login Page
Route::get('/login', 'SessionsController@create');
Route::post('/login', [ 'as' => 'login', 'uses' => 'SessionsController@store']);
Route::get('/logout', 'SessionsController@destroy');
