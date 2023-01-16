<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacturaController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
//Rutas de autenticacion
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
//Rutas de Productos
Route::get('/productos',[ProductoController::class,'index'])->name('productos.index');
Route::get('/productos/register',[ProductoController::class,'register'])->name('productos.register');
Route::post('/productos/register',[ProductoController::class,'store']);
Route::get('/productos/{producto}',[ProductoController::class,'editar'])->name('productos.editar');
Route::post('/productos/store',[ProductoController::class,'editarStore'])->name('producto.editarstore');
Route::delete('/productos/{producto}',[ProductoController::class,'delete'])->name('productos.delete');
//Rutas de Compras
Route::get('/compras', [CompraController::class, 'index'])->name('compras.index');
Route::get('/compras/comprar', [CompraController::class, 'create'])->name('compras.create');
Route::post('/compras/comprar', [CompraController::class, 'store'])->name('compras.store');
//Rutas de Facturas
Route::get('/facturas',[FacturaController::class,'index'])->name('facturas.index');
Route::post('/facturas/store',[FacturaController::class,'store'])->name('facturas.store');
Route::get('/procesadas',[FacturaController::class,'procesadas'])->name('facturas.procesadas');
Route::get('/procesadas/{factura}',[FacturaController::class, 'detalleFactura'])->name('facturas.detallefactura');
Route::get('/listado-de-facturas',[FacturaController::class, 'facturasCliente'])->name('facturas.cliente');
