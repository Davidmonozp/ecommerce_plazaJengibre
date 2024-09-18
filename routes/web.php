<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

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

//Rutas Carrito de compras
Route::get('carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');



Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// Ruta para el éxito del pedido
Route::get('/order/success', function () {
    return view('order.success'); 
})->name('order.success');

// Ruta para la lista de órdenes
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
//Ruta para buscar pedido por # de cedula
Route::get('orders/search', [OrderController::class, 'searchByIdNumber'])->name('orders.search');
// Ruta para ver detalles de un pedido
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');


 




