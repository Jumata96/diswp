@extends('layouts2.app')
@section('titulo','Lista de pedidos')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>LISTA DE PEDIDOS</h2>
                  </div>

                  <div class="row cuerpo">
                    <?php 
                      $bandera = false;

                      if (count($ppatender) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }
                    ?>
                
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($ppatender) : 0; ?> registros. <br><br>
                          <table id={{ ($bandera)? "data-table-simple" : "" }} class="responsive-table display" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Código</th>
                                     <th>Cliente</th>
                                     <th>Fecha Pedido</th>
                                     <th>Importe</th>                      
                                     <th class="center">Estado</th>
                                     <th class="center">Acciones</th>
                                  </tr>
                               </thead>
                               <?php
                                    if($bandera){                                                           
                                ?>
                           
                               <tbody>
                                <?php 
                                      foreach ($ppatender as $valor) {
                                      $i++;
                                   ?>
                                <tr id="tr{{$valor->idcarrito}}">
                                  
                                     <td><?php echo $i; ?></td>
                                     <td>{{$valor->idcarrito}}</td>
                                     @foreach($clientes as $clie)
                                     @if($clie->id === $valor->idcliente)
                                     <td>{{$clie->nombre}}  {{$clie->apellidos}}</td>
                                     @endif
                                     @endforeach
                                     <td>{{$valor->fecha}}</td>
                                     <td>$ {{$valor->total}}</td>
                                     <td class="center">
                                      @if($valor->estado == 'PE')
                                        <div id="u_estado" class="chip" >
                                            <b>PENDIENTE DE PAGO</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                      @if($valor->estado == 'PV')
                                        <div id="u_estado2" class="chip orange accent-1 white-text" >
                                          <b>VERIFICAR PAGO</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                      @if($valor->estado == 'PA')
                                        <div id="u_estado" class="chip indigo lighten-2 white-text center" >
                                            <b>PENDIENTE DE ENTREGA</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                     </td>
                                     <td class="center" style="width: 10rem">
                                       <a href="{{ url('/pago/mostrar') }}/{{$valor->idcarrito}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i>
                                       </a>   

                                       <a  href="{{ url('/excel/exportar') }}/{{$valor->idcarrito}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Exportar a Excel">
                                        <i class="material-icons  grey-text text-darken-4">import_export</i>
                                       </a>   
                                       @if($valor->estado == 'PA')  
                                       <a href="{{ url('/seguimiento/estado') }}/{{$valor->idcarrito}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Seguimiento">
                                        <i class="material-icons green-text text-darken-3">linear_scale</i>
                                       </a>     
                                       @endif                             
                                     </td>
                                  </tr>
                                    
                                  <?php }} ?>
                               </tbody>
                            </table>
                          </div> <br>                   
                  </div>

                </div>

  </div>
</div>

@endsection

