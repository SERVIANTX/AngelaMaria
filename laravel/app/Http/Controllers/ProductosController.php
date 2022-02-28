<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    function obtenerLista()
	{
		$productos =  Producto::all();


		$response = new \stdClass();
		$response->success=true;
		$response->data=$productos;

		return response()->json($response,200);
	}

    function obtenerItem($id)
	{
		$productos =  Producto::find($id);


		$response = new \stdClass();
		$response->success=true;
		$response->data=$productos;

		return response()->json($response,200);
	}


	function update(Request $request)
	{
		$productos =  Producto::find($request->id);

		if($productos)
		{
            $productos->nombre_producto=$request->nombre_producto;
            $productos->descripcion=$request->descripcion;
            $productos->stock=$request->stock;
            $productos->precio_venta=$request->precio_venta;
            $productos->precio_compra=$request->precio_compra;
            $productos->lote=$request->lote;
			$productos->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$productos;

		return response()->json($response,200);
	}

	/*function patch(Request $request)
	{
		$empleado =  Empleado::find($request->id);

		if($empleado)
		{

			if(isset($request->codigo))
			$producto->codigo=$request->codigo;

			if(isset($request->nombre))
			$producto->nombre=$request->nombre;

			$producto->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$producto;

		return response()->json($response,200);
	}*/


	function store(Request $request)
	{
		$productos = new Producto();
		$productos->nombre_producto=$request->nombre_producto;
        $productos->descripcion=$request->descripcion;
        $productos->stock=$request->stock;
        $productos->precio_venta=$request->precio_venta;
        $productos->precio_compra=$request->precio_compra;
        $productos->lote=$request->lote;
		$productos->save();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$productos;

		return response()->json($response,200);
	}

	function delete($id)
	{
		$response = new \stdClass();
		$response->success=true;
		$response_code=200;


		$productos = Producto::find($id);

		if($productos)
		{
			$productos->delete();
			$response->success=true;
			$response_code=200;
		}
		else
		{
			$response->error=["El producto ya ha sido eliminado"];
			$response->success=false;
			$response_code=500;
		}

		return response()->json($response,$response_code);

	}
}
