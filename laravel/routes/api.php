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