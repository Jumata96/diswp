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

        // $permisos = DB::table('permisos')->whereIn('codigo', [1, 2])->get();
        $cursos = DB::table('cursos')->where('codigo',1)->get();
        // dd($publicidad);

        return view('forms.permisos.lstPermisos',[
            'permisos'    => $cursos,
            'valida'        => $valida
        ]); 
    }
    public function show($id)
    {
        /* dd($id); */
        $cursos = DB::table('cursos')->where('codigo',$id)->get();
        $videos = DB::table('videos')->get();
        $clientes = DB::table('clientes') ->get();

        $videosDet = DB::table('cursos_videos')->where('codigo_cursos',intval($id))->get();
        $clientesDet = DB::table('cursos_clientes')->where('codigo_cursos',intval($id))->get();

        //   dd($videosDet);
        // dd($clientesDet);

        return view('forms.permisos.gestionarPermisos',[
            'videos'        =>$videos,
            'cursos'        =>$cursos,
            'videosDet'     =>$videosDet,
            'clientesDet'   =>$clientesDet,
            'clientes'      =>$clientes
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
        
        $documento=null;
        $idCliente=null;
        $nombre=null;
        $clientes = DB::table('clientes')->where('idcliente',intval($request->idCliente))->get(); 
        
        foreach ($clientes as  $cliente) {
            $documento=$cliente->nro_documento;
            $idCliente=$cliente->idcliente;
            $nombre=$cliente->nombres." ".$cliente->apaterno." ".$cliente->amaterno;
        }
        // dd($documento,$nombre);
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
        dd("llego");
        DB::table('cursos_clientes')
        ->where('id',intval($id))
        ->update([ 
            'estado'            => '3', 
            //'color'             => 'f4f4f4'  
        ]);

        return redirect('/lstPermisos');
    }
    public function habilitar ($id){
        //dd($id);
        DB::table('cursos_clientes')
        ->where('id',intval($id))
        ->update([ 
            'estado'            => '1', 
            //'color'             => 'f4f4f4'  
        ]);
        return redirect('/lstPermisos'); 
    }
    public function desabilitar ($id){
        //dd($id);
        DB::table('cursos_clientes')
        ->where('id',intval($id))
        ->update([ 
            'estado'            => '2', 
            //'color'             => 'f4f4f4'  
        ]);
        return redirect('/lstPermisos');

    }

    
}
