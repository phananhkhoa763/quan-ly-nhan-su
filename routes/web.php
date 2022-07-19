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

Auth::routes();
Route::get('/', 'Auth\AuthController@getLogin')->name('login');
Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Auth'
], function () {
    Route::get('/login', 'AuthController@getLogin')->name('login');
    Route::post('/login', 'AuthController@postLogin')->name('admin.login');
    Route::post('/logout', 'AuthController@logout')->name('admin.logout');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => ['admin']
], function () {
    //Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    //member
    Route::get('/listMember', 'UserController@index')->name('admin.listMember');
    //profile
    Route::get('/user/profile','UserController@edit')->name('admin.profile');
    Route::post('/user/profile','UserController@update')->name('admin.profile');
    //browsings
});