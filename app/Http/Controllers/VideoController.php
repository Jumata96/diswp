<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request; 

use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use Auth; 

class VideoController extends Controller
{
     

    public function lstVideo()
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

        $publicidad = DB::table('videos')->get();
        // dd($publicidad);

        return view('forms.video.lstVideo',[
            'publicidad'    => $publicidad,
            'valida'        => $valida
        ]);
    }

    public function create()
    {
        return view('forms.video.mntVideo',[
            
        ]);
    }

    public function mntVideo()
    {
        $publicidad = DB::table('hotspot_publicidad')->get();

        return view('forms.video.mntVideo',[
            'publicidad'    => $publicidad
        ]);
    }
    public function store(Request $request)
    {
        //   dd($request->u_video);
        
        $rules = array(      
            'archivo'     => 'required|mimes:png,mp4,mp4v,mpg4,mpeg,mpg,mkv',
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        } 
        // dd("ingresa");

        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
        $principal = 0;

     
        
        $file = $request->file('archivo');//archivo
        
        $extension = $file->getClientOriginalExtension();  
       
             
        if ($request->file('archivo')) {
            $url_video = Storage::disk('public')->put('videos', $request->file('archivo'));
        } 
        // dd($url_video);

        DB::table('videos')
        ->insert([            
            'estado'            => 1, 
            'titulo'            => $request->titulo,
            'descripcion'       => $request->descripcion,  
            'url_video'         =>'videos/'.$url_video,
            'nombre_original'   => $request->u_video,       
            'extension'         => $extension,  
            'fecha_creacion'    => date('Y-m-d H:m:s')
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
        
        /* $data['success'] =; 

        return $data; */
    }

    //
}
