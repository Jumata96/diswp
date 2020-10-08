<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Auth; 

class HorariosController extends Controller
{
    //
    public function lstHorarios()
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

        $horarios = DB::table('horarios')->get();
        // dd($publicidad);

        return view('forms.horarios.lstHorarios',[
            'publicidad'    => $horarios,
            'valida'        => $valida
        ]); 
    }
    public function addHorarios()
    {
        return view('forms.horarios.addHorario',[
            
            ]);
    }
}

