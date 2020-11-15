<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\Storage; 
use DB;
use Validator;
use Auth;
use Image;


class InicioController extends Controller
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

        $carrusel = DB::table('carrusel')->get(); 
        $general = DB::table('general')->where('estado',1)->get();
        $dgeneral = DB::table('dgeneral')->whereIn('estado',[1,0])->get();


        $inicio_seccion = DB::table('inicio_seccion')->whereIn('estado',[1,0])->get();

        $inicio_seccion_det = DB::table('inicio_seccion_det')->whereIn('estado',[1,0])->get();
        $inicio_seccion_det1 = DB::table('inicio_seccion_det')->whereIn('estado',[1,0])->where('id_seccion','SEC1')->get();
        $inicio_seccion_det4 = DB::table('inicio_seccion_det')->whereIn('estado',[1,0])->where('id_seccion','SEC4')->get();
        $inicio_seccion_det6= DB::table('inicio_seccion_det')->whereIn('estado',[1,0])->where('id_seccion','SEC6')->get();

        // dd($dgeneral);

        //seccion3 

        return view('forms.inicio.mntInicio', [
            'carrusel'	=> $carrusel,
             'general'        => $general,
            'dgeneral'        => $dgeneral,
            'inicio_seccion'        => $inicio_seccion,
            'inicio_seccion_det1'        => $inicio_seccion_det1,
            'inicio_seccion_det4'        => $inicio_seccion_det4,
            'inicio_seccion_det6'        => $inicio_seccion_det6,
            'valida'	=> $valida
		]);
    }

     public function showSeccion1($id)
    {
        $inicio_seccion_det = DB::table('inicio_seccion_det')
                    ->where('codigo',intval($id))->get(); 
        // dd($inicio_seccion_det);
        return view('forms.inicio.seccion1.updSeccion1',[
            'inicio_seccion_det' => $inicio_seccion_det 
        ]);
    }
   
    public function updateSeccion1Det(Request $request)
    {
        // dd($request);
          if ($request->file('imagen')) {
            // 
            $rules = array(  
                'imagen'     => 'required|mimes:png,jpg,tif,jpeg',
                'titulo'    => 'required',
                'descripcion'   => 'required',  
            ); 
        }else{
            $rules = array(       
                    'titulo'    => 'required',
                    'descripcion'   => 'required',  
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
                'fecha_creacion'    => date('Y-m-d H:m:s') 
            ]); 
    }
    public function updateSeccion1(Request $request)
    {
        //   dd($request->seccion1_descripcion ,$request->seccion1_codigo);
         $rules = array(   
                'seccion1_descripcion'   => 'required',  
            ); 
        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        }    
         
        DB::table('inicio_seccion')
            ->where('codigo',$request->seccion1_codigo)
            ->update([    
                'descripcion'   => $request->seccion1_descripcion,   
                'fecha_creacion'    => date('Y-m-d H:m:s') 
            ]); 
    }
    public function updateSeccion4(Request $request)
    {    
        
        if ($request->file('imagen1') and $request->file('imagen2')) {
            //  dd("ingreso");
            $rules = array(      
                'imagen1'     => 'required|mimes:png,jpg,tif,jpeg',
                'imagen2'     => 'required|mimes:png,jpg,tif,jpeg',
                'titulo_seccion4'    => 'required',
                'descripcion_seccion4'   => 'required',  
                'item11'         =>'required',
                'item21'         =>'required',
                'item31'         =>'required',
                'item12'         =>'required',
                'item22'         =>'required',
                'item32'         =>'required',
                'porcentaje11'         =>'required',
                'porcentaje21'         =>'required',
                'porcentaje31'         =>'required',
                'porcentaje12'         =>'required',
                'porcentaje22'         =>'required',
                'porcentaje32'         =>'required',
                'seccion4_titulo1'         =>'required',
                'seccion4_titulo2'         =>'required', 
            ); 
        }else{
            if($request->file('imagen1')){
                // dd("ingreso");
                $rules = array(     
                    'imagen1'     => 'required|mimes:png,jpg,tif,jpeg', 
                    'titulo_seccion4'    => 'required',
                    'descripcion_seccion4'   => 'required',  
                    'item11'         =>'required',
                    'item21'         =>'required',
                    'item31'         =>'required',
                    'item12'         =>'required',
                    'item22'         =>'required',
                    'item32'         =>'required',
                    'porcentaje11'         =>'required',
                    'porcentaje21'         =>'required',
                    'porcentaje31'         =>'required',
                    'porcentaje12'         =>'required',
                    'porcentaje22'         =>'required',
                    'porcentaje32'         =>'required',
                    'seccion4_titulo1'         =>'required',
                    'seccion4_titulo2'         =>'required' 
                ); 
            }else if($request->file('imagen2')){
                $rules = array(        
                    'imagen2'     => 'required|mimes:png,jpg,tif,jpeg',
                    'titulo_seccion4'    => 'required',
                    'descripcion_seccion4'   => 'required',  
                    'item11'         =>'required',
                    'item21'         =>'required',
                    'item31'         =>'required',
                    'item12'         =>'required',
                    'item22'         =>'required',
                    'item32'         =>'required',
                    'porcentaje11'         =>'required',
                    'porcentaje21'         =>'required',
                    'porcentaje31'         =>'required',
                    'porcentaje12'         =>'required',
                    'porcentaje22'         =>'required',
                    'porcentaje32'         =>'required',
                    'seccion4_titulo1'         =>'required',
                    'seccion4_titulo2'         =>'required', 
                );

            }else{
                $rules = array(       
                    'titulo_seccion4'    => 'required',
                    'descripcion_seccion4'   => 'required',  
                    'item11'         =>'required',
                    'item21'         =>'required',
                    'item31'         =>'required',
                    'item12'         =>'required',
                    'item22'         =>'required',
                    'item32'         =>'required',
                    'porcentaje11'         =>'required',
                    'porcentaje21'         =>'required',
                    'porcentaje31'         =>'required',
                    'porcentaje12'         =>'required',
                    'porcentaje22'         =>'required',
                    'porcentaje32'         =>'required',
                    'seccion4_titulo1'         =>'required',
                    'seccion4_titulo2'         =>'required', 
                );
            }

        }  
        // dd( $rules,$validator);

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        } 
        
     
        DB::table('inicio_seccion')
            ->where('codigo',$request->id_seccion4)
            ->update([    
                'titulo'   => $request->titulo_seccion4,    
                'descripcion'   => $request->descripcion_seccion4 
        ]);
        for($i=1 ;$i<= $request->seccion4_cont;$i++){ 
            $url_namefile=null;
            $name_file=null;
            $item1="item1".strval($i);
            $item2="item2".strval($i);
            $item3="item3".strval($i); 
            $porcentaje1="porcentaje1".strval($i);
            $porcentaje2="porcentaje2".strval($i);
            // dd($request->$porcentaje2);
            $porcentaje3="porcentaje3".strval($i);  
            $idSecDet="id_Sec4Det".strval($i);
            $imagenNombre="imagenName".strval($i);
            $url_file="url_imagen".strval($i);
            //  dd($request->$imagenNombre);

            $tituloDet="seccion4_titulo".strval($i);
            $descripcionDet="descripcion".strval($i);





            if ($request->file('imagen'.strval($i))) {  
                $url_namefile=  Storage::disk('public')->put('imagenes', $request->file('imagen'.strval($i)));  
            }else{
               $url_namefile=$request->$url_file; 
            }   

             
            DB::table('inicio_seccion_det')
                ->where('codigo',$request->$idSecDet)
                ->update([    
                    'titulo'   => $request->$tituloDet,    
                    'descripcion'   => $request->$descripcionDet, 
                    'item_1'        =>$request->$item1,
                    'porcentaje_1'  =>intval($request->$porcentaje1),
                    'item_2'        =>$request->$item2,
                    'porcentaje_2'  =>intval($request->$porcentaje2),
                    'item_3'        =>$request->$item3,
                    'porcentaje_3'  =>intval($request->$porcentaje3),
                    'name_file'     =>$request->$imagenNombre,
                    'url_file'      =>$url_namefile,
            ]); 
        }
    }
    public function updateSeccion5(Request $request)
    { 
        if($request->btn_estado_seccion5=="1"){
            $rules = array(   
                'btn_codigo_seccion5'   => 'required',  
                'titulo_seccion5'   => 'required',  
            ); 
        }else{
            $rules = array(    
                'titulo_seccion5'   => 'required',  
            ); 
        }
         
        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        }    
         
        DB::table('inicio_seccion')
            ->where('codigo',$request->id_seccion5)
            ->update([    
                'titulo'   => $request->titulo_seccion5,   
                'btn_estado'   => $request->btn_estado_seccion5,   
                'btn_codigo'   => $request->btn_codigo_seccion5,    
                'fecha_creacion'    => date('Y-m-d H:m:s') 
            ]); 
    }
     public function updateSeccion6(Request $request)
    {
        // dd($request);
        $rules = array(   
                'descripcion_seccion6'   => 'required',  
                'titulo_seccion6'   => 'required',  
            );
        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        }  
        DB::table('inicio_seccion')
            ->where('codigo',$request->seccion6_codigo)
            ->update([    
                'titulo'   => $request->titulo_seccion6,       
                'descripcion'   => $request->descripcion_seccion6,       
                'fecha_creacion'    => date('Y-m-d H:m:s') 
            ]); 
    }


    
}
