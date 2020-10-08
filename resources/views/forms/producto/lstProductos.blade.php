@extends('layouts2.app')
@section('titulo','Lista de Productos')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>LISTA DE PRODUCTOS</h2>
                  </div>
                 
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" href="{{ url('/producto/nuevo') }}" data-position="top" data-delay="500" data-tooltip="Nuevo">
                            <i class="material-icons" style="color: #03a9f4">add</i>
                          </a>
                          <a style="margin-left: 6px"></a>                          
                                                         
                        </div>  
                        @include('forms.scripts.modalInformacion')         
                  </div>
                                    
                  <div class="row cuerpo">
                    <?php 

                      $bandera = false;

                      if (count($productos) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }

                    ?>

                  <br>
                  <div class="row">
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($productos) : 0; ?> registros. <br><br>
                          <table id={{ ($bandera)? "data-table-simple" : "" }} class="responsive-table display" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th class="center">imagen</th>
                                     <th>Código</th>
                                     <th>Grupo</th>
                                     <th>Cod. Proveedor</th>
                                     <th class="center">Descripción</th>
                                     <th>Stock</th>
                                     <th>Estado</th>
                                     <th>Acción</th>
                                  </tr>
                               </thead>
                               <?php
                                    if($bandera){                                                           
                                ?>
                               <tfoot>
                                  <tr class="center">
                                     <th>#</th>
                                     <th>imagen</th>
                                     <th>Código</th>
                                     <th>Grupo</th>
                                     <th>Cod. Proveedor</th>
                                     <th>Descripción</th>
                                     <th>Stock</th>
                                     <th>Estado</th>
                                     <th>Acción</th>
                                  </tr>
                                </tfoot>
                                
                               <tbody>
                                <?php 
                                  foreach ($productos as $datos) {
                                    $i++;
                                ?>
                                <tr id="tr{{$datos->codigo}}">                                  
                                     <td><?php echo $i; ?></td>
                                     <td class="center">
                                       <img src="{{asset('/')}}{{$datos->url_imagen}}" alt="" class="circle responsive-img valign profile-image teal lighten-5" style="height: 50px; width: 50px">
                                     </td>
                                     <td><?php echo $datos->codigo ?></td>
                                     <td><?php echo $datos->idgrupo ?></td>
                                     <td><?php echo $datos->idprov ?></td>
                                     <td style="width: 9rem">
                                        <?php echo $datos->descripcion ?>                                        
                                     </td>
                                     <td><?php echo $datos->stock ?></td>
                                     <td style="width: 12rem">
                                        @if($datos->estado == 0)
                                        <div id="estado" class="chip center-align" style="width: 70%">
                                            <b>NO DISPONIBLE</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @else
                                        <div id="estado2" class="chip center-align teal accent-4 white-text" style="width: 70%">
                                          <b>ACTIVO</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                     </td>
                                     <td class="center" style="width: 10rem">
                                       <a href="{{ url('/producto/mostrar') }}/{{$datos->codigo}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i>
                                      </a>                                       
                                       <a href="#confirmacion{{$i}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
                                        <i class="material-icons" style="color: #dd2c00">remove</i>
                                      </a>
                                      @if($datos->estado == 1)                                      
                                       <a href="#confirmacion2{{$datos->codigo}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
                                        <i class="material-icons" style="color: #757575 ">clear</i></a>
                                       @else
                                       <a href="#confirmacion3{{$datos->codigo}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
                                        <i class="material-icons" style="color: #2e7d32 ">check</i></a>
                                       @endif
                                     </td>
                                  </tr>
                                    @include('forms.producto.scripts.alertaConfirmacion')
                                    @include('forms.producto.scripts.alertaConfirmacion2')
                                    @include('forms.producto.scripts.alertaConfirmacion3')
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
  @include('forms.producto.scripts.desabilitar')
  @include('forms.producto.scripts.habilitar')
  @include('forms.producto.scripts.delProducto')
@endsection
