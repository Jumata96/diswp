<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Auth;

class Seccion2Controller extends Controller
{
    //

        public function store(Request $request)
    { 
    	
         $rules = array(      
            'general'        => 'required',
            'descripcion'        => 'required'
        ); 
        $validator = Validator::make ( $request->all(), $rules );
        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error'); 
            return response()->json($var);
        }          
        else {
            //  dd($request);
            DB::table('general')
            ->where('id',$request->generalId)
            ->update([
                'titulo'        => $request->general,
                'descripcion'	=> $request->descripcion,  
                'fecha_creacion'    => date('Y-m-d h:m:s') 
            ]); 
            // return response()->json($collection->toJson());    
            return response()->json("confomre");    
         }
     
      
    }
        public function storeD(Request $request)
    { 
    	// dd($request);
         $rules = array(      
            'tituloSubtitulo'             => 'required',
            'descripcionSubtitulo'        => 'required'
        ); 
        $validator = Validator::make ( $request->all(), $rules );
        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error'); 
            return response()->json($var);
        }          
        else {
            //  dd($request);
            DB::table('dgeneral') 
            ->insert([
                'idgeneral'     =>$request->id_Titulo_modal,
                'titulo'        => $request->tituloSubtitulo,
                'fecha_creacion' => date('Y-m-d h:m:s'),
                'estado'            => 1, 
                'descripcion'	=> $request->descripcionSubtitulo     
            ]); 
            // return response()->json($collection->toJson());    
            return response()->json("confomre");    
         }
     
      
    }
        public function destroy($id)
    { 
        // dd($id);
         
            DB::table('dgeneral')
            ->where('id',intval($id))
            ->update([ 
                'estado'            => '3',  
            ]);

        return redirect('/inicio');
    }
    public function habilitar ($id){
        //dd($id);
        DB::table('dgeneral')
        ->where('id',intval($id))
        ->update([ 
            'estado'            => '1',  
        ]);
        return redirect('/inicio');

    }
    public function desabilitar ($id){
        // dd($id);
        DB::table('dgeneral')
        ->where('id',intval($id))
        ->update([ 
            'estado'            => '0',  
        ]);
        return redirect('/inicio');

    } 
        public function actualizarD(Request $request)
    { 
    	//  dd($request);
         $rules = array(      
            'tituloSubtituloU'             => 'required',
            'descripcionSubtitulo'        => 'required'
        ); 
        $validator = Validator::make ( $request->all(), $rules );
        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error'); 
            return response()->json($var);
        }          
        else { 
            
            DB::table('dgeneral')
            ->where('id',intval($request->id_Titulo_modal_upd))
            ->update([ 
                'descripcion'	=> $request->descripcionSubtitulo ,    
                'titulo'        => $request->tituloSubtituloU 
            ]);

            // return response()->json($collection->toJson());    
            return response()->json("confomre");    
         }
     
      
    }
}
