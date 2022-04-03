<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;


class CategoriasController extends Controller
{
    function obtenerLista()
	{
		$categorias =  Categoria::all();


		$response = new \stdClass();
		$response->success=true;
		$response->data=$categorias;

		return response()->json($response,200);
	}

	function obtenerNombre()
	{
		//$marca =  Marca::all();
		/*$marca =  DB::table('marcas')
               ->where('nombre', 'like', 'pruebax2%')
              ->get();*/
			  $categorias = DB::select('SELECT id,nombre_categoria FROM categorias');
			  
			 
		return response($categorias);
	}
	function obtenerCategoria()
	{
		//$marca =  Marca::all();
		/*$marca =  DB::table('marcas')
               ->where('nombre', 'like', 'pruebax2%')
              ->get();*/
			  $categorias = DB::select('SELECT * FROM categorias ORDER BY nombre_categoria DESC LIMIT 3');
			  $response = new \stdClass();
				$response->success=true;
				$response->data=$categorias;

		return response()->json($response,200);
	}
	
	

    function obtenerItem($id)
	{
		$categoria =  Categoria::find($id);
		$response = new \stdClass();
		$response->success=true;
		$response->data=$categoria;

		return response()->json($response,200);
	}

    function update(Request $request)
	{
		$categoria =  Categoria::find($request->id);

		if($categoria)
		{
            $categoria->nombre_categoria=$request->nombre_categoria;
			$categoria->imagen=$request->imagen;
            $categoria->estado=$request->estado;
			$categoria->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$categoria;

		return response()->json($response,200);
	}

    function store(Request $request)
	{
		$categoria = new Categoria();
		$categoria->nombre_categoria=$request->nombre_categoria;
		$categoria->imagen=$request->imagen;
        $categoria->estado=$request->estado;
		$categoria->save();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$categoria;

		return response()->json($response,200);
	}

    function delete($id)
	{
		$response = new \stdClass();
		$response->success=true;
		$response_code=200;


		$categoria = Categoria::find($id);

		if($categoria)
		{
			$categoria->delete();
			$response->success=true;
			$response_code=200;
		}
		else
		{
			$response->error=["La categoria ya ha sido eliminado"];
			$response->success=false;
			$response_code=500;
		}

		return response()->json($response,$response_code);

	}
}
