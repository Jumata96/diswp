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

        $horarios = DB::table('horarios')->whereIn('codigo', [1, 2])->get();
        $cursos = DB::table('cursos')->whereIn('codigo', [1, 2])->get();
        // dd($publicidad);

        return view('forms.cursos.lstCursos',[
            'cursos'    => $cursos,
            'horarios'    => $horarios,
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
        //  dd($request);
        $rules = array(      
            'titulo'    => 'required',
            'descripcion'   => 'required', 
            'costo'         =>'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        }   
        DB::table('cursos')
        ->insert([            
            'estado'            => 1, 
            'nombre'            => $request->titulo,
            'horario'           =>$request->horario,   
            'descripcion'   => $request->descripcion,   
            'tiempo'        =>$request->tiempo, 
            'costo'            =>$request->costo, 
            'fecha_creacion'    => date('Y-m-d H:m:s')
        ]);  
    }
    public function update(Request $request)
    {
        //  dd($request);
        $rules = array(      
            'titulo'    => 'required',
            'descripcion'   => 'required', 
            'costo'         =>'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            return response()->json($var);
        }   

        DB::table('cursos')
            ->where('codigo',$request->id)
            ->update([  
                'nombre'            => $request->titulo,
                'horario'           =>$request->horario,   
                'descripcion'   => $request->descripcion,   
                'tiempo'        =>$request->tiempo, 
                'costo'            =>$request->costo, 
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
         $horarios = DB::table('horarios')->whereIn('codigo', [1, 2])->get();
          
        // dd($curso);
        return view('forms.cursos.updCursos',['cursos' => $curso,'horarios'=>$horarios
        ]);
    }
    
  
}
