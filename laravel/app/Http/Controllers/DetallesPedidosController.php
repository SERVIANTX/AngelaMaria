<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetallePedido;

class DetallesPedidosController extends Controller
{
    function obtenerLista()
	{
		$detallepedido =  Marca::all();


		$response = new \stdClass();
		$response->success=true;
		$response->data=$detallepedido;

		return response()->json($response,200);
	}

	function obtenerNombre()
	{
		//$marca =  Marca::all();
		/*$marca =  DB::table('marcas')
               ->where('nombre', 'like', 'pruebax2%')
              ->get();*/
			  $detallepedido = DB::select('SELECT * FROM detallepedido');
			  
			 
		return response($detallepedido);
	}

    function obtenerItem($id)
	{
		$detallepedido =  Marca::find($id);


		$response = new \stdClass();
		$response->success=true;
		$response->data=$detallepedido;

		return response()->json($response,200);
	}


	function store(Request $request)
	{
		$detallepedido = new Marca();
		$detallepedido->idpedido=$request->idpedido;
        $detallepedido->idproducto=$request->idproducto;
        $detallepedido->CantidadProducto=$request->CantidadProducto;
        $detallepedido->PrecioUnitario=$request->PrecioUnitario;
        $detallepedido->Subtotal=$request->Subtotal;
		$detallepedido->save();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$detallepedido;

		return response()->json($response,200);
	}
}
