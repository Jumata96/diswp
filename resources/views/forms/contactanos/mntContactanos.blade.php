@extends('layouts2.app')
@section('titulo','Contactanos')

@section('main-content')
<br>
@foreach($contactanos as $datos)
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>Mantenedor Contactanos</h2>
                  </div>
                 <form class="formValidate right-alert" id="myForm" method="POST" action="{{ url('/vision/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a id="update" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                            <i class="material-icons" style="color: #2E7D32">check</i>
                          </a>   
                          <a style="margin-left: 6px"></a>                          
                                                        
                        </div>  
                        @include('forms.scripts.modalInformacion')                               
                  </div>
                  
                  <br>                  
                  <div class="row cuerpo">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <input type="hidden" name="id" value="{{ $datos->id }}">
                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title">Datos Generales</span>

                            <div class="row">
                              
                              <div class="col s6">
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">clear_all</i>
                                  <input id="titulo" name="titulo" type="text" data-error=".errorTxt2" maxlength="200" value="{{$datos->titulo}}">
                                  <label for="titulo">Título</label>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">mode_edit</i>
                                  <textarea id="descripcion" name="descripcion" class="materialize-textarea" lenght="200" style="height: 80px">{{$datos->descripcion}}</textarea>
                                  <label for="descripcion" class="">Descripción</label>
                                </div>    
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">add_location</i>
                                  <textarea id="ubicacion" name="ubicacion" class="materialize-textarea" lenght="200" style="height: 150px">{{$datos->ubicacion}}</textarea>
                                  <label for="descripcion" class="">Ubicación Google Maps</label>
                                </div>    
                              </div>

                              <div class="col s6">
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">share</i>
                                  <input id="link_facebook" name="link_facebook" type="text" data-error=".errorTxt2" maxlength="200" value="{{$datos->link_facebook}}">
                                  <label for="link_facebook">Link Facebook</label>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">share</i>
                                  <input id="link_twitter" name="link_twitter" type="text" data-error=".errorTxt2" maxlength="200" value="{{$datos->link_twitter}}">
                                  <label for="link_twitter">Link Twitter</label>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">share</i>
                                  <input id="link_youtube" name="link_youtube" type="text" data-error=".errorTxt2" maxlength="200" value="{{$datos->link_youtube}}">
                                  <label for="link_youtube">Link Youtube</label>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">share</i>
                                  <input id="link_linkending" name="link_linkending" type="text" data-error=".errorTxt2" maxlength="200" value="{{$datos->link_linkending}}">
                                  <label for="link_linkending">Link Linkending</label>
                                </div>
                              </div>

                                                    
                            </div>

                        </div>
                    </div>
                 
                </div>
              </form>
              </div>
  </div>
</div>
@endforeach


<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>Detalle Contactanos</h2>
                  </div>
                 
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a href="#addDetalle" class="btn-floating waves-effect waves-light grey lighten-5 modal-trigger" data-position="top" data-delay="500" data-tooltip="Nuevo">
                            <i class="material-icons" style="color: #03a9f4">add</i>
                          </a>
                          <a style="margin-left: 6px"></a>                          
                                                          
                        </div>  
                        @include('forms.contactanos.addDetalle')
                        @include('forms.contactanos.updDetalle')
                        @include('forms.scripts.modalInformacion')         
                  </div>
                
                  <div class="row cuerpo">
                    <?php 

                      $bandera = false;

                      if (count($dcontactanos) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }

                    ?>

                  <br>
                  <div class="row">
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($dcontactanos) : 0; ?> registros. <br><br>
                          <table id="tableDetalle" class="responsive-table display tabla" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Código</th>
                                     <th>Título</th>
                                     <th>Descripción</th>
                                     <th>fecha_creacion</th>
                                     <th>Estado</th>
                                     <th>Acción</th>
                                  </tr>
                               </thead>
                               <?php
                                    if($bandera){                                                           
                                ?>
                               <tfoot>
                                  <tr>
                                     <th>#</th>
                                     <th>Código</th>
                                     <th>Título</th>
                                     <th>Descripción</th>
                                     <th>fecha_creacion</th>
                                     <th>Estado</th>
                                     <th>Acción</th>
                                  </tr>
                                </tfoot>
                                
                               <tbody>
                                <?php 
                                  foreach ($dcontactanos as $datos) {
                                    $i++;
                                ?>
                                <tr id="tr{{$datos->id}}">                                  
                                     <td><?php echo $i; ?></td>
                                     <td><?php echo $datos->id ?></td>
                                     <td><?php echo $datos->titulo ?></td>
                                     <td><?php echo $datos->descripcion ?></td>
                                     <td><?php echo $datos->fecha_creacion ?></td>
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
                                       <a href="#udpDetalle" id="updDetalle{{$datos->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Ver" data-id="{{$datos->id}}" data-descripcion="{{$datos->descripcion}}" data-titulo="{{$datos->titulo}}" data-icono="{{$datos->icono}}" data-estado="{{$datos->estado}}" data-activo="{{$datos->activo}}">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i>
                                      </a>                                    
                                       <a href="#confirmacion{{$i}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
                                        <i class="material-icons" style="color: #dd2c00">remove</i>
                                      </a>
                                      @if($datos->estado == 1)                                      
                                       <a href="#confirmacion2{{$datos->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
                                        <i class="material-icons" style="color: #757575 ">clear</i></a>
                                       @else
                                       <a href="#confirmacion3{{$datos->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
                                        <i class="material-icons" style="color: #2e7d32 ">check</i></a>
                                       @endif
                                     </td>
                                  </tr>
                                   @include('forms.contactanos.scripts.alertaConfirmacion')
                                   @include('forms.contactanos.scripts.alertaConfirmacion2')
                                   @include('forms.contactanos.scripts.alertaConfirmacion3')
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
  @include('forms.contactanos.scripts.updContactanos')
  @include('forms.contactanos.scripts.addDetalle')
  @include('forms.contactanos.scripts.updDetalle')
  @include('forms.contactanos.scripts.delDetalle')
  @include('forms.contactanos.scripts.desabilitar')
  @include('forms.contactanos.scripts.habilitar')
@endsection

