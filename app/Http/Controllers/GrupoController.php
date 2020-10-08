<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use Image;

class GrupoController extends Controller
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

        $grupo = DB::table('grupo_pro')->get();
        //dd($carrusel);

        return view('forms.grupo.lstGrupo', [
            'grupo'	=> $grupo,
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
            DB::table('grupo_pro')            
            ->insert([
            	'idgrupo'			=> $request->idgrupo,
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

            $grupo_pro = DB::table('grupo_pro')->where('idgrupo',$request->idgrupo)->get();
            $collection = Collection::make($grupo_pro);
                
            return response()->json($collection->toJson());   
        }
    }

     public function update(Request $request)
    {
    	$idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

    	//dd($request);
         $rules = array(     
            'u_descripcion'	=> 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('grupo_pro')     
            ->where('idgrupo',$request->u_id)       
            ->update([
                'descripcion'		=> $request->u_descripcion,
                'glosa'	        	=> $request->u_glosa,
            ]);

          
            $grupo = DB::table('grupo_pro')->where('idgrupo',$request->u_id)->get();
            $collection = Collection::make($grupo);
                
            return response()->json($collection->toJson());   
        }
    }

    public function disabled(Request $request)
    {
        DB::table('grupo_pro')
            ->where('idgrupo',$request->id)
            ->update([
                'estado'    => 0
            ]);

        $grupo = DB::table('grupo_pro')->where('idgrupo',$request->id)->get();
        $collection = Collection::make($grupo);
                
        return response()->json($collection->toJson());   
    }

    public function habilitar(Request $request)
    {
        DB::table('grupo_pro')
            ->where('idgrupo',$request->id)
            ->update([
                'estado'    => 1
            ]);

        $grupo = DB::table('grupo_pro')->where('idgrupo',$request->id)->get();
        $collection = Collection::make($grupo);
                
        return response()->json($collection->toJson());   
    }

    public function destroy(Request $request)
    {
    	//dd($request->id);
        DB::table('grupo_pro')
            ->where('idgrupo',$request->id)->delete();

        return response()->json();
    }


}
