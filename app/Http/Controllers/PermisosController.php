<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Auth; 

class PermisosController extends Controller
{
    public function lstPermisos()
    {

        $valida = 0; 
        $validacion = DB::table('validacion')->select('valor')->where('idusuario',Auth::user()->id)->get();
        foreach ($validacion as $val) {
            $valida = $val->valor;
        }
        if ($valida > 0) {
            DB::table('validacion')
            ->where('idusuario',strval(Auth::user()->id))
            ->update(['valor' => 0]);
        } 
        $cursos = DB::table('cursos')->where('estado',1)->get();  
        $videosDet = DB::table('cursos_videos')->where('estado',1)->get(); 
        $clientesDet = DB::table('cursos_clientes')->where('estado',1)->get();
        return view('forms.permisos.lstPermisos',[
            'permisos'    => $cursos,
            'videosDet'    =>$videosDet,
            'clientesDet'   =>$clientesDet, 
            'valida'        => $valida
        ]); 
    }
    public function show($id)
    { 
        $cursos = DB::table('cursos')->where('codigo',$id)->get(); 
        $videos = DB::table('videos')->where('estado',1)->get(); 
        
        $clientes = DB::table('clientes')->where('estado',1)->get(); 
        $videosDet = DB::table('cursos_videos')->where('codigo_cursos',intval($id))->whereIn('estado',[1,2])->get();
        //  dd($videos,$videosDet); 
        $clientesDet = DB::table('cursos_clientes')->where('codigo_cursos', intval($id))->whereIn('estado',[1,2])->get(); 
        //   dd($clientesDet,$clientes);
        // dd($videosDet);
        $videosArray=[];
        $ClientesArray=[];
        //filtramos videos que no se agregaron al curso
        foreach ($videos as  $video) {
            $cont=0;
            foreach ($videosDet as  $videoD) {
                if( $video->codigo == $videoD->codigo_videos){
                    $cont+=1; 
                } 
            }
            if($cont<1){
                array_push($videosArray,[
                    'codigo'        => $video->codigo,
                    'titulo'    => $video->titulo,
                    'descripcion'      => $video->descripcion ,
                    'fecha_creacion'    =>$video->fecha_creacion ,
                ]);   
            }
        }
         //filtramos clientes que no se agregaron al curso
        foreach ($clientes as  $cliente) {
            $cont_clie=0;
            foreach ($clientesDet as  $clienteD) { 
                if( $cliente->idcliente == $clienteD->codigo_clientes){ 
                    $cont_clie+=1;  
                } 
            }
            if($cont_clie<1){
                array_push($ClientesArray,[
                    'nombres'        => $cliente->nombres." ".$cliente->apaterno." ".$cliente->amaterno,
                    'nro_documento'    => $cliente->nro_documento,
                    'idcliente'      => $cliente->idcliente ,
                    'fecha_creacion'    =>$cliente->fecha_creacion ,
                ]);   
            } 
        } 
        return view('forms.permisos.gestionarPermisos',[
            'videos'        =>$videosArray,
            'cursos'        =>$cursos,
            'videosDet'     =>$videosDet,
            'clientesDet'   =>$clientesDet,
            'clientes'      =>$ClientesArray
        ]);
    }

    public function asignarVideos(Request $request)
    {   
        // dd($request->idCurso,$request->idVideo);
        $titulo=null;
        $videos = DB::table('videos')->where('codigo',intval($request->idVideo))->get(); 
        foreach ($videos as  $video) {
            $titulo=$video->titulo;
        }
        DB::table('cursos_videos')
        ->insert([            
            'estado'            => 1,   
            'fecha_creacion'    => date('Y-m-d H:m:s'), 
            'codigo_videos' =>intval($request->idVideo),    
            'codigo_cursos' =>intval($request->idCurso),
            'nombre_video'  =>$titulo,
        ]); 
        $datos['idCurso'] =$request->idCurso;  
        return response()->json($datos);  
    }
    public function asignarClientes(Request $request)
    {  
        // dd( $request,$request->idCliente);
        $documento=null;
        $idCliente=null;
        $nombre=null;
        $clientes = DB::table('clientes')->where('idcliente', $request->idCliente)->get(); 
        
        foreach ($clientes as  $cliente) {
            $documento=$cliente->nro_documento;
            $idCliente=$cliente->idcliente;
            $nombre=$cliente->nombres." ".$cliente->apaterno." ".$cliente->amaterno;
        } 
        DB::table('cursos_clientes')
        ->insert([            
            'estado'            => 1,   
            'fecha_creacion'    => date('Y-m-d H:m:s'), 
            'codigo_clientes' => $idCliente,    
            'codigo_cursos' =>intval($request->idCurso),
            'nombre_cliente'  =>$nombre,
            'nro_documento'   =>$documento
        ]);   

        $datos['idCurso'] =$request->idCurso;  
        return response()->json($datos);
    }  

    public function destroy($id)
    { 
        // dd("llego");
        DB::table('cursos_clientes')
        ->where('id',intval($id))
        ->update([ 
            'estado'            => '3',   
        ]);
        $cursos = DB::table('cursos_clientes')->where('id',intval($id))->get(); 
        $curso=0;
        foreach($cursos as $dato){
            $curso= $dato->codigo_cursos;
        }   
        return redirect('/permisos/gestionar/'.$curso);
    }
    public function habilitar ($id){ 
        DB::table('cursos_clientes')
        ->where('id',intval($id))
        ->update([ 
            'estado'            => '1',  
        ]);
        $cursos = DB::table('cursos_clientes')->where('id',intval($id))->get(); 
        $curso=0;
        foreach($cursos as $dato){
            $curso= $dato->codigo_cursos;
        }   
        return redirect('/permisos/gestionar/'.$curso); 
    }
    public function desabilitar ($id){ 
        DB::table('cursos_clientes')
        ->where('id',intval($id))
        ->update([ 
            'estado'            => '2',   
        ]);
        $cursos = DB::table('cursos_clientes')->where('id',intval($id))->get(); 
        $curso=0;
        foreach($cursos as $dato){
            $curso= $dato->codigo_cursos;
        }   
        return redirect('/permisos/gestionar/'.$curso);

    }

    public function destroyVideo($id)
    { 
        //   dd($id);
        DB::table('cursos_videos')
        ->where('id',intval($id))
        ->update([ 
            'estado'            => '3',   
        ]);  

        $video = DB::table('cursos_videos')->where('id',intval($id))->get(); 
        $curso=0;
        foreach($video as $dato){
            $curso= $dato->codigo_cursos;
        }   
        return redirect('/permisos/gestionar/'.$curso);
    }
    public function habilitarVideo ($id){ 
        DB::table('cursos_videos')
        ->where('id',intval($id))
        ->update([ 
            'estado'            => '1',  
        ]);
        $video = DB::table('cursos_videos')->where('id',intval($id))->get(); 
        $curso=0;
        foreach($video as $dato){
            $curso= $dato->codigo_cursos;
        }   
        return redirect('/permisos/gestionar/'.$curso); 
    }
    public function desabilitarVideo ($id){ 
        DB::table('cursos_videos')
        ->where('id',intval($id))
        ->update([ 
            'estado'            => '2',   
        ]);
        $video = DB::table('cursos_videos')->where('id',intval($id))->get(); 
        $curso=0;
        foreach($video as $dato){
            $curso= $dato->codigo_cursos;
        }   
        return redirect('/permisos/gestionar/'.$curso);

    }

    
}
