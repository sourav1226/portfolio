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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/employee/list', [App\Http\Controllers\UserController::class, 'userList'])->name('list');
Route::get('/employee/salary', [App\Http\Controllers\UserController::class, 'userSalary'])->name('salary');
Route::get('/employee/add', [App\Http\Controllers\UserController::class, 'userAdd'])->name('add');