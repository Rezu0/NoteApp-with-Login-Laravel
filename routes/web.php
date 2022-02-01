<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Lists;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Todos;
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

Route::get('/', [IndexController::class, 'index'])->middleware('auth');

Route::get('/register', [RegisterUserController::class, 'indexRegister'])->middleware('guest');
Route::post('/register', [RegisterUserController::class, 'registerExecute']);

Route::get('/login', [LoginUserController::class, 'indexLogin'])->middleware('guest')->name('login');
Route::post('/login', [LoginUserController::class, 'loginExecute']);
Route::post('/logout', [LoginUserController::class, 'logoutExecute']);

Route::resource('/todo', Todos::class)->middleware('auth');
Route::resource('/list', Lists::class)->middleware('auth');

Route::put('/todo/finish/{id}', [Todos::class, 'updateFinish']);