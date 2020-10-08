<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;

class ParametrosController extends Controller
{
    public function index()
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

        //--

        $parametros = DB::table('parametros')
            ->where([
                'estado'            => 1,
                'tipo_parametro'    => 'GENERAL'
            ])->get();

        return view('forms.parametros.frmParametros', [
            'parametros'	=> $parametros,
        	'valida'     	=> $valida
		]);
    }

    public function update(Request $request)
    {
        //dd($request);
        if(!empty($request->COLOR_DEFAULT)){
            
            DB::table('parametros')
            ->where([
                'parametro'         => 'COLOR_DEFAULT',
                'tipo_parametro'    => $request->tipo_parametro
            ])->update([
                'valor_long'        => $request->COLOR_DEFAULT
            ]);  
        }

        if(!empty($request->MOSTRAR_PRECIO)){
            
            DB::table('parametros')
            ->where([
                'parametro'         => 'MOSTRAR_PRECIO',
                'tipo_parametro'    => $request->tipo_parametro
            ])->update([
                'valor'             => $request->MOSTRAR_PRECIO
            ]); 
        }

        if(!empty($request->PRECIO_DOLAR)){
            
            DB::table('parametros')
            ->where([
                'parametro'         => 'PRECIO_DOLAR',
                'tipo_parametro'    => $request->tipo_parametro
            ])->update([
                'valor'             => $request->PRECIO_DOLAR
            ]); 
        }

        if(!empty($request->REG_FACEBOOK)){
            
            DB::table('parametros')
            ->where([
                'parametro'         => 'REG_FACEBOOK',
                'tipo_parametro'    => $request->tipo_parametro
            ])->update([
                'valor'             => $request->REG_FACEBOOK
            ]); 
        }

        if(!empty($request->REG_MANUAL)){
            
            DB::table('parametros')
            ->where([
                'parametro'         => 'REG_MANUAL',
                'tipo_parametro'    => $request->tipo_parametro
            ])->update([
                'valor'             => $request->REG_MANUAL
            ]); 
        }

        if(!empty($request->REGISTRO_MANUAL)){
            
            DB::table('parametros')
            ->where([
                'parametro'         => 'REGISTRO_MANUAL',
                'tipo_parametro'    => $request->tipo_parametro
            ])->update([
                'valor'             => $request->REGISTRO_MANUAL
            ]); 
        }            

        if(!empty($request->COLOR_FONDO_PROD)){
            //dd($$request);
            DB::table('parametros')
            ->where([
                'parametro'         => 'COLOR_FONDO_PROD',
                'tipo_parametro'    => $request->tipo_parametro
            ])->update([
                'valor_long'             => $request->COLOR_FONDO_PROD
            ]); 
        }            
                
        return response()->json(['estado' => 'correcto']);          
    }
}
