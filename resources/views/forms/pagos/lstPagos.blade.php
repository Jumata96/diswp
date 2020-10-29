@extends('layouts2.app')
@section('titulo','Pagos Pendientes')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>PAGOS PENDIENTES</h2>
                  </div>
              
                                    
                  <div class="row cuerpo">
                    <?php 

                      $bandera = false;

                      if (count($pagos) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }

                    ?>

                  <br>
                  <div class="row">
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($pagos) : 0; ?> registros. <br><br>
                          <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Código</th>
                                     <th>Descuento</th>
                                     <th>Total</th>
                                     <th class="center">Fecha Emisión</th>
                                     <th class="center">Estado</th>
                                     <th class="center">Acción</th>
                                  </tr>
                               </thead>
                               <?php
                                    if($bandera){                                                           
                                ?>
                               
                               <tbody>
                                <tr>
                                  <?php 
                                      foreach ($pagos as $datos) {
                                      $i++;
                                   ?>
                                     <td><?php echo $i; ?></td>                                     
                                     <td><?php echo $datos->idcarrito ?></td>
                                     <td><?php echo $datos->descuento ?></td>
                                     <td char="cenrter">$ <?php echo $datos->total ?></td>
                                     <td class="center"><?php echo $datos->fecha ?></td>
                                     <td class="center">
                                      @if($datos->estado == 'PE')
                                        <div id="u_estado" class="chip" >
                                            <b>PENDIENTE DE PAGO</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                      @if($datos->estado == 'PV')
                                        <div id="u_estado2" class="chip orange accent-1 white-text" >
                                          <b>VERIFICANDO PAGO</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                      @if($datos->estado == 'PA')
                                        <div id="u_estado" class="chip indigo lighten-2 white-text center" style="width: 100%">
                                            <b>PENDIENTE DE ENTREGA</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                     </td>
                                     <td class="center" style="width: 9rem">
                                       <a href="{{ url('/pagos/mostrar') }}/{{$datos->idcarrito}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i>
                                      </a>                                       
                                      
                                     </td> 
                                  </tr>
                                    
                                  <?php }} ?>
                               </tbody>
                            </table>
                          </div>
                    
                  </div>

                  </div>
                </div>
              </div>
</div>

@endsection
@include('forms.scripts.toast')

@section('script')
  @include('forms.pagos.scripts.addPago')
@endsection
