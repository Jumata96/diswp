<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Auth;

class PaginaController extends Controller
{
    public function index()
    {
        $marca = null;
    	$carrusel = DB::table('carrusel')->where('estado',1)->get();
        //Misión
    	$mision = DB::table('mision')->where('estado',1)->get();
    	$dmision = DB::table('dmision')->where('estado',1)->get();
    	$ddmision = DB::table('dmision')->select('fila')->distinct()->get();
        //Visión
        $vision = DB::table('vision')->where('estado',1)->get();
        $dvision = DB::table('dvision')->where('estado',1)->get();
        $ddvision = DB::table('dvision')->select('fila')->distinct()->get();
        //General
        $general = DB::table('general')->where('estado',1)->get();
        $dgeneral = DB::table('dgeneral')->where('estado',1)->get();
        $ddgeneral = DB::table('dgeneral')->select('fila')->distinct()->get();
        $empresa = DB::table('empresa')->get();
        $contactanos = DB::table('contactanos')->get();

        foreach ($empresa as $value) {
            $marca = $value->marca;
        }

        if(Auth::check()){
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            return view('pagina.inicio',[
                'carrusel'      => $carrusel,
                'mision'        => $mision,
                'dmision'       => $dmision,
                'ddmision'      => $ddmision,
                'vision'        => $vision,
                'dvision'       => $dvision,
                'ddvision'      => $ddvision,
                'general'       => $general,
                'dgeneral'      => $dgeneral,
                'ddgeneral'     => $ddgeneral,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'vcarrito'      => $vcarrito,
                'marca'         => $marca
            ]);
        }else{
            return view('pagina.inicio',[
                'carrusel'      => $carrusel,
                'mision'        => $mision,
                'dmision'       => $dmision,
                'ddmision'      => $ddmision,
                'vision'        => $vision,
                'dvision'       => $dvision,
                'ddvision'      => $ddvision,
                'general'       => $general,
                'dgeneral'      => $dgeneral,
                'ddgeneral'     => $ddgeneral,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'marca'         => $marca
            ]);
        }
    }

