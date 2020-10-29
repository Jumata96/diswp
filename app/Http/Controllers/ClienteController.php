<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\Hash; 
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

        //--
 
        $clientes = DB::table('clientes')->whereIn('estado', [1,2])->get();
        // dd($usuarios);


        return view('forms.clientes.lstClientes', [ 
                    'clientes'   => $clientes,
                    'valida'     => $valida
                ]);
    }
    public function create()
    {
        $parametros = DB::table('parametros')->where('tipo_parametro','CLIENTES')->get();
        $tipo_documento = DB::table('documento')
            ->select('iddocumento', 'descripcion', 'dsc_corta')
            ->where('estado', '1')
            ->get();

       return view('forms.clientes.addCliente',[
        'tipo_documento'            => $tipo_documento
       ]);
    }
    public function store(Request $request)
    {
       
        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get(); 
        $users = DB::table('users')->where('id',intval($idusu))->get(); 
        $idempresa=null; 
        foreach($users as $user){
            $idempresa= $user->idempresa;
        } 
        $key = new MaestroController();
        $codigo = null;
        $codigo = $key->codigoN(10);  
        DB::table('users')
        ->insert([ 
            'nombre'			=> $request->nombre,
            'apellidos'         => $request->apaterno." ".$request->amaterno,
            'estado'            => 1,
            'email'            	=> $request->email,
            'password'          => Hash::make($request->password),
            'usuario'         	=> $request->usuario,
            'nro_documento'     => $request->nro_documento,
            'cargo'        		=> $request->cargo,
            'avatar'            => null,
            'telefono'    		=> $request->telefono,
            'glosa'             => $request->glosa, 
            'idempresa'         => $idempresa,
            'idusuario'         => $codigo,
            
            'idtipo'    		=> 'CLE',
            'created_at'    	=> date('Y-m-d h:m:s')
        ]);  
        DB::table('clientes')
        ->insert([
            'idempresa'      => $idempresa,
            'estado'         => 1,
            'idcliente'      => $codigo,
            'usuario_cpanel'    =>$request->usuario,
            'apaterno'       => $request->apaterno,
            'amaterno'       => $request->amaterno,
            'nombres'        => $request->nombres,
            'iddocumento'    => $request->iddocumento,
            'nro_documento'  => $request->nro_documento,
            'direccion'      => $request->direccion, 
            'correo'         => $request->email,  
            'idpersonal'     => Auth::user()->id,
            'razon_social'   => $request->apaterno . ' ' . $request->amaterno . ' ' . $request->nombres,
            'glosa'          => (empty($request->glosa)) ? null : $request->glosa,
            'fecha_creacion' => date('Y-m-d h:m:s'),
        ]); 
        

        if (count($validacion) === 0) {
            DB::table('validacion')
            ->insert([
                'idusuario' => $idusu,
                'valor'     => 1
            ]);
        }else{
            DB::table('validacion')
            ->where('idusuario',strval($idusu))
            ->update(['valor' => 1]);
            
        }

        return redirect('/clientes');
    }
    public function show($id)
    {
        $codigoCliente=null;
        $parametros = DB::table('parametros')->where('tipo_parametro','CLIENTES')->get();
        $tipo_documento = DB::table('documento')
            ->select('iddocumento', 'descripcion', 'dsc_corta')
            ->where('estado', '1')
            ->get();

        $Clientes = DB::table('clientes')
                    ->where('idcliente',$id)->get();
        //   dd($Clientes );
        foreach($Clientes as $cliente){
            $codigoCliente=$cliente->usuario_cpanel;
        }
        $usuario = DB::table('users')
                    ->where('usuario',$codigoCliente)->get();
        // dd($usuasrio);
        return view('forms.clientes.updCliente',[
            'usuario'            => $usuario,
            'tipo_documento'     => $tipo_documento,
            'Clientes'           =>$Clientes
        ]);
    }
    public function update(Request $request)
    {      
        // dd( $request);  
        $idusu = Auth::user()->id; 
        $users = DB::table('users')->where('id',intval($idusu))->get(); 
        $idempresa=null; 
        foreach($users as $user){
            $idempresa= $user->idempresa;
        } 
        DB::table('users')
        ->where('id',strval($request->id))
        ->update([
            'nombre'			=> $request->nombre,
            'apellidos'         => $request->apaterno." ".$request->amaterno,
            'email'            	=> $request->email,
            'usuario'         	=> $request->usuario,
            'nro_documento'     => $request->nro_documento,  
            'telefono'    		=> $request->telefono,
            'idtipo'    		=> 'CLE',
            'glosa'             => $request->glosa 
        ]);

        DB::table('clientes')
        ->where('idcliente',$request->idcliente)
        ->update([
            'idempresa'      => $idempresa, 
            'usuario_cpanel'    =>$request->usuario,
            'apaterno'       => $request->apaterno,
            'amaterno'       => $request->amaterno,
            'nombres'        => $request->nombre,
            'iddocumento'    => $request->iddocumento,
            'nro_documento'  => $request->nro_documento,
            'direccion'      => $request->direccion, 
            'correo'         => $request->email,  
            'idpersonal'     => Auth::user()->id,
            'razon_social'   => $request->apaterno . ' ' . $request->amaterno . ' ' . $request->nombre,
            'glosa'          => (empty($request->glosa)) ? null : $request->glosa, 
        ]);  
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

        if (count($validacion) > 0) {           
            DB::table('validacion')
            ->where('idusuario',strval($idusu))
            ->update(['valor' => 2]);  
        }

        return redirect('/clientes');
    }

    public function destroy($id)
    {        
        // dd($id);
        
        $userDoc =null;
        DB::table('clientes')
        ->where('idcliente',intval($id))
        ->update([
            'estado'    =>3
        ]);
        $clientes = DB::table('clientes')->where('idcliente',intval($id))->get();  
        foreach($clientes as $cliente){
            $userDoc= $cliente->nro_documento;
        } 
        DB::table('users')
            ->where('nro_documento',$userDoc) 
            ->update([
                'estado'    =>3
            ]);

        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

        if (count($validacion) === 0) {
            DB::table('validacion')
            ->insert([
                'idusuario' => $idusu,
                'valor'     => 3
            ]);
        }else{
            DB::table('validacion')
            ->where('idusuario',strval($idusu))
            ->update(['valor' => 3]);
            
        }

        return redirect('/clientes');
    }


    public function disabled($id)
    {
        $userDoc =null;
        DB::table('clientes')
        ->where('idcliente',intval($id))
        ->update([
            'estado'    =>2
        ]);
        $clientes = DB::table('clientes')->where('idcliente',intval($id))->get();  
        foreach($clientes as $cliente){
            $userDoc= $cliente->nro_documento;
        } 
        DB::table('users')
            ->where('nro_documento',$userDoc) 
            ->update([
                'estado'    =>2
            ]);

        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

        if (count($validacion) === 0) {
            DB::table('validacion')
            ->insert([
                'idusuario' => $idusu,
                'valor'     => 3
            ]);
        }else{
            DB::table('validacion')
            ->where('idusuario',strval($idusu))
            ->update(['valor' => 3]);
            
        }

        return redirect('/clientes'); 
    }

    public function habilitar($id)
    {
        $userDoc =null;
        DB::table('clientes')
        ->where('idcliente',intval($id))
        ->update([
            'estado'    =>1
        ]);
        $clientes = DB::table('clientes')->where('idcliente',intval($id))->get();  
        foreach($clientes as $cliente){
            $userDoc= $cliente->nro_documento;
        } 
        DB::table('users')
            ->where('nro_documento',$userDoc) 
            ->update([
                'estado'    =>1
            ]);

        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

        if (count($validacion) === 0) {
            DB::table('validacion')
            ->insert([
                'idusuario' => $idusu,
                'valor'     => 3
            ]);
        }else{
            DB::table('validacion')
            ->where('idusuario',strval($idusu))
            ->update(['valor' => 3]);
            
        }

        return redirect('/clientes'); 
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
        // dd($perfil);
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
  
}
