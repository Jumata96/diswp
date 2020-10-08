<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;

class SeguimientoController extends Controller
{
    public function index($id)
    {
        $compra = DB::table('carrito')->where('idcarrito',$id)->get();

    	return view('forms.seguimiento.seguimiento',[
            'compra'    => $compra
        ]);
    }

    public function index2()
    {
        $compras = DB::table('carrito')->where(['estado' => 'PA', 'idcliente' => Auth::user()->id])->get();

        return view('forms.seguimiento.lstSeguimiento',[
            'compras'    => $compras
        ]);
    }

    


    //--------------CPANEL TRABAJADORES----------------
    public function estado($id)
    {
        $seguimiento = DB::table('seguimiento')->where([
            'idpedido'      => $id,
            'estado'        => 'PEN'
        ])->get();

        return view('forms.seguimiento.estados',[
            'seguimiento'   => $seguimiento
        ]);
    }

    public function facturacion(Request $request)
    {   
        //dd($request);  
        $fac = null;   

        $rules = array(      
            'facturacion'   => 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }      

        //dd($request); 
        if ($request->facturacion == 1) {
             $rules = array(      
                'f_descripcion'   => 'required'
            );

            $validator = Validator::make ( $request->all(), $rules );

            if ($validator->fails()){
                $var = $validator->getMessageBag()->toarray();
                array_push($var, 'error');
                //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
                return response()->json($var);
            }   

            DB::table('seguimiento')
             ->where('idpedido',$request->idfac)
             ->update([
                'estado'        => 'REC',
                'observacion'   => $request->f_descripcion
             ]);   

             DB::table('carrito')
             ->where('idcarrito',$request->idfac)
             ->update([
                'idarea'                => 'FAC',
                'estado_seguimiento'    => 'REC'
             ]);
         } 

        //dd($request);
        DB::table('carrito')
         ->where('idcarrito',$request->idfac)
         ->update([
            'idarea'                => 'ALM',
            'estado_seguimiento'    => 'PEN'
         ]);

        DB::table('seguimiento')
         ->where('idpedido',$request->idfac)
         ->update([
            'estado'        => 'ACP'
         ]);

        $pedido = DB::table('carrito')->where('idcarrito',$request->idfac)->get();

        foreach ($pedido as $val) {
            DB::table('seguimiento')
            ->insert([
                'idcliente'     => $val->idcliente,
                'idpedido'      => $val->idcarrito,
                'estado'        => 'PEN',
                'idarea'        => 'ALM'
            ]);    
        }

            
        $carrito = DB::table('carrito')->where('idcarrito',$request->id)->get();
        $collection = Collection::make($carrito);
                
        return response()->json($collection->toJson());   
    }

    public function almacen(Request $request)
    {   
        //dd($request);  
        $fac = null;   

        $rules = array(      
            'almacen'   => 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }      

        //dd($request); 
        //------Pedido Rechazado------
        if ($request->almacen == 1) {
             $rules = array(      
                'a_descripcion'   => 'required'
            );

            $validator = Validator::make ( $request->all(), $rules );

            if ($validator->fails()){
                $var = $validator->getMessageBag()->toarray();
                array_push($var, 'error');
                //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
                return response()->json($var);
            }   

            DB::table('seguimiento')
             ->where('idpedido',$request->idalm)
             ->update([
                'estado'        => 'REC',
                'observacion'   => $request->a_descripcion
             ]);   

             DB::table('carrito')
             ->where('idcarrito',$request->idalm)
             ->update([
                'idarea'                => 'ALM',
                'estado_seguimiento'    => 'REC'
             ]);
         } 

        //dd($request);
        //------Pedido Aprobado------
        DB::table('carrito')
         ->where('idcarrito',$request->idalm)
         ->update([
            'idarea'                => 'TRA',
            'estado_seguimiento'    => 'PEN',
            'estado'                => 'PT'
         ]);

        DB::table('seguimiento')
         ->where('idpedido',$request->idalm)
         ->update([
            'estado'        => 'ACP'
         ]);

        $pedido = DB::table('carrito')->where('idcarrito',$request->idalm)->get();

        foreach ($pedido as $val) {
            DB::table('seguimiento')
            ->insert([
                'idcliente'     => $val->idcliente,
                'idpedido'      => $val->idcarrito,
                'estado'        => 'PEN',
                'idarea'        => 'TRA'
            ]);    
        }

            
        $carrito = DB::table('carrito')->where('idcarrito',$request->id)->get();
        $collection = Collection::make($carrito);
                
        return response()->json($collection->toJson());   
    }

    public function transportista(Request $request)
    {   
        //dd($request);  
        $fac = null;   

        $rules = array(      
            'transporte'   => 'required'
        );

        $validator = Validator::make( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }      

        //dd($request); 
        if ($request->transporte == 1) {
             $rules = array(      
                't_descripcion'   => 'required'
            );

            $validator = Validator::make ( $request->all(), $rules );

            if ($validator->fails()){
                $var = $validator->getMessageBag()->toarray();
                array_push($var, 'error');
                //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
                return response()->json($var);
            }   

            DB::table('seguimiento')
             ->where('idpedido',$request->idtra)
             ->update([
                'estado'        => 'REC',
                'observacion'   => $request->t_descripcion
             ]);   

             DB::table('carrito')
             ->where('idcarrito',$request->idtra)
             ->update([
                'idarea'                => 'TRA',
                'estado_seguimiento'    => 'REC'
             ]);
         } 

        //dd($request);
        DB::table('carrito')
         ->where('idcarrito',$request->idtra)
         ->update([
            'estado_seguimiento'    => 'ACP'
         ]);

        DB::table('seguimiento')
         ->where('idpedido',$request->idtra)
         ->update([
            'estado'        => 'ACP'
         ]);

                   
        $carrito = DB::table('carrito')->where('idcarrito',$request->id)->get();
        $collection = Collection::make($carrito);
                
        return response()->json($collection->toJson());   
    }
}
