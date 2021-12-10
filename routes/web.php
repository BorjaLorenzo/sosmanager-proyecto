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
Route::get('/servicios', [App\Http\Controllers\HomeController::class, 'showServicios']);
Route::get('/nuevos_trabajadores', [App\Http\Controllers\HomeController::class, 'showNuevosTrabajadores']);
Route::get('/web', [App\Http\Controllers\HomeController::class, 'web']);//pantalla de sitio en construccion

Route::post('/eliminar_trabajador', [App\Http\Controllers\HomeController::class, 'eliminar_trabajador']);
Route::post('/eliminar_nuevo_trabajador', [App\Http\Controllers\HomeController::class, 'eliminar_nuevo_trabajador']);
Route::post('/confirmar_nuevo_trabajador', [App\Http\Controllers\HomeController::class, 'confirmar_nuevo_trabajador']);
Route::post('/editar_trabajador', [App\Http\Controllers\HomeController::class, 'editar_trabajador']);
Route::post('/insertar_parte', [App\Http\Controllers\HomeController::class, 'insertar_parte']);
Route::post('/editar_parte', [App\Http\Controllers\HomeController::class, 'editar_parte']);
Route::post('/eliminar_parte', [App\Http\Controllers\HomeController::class, 'eliminar_parte']);

