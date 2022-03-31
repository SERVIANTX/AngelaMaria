<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    function obtenerLista()
	{
		$cliente =  Cliente::all();


		$response = new \stdClass();
		$response->success=true;
		$response->data=$cliente;

		return response()->json($response,200);
	}

	function obtenerNombre()
	{
		
		$cliente = DB::select("SELECT id, concat_ws(' ', nombre, apellido_paterno, apellido_materno) AS nombrecliente, direccion FROM clientes");
			  
			 
		return response($cliente);
	}

    function obtenerItem($id)
	{
		$cliente =  Cliente::find($id);


		$response = new \stdClass();
		$response->success=true;
		$response->data=$cliente;

		return response()->json($response,200);
	}


	function update(Request $request)
	{
		$cliente =  Cliente::find($request->id);

		if($cliente)
		{
            $cliente->nombre=$request->nombre;
            $cliente->apellido_paterno=$request->apellido_paterno;
            $cliente->apellido_materno=$request->apellido_materno;
            $cliente->direccion=$request->direccion;
            $cliente->numero_documento_identidad=$request->numero_documento_identidad;
            $cliente->correo=$request->correo;
			$cliente->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$cliente;

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
		$cliente = new Cliente();
		$cliente->nombre=$request->nombre;
        $cliente->apellido_paterno=$request->apellido_paterno;
        $cliente->apellido_materno=$request->apellido_materno;
        $cliente->direccion=$request->direccion;
        $cliente->numero_documento_identidad=$request->numero_documento_identidad;
        $cliente->correo=$request->correo;
		$cliente->save();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$cliente;

		return response()->json($response,200);
	}

	function delete($id)
	{
		$response = new \stdClass();
		$response->success=true;
		$response_code=200;


		$cliente = Cliente::find($id);

		if($cliente)
		{
			$cliente->delete();
			$response->success=true;
			$response_code=200;
		}
		else
		{
			$response->error=["El cliente ya ha sido eliminado"];
			$response->success=false;
			$response_code=500;
		}

		return response()->json($response,$response_code);

	}
}
