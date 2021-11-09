<?php

use App\Http\Controllers\C_menu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_user;
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


//Route::get('/confirmarEliminar', [C_User::class, 'showConfirmarEliminar'])->middleware('auth');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/menu', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/trabajadores', [App\Http\Controllers\HomeController::class, 'showTrabajadores']);


