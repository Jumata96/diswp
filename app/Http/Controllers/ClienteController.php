<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;

class ClienteController extends Controller
{
    public function inicio()
    {
        $url = \URL::previous();
    	$check = Auth::check();
        $parametros = DB::table('parametros')->get();

        if(!$check){
            return view('pagina.acceso.login',[
                'parametros'    => $parametros,
                'url'           => $url
            ]);
        }else{
            return redirect('/cpanel');   
        }
    	
    }

    public function portal()
    {
        $url = null;
        $check = Auth::check();
        $parametros = DB::table('parametros')->get();

        if(!$check){
            return view('pagina.acceso.login',[
                'parametros'    => $parametros,
                'url'           => $url
            ]);
        }else{
            return redirect('/cpanel');   
        }
        
    }

    public function registro()
    {
    	$parametros = DB::table('parametros')->get();

    	return view('pagina.acceso.registro',[
    		'parametros'		=> $parametros
    	]);
    }

    //---------------------------CPANEL--------------------------------
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

        $clientes = DB::table('users')->where('registro','MANUAL')->get();
        $clientesFB = DB::table('users')->where('registro','FACEBOOK')->get();
        //dd($carrusel);

        return view('forms.clientes.lstClientes', [
            'clientes'      => $clientes,
            'clientesFB'      => $clientesFB,
            'valida'    => $valida
        ]);
    }

    public function perfil()
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

        $perfil = DB::table('users')->where('id',Auth::user()->id)->get();

        return view('forms.clientes.perfilCliente', [
                    'perfil'   => $perfil,
                    'valida'     => $valida
                ]);
    }

    public function updPerfil(Request $request)
    {  
        //dd($request);
        $rules = array(      
            'nombre'        => 'required',
            'apellidos'     => 'required',
            'email'         => 'required',
            'usuario'       => 'required',
            'ruc'           => 'required',
            'razon_social'  => 'required',
            'telefono'      => 'required',
            'direccion'     => 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('users')
            ->where('id',Auth::user()->id)
            ->update([
                'nombre'            => $request->nombre,
                'apellidos'         => $request->apellidos,
                'email'             => $request->email,
                'usuario'           => $request->usuario,
                'ruc'               => $request->ruc,
                'razon_social'      => $request->razon_social,
                'telefono'          => $request->telefono,
                'direccion'          => $request->direccion
            ]);

            $mision = DB::table('nosotros')->where('id',$request->id)->get();
            $collection = Collection::make($mision);
                
            return response()->json($collection->toJson());   
        }
        
    }

    public function show($id)
    {
        $cliente = DB::table('users')
                    ->where('id',$id)->get();
        $pagos = DB::table('carrito')
        ->where([
            'idcliente' => $id
        ])->get();

        return view('forms.clientes.pCliente',[
            'cliente'   => $cliente,
            'pagos'     => $pagos
        ]);
    }

    public function disabled(Request $request)
    {
        //dd($request);
        DB::table('users')
            ->where('id',$request->id)
            ->update([
                'estado'    => 0
            ]);

        $tabla = DB::table('users')->where('id',$request->id)->get();
        $collection = Collection::make($tabla);
                
        return response()->json($collection->toJson());   
    }

    public function habilitar(Request $request)
    {
        //dd($request);
        DB::table('users')
            ->where('id',$request->id)
            ->update([
                'estado'    => 1
            ]);

        $tabla = DB::table('users')->where('id',$request->id)->get();
        $collection = Collection::make($tabla);
                
        return response()->json($collection->toJson());   
    }

    public function destroy(Request $request)
    {
        //dd($request);
        DB::table('users')
            ->where('id',$request->id)
            ->delete();

        $tabla = DB::table('users')->where('id',$request->id)->get();
        $collection = Collection::make($tabla);
                
        return response()->json($collection->toJson());   
    }



    public function importClientes()
    {
        return view('forms.clientes.importador');
    }
}
