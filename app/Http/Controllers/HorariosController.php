<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Auth; 
use DateTime ; 

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

        $horarios = DB::table('horarios')->whereIn('codigo', [1, 2])->get();
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
    public function store(Request $request)
    {
         
        $rules = array(      
            'dias'    => 'required', 
            'detalle'  =>'required', 
        );
        

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        }
            
        DB::table('horarios')
        ->insert([            
            'estado'            => 1, 
            'dia'               => strtoupper($request->dias), 
            'descripcion'       => strtoupper($request->detalle), 
            'glosa'             =>$request->glosa, 
            'fecha_creacion'    => date('Y-m-d H:m:s')
        ]);   
    
  


        return view('forms.horarios.addHorario',[        
        ]);
    }
    public function update(Request $request)
    {
        // dd($request);
         
        $rules = array(      
            'dias'    => 'required', 
            'detalle'  =>'required', 
        );
        

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        }
            
        DB::table('horarios')
        ->where('codigo',$request->codigo)
            ->update([ 
                'estado'            => 1, 
                'dia'               => strtoupper($request->dias), 
                'descripcion'       => strtoupper($request->detalle), 
                'glosa'             =>$request->glosa, 
                'fecha_creacion'    => date('Y-m-d H:m:s')  
            ]); 
  


        return view('forms.horarios.addHorario',[        
        ]);
    }
    public function destroy($id)
    { 
         
            DB::table('horarios')
            ->where('codigo',$id)
            ->update([ 
                'estado'            => '3',  
            ]);

        return redirect('/lsthorarios');
    }
    public function habilitar ($id){
        //dd($id);
        DB::table('horarios')
        ->where('codigo',$id)
        ->update([ 
            'estado'            => '1',  
        ]);
        return redirect('/lsthorarios');

    }
    public function desabilitar ($id){
        //dd($id);
        DB::table('horarios')
        ->where('codigo',$id)
        ->update([ 
            'estado'            => '2',  
        ]);
        return redirect('/lsthorarios');

    }

    public function show($id)
    {
        $horarios = DB::table('horarios')
                    ->where('codigo',$id)->get();
                    // dd($horarios);

        return view('forms.horarios.updHorario',['horarios' => $horarios]);
    }



}

