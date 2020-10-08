<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use Image;

class NosotrosController extends Controller
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

        $mision = DB::table('nosotros')->get();
        $dmision = DB::table('dmision')->get();
        //dd($carrusel);

        return view('forms.nosotros2.mntNosotros', [
            'mision'	=> $mision,
            'dmision'	=> $dmision,
            'valida'	=> $valida
		]);
    }

    public function update(Request $request)
    {
    	//dd($request);
        $rules = array(      
            'titulo'        => 'required',
            'posicion'      => 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('nosotros')
            ->where('id',$request->id)
            ->update([
            	'tipo_img_icon'     => 0,
                'imagen'            => $request->u_imagen,
                'icono'             => $request->u_icono,
                'titulo'        	=> $request->titulo,
                'descripcion'		=> $request->descripcion,
                'posicion'			=> $request->posicion,
                'img_color'         => $request->img_color     
            ]);

            $mision = DB::table('nosotros')->where('id',$request->id)->get();
            $collection = Collection::make($mision);
                
            return response()->json($collection->toJson());   
        }
    }

    public function imgUpdate(Request $request)
    {
        //dd($request);
        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
        
        $file = $request->file('url_imagen');
        //dd($file);

        if ($file != null) {
            $extension = $file->getClientOriginalExtension();
            $fileName = $file->getClientOriginalName();
            $path = public_path('images/'.$fileName);
            //dd( $fileName);
            Image::make($file)->save($path);


            DB::table('nosotros')     
            ->where('id',$request->id)
            ->update([      
                'tipo_img_icon'     => 1,
                'icono'             => '',
                'titulo'            => $request->titulo,
                'descripcion'       => $request->descripcion,
                'posicion'			=> $request->posicion,
                'url_imagen'        => 'images/'.$fileName,
                'imagen'            => $fileName,
                'img_color'         => $request->img_color
            ]);
        }else{
            
            DB::table('nosotros')     
            ->where('id',$request->id)
            ->update([      
                'tipo_img_icon'     => 1,
                //'imagen'            => $request->u_imagen,
                'icono'             => '',
                'titulo'            => $request->titulo,
                'descripcion'       => $request->descripcion,
                'posicion'			=> $request->posicion,
                'img_color'         => $request->img_color
            ]);
        }       

        $producto = DB::table('producto')->where('codigo',$request->codigo)->get();

        
        $data['success'] = $producto;
        //$data['path'] = 'images/carrusel/'.$fileName . '?' . uniqid();

        return $data;
    }

    public function mIndex()
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

        $mision = DB::table('nmision')->get();
        $dmision = DB::table('dmision')->get();
        //dd($carrusel);

        return view('forms.nosotros2.mntMision', [
            'mision'    => $mision,
            'dmision'   => $dmision,
            'valida'    => $valida
        ]);
    }

    public function mUpdate(Request $request)
    {
        //dd($request);
        $rules = array(      
            'titulo'        => 'required',
            'posicion'      => 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('nmision')
            ->where('id',$request->id)
            ->update([
                'tipo_img_icon'     => 0,
                'imagen'            => $request->u_imagen,
                'icono'             => $request->u_icono,
                'titulo'            => $request->titulo,
                'descripcion'       => $request->descripcion,
                'posicion'          => $request->posicion,
                'img_color'         => $request->img_color     
            ]);

            $mision = DB::table('nmision')->where('id',$request->id)->get();
            $collection = Collection::make($mision);
                
            return response()->json($collection->toJson());   
        }
    }

    public function mImgUpdate(Request $request)
    {
        //dd($request);
        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
        
        $file = $request->file('url_imagen');
        //dd($file);

        if ($file != null) {
            $extension = $file->getClientOriginalExtension();
            $fileName = $file->getClientOriginalName();
            $path = public_path('images/'.$fileName);
            //dd( $fileName);
            Image::make($file)->save($path);


            DB::table('nmision')     
            ->where('id',$request->id)
            ->update([      
                'tipo_img_icon'     => 1,
                'icono'             => '',
                'titulo'            => $request->titulo,
                'descripcion'       => $request->descripcion,
                'posicion'          => $request->posicion,
                'url_imagen'        => 'images/'.$fileName,
                'imagen'            => $fileName,
                'img_color'         => $request->img_color
            ]);
        }else{
            
            DB::table('nmision')     
            ->where('id',$request->id)
            ->update([      
                'tipo_img_icon'     => 1,
                //'imagen'            => $request->u_imagen,
                'icono'             => '',
                'titulo'            => $request->titulo,
                'descripcion'       => $request->descripcion,
                'posicion'          => $request->posicion,
                'img_color'         => $request->img_color
            ]);
        }       

        $producto = DB::table('producto')->where('codigo',$request->codigo)->get();

        
        $data['success'] = $producto;
        //$data['path'] = 'images/carrusel/'.$fileName . '?' . uniqid();

        return $data;
    }

    public function vIndex()
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

        $mision = DB::table('nvision')->get();
        $dmision = DB::table('dmision')->get();
        //dd($carrusel);

        return view('forms.nosotros2.mntVision', [
            'mision'    => $mision,
            'dmision'   => $dmision,
            'valida'    => $valida
        ]);
    }

    public function vUpdate(Request $request)
    {
        //dd($request);
        $rules = array(      
            'titulo'        => 'required',
            'posicion'      => 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('nvision')
            ->where('id',$request->id)
            ->update([
                'tipo_img_icon'     => 0,
                'imagen'            => $request->u_imagen,
                'icono'             => $request->u_icono,
                'titulo'            => $request->titulo,
                'descripcion'       => $request->descripcion,
                'posicion'          => $request->posicion,
                'img_color'         => $request->img_color     
            ]);

            $mision = DB::table('nvision')->where('id',$request->id)->get();
            $collection = Collection::make($mision);
                
            return response()->json($collection->toJson());   
        }
    }

    public function vImgUpdate(Request $request)
    {
        //dd($request);
        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
        
        $file = $request->file('url_imagen');
        //dd($file);

        if ($file != null) {
            $extension = $file->getClientOriginalExtension();
            $fileName = $file->getClientOriginalName();
            $path = public_path('images/'.$fileName);
            //dd( $fileName);
            Image::make($file)->save($path);


            DB::table('nvision')     
            ->where('id',$request->id)
            ->update([      
                'tipo_img_icon'     => 1,
                'icono'             => '',
                'titulo'            => $request->titulo,
                'descripcion'       => $request->descripcion,
                'posicion'          => $request->posicion,
                'url_imagen'        => 'images/'.$fileName,
                'imagen'            => $fileName,
                'img_color'         => $request->img_color
            ]);
        }else{
            
            DB::table('nvision')     
            ->where('id',$request->id)
            ->update([      
                'tipo_img_icon'     => 1,
                //'imagen'            => $request->u_imagen,
                'icono'             => '',
                'titulo'            => $request->titulo,
                'descripcion'       => $request->descripcion,
                'posicion'          => $request->posicion,
                'img_color'         => $request->img_color
            ]);
        }       

        $producto = DB::table('producto')->where('codigo',$request->codigo)->get();

        
        $data['success'] = $producto;
        //$data['path'] = 'images/carrusel/'.$fileName . '?' . uniqid();

        return $data;
    }

}
