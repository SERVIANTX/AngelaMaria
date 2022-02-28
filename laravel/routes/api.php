<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\PedidosController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* EMPLEADOS */

Route::get('/empleados', [EmpleadosController::class, 'obtenerLista']);
Route::get('/empleados/{id}', [EmpleadosController::class, 'obtenerItem']);

Route::post('/empleados', [EmpleadosController::class, 'store']);

Route::put('/empleados', [EmpleadosController::class, 'update']);
// Route::patch('v1/productos', [ProductosController::class, 'patch']);
Route::delete('/empleados/{id}', [EmpleadosController::class, 'delete']);


/* CATEGORIAS */


Route::get('/categorias', [CategoriasController::class, 'obtenerLista']);
Route::get('/categorias/{id}', [CategoriasController::class, 'obtenerItem']);

Route::post('/categorias', [CategoriasController::class, 'store']);

Route::put('/categorias', [CategoriasController::class, 'update']);
// Route::patch('v1/productos', [ProductosController::class, 'patch']);
Route::delete('/categorias/{id}', [CategoriasController::class, 'delete']);


/* PEDIDOS */


Route::get('/pedidos', [PedidosController::class, 'obtenerLista']);
Route::get('/pedidos/{id}', [PedidosController::class, 'obtenerItem']);

Route::post('/pedidos', [PedidosController::class, 'store']);

Route::put('/pedidos', [PedidosController::class, 'update']);
// Route::patch('v1/productos', [ProductosController::class, 'patch']);
Route::delete('/pedidos/{id}', [PedidosController::class, 'delete']);

/* CLIENTES */

Route::get('/clientes', [ClientesController::class, 'obtenerLista']);
Route::get('/clientes/{id}', [ClientesController::class, 'obtenerItem']);

Route::post('/clientes', [ClientesController::class, 'store']);

Route::put('/clientes', [ClientesController::class, 'update']);
// Route::patch('v1/productos', [ProductosController::class, 'patch']);
Route::delete('/clientes/{id}', [ClientesController::class, 'delete']);

/* PRODUCTOS */

Route::get('/productos', [ProductosController::class, 'obtenerLista']);
Route::get('/productos/{id}', [ProductosController::class, 'obtenerItem']);

Route::post('/productos', [ProductosController::class, 'store']);

Route::put('/productos', [ProductosController::class, 'update']);
// Route::patch('v1/productos', [ProductosController::class, 'patch']);
Route::delete('/productos/{id}', [ProductosController::class, 'delete']);

/* PROVEEDORES */

Route::get('/proveedores', [ProveedoresController::class, 'obtenerLista']);
Route::get('/proveedores/{id}', [ProveedoresController::class, 'obtenerItem']);
Route::post('/proveedores', [ProveedoresController::class, 'store']);
Route::put('/proveedores', [ProveedoresController::class, 'update']);
// Route::patch('v1/productos', [ProductosController::class, 'patch']);
Route::delete('/proveedores/{id}', [ProveedoresController::class, 'delete']);

/* MARCAS */

Route::get('/marcas', [MarcasController::class, 'obtenerLista']);
Route::get('/marcas/{id}', [MarcasController::class, 'obtenerItem']);
Route::post('/marcas', [MarcasController::class, 'store']);
Route::put('/marcas', [MarcasController::class, 'update']);
// Route::patch('v1/productos', [ProductosController::class, 'patch']);
Route::delete('/marcas/{id}', [MarcasController::class, 'delete']);