<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;

class PedidosController extends Controller
{
    public function index()
    {    
        $valida = 0;

        //-- Validación para mostrar mensajes al realizar un CRUD
        $validacion = DB::table('validacion')
                        ->select('valor')
                        ->where('idusuario',Auth::user()->id)->get();

        foreach ($validacion as $val) {
            $valida = $val->valor;
        }
        if ($valida > 0) {
            DB::table('validacion')
            ->where('idusuario',strval(Auth::user()->id))
            ->update(['valor' => 0]);
        }

        $patendidos = DB::table('carrito')->where(['operacion' => 'PEDIDO','estado' => 'AT'])->get();
        //$ppatender = DB::table('carrito') ->whereBetween('estado', ['PE', 'PV'])->where(['operacion' => 'COMPRA'])->get();
        $ppatender = DB::table('carrito')
            ->whereIn('estado', ['PE', 'PV','PA'])
            ->where([
                'operacion' => 'COMPRA'
            ])->get();
        $clientes = DB::table('users')->where(['idtipo' => 'CLE', 'estado' => 1])->get();
        //dd($carrusel);

        return view('forms.pedidos.lstPedidos', [
            'clientes'      => $clientes,
            'patendidos'    => $patendidos,
            'ppatender'		=> $ppatender,
            'valida'    	=> $valida
        ]);
    }
}
