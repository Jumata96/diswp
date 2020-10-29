<?php

namespace InnovaTec\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cerrar(){
        Auth::logout();

        return redirect('/sistema');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::user()->idtipo == 'CLE'){
        //-------INICIO INDICADORES DASHBOARD CLIENTES---------
        $porcentaje_compras = 0;       
        $fecha_actual = Carbon::now()->format('Y-m-d');
        $mdia = Carbon::now()->day(1)->format('Y-m-d');
        $primero_mes_anterior = Carbon::now()->subMonth()->day(1)->format('Y-m-d');
        $ultimo_mes_anterior = Carbon::now()->day(1)->subDay(1)->format('Y-m-d');

            $cantidad = 0;
            $tpendiente = 0;
            $tppendiente = 0;
            $tocompra = 0;
            $pocompra = 0;
            $tcmes = 0;
            $tcmes_anterior = 0;            
                 
            //dd($ultimo_mes_anterior);

            $carrito = DB::table('carrito')->where([
                'idcliente'     => Auth::user()->id,
                'estado'        => 'PT'
            ])->get();
            $dcarrito = DB::table('dcarrito')->get();
            $pendientes = DB::table('carrito')->where([
                'idcliente'     => Auth::user()->id,
                'estado'        => 'PE'
            ])->get();
            $ocompra = DB::table('carrito')->where([
                ['idcliente'    ,'=', Auth::user()->id],
                ['estado'       ,'!=','PT']
            ])->get();

            $cmes = DB::table('carrito')
                    ->whereBetween('fecha', [$mdia, $fecha_actual])
                    ->whereIn('estado',['PA','PT'])
                    ->where('idcliente',Auth::user()->id)->get();

            $ames = DB::table('carrito')
                    ->whereBetween('fecha', [$primero_mes_anterior, $ultimo_mes_anterior])
                    ->whereIn('estado',['PA','PT'])
                    ->where('idcliente',Auth::user()->id)->get();


            foreach ($carrito as $val) {
                foreach ($dcarrito as $datos) {
                    if($datos->idcarrito == $val->idcarrito){
                        $cantidad = $cantidad + $datos->cantidad;
                    }
                }
            }

            foreach ($pendientes as $val) {
                $tppendiente = $tppendiente + $val->total;
            }

            foreach ($ocompra as $val) {
                foreach ($dcarrito as $value) {
                    if ($value->idcarrito == $val->idcarrito) {
                        $pocompra = $pocompra + $value->cantidad;
                    }                
                }            
            }

            foreach ($cmes as $val) {
                $tcmes = $tcmes + $val->total;
            }

            foreach ($ames as $val) {
                $tcmes_anterior = $tcmes_anterior + $val->total;
            }

            if ($tcmes_anterior == 0) {
                $porcentaje_compras = 100;
            }else{
                $porcentaje_compras = (100*$pocompra)/$tcmes_anterior;
            }

            $tpendiente = count($pendientes);
            $tocompra = count($ocompra);

            return view('home',[
                'carrito'       => $carrito,
                'cantidad'      => $cantidad,
                'tppendiente'   => $tppendiente,
                'tpendiente'    => $tpendiente,
                'tocompra'      => $tocompra,
                'pocompra'      => $pocompra,
                'tcmes'         => $tcmes,
                'porcentaje'    => $porcentaje_compras
            ]);
        //-------FIN INDICADORES DASHBOARD CLIENTES---------
        }

        if(Auth::user()->idtipo == 'ADM'){
        //-------INICIO INDICADORES DASHBOARD TRABAJADORES---------
        $clientes = DB::table('clientes')->where( 'estado' ,1)->get();
        $cursos   = DB::table('cursos')->where( 'estado' ,1)->get();
        $horarios   = DB::table('horarios')->where( 'estado' ,1)->get();
        $users   = DB::table('users')->where( [
            ['estado' ,1],
            ['idtipo','ADM']
        ])->get();
        // dd($users);
        
          
 
           
            
            return view('home',[
                'clientes' =>$clientes,
                'cursos'   =>$cursos,
                'horarios'   =>$horarios,
                'users'   =>$users
                
            ] );
        //-------FIN INDICADORES DASHBOARD TRABAJADORES---------
        }
        
        
    }
}
