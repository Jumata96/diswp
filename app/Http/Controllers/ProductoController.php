<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use Image;

class ProductoController extends Controller
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

        $prod = DB::table('producto')->get();
        $productos = DB::table('producto')->paginate(20);
        $grupo = DB::table('grupo_pro')->get();
        //dd($carrusel);

        $total = count($prod);

        return view('forms.producto.lstProductos2', [
            'grupo'	=> $grupo,
            'productos'	=> $productos,
            'valida'	=> $valida,
            'total'     => $total
		]);
    }

    public function create()
    {
    	$grupo = DB::table('grupo_pro')->get();
        $tipo = DB::table('tipo')->get();

       	return view('forms.producto.addProducto',[
       		'grupo'     => $grupo,
            'tipo'      => $tipo
       	]);
    }

    public function store(Request $request)
    {
    	//dd($request);
    	$idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

	    $file = $request->file('url_imagen');
	    $extension = $file->getClientOriginalExtension();
	    $fileName = $file->getClientOriginalName();
	    $path = public_path('images/productos/'.$fileName);
	    //dd( $fileName);
	    Image::make($file)->save($path);


        DB::table('producto')
        ->insert([            
            'estado'            => 1,
            'idempresa'			=> '001',
            'idprov'            => $request->idprov,
            'codigo'            => str_pad($request->codigo, 10, "0", STR_PAD_LEFT),
            'nombre'            => $request->nombre,
            'idgrupo'           => $request->idgrupo,
            'idtipo'            => $request->idtipo,
            'descripcion'       => $request->descripcion,
            'stock'		       	=> $request->stock,
            'mon_nacional'		=> $request->mon_nacional,
            'mon_extranjera'	=> $request->mon_extranjera,
            'url_imagen'        => 'images/productos/'.$fileName,
            'imagen'			=> $fileName,
            'idcolor'           => $request->idcolor
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

        $producto = DB::table('producto')->where('codigo',$request->codigo)->get();

        
        $data['success'] = $producto;
	    $data['path'] = 'images/productos/'.$fileName . '?' . uniqid();

	    return $data;
    }

    public function show($id)
    {
		$grupo = DB::table('grupo_pro')->get();
        $tipo = DB::table('tipo')->get();
        $producto = DB::table('producto')
                    ->where('codigo',$id)->get();
        $imagenes = DB::table('dimagen_producto')->where(['idproducto' => $id, 'principal' => 0])->get();

        return view('forms.producto.updProducto',[
        	'grupo'	    => $grupo,
            'tipo'      => $tipo,
        	'producto'  => $producto,
            'imagenes'  => $imagenes
        ]);
    }

    public function update(Request $request)
    {
    	//dd($request);
    	$idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
    	
	    $file = $request->file('url_imagen');

	    if ($file != null) {
	    	$extension = $file->getClientOriginalExtension();
		    $fileName = $file->getClientOriginalName();
		    $path = public_path('images/productos/'.$fileName);
		    //dd( $fileName);
		    Image::make($file)->save($path);


	        DB::table('producto')
	        ->where('codigo',$request->id)
	        ->update([      
	            'idprov'            => $request->idprov,
	            'idgrupo'           => $request->idgrupo,
                'idtipo'            => $request->idtipo,
                'nombre'            => $request->nombre,
	            'descripcion'       => $request->descripcion,
	            'stock'		       	=> $request->stock,
	            'mon_nacional'		=> $request->mon_nacional,
	            'mon_extranjera'	=> $request->mon_extranjera,
	            'url_imagen'        => 'images/productos/'.$fileName,
	            'imagen'			=> $fileName,
                'idcolor'           => $request->idcolor
	        ]);
	    }else{
	    	
	        DB::table('producto')
	        ->where('codigo',$request->id)
	        ->update([      
	            'idprov'            => $request->idprov,
	            'idgrupo'           => $request->idgrupo,
                'idtipo'            => $request->idtipo,
                'nombre'            => $request->nombre,
	            'descripcion'       => $request->descripcion,
	            'stock'		       	=> $request->stock,
	            'mon_nacional'		=> $request->mon_nacional,
	            'mon_extranjera'	=> $request->mon_extranjera,
                'idcolor'           => $request->idcolor
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
        DB::table('producto')
            ->where('codigo',$request->id)
            ->update([
                'estado'    => 0
            ]);

        $producto = DB::table('producto')->where('codigo',$request->id)->get();
        $collection = Collection::make($producto);
                
        return response()->json($collection->toJson());   
    }

    public function habilitar(Request $request)
    {
        DB::table('producto')
            ->where('codigo',$request->id)
            ->update([
                'estado'    => 1
            ]);

        $producto = DB::table('producto')->where('codigo',$request->id)->get();
        $collection = Collection::make($producto);
                
        return response()->json($collection->toJson());   
    }

    public function destroy(Request $request)
    {
    	//dd($request->id);
        DB::table('producto')
            ->where('codigo',$request->id)->delete();

        return response()->json();
    }

    public function dltImagen(Request $request)
    {
        //dd($request->id);
        DB::table('dimagen_producto')
            ->where('id',$request->id)->delete();

        return response()->json();
    }

    public function buscarProducto(Request $request)
    {
        //dd($request);
        $valida = 0;
        $codigo = str_pad($request->codigo, 10, "0", STR_PAD_LEFT);

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

        $prod = DB::table('producto')->get();
        $productos = DB::table('producto')->where('codigo',$codigo)->paginate(20);
        $grupo = DB::table('grupo_pro')->get();
        //dd($carrusel);
        $total = count($prod);

        return view('forms.producto.lstProductos2', [
            'grupo'     => $grupo,
            'productos' => $productos,
            'valida'    => $valida,
            'total'     => $total
        ]);        
    }

    public function buscarTipo(Request $request)
    {
        //dd($request);
        $valida = 0;
        $codigo = str_pad(substr($request->idtipo, 0,4), 3, "0", STR_PAD_LEFT);

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

        $prod = DB::table('producto')->get();
        $productos = DB::table('producto')->where('idtipo',$codigo)->paginate(20);
        $grupo = DB::table('grupo_pro')->get();
        //dd($carrusel);
        $total = count($prod);

        return view('forms.producto.lstProductos2', [
            'grupo'     => $grupo,
            'productos' => $productos,
            'valida'    => $valida,
            'total'     => $total
        ]);        
    }

}
