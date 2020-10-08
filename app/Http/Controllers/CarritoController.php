<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Auth;

class CarritoController extends Controller
{
    public function pedido(){
    	$check = Auth::check();

        if(!$check){
            return redirect('/usuarioLogin');
        }else{
            $user = Auth::user();
            $id = null;

            $carrito = DB::table('carrito')
                        ->where([
                            ['idcliente', '=', $user->id],
                            ['operacion', '=', 'PEDIDO'],
                            ['estado', '=', 'PE'],
                        ])->get();

            foreach ($carrito as $val) {
            	$id = $val->idcarrito;
            }

            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', $user->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            $dcarrito = DB::table('dcarrito')->where('idcarrito',$id)->get();
            $producto = DB::table('producto')->where('estado',1)->get();
            $parametros = DB::table('parametros')->where([
                'estado'            => 1,
                'tipo_parametro'    => 'GENERAL'
            ])->get();        
            $empresa = DB::table('empresa')->get();
            $contactanos = DB::table('contactanos')->get();
            $fpago = DB::table('formas_pago')->where('estado',1)->get();

            return view('pagina.carrito.pedido',[
            	'user'			=> $user,
                'vcarrito'      => $vcarrito,
                'carrito'		=> $carrito,
                'dcarrito'		=> $dcarrito,
                'producto'		=> $producto,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'fpago'         => $fpago
            ]);
        }
    }

    public function destroy($id)
    {       
        DB::table('carrito')
            ->where('idcarrito',$id)->delete();

        return redirect('/catalogo');
    }
}
