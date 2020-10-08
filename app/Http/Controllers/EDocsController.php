<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;

class EDocsController extends Controller
{
    //CPanel Cliente
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

        $edocs = DB::table('edocs')->where('ruc',Auth::user()->ruc)->get();
        
        return view('forms.documentos.eDocs', [
            'edocs'      => $edocs,
            'valida'    => $valida
        ]);
    }

    //CPanel Trabajadores
    public function indexEDocs()
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

        $edocs = DB::table('edocs')->get();
        
        return view('forms.eDocs.lstEDocs', [
            'edocs'      => $edocs,
            'valida'    => $valida
        ]);
    }

    public function importadorEDocs()
    {
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

        return view('forms.eDocs.importador',[
            'valida'    => $valida
        ]);
    }

    public function importEDocs(Request $request)
    {
        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();

        foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
        {
            //Validamos que el archivo exista
            if($_FILES["archivo"]["name"][$key]) {
                $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
                $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                //dd($filename);
                
                $directorio = 'docs/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

                $ruc = substr($filename, 0, 11);
                $extencion = $_FILES["archivo"]["type"][$key];
                //dd($extencion);

                if ($extencion == "text/xml") {
                    $extencion = 'XML';
                }
                if ($extencion == "application/pdf") {
                    $extencion = 'PDF';
                }
                if ($extencion == "application/x-zip-compressed") {
                    $extencion = 'ZIP';
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
                    
                    DB::table('edocs')
                    ->insert([
                        'nombre'            => $filename,
                        'ruc'               => $ruc,
                        'extencion'         => $extencion,
                        'fecha_creacion'    => date('Y-m-d h:m:s'),                        
                        'estado'            => 1 
                    ]);

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

        return redirect('/edocs/importar');

    }
}
