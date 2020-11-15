<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use Image;
use Storage;
class Seccion6Controller extends Controller
{

    /* tipos de imagenes 1:all /2:aerobico / 3:fuerza /4;nutricion */
     public function addSeccion6()
    { 
        $inicio_seccion6 = DB::table('inicio_seccion')
                    ->where('codigo','SEC6')->get();  

        return view('forms.inicio.seccion6.addSeccion6',[
            'inicio_seccion6' => $inicio_seccion6 
        ]);
    }
    public function store(Request $request)
    {
    //    dd($request);
          if ($request->file('imagen')) {
            // 
            $rules = array(  
                'imagen'     => 'required|mimes:png,jpg,tif,jpeg',
                'titulo'    => 'required',
                'descripcion'   => 'required',  
                'tipo'   => 'required',  
            ); 
        }else{
            $rules = array(       
                    'titulo'    => 'required',
                    'descripcion'   => 'required',  
                    'tipo'   => 'required',  
                ); 
        } 
        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        }   
        $url_imagen=null;  
      
        if ($request->file('imagen')) {  
            $url_imagen = Storage::disk('public')->put('imagenes', $request->file('imagen'));
        }else{
           $url_imagen = $request->url_imagen;
        } 
         
        DB::table('inicio_seccion_det') 
            ->insert([  
                'titulo'            => $request->titulo,  
                'id_seccion'        =>$request->id,
                'descripcion'   => $request->descripcion,   
                'url_file'        =>$url_imagen,
                'name_file'       =>$request->text, 
                'tipo'            =>intval($request->tipo),
                'estado'            =>1,
                'fecha_creacion'    => date('Y-m-d H:m:s') 
            ]); 
    }
      
            public function destroy($id)
    { 
        //  dd($id); 
            DB::table('inicio_seccion_det')
            ->where('codigo',intval($id))
            ->update([ 
                'estado'            => '3',  
            ]); 
        return redirect('/inicio');
    }
    public function habilitar ($id){
        // dd($id);
        DB::table('inicio_seccion_det')
        ->where('codigo',intval($id))
        ->update([ 
            'estado'            => '1',  
        ]);
        return redirect('/inicio');

    }
    public function desabilitar ($id){
        //  dd($id);
        DB::table('inicio_seccion_det')
        ->where('codigo',intval($id))
        ->update([ 
            'estado'            => '0',  
        ]);
        return redirect('/inicio');

    } 

    public function show($id)
    {
        $inicio_seccion_det = DB::table('inicio_seccion_det')
                    ->where('codigo',intval($id))->get(); 
        // dd($inicio_seccion_det);
        return view('forms.inicio.seccion6.updSeccion6',[
            'inicio_seccion_det' => $inicio_seccion_det 
        ]);
    } 
    public function update(Request $request)
    {
        // dd($request);
          if ($request->file('imagen')) {
            // 
            $rules = array(  
                'imagen'     => 'required|mimes:png,jpg,tif,jpeg',
                'titulo'    => 'required',
                'descripcion'   => 'required',  
                'tipo'   => 'required',  
            ); 
        }else{
            $rules = array(       
                    'titulo'    => 'required',
                    'descripcion'   => 'required',  
                    'tipo'   => 'required',  
                ); 
        } 
        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        }   
        $url_imagen=null;  
      
        if ($request->file('imagen')) {  
            $url_imagen = Storage::disk('public')->put('imagenes', $request->file('imagen'));
        }else{
           $url_imagen = $request->url_imagen;
        } 
         
        DB::table('inicio_seccion_det') 
        ->where('codigo',intval($request->id))
            ->update([  
                'titulo'            => $request->titulo,   
                'descripcion'   => $request->descripcion,   
                'url_file'        =>$url_imagen,
                'name_file'       =>$request->text, 
                'tipo'            =>intval($request->tipo),
                'estado'            =>1,
                'fecha_creacion'    => date('Y-m-d H:m:s') 
            ]); 
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
