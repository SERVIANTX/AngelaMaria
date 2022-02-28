<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedoresController extends Controller
{
    function obtenerLista()
	{
		$proveedor =  Proveedor::all();


		$response = new \stdClass();
		$response->success=true;
		$response->data=$proveedor;

		return response()->json($response,200);
	}

    function obtenerItem($id)
	{
		$proveedor =  Proveedor::find($id);


		$response = new \stdClass();
		$response->success=true;
		$response->data=$proveedor;

		return response()->json($response,200);
	}


	function update(Request $request)
	{
		$proveedor =  Proveedor::find($request->id);

		if($proveedor)
		{
            $proveedor->razon_social=$request->razon_social;
            $proveedor->ruc=$request->ruc;
            $proveedor->telefono=$request->telefono;
            $proveedor->correo=$request->correo;
            $proveedor->direccion=$request->direccion;
			$proveedor->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$proveedor;

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
		$proveedor = new Proveedor();
		$proveedor->razon_social=$request->razon_social;
        $proveedor->ruc=$request->ruc;
        $proveedor->telefono=$request->telefono;
        $proveedor->correo=$request->correo;
        $proveedor->direccion=$request->direccion;
		$proveedor->save();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$proveedor;

		return response()->json($response,200);
	}

	function delete($id)
	{
		$response = new \stdClass();
		$response->success=true;
		$response_code=200;


		$proveedor = Proveedor::find($id);

		if($proveedor)
		{
			$proveedor->delete();
			$response->success=true;
			$response_code=200;
		}
		else
		{
			$response->error=["El proveedor ya ha sido eliminado"];
			$response->success=false;
			$response_code=500;
		}

		return response()->json($response,$response_code);

	}
}