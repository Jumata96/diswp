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

        $horarios = DB::table('cursos')->get();
        // dd($publicidad);

        return view('forms.cursos.lstCursos',[
            'publicidad'    => $horarios,
            'valida'        => $valida
        ]); 
    }
    public function addCursos()
    {
        return view('forms.cursos.addCursos',[
            
            ]);
    }
    
  
}
