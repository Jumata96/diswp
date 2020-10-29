<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use Auth; 

class CursosController extends Controller
{
    public function lstcursos()
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

        $horarios = DB::table('horarios')->whereIn('estado', [1, 2])->get();
        $cursos = DB::table('cursos')->whereIn('estado', [1, 2])->get();
        $clientesDet = DB::table('cursos_clientes')->where('estado',1)->get(); 
        // dd($clientesDet);
        // dd($publicidad);

        return view('forms.cursos.lstCursos',[
            'cursos'        => $cursos,
            'horarios'      => $horarios,
            'clientesDet'   =>$clientesDet,
            'valida'        => $valida
        ]); 
    }
    public function lstcursosCliente()
    {

        $valida = 0;
        $documento = null;
        $idcleinte = null;

        //-- Validación para mostrar mensajes al realizar un CRUD
        $validacion = DB::table('validacion')
                        ->select('valor')
                        ->where('idusuario',Auth::user()->id)->get();
        

        $user = DB::table('users') 
                        ->where('id',Auth::user()->id)->get(); 
        //  dd($user);
        foreach ($validacion as $val) {
            $valida = $val->valor;
        }
        if ($valida > 0) {
            DB::table('validacion')
            ->where('idusuario',strval(Auth::user()->id))
            ->update(['valor' => 0]);
        }
        foreach ($user as $data) {
            $documento = $data->nro_documento;
        }
        $cliente = DB::table('clientes') 
        ->where('nro_documento',$documento)->get(); 
        foreach ($cliente as $dataC) {
            $idcleinte = $dataC->idcliente;
        }
        // dd($idcleinte ); 
        

        $horarios = DB::table('horarios')->whereIn('estado', [1, 2])->get();
        $cursos = DB::table('cursos') 
        ->select('cursos.*')
        ->join('cursos_clientes', 'cursos_clientes.codigo_cursos', '=', 'cursos.codigo')
        ->where('cursos_clientes.codigo_clientes', $idcleinte )/* ->whereIn('codigo', [1, 2]) */->get();
        //   dd($cursos);
        $clientesDet = DB::table('cursos_clientes')->where('estado',1)->get(); 
        // dd($clientesDet);
        // dd($publicidad);

        return view('forms.cursos.lstcursosCliente',[
            'cursos'        => $cursos,
            'horarios'      => $horarios,
            'clientesDet'   =>$clientesDet,
            'valida'        => $valida
        ]); 
    }
    public function addCursos()
    {
        $horarios = DB::table('horarios')->get();
        return view('forms.cursos.addCursos',[
            'horarios'=>$horarios
            ]);
    }
    public function store(Request $request)
    {
        //    dd($request);
        if ($request->file('video') and $request->file('imagen')) {
            // dd("ingreso");
            $rules = array(      
                'video'     => 'required|mimes:mp4,mp4v,mpg4,mpeg,mpg,mkv,avi,flk',
                'imagen'     => 'required|mimes:png,jpg,tif,jpeg',
                'titulo'    => 'required',
                'descripcion'   => 'required', 
                'costo'         =>'required'
            ); 
        }else{
            if($request->file('imagen')){
                $rules = array(     
                    'imagen'     => 'required|mimes:png,jpg,tif,jpeg',
                    'titulo'    => 'required',
                    'descripcion'   => 'required', 
                    'costo'         =>'required'
                ); 
            }else if($request->file('video')){
                $rules = array(       
                    'video'     => 'required|mimes:mp4,mp4v,mpg4,mpeg,mpg,mkv,avi,flk',
                    'titulo'    => 'required',
                    'descripcion'   => 'required', 
                    'costo'         =>'required'
                );

            }else{
                $rules = array(       
                    'titulo'    => 'required',
                    'descripcion'   => 'required', 
                    'costo'         =>'required'
                );
            }

        } 
        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        }  
        $url_video =null;
        $url_imagen=null; 
             
        if ($request->file('video')) {  
            $url_video = Storage::disk('public')->put('videos', $request->file('video'));
        } 
        if ($request->file('imagen')) {  
            $url_imagen = Storage::disk('public')->put('imagenes', $request->file('imagen'));
        }  
        DB::table('cursos')
        ->insert([            
            'estado'            => 1, 
            'nombre'            => strtoupper($request->titulo),
            'horario'           =>$request->horario,   
            'descripcion'   => $request->descripcion,   
            'tiempo'        =>$request->tiempo, 
            'costo'            =>$request->costo, 
            'fecha_creacion'    => date('Y-m-d H:m:s'),
            'url_video'         =>$url_video,
            'url_imagen'        =>$url_imagen
        ]);  
    }
    public function update(Request $request)
    {
        // dd( $request);
        if ($request->file('video') and $request->file('imagen')) {
            // dd("ingreso");
            $rules = array(      
                'video'     => 'required|mimes:mp4,mp4v,mpg4,mpeg,mpg,mkv,avi,flk',
                'imagen'     => 'required|mimes:png,jpg,tif,jpeg',
                'titulo'    => 'required',
                'descripcion'   => 'required', 
                'costo'         =>'required'
            ); 
        }else{
            if($request->file('imagen')){
                $rules = array(     
                    'imagen'     => 'required|mimes:png,jpg,tif,jpeg',
                    'titulo'    => 'required',
                    'descripcion'   => 'required', 
                    'costo'         =>'required'
                ); 
            }else if($request->file('video')){
                $rules = array(       
                    'video'     => 'required|mimes:mp4,mp4v,mpg4,mpeg,mpg,mkv,avi,flk',
                    'titulo'    => 'required',
                    'descripcion'   => 'required', 
                    'costo'         =>'required'
                );

            }else{
                // dd("llego");
                $rules = array(       
                    'titulo'    => 'required',
                    'descripcion'   => 'required', 
                    'costo'         =>'required'
                );
            }

        }  
        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        }  
        $url_video =null;
        $url_imagen=null;  
        if ($request->file('video')) {  
            $url_video = Storage::disk('public')->put('videos', $request->file('video'));
        }else{
            $url_video =$request->url_Video;
        } 
        if ($request->file('imagen')) {  
            $url_imagen = Storage::disk('public')->put('imagenes', $request->file('imagen'));
        }else{
            $url_imagen = $request->url_imagen;
        } 

        DB::table('cursos')
            ->where('codigo',$request->id)
            ->update([  
                'nombre'            => $request->titulo,
                'horario'           =>$request->horario,   
                'descripcion'   => $request->descripcion,   
                'tiempo'        =>$request->tiempo, 
                'costo'            =>$request->costo, 
                 'url_video'         =>$url_video,
                'url_imagen'        =>$url_imagen,
                'fecha_creacion'    => date('Y-m-d H:m:s') 
            ]); 
    }

    public function destroy($id)
    { 
        // dd($id);
         
            DB::table('cursos')
            ->where('codigo',$id)
            ->update([ 
                'estado'            => '3',  
            ]);

        return redirect('/lstCursos');
    }
    public function habilitar ($id){
        //dd($id);
        DB::table('cursos')
        ->where('codigo',$id)
        ->update([ 
            'estado'            => '1',  
        ]);
        return redirect('/lstCursos');

    }
    public function desabilitar ($id){
        //dd($id);
        DB::table('cursos')
        ->where('codigo',$id)
        ->update([ 
            'estado'            => '2',  
        ]);
        return redirect('/lstCursos');

    }
    public function show($id)
    {
        // dd($id);
        $curso = DB::table('cursos')
                    ->where('codigo',$id)->get();
        // dd($curso);
         $horarios = DB::table('horarios')->whereIn('estado', [1, 2])->get();
          
        // dd($curso);
        return view('forms.cursos.updCursos',['cursos' => $curso,'horarios'=>$horarios
        ]);
    }
    public function showClientes($id)
    {
        //  dd($id);
        $curso = DB::table('cursos')
                    ->where('codigo',intval($id))->get();
         
        $horarios = DB::table('horarios')->whereIn('estado', [1, 2])->get();
        $videos = DB::table('videos')
        ->select('cursos_videos.id',DB::raw('cursos_videos.nombre_video as titulo'),DB::raw('videos.url_video as url_video'),DB::raw('videos.descripcion as descripcion'))
        ->join('cursos_videos', 'videos.codigo', '=', 'cursos_videos.codigo_videos') 
        ->where('cursos_videos.codigo_cursos',intval($id))
        ->whereIn('cursos_videos.estado', [1, 2])  
        ->get();
        //  dd($videos);  
        // dd($curso);
        // codigo url descripcion
        return view('forms.cursos.showCursos',[
        'cursos' => $curso,
        'videos' => $videos,
        'horarios'=>$horarios
        ]);
    }
    public function showClientesVideos($id)
    {
      
        $videos = DB::table('videos')
        ->select( DB::raw('cursos_videos.id as codigo'),DB::raw('cursos_videos.nombre_video as titulo'),DB::raw('videos.url_video as url_video'),DB::raw('videos.descripcion as descripcion'))
        ->join('cursos_videos', 'videos.codigo', '=', 'cursos_videos.codigo_videos') 
        ->where('cursos_videos.codigo_cursos',intval($id))
        ->whereIn('cursos_videos.estado', [1, 2])  
        ->get();
  
        //  dd($horarios);  
        // dd($curso);
        return response()->json($videos );
    }
    
  
}
