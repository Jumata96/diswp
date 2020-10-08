<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use Image;
use Excel;
use InnovaTec\User;

class HerramientasController extends Controller
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

    	return view('forms.herramientas.importador',[
    		'valida'	=> $valida
    	]);
    }

    public function importarLinea(Request $request)
	{		
		$file = $request->file('lineaXLS');
		//dd($file);

		Excel::load($file, function($reader) {
 
		    foreach ($reader->get() as $excel) {
			   	//dd($book);
			   	DB::table('grupo_pro')
			   	->insert([
			   		'idgrupo'			=> $excel->codlinea,
			   		'descripcion'		=> $excel->descripcion,
			   		'estado'			=> 1,
			   		'fecha_creacion'	=> date('Y-m-d h:m:s')    
			   	]);			   	
		    }

		    $datos = DB::table('grupo_pro')->get();                
        	$data['success'] = $datos;

        	return $data;
		});

	}

	public function importarTipo(Request $request)
	{
		$file = $request->file('tipoXLS');
		
		Excel::load($file, function($reader) {
 
		    foreach ($reader->get() as $excel) {

		    	$tipo = DB::table('tipo')
		    		->where([
		    			'idgrupo' 	=> $excel->codlinea,
		    			'idtipo'	=> $excel->codtipo
		    		])->get();

		    	if(count($tipo) == 0){
		    		DB::table('tipo')
				   	->insert([
				   		'idgrupo'			=> $excel->codlinea,
				   		'idtipo'			=> $excel->codtipo,
				   		'descripcion'		=> $excel->descripcion,
				   		'estado'			=> 1,
				   		'fecha_creacion'	=> date('Y-m-d h:m:s')    
				   	]);
		    	}
			   	
		    }

		    $datos = DB::table('tipo')->get();                
        	$data['success'] = $datos;

        	return $data;
		});

	}

	public function importarProductos(Request $request)
	{
		$idusu = Auth::user()->id;
		$validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
		$file = $request->file('productoXLS');

		Excel::load($file, function($reader) {
 
		    foreach ($reader->get() as $excel) {
			   	//dd($excel);
			   	$tipo = DB::table('producto')
		    		->where([
		    			'idempresa' => '001',
		    			'codigo'	=> $excel->codprod
		    		])->get();

		    	if(count($tipo) == 0 and !empty($excel->codprod) ){
				   	DB::table('producto')
				   	->insert([
				   		'idempresa'			=> '001',
				   		'codigo'			=> $excel->codprod,
				   		'idgrupo'			=> $excel->codlinea,
				   		'idtipo'			=> $excel->codtipo,
				   		'idprov'			=> $excel->codprov,
				   		'nombre'			=> substr($excel->desc_producto, strpos($excel->desc_producto, '-'), 100),
				   		'descripcion'		=> $excel->desc_producto,
				   		'mon_nacional'		=> (empty($excel->preciomn))? null : strval($excel->preciomn),
				   		'mon_extranjera'	=> (empty($excel->preciomex))? null : strval($excel->preciomex),
				   		'stock'				=> (empty($excel->stock))? null : strval($excel->stock),
				   		'estado'			=> 1 
				   	]);
				}else if (strval($excel->stock > 0) and !empty($excel->codprod)) {					
					DB::table('producto')
					->where('codigo',$excel->codprod)
					->update([
						'stock'				=> $excel->stock,
						'descripcion'		=> $excel->desc_producto,
						'mon_extranjera'	=> (empty($excel->preciomex))? null : strval($excel->preciomex),
						'idgrupo'			=> $excel->codlinea,
				   		'idtipo'			=> $excel->codtipo,
				   		'idprov'			=> $excel->codprov,
				   		'nombre'			=> (empty($excel->producto))? null : (string) substr(str_replace(',','',$excel->producto),0,100)
					]);	
				}
		     }
		});

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

        return redirect('/herramientas');

	}

	public function importarClientes(Request $request)
	{
		$file = $request->file('clientesXLS');
		//dd($file);

		Excel::load($file, function($reader) {
 		
		    foreach ($reader->get() as $excel) {
			   	//dd($excel);
			   	$cliente = DB::table('users')
		    		->where([
		    			'ruc'	=> $excel->ruc
		    		])->get();

		    	if(count($cliente) == 0 and !empty($excel->ruc) ){
				   	
				   	$id = count(DB::table('users')->get()) + 1;

				   	DB::table('users')
				   	->insert([
		                'id'        => $id,
		                'estado'    => 1,
		                'nombre'    => $excel->razon_social,
		                'email'     => (empty($excel->email))? 'SIN REGISTRO' : $excel->email,
		                'direccion'	=> $excel->direccion,
		                'telefono'	=> $excel->telefono,
		                'usuario'   => (empty($excel->email))? $excel->ruc : $excel->email,
		                'password'  => Hash::make($excel->ruc),
		                'ruc'       => $excel->ruc,
		                'razon_social' => $excel->razon_social,
		                'ubicacion'	=> $excel->ubicacion,
		                'vendedor'	=> $excel->vendedor,
		                'contacto'	=> $excel->contacto_presentante_legal,
		                'condicion_pago' => $excel->cond_pago,
		                'registro'  => 'MANUAL',
		                'idtipo'    => 'CLE'
		            ]);
				}
		     }
		});

	}

	//-------------Importador de imagenes para los productos---------------
	public function importarImagenes(Request $request)
    {
    	//dd($request);
        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

        foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
        {
            //Validamos que el archivo exista
            if($_FILES["archivo"]["name"][$key]) {
                $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
                $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                //dd($filename);
                $imagen = $filename;

                $principal = 0;
                $item = 0;
                $idproducto = str_pad(substr($filename, 0,strlen($filename)-4), 10, "0", STR_PAD_LEFT);
                $nombre = substr($filename,0,strlen($filename)-4);
                $codigo = substr($idproducto,0,strpos($idproducto, '-'));
                $codigo = str_pad($codigo, 10, "0", STR_PAD_LEFT);

                if(strlen($nombre) <= 4){
                	$principal = 1;
                }else{
                	$item = substr($nombre, strpos($filename, '-')+1, strlen($filename));
                }
                
                $directorio = 'images/productos'; //Declaramos un  variable con la ruta donde guardaremos los archivos

                $extencion = $_FILES["archivo"]["type"][$key];

                if ($extencion == "image/jpeg") {
                    $extencion = 'JPG';
                }else{
                	$extencion = 'PNG';
                }
                
                //Validamos si la ruta de destino existe, en caso de no existir la creamos
                if(!file_exists($directorio)){
                    mkdir($directorio, 0777) or die("No se puede crear el directorio de extración");    
                }
                
                $dir=opendir($directorio); //Abrimos el directorio de destino
                $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
                
                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                if(move_uploaded_file($source, $target_path)) { 
                    
                	$producto = DB::table('producto')->where('codigo',$idproducto)->get();

                	if(count($producto) > 0){

                		if ($principal == 1) {
                			DB::table('producto')
					        ->where('codigo',$idproducto)
					        ->update([  
					            'url_imagen'        => $target_path,
					            'imagen'			=> $imagen
					        ]);
                		}                		
                	}else{
                		DB::table('dimagen_producto')
	                    ->insert([
	                        'idproducto'		=> $codigo,
	                        'item'              => $item,
	                        'principal'			=> $principal,
	                        'imagen'			=> $imagen,
	                        'url_imagen'		=> $target_path,
	                        'extencion'         => $extencion,
	                        'fecha_creacion'    => date('Y-m-d'),                        
	                        'estado'            => 1 
	                    ]);
                	}                 

                } else {    
                    echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                }
                closedir($dir); //Cerramos el directorio de destino
            }
            
        }

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

        return redirect('/herramientas');

    }

}
