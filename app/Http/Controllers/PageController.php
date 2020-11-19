<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use InnovaTec\Events\MessageStatusChangedEvent; 
use DB;
use Auth;
use Validator;
  


class PageController extends Controller
{
    public function index()       
    {
        $carrusel = DB::table('carrusel')->where('estado',1)->get();
        $cursos = DB::table('cursos')->where('estado',1)->get();
        $horarios = DB::table('horarios')->where('estado',1)->get();

        $general = DB::table('general')->where('estado',1)->get();
        $dgeneral = DB::table('dgeneral')->where('estado',1)->get();

        $inicio_seccion = DB::table('inicio_seccion')->where('estado',1)->get();
        $inicio_seccion_det = DB::table('inicio_seccion_det')->where('estado',1)->get(); 
        
        $contactanos  =DB::table('contactanos')->get();
        $empresas  =DB::table('empresa')->get();
        
        return view('samurai.inicio',[
            'carrusel'          => $carrusel,
            'cursos'            => $cursos,
            'general'           => $general,
            'dgeneral'          => $dgeneral,
            'contactanos'       => $contactanos,
            'empresas'          => $empresas,
            'inicio_seccion'    => $inicio_seccion,
            'inicio_seccion_det'=> $inicio_seccion_det,
            'horarios'          => $horarios

        ]);
    }

        public function contactanos()
    {
        $contactanos  =DB::table('contactanos')->get();
        $empresas  =DB::table('empresa')->get();

        
        return view('samurai.contactanos',[
            'contactanos' => $contactanos,
            'empresas' => $empresas
        ]);
    }
        public function store(Request $request)
    { 
        DB::table('mensaje')
                ->insert([
                    'enviado_por'    => $request->s5_qc_name, 
                    'email_cliente' => $request->s5_qc_email,
                    'email_destino'  => "SISTEMA",
                    'asunto'         =>$request->s5_qc_subject,
                    'mensaje'        => $request-> s5_qc_field1,
                    'entrante'       =>1,
                    'fecha'          => date('Y-m-d H:m:s')
        ]);  

         
        $msjs = DB::table('mensaje')
            ->select('id','enviado_por','email_destino','asunto','mensaje', 'fecha','visto')   
            ->where([
                ['entrante',1],
                ['visto',0]
            ])       
            ->orderBy('fecha', 'desc')        
            ->first(); 
            $cont = 1;                
    
        // return ['mensajes' => $msjs, 'contador' => $cont];


     event(new MessageStatusChangedEvent(['mensajes' => $msjs, 'contador' => $cont]));
       
    }
}
