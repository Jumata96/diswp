<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;

class MapaController extends Controller
{
         public function mapaPrueba(){
            return view('forms.mapa.mapaAutocomplete'); 
        }

        public function recibir(Request $request)
        {  
                session(['latitud' => $request->latitude]);
                session(['longitud' => $request->longitud]);
                session(['direccion' => $request->direccionf]);  
        }
        public function pasar(Request $request)
        { 
                $datos = array(); 
                $latitud = session('latitud');
                $longitud = session('longitud');
                $direccion = session('direccion'); 
                $datos['latitud'] = $latitud;
                $datos['longitud'] = $longitud;
                $datos['direccion'] =  $direccion;
                /*if( $latitud !=null or  $latitud=='true'  )
                {
                    $request->session()->flash('latitud' );
                    $request->session()->flash('longitud' );
                    $request->session()->flash('direccion' );
                } */
                //Session::flush();
            // dd($datos);
            return response()->json($datos);
        }
        public function pasarCreate(Request $request)
        { 
                $datos = array(); 
                $latitud = session('latitud');
                $longitud = session('longitud');
                $direccion = session('direccion'); 
                $datos['latitud'] = $latitud;
                $datos['longitud'] = $longitud;
                $datos['direccion'] =  $direccion;/* 
                $request->session()->flash('latitud' );
                $request->session()->flash('longitud' );
                $request->session()->flash('direccion' ); */
        
            return response()->json($datos);
        }
}
