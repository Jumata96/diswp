@extends('layouts2.app')
@section('titulo','Lista de Compras')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>HISTORIAL DE COMPRAS</h2>
                  </div>
                 
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" href="{{ url('/empresa/nuevo') }}" data-position="top" data-delay="500" data-tooltip="Nuevo">
                            <i class="material-icons" style="color: #03a9f4">add</i>
                          </a>
                          <a style="margin-left: 6px"></a>                          
                                                        
                        </div>  
                        @include('forms.scripts.modalInformacion')         
                  </div>
                                    
                  <div class="row cuerpo">
                    <?php 

                      $bandera = false;

                      if (count($compras) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }

                    ?>

                  <br>
                  <div class="row">
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($compras) : 0; ?> registros. <br><br>
                          <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Código</th>
                                     <th>Descuento</th>
                                     <th>Total</th>
                                     <th>Fecha creación</th>
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
                                      foreach ($compras as $datos) {
                                      $i++;
                                   ?>
                                     <td><?php echo $i; ?></td>                                     
                                     <td><?php echo $datos->idcarrito ?></td>
                                     <td><?php echo $datos->descuento ?></td>
                                     <td><?php echo $datos->total ?></td>
                                     <td><?php echo $datos->fecha ?></td>
                                     <td class="center">
                                      @if($datos->estado == 'PA')
                                        <div id="u_estado" class="chip indigo lighten-2 white-text center" style="width: 70%">
                                            <b>PENDIENTE DE ENTREGA</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                     </td>
                                     <td class="center" style="width: 9rem">
                                       <a href="{{ url('/compra/mostrar') }}/{{$datos->idcarrito}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i>
                                      </a>   
                                      @if($datos->estado == 'PA')  
                                       <a href="{{ url('/seguimiento') }}/{{$datos->idcarrito}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Seguimiento">
                                        <i class="material-icons green-text text-darken-3">linear_scale</i>
                                       </a>     
                                       @endif       
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

