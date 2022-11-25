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
Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware("auth");
Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware("auth");
Route::resource('venta-detalles', App\Http\Controllers\VentaDetalleController::class)->middleware("auth");
Route::get('venta-cabeceras/pdf/{id}', [App\Http\Controllers\VentaCabeceraController::class, 'pdf'])->name('venta-cabeceras.pdf')->middleware("auth");
Route::resource('venta-cabeceras', App\Http\Controllers\VentaCabeceraController::class)->middleware("auth");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

