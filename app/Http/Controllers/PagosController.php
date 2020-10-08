<?php

namespace InnovaTec\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use Image;

class PagosController extends Controller
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

        $pagos = DB::table('carrito')
        ->whereBetween('estado', ['PE', 'PV'])
        ->where([
            'idcliente' => Auth::user()->id
        ])->get();
        
        return view('forms.pagos.lstPagos', [
            'pagos'     => $pagos,
            'valida'    => $valida
        ]);
    }

    public function show($id)
    {
        $pagos = DB::table('carrito')->where('idcarrito',$id)->get();
        $dpagos = DB::table('dcarrito')->where('idcarrito',$id)->get();
        $productos = DB::table('producto')->get();

        return view('forms.pagos.pedido',[
            'pagos'     => $pagos,
            'dpagos'    => $dpagos,
            'productos' => $productos
        ]);
    }

    public function show2($id)
    {
        $cantidad = 0;
        $total = 0;
        $pagos = DB::table('carrito')->where('idcarrito',$id)->get();
        $dpagos = DB::table('dcarrito')->where('idcarrito',$id)->get();
        $productos = DB::table('producto')->get();

        foreach ($dpagos as $val) {
            $cantidad = $cantidad + $val->cantidad;
            $total = $total + $val->total;
        }

        return view('forms.pedidos.pedido',[
            'pagos'     => $pagos,
            'dpagos'    => $dpagos,
            'productos' => $productos,
            'total'     => $total,
            'cantidad'  => $cantidad
        ]);
    }

    public function exportExcelPedido($id){

        $headerExport = DB::table('carrito as c')
                    ->select('c.razon_social', 'c.fecha', 'c.descuento', 'c.total', 'c.descripcion_transportista', 'c.direccion', 'fp.banco')
                    ->join('formas_pago as fp', 'fp.codigo', '=', 'c.idfpago')
                    ->where('c.idcarrito',$id)
                    ->get()
                    ->toArray();                    

        $header_array[] = array('Razon Social', 'Fecha', 'Descuento','Agencia', 'Direccion', 'Pago', 'Total');

        foreach ($headerExport as $header) {
             $header_array[] = array(
                'Razon Social'   => $header->razon_social ,
                'Fecha' => $header->fecha,
                'Descuento' => $header->descuento,
                'Agencia' => $header->descripcion_transportista,
                'Direccion' => $header->direccion,
                'Pago' => $header->banco,
                'Total'    => $header->total
            );
        }

        $detailsExport = DB::table('carrito as c')
                    ->join('dcarrito as dc','c.idcarrito','=','dc.idcarrito')
                    ->join('producto as p','dc.idproducto','=','p.codigo')
                    ->select('p.codigo', 'p.descripcion', 'dc.cantidad', 'dc.precio', 'dc.total')
                    ->where('c.idcarrito','=',$id)
                    ->orderBy('p.codigo', 'asc')
                    ->get()
                    ->toArray();

        $pedido_array[] = array('Codigo', 'Producto', 'Cantidad', 'Precio', 'Total');

        foreach ($detailsExport as $detail) {
             $pedido_array[] = array(
                'Codigo'   => $detail->codigo ,
                'Producto' => $detail->descripcion,
                'Cantidad' => $detail->cantidad,
                'Precio'   => $detail->precio,
                'Total'    => $detail->total
            );
        }

        $data = array(
            $header_array,
            $pedido_array
        );  
              
        return Excel::create('PEDIDOS '.$id .'', function($exportExcel) use ($data){         
                $exportExcel->sheet('Detalle Pedidos', function($sheet) use ($data){  
                $sheet->setCellValue('C1', 'ARDINI TRADING E.I.R.L'); 
                $sheet->setCellValue('C2', 'RUC: 20524525543');
                $cont= count($data[1])+11; //Calcula la ultima celda del detalle         

                $sheet->setCellValue('B4', 'Razón Social'); 
                $sheet->setCellValue('C4', $data[0][1]['Razon Social']);
                $sheet->setCellValue('B5', $data[0][0][1]);
                $sheet->setCellValue('C5', $data[0][1]['Fecha']);
                $sheet->setCellValue('B6', $data[0][0][2]);
                $sheet->setCellValue('C6', $data[0][1]['Descuento']);
                $sheet->setCellValue('B7', 'Agencia de Transporte');
                $sheet->setCellValue('C7', $data[0][1]['Agencia']);
                $sheet->setCellValue('B8', 'Dirección');
                $sheet->setCellValue('C8', $data[0][1]['Direccion']);
                $sheet->setCellValue('B9', 'Forma de Pago');
                $sheet->setCellValue('C9', $data[0][1]['Pago']);                                                                             
                $sheet->fromArray($data[1], null, 'B11', false, false);                 

                // Set border for range                
                $sheet->setBorder('B4:C9', 'thin');
                $sheet->setBorder('B11:F'.$cont.'', 'thin');
                $sheet->setFontSize(15);

                //Agregando total al final del detalle
                
                $sheet->setCellValue('C'.$cont.'', $data[0][0][6]);
                $sheet->setCellValue('F'.$cont.'', '$ '. $data[0][1]['Total']);
                //Color
                $sheet->cells('B11:F11', function($cells) {
                   $cells->setBackground('#5D9AEC');
                   $cells->setFontWeight('bold'); 
                });

                $sheet->cells('B4:B9', function($cells) {                   
                   $cells->setFontWeight('bold');
                }); 

                $sheet->cells('B'.$cont.':F'.$cont.'', function($cells) {                   
                   $cells->setFontWeight('bold');
                });

                $sheet->cells('C1:C2', function($cells) {                   
                  $cells->setAlignment('center');
                });                                          
            });

        })->download('xlsx');

    }

    public function imgUpdate(Request $request)
    {
        //dd($request);
        $idusu = Auth::user()->id;
        $validacion = DB::table('validacion')->where('idusuario',$idusu)->get();
        
        $file = $request->file('imagenURL');
        //dd($file);

        if ($file != null) {
            $extension = $file->getClientOriginalExtension();
            $fileName = $file->getClientOriginalName();
            $path = public_path('images/'.$fileName);
            //dd( $fileName);
            Image::make($file)->save($path);


            DB::table('carrito')     
            ->where('idcarrito',$request->id)
            ->update([      
                'url_imagen'        => 'images/'.$fileName,
                'imagen'            => $fileName,
                'estado'            => 'PV'
            ]);
        }
        
        if (count($validacion) > 0) {           
            DB::table('validacion')
            ->where('idusuario',strval($idusu))
            ->update(['valor' => 2]);  
        }

        $carrito = DB::table('carrito')->where('idcarrito',$request->id)->get();

        
        $data['success'] = $carrito;
        //$data['path'] = 'images/carrusel/'.$fileName . '?' . uniqid();

        return $data;
    }

    public function rechazar(Request $request)
    {         
        //dd($request);
        $rules = array(      
            'observacion'        => 'required'
        );

        $validator = Validator::make ( $request->all(), $rules );

        if ($validator->fails()){
            $var = $validator->getMessageBag()->toarray();
            array_push($var, 'error');
            //return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            return response()->json($var);
        }          
        else {
            DB::table('carrito')
            ->where('idcarrito',$request->id)
            ->update([
                'observacion'   => $request->observacion,
                'estado'        => 'PE'
            ]);

            
            $carrito = DB::table('carrito')->where('idcarrito',$request->id)->get();
            $collection = Collection::make($carrito);
                
            return response()->json($collection->toJson());   
        }
        
    }

    public function aceptar(Request $request)
    {   
        //dd($request);          
        DB::table('carrito')
            ->where('idcarrito',$request->id)
            ->update([
                'estado'            => 'PA',
                'idarea'            => 'FAC',
                'estado_seguimiento'  => 'PEN',
                'observacion'       => '',
                'fecha_pago'    => date('Y-m-d h:m:s')
        ]);

        $pedido = DB::table('carrito')->where('idcarrito',$request->id)->get();

        foreach ($pedido as $val) {
            DB::table('seguimiento')
            ->insert([
                'idcliente'     => $val->idcliente,
                'idpedido'      => $val->idcarrito,
                'estado'        => 'PEN',
                'idarea'        => 'FAC'
            ]);    
        }
        
            
        $carrito = DB::table('carrito')->where('idcarrito',$request->id)->get();
        $collection = Collection::make($carrito);
                
        return response()->json($collection->toJson());   
    }
}
