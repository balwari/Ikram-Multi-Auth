<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showUserRegisterForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@createUser');
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/user-dashboard', 'App\Http\Controllers\UserController@show')->name('show');
    Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::post('/user-details/{user_id}', 'App\Http\Controllers\UserController@submitDetails')->name('user-details');
    Route::get('/show', 'UserController@show')->name('show');
});

Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm')->name('admin-login');
Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@adminLogin');
Route::get('/register/admin', 'App\Http\Controllers\Auth\RegisterController@showAdminRegisterForm')->name('admin-register');
Route::post('/register/admin', 'App\Http\Controllers\Auth\RegisterController@createAdmin');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin-home', 'App\Http\Controllers\AdminController@show')->name('admin-home');
    Route::post('admin-logout', 'App\Http\Controllers\AdminController@logout')->name('admin-logout');
    Route::get('/approve/{user_id}/{action}', 'App\Http\Controllers\AdminController@approve')->name('approve');
    Route::get('/reject/{user_id}/{action}', 'App\Http\Controllers\AdminController@reject')->name('reject');
});

