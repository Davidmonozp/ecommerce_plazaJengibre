<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Rutas Clientes
Route::resource('clientes', ClienteController::class);
Route::get('/buscar/cliente', [ClienteController::class, 'buscarPorNumeroIdentificacion'])->name('buscar.cliente');

//Rutas Productos
Route::resource('productos', ProductoController::class);
Route::get('/buscar/producto', [ProductoController::class, 'buscarProducto'])->name('buscar.producto');
Route::get('/productos/mani', [ProductoController::class, 'buscarMani'])->name('productos.mani');

//Rutas Categorias
Route::resource('categorias', CategoriaController::class);
Route::get('/buscar/categoria', [CategoriaController::class, 'buscarCategoria'])->name('buscar.categoria');

//Rutas Inventario
Route::resource('inventario', InventarioController::class);

// Ruta para la Política de Privacidad
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy.policy');

// Ruta para los Términos de Servicio
Route::get('/terms-of-service', [PageController::class, 'termsOfService'])->name('terms.of.service');