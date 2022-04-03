<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    function obtenerAdmin()
	{
        $Admin = DB::select('SELECT * FROM users WHERE roles LIKE "Admin"');
			  
		$response = new \stdClass();
        $response->success=true;
        $response->data=$Admin;

		return response()->json($response,200);
	}

    function storeAdmin(Request $request)
	{
		$admin = new Usuarios();
		$admin->roles="Admin";
        $admin->imagen=$request->imagen;
        $admin->name=$request->name;
        $admin->apellidos=$request->apellidos;
        $admin->direccion=$request->direccion;
        $admin->numero_documento=$request->numero_documento;
        $admin->email=$request->email;
        $admin->password=$request->password;
		$admin->telefono=$request->telefono;
		$admin->save();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$admin;

		return response()->json($response,200);
	}

	function storeCliente(Request $request)
	{
		$cliente = new Usuarios();
		$cliente->roles="Cliente";
        $cliente->imagen="https://lh3.googleusercontent.com/MTRfQN686fDlm0GSDK-iJji0o2fhJ7-LlFlnp1M2taUUzbnu-0fo2TBdHPLmQouYb8IJ=s85";
        $cliente->name=$request->name;
        $cliente->apellidos=$request->apellidos;
        $cliente->direccion=$request->direccion;
        $cliente->numero_documento=$request->numero_documento;
        $cliente->email=$request->email;
        $cliente->password=$request->password;
		$cliente->telefono=$request->telefono;
		$cliente->save();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$cliente;

		return response()->json($response,200);
	}

    function obtenerItemAdmin($id)
    {
        $admin =  Usuarios::find($id);


        $response = new \stdClass();
        $response->success=true;
        $response->data=$admin;

        return response()->json($response,200);
    }

    function updateAdmin(Request $request)
	{
		$admin =  Usuarios::find($request->id);

		if($admin)
		{
            $admin->imagen=$request->imagen;
            $admin->name=$request->name;
            $admin->apellidos=$request->apellidos;
            $admin->direccion=$request->direccion;
            $admin->numero_documento=$request->numero_documento;
            $admin->email=$request->email;
            $admin->password=$request->password;
			$admin->telefono=$request->telefono;
			$admin->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$admin;

		return response()->json($response,200);
	}

    function obtenerDatos($datosAdmin)
	{
		//$marca =  Marca::all();
		/*$marca =  DB::table('marcas')
               ->where('nombre', 'like', 'pruebax2%')
              ->get();*/
			  	$admin = DB::select("SELECT * FROM users WHERE email = '$datosAdmin'");
		  
				return response($admin);
			// return response($productos);
	}


    function obtenerClientes()
	{
		//$marca =  Marca::all();
		/*$marca =  DB::table('marcas')
               ->where('nombre', 'like', 'pruebax2%')
              ->get();*/
			  $Clientes = DB::select('SELECT * FROM users WHERE roles LIKE "Cliente"');
			  $response = new \stdClass();
                $response->success=true;
                $response->data=$Clientes;

		return response()->json($response,200);
			 
	}

 }