    public function catalogo()
    {
        $cont = 0;
        $producto = DB::table('producto')->where([
            ['estado' ,'=', 1],
            ['stock' ,'>', 0],
            ['mon_extranjera' ,'>', 0]
        ])->orderBy('idtipo', 'ASC')->paginate(100);
        //dd($producto);

        $parametros = DB::table('parametros')->where([
            'estado'            => 1,
            'tipo_parametro'    => 'GENERAL'
        ])->get();
        $grupo = DB::table('grupo_pro')->get();
        $grupo2 = DB::table('grupo_pro')->orderBy('idgrupo','ASC')->get();
        $tipo = DB::table('tipo')->get();
        $tipo2 = DB::table('tipo')->orderBy('idtipo','ASC')->get();
        $empresa = DB::table('empresa')->get();
        $contactanos = DB::table('contactanos')->get();
        $imagenes = DB::table('dimagen_producto')->where('estado',1)->get();

        foreach ($empresa as $value) {
            $marca = $value->marca;
        }
        
        if(Auth::check()){
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            return view('pagina.catalogo',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'grupo2'        => $grupo2,
                'tipo'          => $tipo,
                'tipo2'          => $tipo2,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'vcarrito'      => $vcarrito,
                'imagenes'      => $imagenes,
                'marca'         => $marca
            ]);
        }else{
            return view('pagina.catalogo',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'grupo2'        => $grupo2,
                'tipo'          => $tipo,
                'tipo2'          => $tipo2,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'imagenes'      => $imagenes,
                'marca'         => $marca
            ]);
        }        
    }

    public function catalogoLinea($id)
    {
        $producto = DB::table('producto')->where([
            ['estado', '=', 1],
            ['idgrupo', '=', $id],
            ['mon_extranjera', '>', 0]
        ])->paginate(100);
        $parametros = DB::table('parametros')->where([
            'estado'            => 1,
            'tipo_parametro'    => 'GENERAL'
        ])->get();
        $grupo = DB::table('grupo_pro')->where('idgrupo',$id)->get();
        $grupo2 = DB::table('grupo_pro')->get();
        $tipo = DB::table('tipo')->get();
        $tipo2 = DB::table('tipo')->get();
        $empresa = DB::table('empresa')->get();
        $contactanos = DB::table('contactanos')->get();
        $imagenes = DB::table('dimagen_producto')->where('estado',1)->get();
        
        foreach ($empresa as $value) {
            $marca = $value->marca;
        }

        if(Auth::check()){
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

        }else{
            return view('pagina.catalogo',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'grupo2'        => $grupo2,
                'tipo'          => $tipo,
                'tipo2'          => $tipo2,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'imagenes'      => $imagenes,
                'marca'         => $marca
            ]);
        }        
    }

    public function catalogoBuscarProducto(Request $request)
    {
        //dd($request);
        $idgrupo = null;
        $idtipo = null;
        $codigo = str_pad($request->codigo, 10, "0", STR_PAD_LEFT);
        $producto = DB::table('producto')->where([
            ['estado', '=', 1], 
            ['codigo', '=', $codigo],
            ['mon_extranjera', '>', 0]
        ])->paginate(100);
        $parametros = DB::table('parametros')->where([
            'estado'            => 1,
            'tipo_parametro'    => 'GENERAL'
        ])->get();

        foreach ($producto as $val) {
            $idgrupo = $val->idgrupo;
            $idtipo = $val->idtipo;
        }

        $grupo = DB::table('grupo_pro')->where('idgrupo',$idgrupo)->get();
        $grupo2 = DB::table('grupo_pro')->get();
        $tipo = DB::table('tipo')->where('idtipo',$idtipo)->get();
        $tipo2 = DB::table('tipo')->get();
        $empresa = DB::table('empresa')->get();
        $contactanos = DB::table('contactanos')->get();
        $imagenes = DB::table('dimagen_producto')->where('estado',1)->get();
        
        foreach ($empresa as $value) {
            $marca = $value->marca;
        }

        if(Auth::check()){
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            return view('pagina.catalogo',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'grupo2'        => $grupo2,
                'tipo'          => $tipo,
                'tipo2'         => $tipo2,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'vcarrito'      => $vcarrito,
                'imagenes'      => $imagenes,
                'marca'         => $marca
            ]);
        }else{
            return view('pagina.catalogo',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'grupo2'        => $grupo2,
                'tipo'          => $tipo,
                'tipo2'         => $tipo2,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'imagenes'      => $imagenes,
                'marca'         => $marca
            ]);
        }        
    }

    public function producto()
    {
        $empresa = DB::table('empresa')->get();
        $contactanos = DB::table('contactanos')->get();

        foreach ($empresa as $value) {
            $marca = $value->marca;
        }

        if(Auth::check()){
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            return view('pagina.producto',[
                'vcarrito'      => $vcarrito,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'marca'         => $marca
            ]);

        }else{
            return view('pagina.producto',[
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'marca'         => $marca
            ]);
        }       

    }

     public function catalogoProducto($id)
    {
        //dd($id);
        $idlinea = null;
        $idtipo = null;
        $empresa = DB::table('empresa')->get();
        $contactanos = DB::table('contactanos')->get();
        $producto = DB::table('producto')->where([
            ['estado', '=', 1],
            ['codigo', '=', $id],
            ['mon_extranjera', '>', 0]
        ])->get();

        foreach ($producto as $val) {
            $idlinea = $val->idgrupo;
            $idtipo = $val->idtipo;
        }

        $grupo = DB::table('grupo_pro')->where('idgrupo',$idlinea)->get();
        $tipo = DB::table('tipo')->where('idtipo',$idtipo)->get();
        $imagenes = DB::table('dimagen_producto')->where(['estado' => 1, 'idproducto' => $id])->get();
        $parametros = DB::table('parametros')->where('tipo_parametro','GENERAL')->get();

        foreach ($empresa as $value) {
            $marca = $value->marca;
        }

        if(Auth::check()){
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            return view('pagina.producto',[
                'vcarrito'      => $vcarrito,
                'producto'      => $producto,
                'grupo'         => $grupo,
                'tipo'          => $tipo,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'imagenes'      => $imagenes,
                'parametros'    => $parametros,
                'marca'         => $marca
            ]);

        }else{
            return view('pagina.producto',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'tipo'          => $tipo,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'imagenes'      => $imagenes,
                'parametros'    => $parametros,
                'marca'         => $marca
            ]);
        }       

    }

    public function verMas($idgrupo, $idtipo)
    {
        $producto = DB::table('producto')
            ->where([
                ['idgrupo'  ,'=', $idgrupo],
                ['idtipo'   ,'=', $idtipo],
                ['stock'    ,'>', 0]
            ])->get();
        $parametros = DB::table('parametros')->where([
            'estado'            => 1,
            'tipo_parametro'    => 'GENERAL'
        ])->get();
        $grupo = DB::table('grupo_pro')->where('idgrupo', $idgrupo)->get();
        $tipo = DB::table('tipo')->where('idtipo', $idtipo)->get();
        $empresa = DB::table('empresa')->get();
        $contactanos = DB::table('contactanos')->get();
        $grupo2 = DB::table('grupo_pro')->orderBy('idgrupo','ASC')->get();
        $tipo2 = DB::table('tipo')->orderBy('idtipo','ASC')->get();

        foreach ($empresa as $value) {
            $marca = $value->marca;
        }

        if(Auth::check()){
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            return view('pagina.dcatalogo',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'tipo'          => $tipo,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'vcarrito'      => $vcarrito,
                'marca'         => $marca,
                'grupo2'        => $grupo2,
                'tipo2'         => $tipo2
            ]);
        }else{
            return view('pagina.dcatalogo',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'tipo'          => $tipo,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'marca'         => $marca,
                'grupo2'        => $grupo2,
                'tipo2'         => $tipo2
            ]);
        }        
    }

    public function verProducto($idproducto)
    {
        $idgrupo = null;
        $idtipo = null;

        $producto = DB::table('producto')
            ->where([
                'codigo'       => $idproducto
            ])->get();

        foreach ($producto as $value) {
            $idgrupo = $value->idgrupo;
            $idtipo = $value->idtipo;
        }

        $parametros = DB::table('parametros')->where([
            'estado'            => 1,
            'tipo_parametro'    => 'GENERAL'
        ])->get();
        $grupo = DB::table('grupo_pro')->where('idgrupo', $idgrupo)->get();
        $tipo = DB::table('tipo')->where('idtipo', $idtipo)->get();
        $empresa = DB::table('empresa')->get();
        $contactanos = DB::table('contactanos')->get();

        foreach ($empresa as $value) {
            $marca = $value->marca;
        }

        if(Auth::check()){
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            return view('pagina.dcatalogo',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'tipo'          => $tipo,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'vcarrito'      => $vcarrito,
                'marca'         => $marca
            ]);
        }else{
            return view('pagina.dcatalogo',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'tipo'          => $tipo,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'marca'         => $marca
            ]);
        }        
    }

    public function verProductoxTipo($id)
    {
        $idgrupo = null;
        $idtipo = null;

        $producto = DB::table('producto')
            ->where([
                'idtipo'       => $id
            ])->get();

        foreach ($producto as $value) {
            $idgrupo = $value->idgrupo;
            $idtipo = $value->idtipo;
        }

        $parametros = DB::table('parametros')->where([
            'estado'            => 1,
            'tipo_parametro'    => 'GENERAL'
        ])->get();
        $grupo = DB::table('grupo_pro')->where('idgrupo', $idgrupo)->get();
        $tipo = DB::table('tipo')->where('idtipo', $idtipo)->get();
        $empresa = DB::table('empresa')->get();
        $contactanos = DB::table('contactanos')->get();
        
        foreach ($empresa as $value) {
            $marca = $value->marca;
        }

        if(Auth::check()){
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            return view('pagina.dcatalogo',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'tipo'          => $tipo,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'vcarrito'      => $vcarrito,
                'marca'         => $marca
            ]);
        }else{
            return view('pagina.dcatalogo',[
                'producto'      => $producto,
                'grupo'         => $grupo,
                'tipo'          => $tipo,
                'parametros'    => $parametros,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'marca'         => $marca
            ]);
        }        
    }

    public function contactanos()
    {
        $empresa = DB::table('empresa')->get();
        $contactanos = DB::table('contactanos')->get();
        $dcontactanos = DB::table('dcontactanos')->where('estado',1)->get();

        foreach ($empresa as $value) {
            $marca = $value->marca;
        }

        if(Auth::check()){
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            return view('pagina.contactanos',[
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'dcontactanos'  => $dcontactanos,
                'vcarrito'      => $vcarrito,
                'marca'         => $marca
            ]);
        }else{
            return view('pagina.contactanos',[
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'dcontactanos'  => $dcontactanos,
                'marca'         => $marca
            ]);
        }        
    }

    public function nosotros()
    {
        //Nosotros
        $nosotros = DB::table('nosotros')->get();        
        //Misión
        $mision = DB::table('nmision')->where('estado',1)->get();
        //Visión
        $vision = DB::table('nvision')->where('estado',1)->get();

        $empresa = DB::table('empresa')->get();
        $contactanos = DB::table('contactanos')->get();

        foreach ($empresa as $value) {
            $marca = $value->marca;
        }

        if(Auth::check()){
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            return view('pagina.nosotros2',[
                'nosotros'      => $nosotros,          
                'mision'        => $mision,
                'vision'        => $vision,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos,
                'vcarrito'      => $vcarrito,
                'marca'         => $marca
            ]);
        }else{
            return view('pagina.nosotros2',[
                'nosotros'      => $nosotros,          
                'mision'        => $mision,
                'vision'        => $vision,
                'empresa'       => $empresa,
                'contactanos'   => $contactanos ,
                'marca'         => $marca               
            ]);
        }        
    }

    public function addShop(Request $request)
    {
        $check = Auth::check();

        if(!$check){
            return response()->json(array('errors'=> 'NO'));
        }else{
            $user = Auth::user();
            $item = 0;
            $idproducto = $request->codigo;
            $precio = 0;
            $cantidad = 1;

            $pedido = DB::table('carrito')->where([
                'idcliente' => $user->id,
                'operacion'    => 'PEDIDO'
             ])->get();
            
            //dd($pedido);
            if(count($pedido) > 0){
                return response()->json(array('errors'=> 'EXITE_PEDIDO'));
            }

            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', $user->id],
                            ['estado', '=', 'VIRTUAL'],
                            ['idproducto', '=', $idproducto],
                        ])->get();

            if(count($vcarrito) > 0){
                return response()->json(array('errors'=> 'EXITE_PRODUCTO'));
            }

            $producto = DB::table('producto')->where('codigo',$idproducto)->get();
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', $user->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            foreach ($producto as $val) {
                $precio = (!empty($val->mon_nacional))? $val->mon_nacional : $val->mon_extranjera;
            }

            $item = count($vcarrito) + 1;

            DB::table('vcarrito')            
            ->insert([
                'idcliente'     => $user->id,
                'item'          => $item,
                'idproducto'    => $idproducto,
                'precio'        => $precio,
                'cantidad'      => $cantidad,
                'total'         => $precio * $cantidad,
                'estado'        => 'VIRTUAL'    
            ]); 
           

            $tipo = DB::table('vcarrito')->where([
                'idcliente' => $user->id,
                'item'      => $item
            ])->get();

            $collection = Collection::make($tipo);
                
            return response()->json(array('errors'=> 'CORRECTO'));
        }
    }

    public function dltShop(Request $request)
    {
        DB::table('vcarrito')
            ->where('idcarrito',$request->id)->delete();

        return response()->json();
    }

    public function updShop(Request $request)
    {
        //dd($request);
        $check = Auth::check();

        if($check){
            $user = Auth::user();
            $precio = 0;
            $cantidad = 0;

            $stock = DB::table('producto')->select('stock')->where('codigo',$request->idproducto)->get();

            foreach ($stock as $value) {
                $cantidad = $value->stock;
            }

            //dd($request->cantidad);
            if ($request->cantidad > $cantidad) {
                return response()->json(array('errors'=> 'EXCEDE_STOCK'));
            }
            

            $vcarrito = DB::table('vcarrito')->where('idcarrito',$request->id)->get();

            foreach ($vcarrito as $val) {
                $precio = $val->precio;
            }
            DB::table('vcarrito')
            ->where('idcarrito',$request->id)
            ->update([
                'cantidad'      => $request->cantidad,
                'total'         => $request->cantidad * $precio     
            ]);


            $carrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', $user->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();

            $total = 0;
            foreach ($carrito as $val) {
                $total = $total + strval($val->total);
            }

            $datos = array(     
                'total'    => $total
            );


            $collection = Collection::make($datos);
                
            return response()->json($collection->toJson());   
        }
    }

    public function lstCarrito()
    {
        $check = Auth::check();

        if(!$check){
            return redirect('/usuarioLogin');
        }else{
            $user = Auth::user();

            $carrito = DB::table('carrito')->where(['idcliente' => Auth::user()->id, 'operacion' => 'PEDIDO'])->get();
            $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', $user->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();
            
            $empresa = DB::table('empresa')->get();
            foreach ($empresa as $value) {
                $marca = $value->marca;
            }
            
            if(count($vcarrito) > 0){
                $producto = DB::table('producto')->where('estado',1)->get();
                $parametros = DB::table('parametros')->where([
                    'estado'            => 1,
                    'tipo_parametro'    => 'GENERAL'
                ])->get();        
                
                $contactanos = DB::table('contactanos')->get();

                return view('pagina.carrito.lstCarrito',[
                    'vcarrito'      => $vcarrito,
                    'producto'      => $producto,
                    'parametros'    => $parametros,
                    'empresa'       => $empresa,
                    'contactanos'   => $contactanos,
                    'marca'         => $marca
                ]);
            }

            if(count($carrito) > 0){
                return redirect('/pedido');
            }
            
        }
    }

    public function shopCart()
    {
        $key = '';
        $cont = 0;
        $total = 0;

        $caracteres = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        //aquí podemos incluir incluso caracteres especiales pero cuidado con las ‘ y “ y algunos otros
        $length = 10;
        $max = strlen($caracteres) - 1;

        for ($i=0;$i<$length;$i++) {
            $key .= substr($caracteres, rand(0, $max), 1);
        }

        $vcarrito = DB::table('vcarrito')
                        ->where([
                            ['idcliente', '=', Auth::user()->id],
                            ['estado', '=', 'VIRTUAL'],
                        ])->get();
        
        DB::table('carrito')            
            ->insert([
                'idempresa'     => '001',
                'idcarrito'     => $key,
                'idcliente'     => Auth::user()->id,
                'operacion'     => 'PEDIDO',
                'descuento'     => 0,
                'estado'        => 'PE',
                'fecha'         => date('Y-m-d')    
            ]); 

        foreach ($vcarrito as $val) {
            $cont = $cont + 1;
            $total = $total + $val->total;

            DB::table('dcarrito')            
            ->insert([
                'idcarrito'     => $key,
                'item'          => $cont,
                'idproducto'    => $val->idproducto,
                'precio'        => $val->precio,
                'cantidad'      => $val->cantidad,
                'total'         => $val->total
            ]); 
        }

        DB::table('carrito')
            ->where('idcarrito',$key)
            ->update([
                'total'      => $total   
            ]);

        DB::table('vcarrito')
            ->where(['idcliente' => Auth::user()->id, 'estado' => 'VIRTUAL'])
            ->update([
                'estado'      => 'PEDIDO'   
            ]);

        return redirect('/pedido');
    }
}
