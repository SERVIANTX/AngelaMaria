<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    function obtenerLista()
	{
		$pedidos =  Pedido::all();


		$response = new \stdClass();
		$response->success=true;
		$response->data=$pedidos;

		return response()->json($response,200);
	}

    function obtenerItem($id)
	{
		$pedido =  Pedido::find($id);


		$response = new \stdClass();
		$response->success=true;
		$response->data=$pedido;

		return response()->json($response,200);
	}

    function update(Request $request)
	{
		$pedido =  Pedido::find($request->id);

		if($pedido)
		{
            $pedido->pedido=$request->pedido;
            $pedido->cliente=$request->cliente;
            $pedido->direccion=$request->direccion;
            $pedido->fecha_pedido=$request->fecha_pedido;
            $pedido->fecha_envio=$request->fecha_envio;
            $pedido->estado=$request->estado;
			$pedido->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$pedido;

		return response()->json($response,200);
	}

    function store(Request $request)
	{
		$pedido = new Pedido();
        $pedido->pedido=$request->pedido;
        $pedido->cliente=$request->cliente;
        $pedido->direccion=$request->direccion;
        $pedido->fecha_pedido=$request->fecha_pedido;
        $pedido->fecha_envio=$request->fecha_envio;
        $pedido->estado=$request->estado;
        $pedido->save();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$pedido;

		return response()->json($response,200);
	}

    function delete($id)
	{
		$response = new \stdClass();
		$response->success=true;
		$response_code=200;


		$pedido = Pedido::find($id);

		if($pedido)
		{
			$pedido->delete();
			$response->success=true;
			$response_code=200;
		}
		else
		{
			$response->error=["El pedido ya ha sido eliminado"];
			$response->success=false;
			$response_code=500;
		}

		return response()->json($response,$response_code);

	}
}
