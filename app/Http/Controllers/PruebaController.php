<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use Image;

class PruebaController extends Controller
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

        //--

        $prueba = DB::table('prueba')->get();

        return view('forms.prueba.prueba', [
                    'prueba'   => $prueba,
                    'valida'     => $valida
                ]);
    }

    public function create()
    {
       return view('forms.prueba.addPrueba');
    }

    public function store(Request $request)
    {
    	$idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
    	
    	//dd($request);
         $rules = array(      
            'idempresa'        => 'required',
            'descripcion'	=> 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('prueba')            
            ->insert([
            	'idempresa'			=> $request->idempresa,
            	'estado'            => 1,
                'descripcion'       => $request->descripcion,
                'fecha_creacion'    => date('Y-m-d h:m:s')    
            ]);

            if (count($validacion) === 0) {
	            DB::table('validacion')
	            ->insert([
	                'idusuario' => $idusu,
	                'valor'     => 1
	            ]);
	        }else{
	            DB::table('validacion')
	            ->where('idusuario',strval($idusu))
	            ->update(['valor' => 1]);
	            
	        }  

            $tabla = DB::table('prueba')->where('idempresa',$request->idempresa)->get();
            $collection = Collection::make($tabla);
                
            return response()->json($collection->toJson());   
        }
    }
}
