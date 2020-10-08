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
        $porcentaje_compras = 0;       
        $fecha_actual = Carbon::now()->format('Y-m-d');
        $mdia = Carbon::now()->day(1)->format('Y-m-d');
        $primero_mes_anterior = Carbon::now()->subMonth()->day(1)->format('Y-m-d');
        $ultimo_mes_anterior = Carbon::now()->day(1)->subDay(1)->format('Y-m-d');

        if(Auth::user()->idtipo == 'CLE'){
        //-------INICIO INDICADORES DASHBOARD CLIENTES---------
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
            $lunes_semana_actual = new Carbon('last monday');
            $lunes_semana_actual = $lunes_semana_actual->format('Y-m-d');
            $lunes_semana_anterior = new Carbon('last monday');
            $sabado_semana_anterior = $lunes_semana_anterior->subDay(2);
            $sabado_semana_anterior = $sabado_semana_anterior->format('Y-m-d');
            $lunes_semana_anterior = $lunes_semana_anterior->subDay(7);
            $fecha = Carbon::now();
            $ano_anterior = $fecha->subYear()->format('Y');
            $enero = Carbon::now()->day(1)->month(1)->format('Y-m-d');
            $diciembre = Carbon::now()->day(31)->month(12)->format('Y-m-d');
            $enero2 = Carbon::now()->subYear()->day(1)->month(1)->format('Y-m-d');
            $diciembre2 = Carbon::now()->subYear()->day(31)->month(12)->format('Y-m-d');

            $lunes_semana_anterior = $lunes_semana_anterior->format('Y-m-d');
            $total_ingresos_mes = 0;
            $total_ingresos_mes_anterior = 0;
            $total_ingresos_semana_actual = 0;
            $total_ingresos_semana_anterior = 0;
            $porcentaje_compras_semana_anterior = 0;
            $total_fac_cobrar = 0;
            $cantidad_fac_cobrar = 0;
            $total_clientes_nuevos = 0;
            $total_clientes_anterior = 0; 
            $porcentaje_cliente = 0;

            //dd($diciembre);

            //------Total Ingresos mensual--------------
            $tabla_ingreso_mes = DB::table('carrito')
                    ->whereBetween('fecha', [$mdia, $fecha_actual])
                    ->whereIn('estado',['PA','PT'])->get();

            $tabla_ingreso_mes_anterior = DB::table('carrito')
                    ->whereBetween('fecha', [$primero_mes_anterior, $ultimo_mes_anterior])
                    ->whereIn('estado',['PA','PT'])->get();
            
            foreach ($tabla_ingreso_mes as $val) {
                $total_ingresos_mes = $total_ingresos_mes + $val->total;
            }

            foreach ($tabla_ingreso_mes_anterior as $val) {
                $total_ingresos_mes_anterior = $total_ingresos_mes_anterior + $val->total;
            }

            if ($total_ingresos_mes_anterior == 0) {
                $porcentaje_compras = 100;
            }else{
                $porcentaje_compras = (100*$total_ingresos_mes)/$total_ingresos_mes_anterior;
            }

            //-------Transaccion Semanal-------------
            $tabla_ingreso_semana_actual = DB::table('carrito')
                    ->whereBetween('fecha', [$lunes_semana_actual, $fecha_actual])
                    ->whereIn('estado',['PA','PT'])->get();   

            $tabla_ingreso_semana_anterior = DB::table('carrito')
                    ->whereBetween('fecha', [$lunes_semana_anterior, $sabado_semana_anterior])
                    ->whereIn('estado',['PA','PT'])->get();   

            foreach ($tabla_ingreso_semana_actual as $val) {
                $total_ingresos_semana_actual = $total_ingresos_semana_actual + $val->total;
            }  

            if ($total_ingresos_semana_anterior == 0) {
                $porcentaje_compras_semana_anterior = 100;
            }else{
                $porcentaje_compras_semana_anterior = (100*$total_ingresos_semana_actual)/$total_ingresos_semana_anterior;
            }  

            //---------Facturas por Cobrar----------------
            $tabla_facturas_cobrar = DB::table('carrito')
                    ->whereBetween('fecha', [$mdia, $fecha_actual])
                    ->whereIn('estado',['PE'])->get();   

            $cantidad_fac_cobrar = count($tabla_facturas_cobrar);

            foreach ($tabla_facturas_cobrar as $val) {
                $total_fac_cobrar = $total_fac_cobrar + $val->total;
            }

            //----------Nuevos Clientes--------
            $tabla_clientes_nuevos = DB::table('users')
                    ->whereBetween('created_at', [$mdia, $fecha_actual])
                    ->whereIn('estado',[1])->get();

            $total_clientes_nuevos = count($tabla_clientes_nuevos);

            $tabla_clientes_mes_anterior = DB::table('users')
                    ->whereBetween('created_at', [$primero_mes_anterior, $ultimo_mes_anterior])
                    ->whereIn('estado',[1])->get();

            $total_clientes_anterior = count($tabla_clientes_mes_anterior);

            if ($total_ingresos_semana_anterior == 0) {
                $porcentaje_cliente = 100;
            }else{
                $porcentaje_cliente = (100*$total_clientes_nuevos)/$total_clientes_anterior;
            }  

            //--------Grafico Ingresos respecto al año anterior----------------


            $total_ingresos_mensual = array();
            $total_ingresos_mensual2 = array();
            $total_ingresos_men = 0;
            $total_ingresos_men2 = 0;
            $porcentaje_anual = 0;
            $tot = 0;
            $tot2 = 0;

            $tabla_ingreso_actual = DB::table('carrito')
                    ->whereBetween('fecha', [$enero, $diciembre])
                    ->whereIn('estado',['PA','PT'])->get();  

            for ($i=1; $i < 13 ; $i++) { 
                 $tot = 0;
                foreach ($tabla_ingreso_actual as $val) {
                    $fecha = Carbon::parse($val->fecha)->format('m');
                    $total_ingresos_men = $total_ingresos_men + $val->total;
                    
                    if ($fecha == $i) {
                        $tot = $tot + $val->total;
                    }                                   
                }
                $total_ingresos_mensual[$i] = $tot;     
            }

            $tabla_ingreso_ano_anterior = DB::table('carrito')
                    ->whereBetween('fecha', [$enero2, $diciembre2])
                    ->whereIn('estado',['PA','PT'])->get();  

            for ($i=1; $i < 13 ; $i++) { 
                 $tot = 0;
                foreach ($tabla_ingreso_ano_anterior as $val) {
                    $fecha = Carbon::parse($val->fecha)->format('m');
                    $total_ingresos_men2 = $total_ingresos_men2 + $val->total;
                    
                    if ($fecha == $i) {
                        $tot2 = $tot2 + $val->total;
                    }                                   
                }
                $total_ingresos_mensual2[$i] = $tot2;     
            }

            if ($total_ingresos_men2 == 0) {
                $porcentaje_anual = 100;
            }else{
                $porcentaje_anual = (100*$total_ingresos_men)/$total_ingresos_men2;
            }  

            //dd($total_ingresos_mensual);
            
            return view('home',[
                'total_ingresos_mes'                    => $total_ingresos_mes,
                'porcentaje_compras'                    => $porcentaje_compras,
                'total_ingresos_semana_actual'          => $total_ingresos_semana_actual,
                'porcentaje_compras_semana_anterior'    => $porcentaje_compras_semana_anterior,
                'total_fac_cobrar'                      => $total_fac_cobrar,
                'cantidad_fac_cobrar'                   => $cantidad_fac_cobrar,
                'total_clientes_nuevos'                 => $total_clientes_nuevos,
                'porcentaje_cliente'                    => $porcentaje_cliente,
                'ano_anterior'                          => $ano_anterior,
                'total_ingresos_mensual'                => $total_ingresos_mensual,
                'total_ingresos_mensual2'               => $total_ingresos_mensual2,
                'porcentaje_anual'                      => $porcentaje_anual
            ]);
        //-------FIN INDICADORES DASHBOARD TRABAJADORES---------
        }
        
        
    }
}
