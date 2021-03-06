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
    return view('welcome');
})->name('main');

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/home', function(){
    return redirect()->route('admin.home');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', 'DashboardController@index')->name('home');
        
    Route::resource('users','UserController', ['except' => ['show']]);
    Route::any('/users/search','UserController@search')->name('users.search');
    Route::post('/users/deletemass','UserController@deletemass')->name('users.deletemass');
    Route::get('/users/profile', 'UserController@profile')->name('users.profile');
});