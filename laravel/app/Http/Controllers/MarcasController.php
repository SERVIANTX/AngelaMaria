<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

class MarcasController extends Controller
{
    function obtenerLista()
	{
		$marca =  Marca::all();


		$response = new \stdClass();
		$response->success=true;
		$response->data=$marca;

		return response()->json($response,200);
	}
	function obtenerNombre()
	{
		//$marca =  Marca::all();
		/*$marca =  DB::table('marcas')
               ->where('nombre', 'like', 'pruebax2%')
              ->get();*/
			  $marca = DB::select('SELECT id,nombre FROM marcas');
			  
			 
		return response($marca);
	}

    function obtenerItem($id)
	{
		$marca =  Marca::find($id);


		$response = new \stdClass();
		$response->success=true;
		$response->data=$marca;

		return response()->json($response,200);
	}


	function update(Request $request)
	{
		$marca =  Marca::find($request->id);

		if($marca)
		{
		    $marca->nombre=$request->nombre;
			$marca->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$marca;

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
		$marca = new Marca();
		$marca->nombre=$request->nombre;
		$marca->save();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$marca;

		return response()->json($response,200);
	}

	function delete($id)
	{
		$response = new \stdClass();
		$response->success=true;
		$response_code=200;


		$marca = Marca::find($id);

		if($marca)
		{
			$marca->delete();
			$response->success=true;
			$response_code=200;
		}
		else
		{
			$response->error=["La marca ya ha sido eliminado"];
			$response->success=false;
			$response_code=500;
		}

		return response()->json($response,$response_code);

	}
}