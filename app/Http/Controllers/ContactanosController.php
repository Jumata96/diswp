<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use Image;


class ContactanosController extends Controller
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

        $contactanos = DB::table('contactanos')->get();
        $dcontactanos = DB::table('dcontactanos')->get();
        // dd($contactanos);

        return view('forms.contactanos.mntContactanos', [
            'contactanos'	=> $contactanos,
            'dcontactanos'	=> $dcontactanos,
            'valida'		=> $valida
		]);
    }

    public function update(Request $request)
    {    	
    	// dd($request);
         $rules = array(      

        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('contactanos')            
            ->where('id',$request->id)
            ->update([
                'titulo'			=> $request->titulo,
                'email'             => $request->correo,
                'horario'           => $request->horario,
            	'descripcion'       => $request->descripcion,
                'ubicacion'	        => $request->ubicacion,
                'link_facebook'     => $request->link_facebook,
                'link_twitter'      => $request->link_twitter,
                'link_youtube'      => $request->link_youtube,
                'link_linkending'   => $request->link_linkendig,                
                'fecha_creacion'    => date('Y-m-d h:m:s')    
            ]);

          
            $tabla = DB::table('contactanos')->where('id',$request->id)->get();
            $collection = Collection::make($tabla);
                
            return response()->json($collection->toJson());   
        }
    }

    public function storeMensajes(Request $request)
    {
        //dd($request);
        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
        
        //dd($request);
         $rules = array(      
            'nombre'        => 'required',
            'email'         => 'required',
            'mensaje'       => 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('mensaje')            
            ->insert([
                'nombre'            => $request->nombre,
                'email'             => $request->email,
                'empresa'           => $request->empresa,
                'mensaje'           => $request->mensaje,                
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

            $tabla = DB::table('mensaje')->where('nombre',$request->nombre)->get();
            $collection = Collection::make($tabla);
                
            return response()->json($collection->toJson());   
        }
    }

    public function storeDetalle(Request $request)
    {       
        //dd($request);
        $principal = 0;

        if($request->activo == 'on'){
            $principal = 1;
            DB::table('dcontactanos')->update(['activo' => 0]);
        }
         $rules = array(      
            'titulo'        => 'required',
            'descripcion'   => 'required',
            'icono'         => 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('dcontactanos')            
            ->insert([
                'estado'            => 1,
                'titulo'            => $request->titulo,
                'descripcion'       => $request->descripcion,
                'icono'             => $request->icono,
                'activo'            => $principal,
                'fecha_creacion'    => date('Y-m-d h:m:s')    
            ]);

           
            $tabla = DB::table('dcontactanos')->where('titulo',$request->titulo)->get();
            $collection = Collection::make($tabla);
                
            return response()->json($collection->toJson());   
        }
    }

    public function updateDetalle(Request $request)
    {       
        //dd($request);
        $principal = 0;

        if($request->u_activo == 'on'){
            $principal = 1;
            DB::table('dcontactanos')->update(['activo' => 0]);
        }

        $rules = array(      
            'u_titulo'        => 'required',
            'u_descripcion'   => 'required',
            'u_icono'         => 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('dcontactanos')            
            ->where('id',$request->u_id)
            ->update([
                'titulo'            => $request->u_titulo,
                'descripcion'       => $request->u_descripcion,
                'icono'             => $request->u_icono,
                'activo'            => $principal
            ]);

          
            $tabla = DB::table('dcontactanos')->where('id',$request->u_id)->get();
            $collection = Collection::make($tabla);
                
            return response()->json($collection->toJson());   
        }
    }

    public function destroy(Request $request)
    {
        //dd($request->id);
        DB::table('dcontactanos')
            ->where('id',$request->id)->delete();

        return response()->json();
    }

    public function disabled(Request $request)
    {
        DB::table('dcontactanos')
            ->where('id',$request->id)
            ->update([
                'estado'    => 0
            ]);

        $tabla = DB::table('dcontactanos')->where('id',$request->id)->get();
        $collection = Collection::make($tabla);
                
        return response()->json($collection->toJson());   
    }

    public function habilitar(Request $request)
    {
        DB::table('dcontactanos')
            ->where('id',$request->id)
            ->update([
                'estado'    => 1
            ]);

        $tabla = DB::table('dcontactanos')->where('id',$request->id)->get();
        $collection = Collection::make($tabla);
                
        return response()->json($collection->toJson());   
    }

}
