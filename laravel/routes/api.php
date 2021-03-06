<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DetallesPedidosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SeguridadController;


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



Route::middleware('auth:api')->group(function(){

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
    Route::get('/clientesnombre', [ClientesController::class, 'obtenerNombre']);
    Route::get('/clientes/{id}', [ClientesController::class, 'obtenerItem']);

    Route::post('/clientes', [ClientesController::class, 'store']);

    Route::put('/clientes', [ClientesController::class, 'update']);
    // Route::patch('v1/productos', [ProductosController::class, 'patch']);
    Route::delete('/clientes/{id}', [ClientesController::class, 'delete']);

    /* PRODUCTOS */

    
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

     /* DetallePedido */

     Route::get('/detallepedidos', [ProveedoresController::class, 'obtenerLista']);
     Route::get('/detallepedidos/{id}', [ProveedoresController::class, 'obtenerItem']);
     Route::post('/detallepedidos', [ProveedoresController::class, 'store']);

    /* MARCAS */

    Route::get('/marcas', [MarcasController::class, 'obtenerLista']);
    Route::get('/marcasnombre', [MarcasController::class, 'obtenerNombre']);
    Route::get('/marcas/{id}', [MarcasController::class, 'obtenerItem']);
    Route::post('/marcas', [MarcasController::class, 'store']);
    Route::put('/marcas', [MarcasController::class, 'update']);
    // Route::patch('v1/productos', [ProductosController::class, 'patch']);
    Route::delete('/marcas/{id}', [MarcasController::class, 'delete']);

    Route::get('/usuariosAdmin', [UsuariosController::class, 'obtenerAdmin']);
    Route::post('/ingresarAdmin', [UsuariosController::class, 'storeAdmin']);
    Route::get('/buscarAdmin/{id}', [UsuariosController::class, 'obtenerItemAdmin']);
    Route::put('/ActualizarAdmin', [UsuariosController::class, 'updateAdmin']);
    Route::get('/datosAdmin/{datosAdmin}', [UsuariosController::class, 'obtenerDatos']);
    Route::get('/usuariosClientes', [UsuariosController::class, 'obtenerClientes']);

    /* Router de Seguridad */
    Route::post('/users', [UsersController::class, 'store']);
});
Route::get('/categoriasnombre', [CategoriasController::class, 'obtenerNombre']);
Route::post('/ingresarCliente', [UsuariosController::class, 'storeCliente']);
Route::get('/Categoriasec', [CategoriasController::class, 'obtenerCategoria']);
Route::get('/productosnombre', [ProductosController::class, 'obtenerNombre']);
Route::get('/productosmas', [ProductosController::class, 'productosmas']);
Route::get('/productosdatos/{nombreProducto}', [ProductosController::class, 'obtenerDatos']);
Route::get('/productoscategoria/{categoria}', [ProductosController::class, 'productosCategorias']);
Route::get('/productosmarcas/{marcas}', [ProductosController::class, 'productosMarcas']);

Route::get('/productos', [ProductosController::class, 'obtenerLista']);
/* Router de LOGIN */
Route::post('/seguridad/login', [SeguridadController::class, 'login']);