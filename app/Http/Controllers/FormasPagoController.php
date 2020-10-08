<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use Image;

class FormasPagoController extends Controller
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

        $fpago = DB::table('formas_pago')->get();
        //dd($carrusel);

        return view('forms.formasPago.lstFormasPago', [
            'fpago'		=> $fpago,
            'valida'	=> $valida
		]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $tcuenta = 'MNA';
        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

        $rules = array(      
            'titular'       => 'required',
            'numero_cta'    => 'required',
            'banco'			=> 'required',
            'moneda'		=> 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }       

        $file = $request->file('imagenURL');
        //dd($file);
        $extension = $file->getClientOriginalExtension();
        $fileName = $file->getClientOriginalName();
        $path = public_path('images/'.$fileName);
        //dd( $fileName);
        Image::make($file)->save($path);

        if ($request->group2 == 1) {
        	$tcuenta = 'MEX';
        }

        DB::table('formas_pago')
        ->insert([            
            'tipo_cta'         	=> $tcuenta,
            'banco'            	=> $request->banco,
            'numero_cta'     	=> $request->numero_cta,
            'moneda'            => $request->moneda,            
            'titular'           => $request->titular,
            'url_imagen'        => 'images/'.$fileName,
            'imagen'            => $fileName,
            'estado'			=> 1,
            'fecha_creacion' 	=> date('Y-m-d h:m:s')    
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

        $fpago = DB::table('formas_pago')->where('numero_cta',$request->numero_cta)->get();

        
        $data['success'] = $fpago;
        $data['path'] = 'images/'.$fileName . '?' . uniqid();

        return $data;
    }

    public function update(Request $request)
    {
        //dd($request);
        $tcuenta = 'MNA';
        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

        $rules = array(      
            'u_titular'       => 'required',
            'u_numero_cta'    => 'required',
            'u_banco'			=> 'required',
            'u_moneda'		=> 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }       
        
        $file = $request->file('url_imagen');
        //dd($file);

        if ($request->group == 1) {
        	$tcuenta = 'MEX';
        }

        if ($file != null) {
            $extension = $file->getClientOriginalExtension();
            $fileName = $file->getClientOriginalName();
            $path = public_path('images/'.$fileName);
            //dd( $fileName);
            Image::make($file)->save($path);


            DB::table('formas_pago')     
            ->where('codigo',$request->u_id)
            ->update([                      
                'tipo_cta'         	=> $tcuenta,
	            'banco'            	=> $request->u_banco,
	            'numero_cta'     	=> $request->u_numero_cta,
	            'moneda'            => $request->u_moneda,            
	            'titular'           => $request->u_titular,
	            'url_imagen'        => 'images/'.$fileName,
	            'imagen'            => $fileName
            ]);
        }else{
            
            DB::table('formas_pago')     
            ->where('codigo',$request->u_id)
            ->update([      
                'tipo_cta'         	=> $tcuenta,
	            'banco'            	=> $request->u_banco,
	            'numero_cta'     	=> $request->u_numero_cta,
	            'moneda'            => $request->u_moneda,            
	            'titular'           => $request->u_titular,
	            'imagen'            => $request->u_imagen
            ]);
        }       

        
        if (count($validacion) > 0) {           
            DB::table('validacion')
            ->where('idusuario',strval($idusu))
            ->update(['valor' => 2]);  
        }

        $producto = DB::table('producto')->where('codigo',$request->codigo)->get();

        
        $data['success'] = $producto;
        //$data['path'] = 'images/carrusel/'.$fileName . '?' . uniqid();

        return $data;
    }

    public function disabled(Request $request)
    {
        DB::table('formas_pago')
            ->where('codigo',$request->id)
            ->update([
                'estado'    => 0
            ]);

        $dmision = DB::table('dmision')->get();
                
        $data['success'] = $dmision;
	    //$data['path'] = 'images/carrusel/'.$fileName . '?' . uniqid();

	    return $data;
    }

    public function habilitar(Request $request)
    {
        DB::table('formas_pago')
            ->where('codigo',$request->id)
            ->update([
                'estado'    => 1
            ]);

        $dmision = DB::table('dmision')->get();
                
        $data['success'] = $dmision;
	    //$data['path'] = 'images/carrusel/'.$fileName . '?' . uniqid();

	    return $data;  
    }

    public function destroy(Request $request)
    {
    	$idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

    	//dd($request->id);
        DB::table('formas_pago')
            ->where('codigo',$request->id)->delete();

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

        return response()->json();
    }
}
