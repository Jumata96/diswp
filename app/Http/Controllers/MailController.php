<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use InnovaTec\Mail\WelcomeUser;
use InnovaTec\Mail\EmailSend;
use Illuminate\Support\Facades\Mail;
use InnovaTec\Http\Requests\MessageFormRequest;
use DB;

class MailController extends Controller
{
    public function index()
    {  
        return view('mails.index');
    }   

    public function obtenerMensajes()
    {  
            $msjs = DB::table('msj_compra as msj')
            ->select('msj.id','msj.fecha','msj.visto','c.idcarrito', 'cle.nombre','cle.apellidos')
            ->join('carrito as c','c.idcarrito','=','msj.idcarrito') 
            ->join('users as cle','cle.id','=','c.idcliente')       
            ->orderBy('msj.fecha', 'desc')        
            ->get();

            $cont = DB::table('msj_compra as msj')
            ->select('msj.fecha','msj.visto','c.idcarrito', 'cle.nombre')
            ->join('carrito as c','c.idcarrito','=','msj.idcarrito') 
            ->join('users as cle','cle.id','=','c.idcliente')
            ->where('visto','0')         
            ->count();                       
    
        return ['mensajes' => $msjs, 'contador' => $cont];
    }

    public function obtenerMensajesSalida()
    {  
            $msjs = DB::table('mensaje')
            ->select('id','enviado_por','email_destino','asunto','mensaje', 'fecha')        
            ->orderBy('fecha', 'desc')        
            ->get();

            $cont = $msjs->count();              
    
        return ['mensajes' => $msjs, 'contador' => $cont];
    }

    public function obtenerMensajesNuevosUsuarios()
    {  
            $msjs = DB::table('msj_compra as m')
            ->select('m.id','m.fecha','m.visto', 'u.nombre', 'u.apellidos', 'u.usuario','u.email')     
            ->join('users as u','u.email','=','m.user_email')       
            ->orderBy('m.fecha', 'desc')        
            ->get();

            $cont = $msjs->count();              
    
        return ['mensajes' => $msjs, 'contador' => $cont];
    }

    public function detalleNuevoUsuario(Request $request, $id)
    {
         $nvo_user = DB::table('msj_compra as m')
            ->select('m.id','m.fecha','m.visto', 'u.nombre', 'u.apellidos', 'u.usuario', 'u.email')           
            ->join('users as u','u.email','=','m.user_email')       
            ->where('u.email',$id)        
            ->get()
            ->first();
            return (['detalle_usuario' => $nvo_user]);
    }



    public function detalleSalida(Request $request, $id)
    {  
            $msj_salida = DB::table('mensaje')
            ->select('enviado_por','email_destino','asunto','mensaje', 'fecha')
            ->where('id',$id)      
            ->get()
            ->first();
            return (['detalle_salida' => $msj_salida]);
    }



    public function visto(Request $request, $id)
    { 
           DB::table('msj_compra')
            ->where('id',$id)
            ->update(['visto' => 1]);
            return;
    }

    public function detalle(Request $request, $id){
        $purchase = DB::table('carrito as c')
            ->select('c.idcarrito','c.total as total_venta', 'c.fecha', 'cle.nombre', 'cle.apellidos','cle.email')
            ->join('users as cle','cle.id','=','c.idcliente')            
            ->where('c.idcarrito','=',$id)                
            ->get()
            ->first();

        $details = DB::table('carrito as c')
                ->select('p.codigo', 'p.descripcion', 'dc.cantidad', 'dc.precio', 'dc.total as total_det')
                ->join('dcarrito as dc','c.idcarrito','=','dc.idcarrito')
                ->join('producto as p','dc.idproducto','=','p.codigo')    
                ->where('c.idcarrito','=',$id)
                ->get();

        return (['cabecera' => $purchase, 'detalles' => $details]);
}


    public function send(MessageFormRequest $request)
    {
    	$user = auth()->user();    	
    	$to = $request->to;
    	$subject = $request->subject;
    	$message = $request->message;   
        $enviado_por =  $user->nombre.' '.	$user->apellidos;    	
        DB::table('mensaje')
                ->insert([
                    'enviado_por'    => $enviado_por,
                    'email_destino'  => $to,
                    'asunto'         => $subject,
                    'mensaje'        => $message,
                    'fecha'          => date('Y-m-d H:m:s')
                ]);

    	Mail::to($to)->send(new EmailSend($subject, $message, $user));
        return redirect('mails');
    }

}
