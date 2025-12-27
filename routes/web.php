<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\FormaDePagoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\TipoArticuloController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\DetalleFacturaController;
use App\Http\Controllers\DevolucionController;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Autenticación de Laravel
Auth::routes();

// Dashboard / Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas de Recursos (CRUD) ordenadas por módulo

// USUARIOS
Route::resource('users', UserController::class);

// PROVEEDORES
Route::resource('proveedors', ProveedorController::class);

// CIUDADES
Route::resource('ciudads', CiudadController::class);


// TIPOS DE DOCUMENTO
Route::resource('tipo-documentos', TipoDocumentoController::class);

// FORMAS DE PAGO
Route::resource('forma-de-pagos', FormaDePagoController::class);

// CLIENTES
Route::resource('clientes', ClienteController::class);

// FACTURAS
Route::resource('facturas', FacturaController::class);

// TIPOS DE ARTÍCULO
Route::resource('tipo-articulos', TipoArticuloController::class);

// ARTÍCULOS
Route::resource('articulos', ArticuloController::class);

// DETALLE FACTURAS
Route::resource('detalle-facturas', DetalleFacturaController::class);

// DEVOLUCIONES
Route::resource('devolucions', DevolucionController::class);
