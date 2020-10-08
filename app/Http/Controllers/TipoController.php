<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use Image;

class TipoController extends Controller
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

        $tipo = DB::table('tipo')->get();
        $grupo = DB::table('grupo_pro')->get();
        //dd($carrusel);

        return view('forms.tipo.lstTipo', [
            'tipo'		=> $tipo,
            'grupo'		=> $grupo,
            'valida'	=> $valida
		]);
    }

     public function store(Request $request)
    {
    	$idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
    	
    	//dd($request);
         $rules = array(      
            'idgrupo'       => 'required',
            'idtipo'		=> 'required',
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
            DB::table('tipo')            
            ->insert([
            	'idgrupo'			=> $request->idgrupo,
            	'idtipo'			=> $request->idtipo,
            	'estado'			=> 1,
                'descripcion'		=> $request->descripcion,
                'glosa'				=> $request->glosa,
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

            $tipo = DB::table('tipo')->where([
            	'idgrupo'	=> $request->idgrupo,
            	'idtipo'	=> $request->idtipo
            ])->get();
            $collection = Collection::make($tipo);
                
            return response()->json($collection->toJson());   
        }
    }

    public function update(Request $request)
    {
    	$idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

    	//dd($request);
         $rules = array(     
            'u_descripcion'	=> 'required',
            'u_idgrupo'		=> 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('tipo')     
            ->where([
            	'idgrupo'	=> $request->u_idgrupo,
            	'idtipo'	=> $request->u_id
            ])->update([
            	'idgrupo'			=> $request->u_idgrupo,
                'descripcion'		=> $request->u_descripcion,
                'glosa'	        	=> $request->u_glosa,
            ]);

          
            $tipo = DB::table('tipo')
            ->where([
            	'idgrupo'	=> $request->u_idgrupo,
            	'idtipo'	=> $request->u_id
            ])->get();

            $collection = Collection::make($tipo);
                
            return response()->json($collection->toJson());   
        }
    }

    public function getTipo(Request $request)
    {
    	$tipo = DB::table('tipo')
            ->where('idgrupo',$request->idgrupo)->get();

      	$collection = Collection::make($tipo);
                
      	return response()->json($collection);   	
    }

    public function disabled(Request $request)
    {
        DB::table('tipo')
            ->where('idtipo',$request->id)
            ->update([
                'estado'    => 0
            ]);

        $grupo = DB::table('tipo')->where('idtipo',$request->id)->get();
        $collection = Collection::make($grupo);
                
        return response()->json($collection->toJson());   
    }

    public function habilitar(Request $request)
    {
        DB::table('tipo')
            ->where('idtipo',$request->id)
            ->update([
                'estado'    => 1
            ]);

        $grupo = DB::table('tipo')->where('idtipo',$request->id)->get();
        $collection = Collection::make($grupo);
                
        return response()->json($collection->toJson());   
    }

    public function destroy(Request $request)
    {
        //dd($request->id);
        DB::table('tipo')
            ->where('idtipo',$request->id)->delete();

        return response()->json();
    }

}
