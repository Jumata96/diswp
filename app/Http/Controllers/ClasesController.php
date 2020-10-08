<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;

class ClasesController extends Controller
{
    public function lstClases()
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

        $horarios = DB::table('clases')->get();
        // dd($publicidad);

        return view('forms.clases.lstClases',[
            'publicidad'    => $horarios,
            'valida'        => $valida
        ]); 
    }
    public function addClases()
    {
        return view('forms.clases.addClases',[
            
            ]);
    }
}
