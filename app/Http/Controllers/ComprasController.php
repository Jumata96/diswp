<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use DB;
use Validator;
use Auth;
use InnovaTec\Mail\PurchaseUser;
use InnovaTec\Mail\PurchaseUserToAdmin;
use Illuminate\Support\Facades\Mail;


class ComprasController extends Controller
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

        $compras = DB::table('carrito')->where(['estado' => 'PT', 'idcliente' => Auth::user()->id])->get();
        
        return view('forms.compras.lstCompras', [
            'compras'      => $compras,
            'valida'    => $valida
        ]);
    }

    public function addCompra(Request $request)
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

        //dd($request);
        $rules = array(      
            'nombre'        => 'required',
            'apellidos'     => 'required',
            'ruc'           => 'required',
            'razon_social'  => 'required',
            'telefono'      => 'required',
            'direccion'     => 'required',
            'descripcion'   => 'required'
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
                'operacion'         => 'COMPRA',
                'descuento'         => 0,                 
                'nombre'            => $request->nombre,
                'apellidos'         => $request->apellidos,
                'ruc'               => $request->ruc,
                'razon_social'      => $request->razon_social,
                'telefono'          => $request->telefono,
                'direccion'         => $request->direccion,
                'idfpago'           => $request->group1,
                'descripcion_transportista' => $request->descripcion,
                'estado'            => 'PE',
                'fecha'             => date('Y-m-d')   
            ]);

            
            $mision = DB::table('nosotros')->where('id',$request->id)->get();
            $collection = Collection::make($mision);

             /********LOGICA PARA ENVIAR UN MENSAJE CUANDO SE REALIZA UNA COMPRA *****/

            $purchase = DB::table('carrito as c')
                ->select('c.idcarrito','c.total as total_venta', 'c.fecha', 'cle.nombre', 'cle.apellidos' ,'cle.email')
                ->join('users as cle','cle.id','=','c.idcliente')              
                ->where('c.idcarrito','=',$request->id)                
                ->get()
                ->first();


            $details = DB::table('carrito as c')
                    ->select('p.codigo', 'p.descripcion', 'dc.cantidad', 'dc.precio', 'dc.total as total_det')
                    ->join('dcarrito as dc','c.idcarrito','=','dc.idcarrito')
                    ->join('producto as p','dc.idproducto','=','p.codigo')     
                    ->where('c.idcarrito','=',$request->id)
                    ->get();

            DB::table('msj_compra')
                    ->insert([
                        'idcarrito' => $request->id,
                        'fecha'     => date('Y-m-d H:m:s'),
                        'asunto'    => 'COMPRA',
                        'visto'     => '0'
                    ]);
            $emails_admins = DB::table('users')
                        ->select('email')
                        ->where('idtipo','ADM')
                        ->get();

            Mail::to($purchase->email)->send(new PurchaseUser($purchase, $details));
            Mail::to($emails_admins)->send(new PurchaseUserToAdmin($purchase, $details));


            /*************** FIN DE LA LOGICA *******************/              
                
            return response()->json($collection->toJson());   
        }
        
    }

    public function show($id)
    {
        $pagos = DB::table('carrito')->where('idcarrito',$id)->get();
        $dpagos = DB::table('dcarrito')->where('idcarrito',$id)->get();
        $productos = DB::table('producto')->get();

        return view('forms.compras.compra',[
            'pagos'     => $pagos,
            'dpagos'    => $dpagos,
            'productos' => $productos
        ]);
    }


    //--------------------------Carrito de Compras----------------------------------
     public function historialCompras()
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

        $compras = DB::table('carrito')->where('estado','PT')->get();
        
        return view('forms.compras.carrito.lstHistorialCompras', [
            'compras'      => $compras,
            'valida'    => $valida
        ]);
    }

    public function finCompra(){
        return view('pagina.carrito.compraFinalizada');        
    }

}
