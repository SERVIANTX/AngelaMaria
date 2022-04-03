<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    function obtenerLista()
	{
		$productos =  Producto::with("categoria:id,nombre_categoria","marca:id,nombre")->get();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$productos;

		return response()->json($response,200);
	}

	function obtenerNombre()
	{
		//$marca =  Marca::all();
		/*$marca =  DB::table('marcas')
               ->where('nombre', 'like', 'pruebax2%')
              ->get();*/
			  $producto = DB::select('SELECT id,nombre_producto,imagen FROM productos');
			  
			 
		return response($producto);
	}

	function productosmas()
	{
		//$marca =  Marca::all();
		/*$marca =  DB::table('marcas')
               ->where('nombre', 'like', 'pruebax2%')
              ->get();*/
			  $producto = DB::select('SELECT * FROM productos ORDER BY nombre_producto DESC LIMIT 4');
			  $response = new \stdClass();
				$response->success=true;
				$response->data=$producto;

		return response()->json($response,200);
			 
	}

	function productosCategorias($categoria)
	{
		$producto = DB::select("SELECT * FROM productos WHERE categoria_id = '$categoria'");
		$response = new \stdClass();
		$response->success=true;
		$response->data=$producto;

		return response()->json($response,200);
	
	}

	function productosMarcas($marcas)
	{
		$producto = DB::select("SELECT m.nombre as marca FROM productos p INNER JOIN marcas m ON p.marca_id = m.id WHERE categoria_id = '$marcas' GROUP BY marca");
		$response = new \stdClass();
		$response->success=true;
		$response->data=$producto;

		return response()->json($response,200);
	
	}

	function obtenerDatos($nombreProducto)
	{
		//$marca =  Marca::all();
		/*$marca =  DB::table('marcas')
               ->where('nombre', 'like', 'pruebax2%')
              ->get();*/
			  	$productos = DB::select("SELECT * FROM productos WHERE nombre_producto = '$nombreProducto'");
		  
				return response($productos);
			// return response($productos);
	}

    function obtenerItem($id)
	{

		$productos =  Producto::find($id);
		//$productos =  Producto::where("id","=",$id)->with("categoria","marca")->get();
		
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
            $productos->imagen=$request->imagen;
			$productos->nombre_producto=$request->nombre_producto;
			$productos->categoria_id=$request->categoria_id;
			$productos->marca_id=$request->marca_id;
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
		$productos->imagen=$request->imagen;
		$productos->nombre_producto=$request->nombre_producto;
		$productos->categoria_id=$request->categoria_id;
		$productos->marca_id=$request->marca_id;
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
