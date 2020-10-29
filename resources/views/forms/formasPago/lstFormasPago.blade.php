@extends('layouts2.app')
@section('titulo','Formas de Pago')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>LISTA FORMAS DE PAGOS</h2>
                  </div>
                 
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                           <a href="#addFPago" class="btn-floating waves-effect waves-light grey lighten-5 modal-trigger" data-position="top" data-delay="500" data-tooltip="Nuevo">
                            <i class="material-icons" style="color: #03a9f4">add</i>
                          </a>
                          <a style="margin-left: 6px"></a>                          
                                                        
                        </div>  
                        @include('forms.formasPago.addFormasPago')
                        @include('forms.formasPago.updFormasPago')
                        @include('forms.scripts.modalInformacion')         
                  </div>
                                    
                  <div class="row cuerpo">
                    <?php 

                      $bandera = false;

                      if (count($fpago) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }

                    ?>

                  <br>
                  <div class="row">
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($fpago) : 0; ?> registros. <br><br>
                          <table id={{ ($bandera)? "data-table-simple" : "" }} class="responsive-table display" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th width="10px">#</th>
                                     <th  class="center">Imagen</th>
                                     <th>Banco</th>
                                     <th>Titular</th>
                                     <th>Número de Cuenta</th>
                                     <th>Moneda</th>
                                     <th class="center">Estado</th>
                                     <th>Acción</th>
                                  </tr>
                               </thead>
                               <?php
                                    if($bandera){                                                           
                                ?>
                               <tfoot>
                                  <tr class="center">
                                     <th>#</th>
                                     <th>Imagen</th>
                                     <th>Banco</th>
                                     <th>Titular</th>
                                     <th>Número de Cuenta</th>
                                     <th>Moneda</th>
                                     <th class="center">Estado</th>
                                     <th>Acción</th>
                                  </tr>
                                </tfoot>
                                
                               <tbody>
                                <?php 
                                  foreach ($fpago as $datos) {
                                    $i++;
                                ?>
                                <tr id="tr{{$datos->codigo}}">                                  
                                     <td><?php echo $i; ?></td>   
                                     <td class="center">
                                       <img src="{{asset('/')}}{{$datos->url_imagen}}" alt="" class="circle responsive-img valign profile-image white lighten-5" style="height: 50px; width: 50px">
                                     </td>         
                                     <td>{{ $datos->banco }}</td>  
                                     <td><?php echo $datos->titular ?></td>
                                     <td>{{ $datos->numero_cta }}</td>
                                     <td>{{ $datos->moneda }}</td>
                                     <td style="width: 12rem" class="center">
                                        @if($datos->estado == 0)
                                        <div id="estado" class="badge grey darken-2 white-text text-accent-5" >
                                            <b>NO DISPONIBLE</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @else
                                        <div id="estado2" class="badge green lighten-5 green-text text-accent-4" >
                                          <b>ACTIVO</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                     </td>
                                     <td class="center" style="width: 9rem">
                                      <a href="#updFPago" id="updFPago{{$datos->codigo}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Ver" data-codigo="{{$datos->codigo}}" data-titular="{{$datos->titular}}" data-numero_cta="{{$datos->numero_cta}}" data-banco="{{$datos->banco}}" data-moneda="{{$datos->moneda}}" data-glosa="{{$datos->glosa}}" data-imagen="{{$datos->imagen}}" data-tipo="{{$datos->tipo_cta}}">
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
                                    @include('forms.formasPago.scripts.alertaConfirmacion')
                                    @include('forms.formasPago.scripts.alertaConfirmacion2')
                                    @include('forms.formasPago.scripts.alertaConfirmacion3')
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
  @include('forms.formasPago.scripts.addFormasPago')
  @include('forms.formasPago.scripts.updFormasPago')
  @include('forms.formasPago.scripts.delFormasPago')
  @include('forms.formasPago.scripts.habilitar')
  @include('forms.formasPago.scripts.desabilitar')
@endsection
