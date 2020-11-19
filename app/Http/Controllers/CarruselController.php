<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use Image;

class CarruselController extends Controller
{
    

    public function create()
    {
        $cursos = DB::table('cursos')->where('estado',1)->get();
         
       return view('forms.inicio.carrusel.addCarrusel',[
         'cursos'      => $cursos
       ]);
    }

    public function store(Request $request)
    {
    	//  dd($request);
    	$idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
    	$principal = 0;

    	if($request->img_principal == 'on'){
    		$principal = 1;
    		DB::table('carrusel')->update(['img_principal' => 0]);
    	}
        
	    $file = $request->file('url_imagen');
	    $extension = $file->getClientOriginalExtension();
	    $fileName = $file->getClientOriginalName();
	    $path = public_path('images/carrusel/'.$fileName);
	    //dd( $fileName);
        Image::make($file)->save($path); 
        
        DB::table('carrusel')
        ->insert([            
            'estado'            => 1,
            'titulo'            => $request->titulo,
            'descripcion'       => $request->descripcion,
            'url_imagen'        => 'images/carrusel/'.$fileName,
            'alineacion'		=> $request->alineacion,
	        'padding_top'		=> $request->padding_top,
            'imagen'			=> $fileName,
            'extension'			=> $extension,
            'img_principal'     => $principal,
            'color'             => (empty($request->color))? 'grey-text text-lighten-3' : $request->color,
            'btn_estado'        => strval($request->btn_estado),
            'btn_color'         => $request->btn_color,
            'btn_idprod'        => str_pad($request->btn_idprod, 10, "0", STR_PAD_LEFT),
            'btn_text'          =>$request->btn_text,
            'fecha_creacion'    => date('Y-m-d h:m:s')
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

        $carrusel = DB::table('carrusel')->where('imagen',$fileName)->get(); 
        $data['success'] = $carrusel;
	    $data['path'] = 'images/carrusel/'.$fileName . '?' . uniqid();

	    return $data;
    }

    public function update(Request $request)
    {
    	// dd($request);
    	$idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
    	$principal = 0;


    	if($request->img_principal == 'on'){
    		$principal = 1;
    		DB::table('carrusel')->update(['img_principal' => 0]);
    	}
        
	    $file = $request->file('url_imagen');

	    if ($file !== null) {
            
	    	$extension = $file->getClientOriginalExtension();
		    $fileName = $file->getClientOriginalName();
		    $path = public_path('images/carrusel/'.$fileName);
		    //dd( $fileName);
		    Image::make($file)->save($path);


	        DB::table('carrusel')
	        ->where('id',$request->id)
	        ->update([      
	            'titulo'            => $request->titulo,
	            'descripcion'       => $request->descripcion,
	            'url_imagen'        => 'images/carrusel/'.$fileName,
	            'alineacion'		=> $request->alineacion,
	            'padding_top'		=> $request->padding_top,
	            'imagen'			=> $fileName,
	            'extension'			=> $extension,
	            'img_principal'     => $principal,
                'color'             => (empty($request->color))? 'grey-text text-lighten-3' : $request->color,
                'btn_estado'        => strval($request->btn_estado),
                'btn_color'         => $request->btn_color,
                'btn_text'          =>$request->btn_text,
                'btn_idprod'        => str_pad($request->btn_idprod, 10, "0", STR_PAD_LEFT),
                
	        ]);
	    }else{
	    	
	        DB::table('carrusel')
	        ->where('id',$request->id)
	        ->update([      
	            'titulo'            => $request->titulo,
	            'descripcion'       => $request->descripcion,
	        	'alineacion'		=> $request->alineacion,
	            'padding_top'		=> $request->padding_top,
	            'img_principal'     => $principal,
                'color'             => (empty($request->color))? 'grey-text text-lighten-3' : $request->color,
                'btn_estado'        => strval($request->btn_estado),
                'btn_color'         => $request->btn_color,
                'btn_idprod'        => str_pad($request->btn_idprod, 10, "0", STR_PAD_LEFT),
                
	        ]);
	    }

	    

        
        if (count($validacion) > 0) {           
            DB::table('validacion')
            ->where('idusuario',strval($idusu))
            ->update(['valor' => 2]);  
        }

        $carrusel = DB::table('carrusel')->where('id',$request->id)->get();

        
        $data['success'] = $carrusel;
	    //$data['path'] = 'images/carrusel/'.$fileName . '?' . uniqid();

	    return $data;
    }

    

    public function show($id)
    {
          $cursos = DB::table('cursos')->where('estado',1)->get(); 
        //   dd( $cursos);
        $carrusel = DB::table('carrusel')
                    ->where('id',$id)->get();

        return view('forms.inicio.carrusel.updCarrusel',[
            'cursos'            => $cursos,
            'carrusel'          => $carrusel
            ]);
    }

    public function disabled($id)
    {
        DB::table('carrusel')
            ->where('id',$id)
            ->update([
                'estado'    => 0
            ]);

             
        return redirect('/inicio');   
    }

    public function habilitar($id)
    {
        DB::table('carrusel')
            ->where('id',$id)
            ->update([
                'estado'    => 1
            ]); 
        return redirect('/inicio');   
    }
    public function destroy($id)
    {
    	//dd($request->id);
        DB::table('carrusel')
            ->where('id', $id)->delete();

        return response()->json();
        return redirect('/inicio');
    }

}
