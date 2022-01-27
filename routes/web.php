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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\DashController::class, 'index'])->name('home')->middleware('auth');

Route::get('/user', "App\Http\Controllers\UserController@index")->name('user.list')->middleware('auth', 'admin');
Route::get('/user/{id}/edit',"App\Http\Controllers\UserController@show")->name('user.edit')->middleware('auth', 'admin');
Route::put('/user/{id}/edit', "App\Http\Controllers\UserController@update")->name('user.update')->middleware('auth', 'admin');
Route::delete('/user/{id}/delete', "App\Http\Controllers\UserController@destroy")->name('user.destroy')->middleware('auth', 'admin');
Route::get('/user/add', "App\Http\Controllers\UserController@create")->name('user.create')->middleware('auth', 'admin');
Route::post('/user/add', "App\Http\Controllers\UserController@store")->name('user.store')->middleware('auth', 'admin');
Route::get('/user/{id}/edit/password', "App\Http\Controllers\UserController@editPassword")->name('user.edit.password')->middleware('auth', 'admin');
Route::put('/user/{id}/edit/password',"App\Http\Controllers\UserController@storePassword")->name('change.password')->middleware('auth', 'admin');
Route::put('/user/{id}/role', 'App\Http\Controllers\UserController@changeRole')->name('role.add')->middleware('auth', 'admin');
Route::get('/user/{id}/edit/password', "App\Http\Controllers\UserController@editPassword")->name('user.edit.password')->middleware('auth', 'admin');
Route::put('/user/{id}/edit/password',"App\Http\Controllers\UserController@storePassword")->name('change.password')->middleware('auth', 'admin');

Route::get('dashboard', [App\Http\Controllers\DashController::class, 'list'])->name('dashboard')->middleware('auth')->middleware('auth');
Route::get('dashboard/add', [App\Http\Controllers\DashController::class, 'create'])->name('dashboard.create')->middleware('auth');
Route::post('dashboard/add', "App\Http\Controllers\DashController@store")->name('dashboard.store')->middleware('auth');
Route::delete('/dashboard/{id}/delete', "App\Http\Controllers\DashController@destroy")->name('dashboard.destroy')->middleware('auth');
Route::get('/dashboard/{id}', [App\Http\Controllers\DashController::class, 'show'])->name('dashboard.show')->middleware('auth');
Route::get('/dashboard/{id}/edit',[App\Http\Controllers\DashController::class, 'edit'])->name('dashboard.edit')->middleware('auth');
Route::put('/dashboard/{id}/edit', [App\Http\Controllers\DashController::class, 'update'])->name('dashboard.update')->middleware('auth');
Route::put('/user/{id}/dashboard', 'App\Http\Controllers\UserController@changeDashboardRole')->name('dashboard.add')->middleware('auth', 'admin');
