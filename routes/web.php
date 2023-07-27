<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

//Proveedores
Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores.index');

//Productos
Route::get('/show/{id}', [ProductosController::class, 'show'])->name('producto.show');
Route::get('/create/{id}', [ProductosController::class, 'create'])->name('producto.create');
Route::post('/store/{id}', [ProductosController::class, 'store'])->name('producto.store');
Route::get('/edit/{id}', [ProductosController::class, 'edit'])->name('producto.edit');
Route::put('/update/{id}', [ProductosController::class, 'update'])->name('producto.update');
Route::delete('/destroy/{id}', [ProductosController::class, 'destroy'])->name('producto.destroy');

