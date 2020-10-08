@extends('layouts2.app')
@section('titulo','Lista de Grupos')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>LISTA DE GRUPOS</h2>
                  </div>
                 
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a href="#addGrupo" class="btn-floating waves-effect waves-light grey lighten-5 modal-trigger" data-position="top" data-delay="500" data-tooltip="Nuevo">
                            <i class="material-icons" style="color: #03a9f4">add</i>
                          </a>
                          <a style="margin-left: 6px"></a>                          
                                                          
                        </div>  
                        @include('forms.grupo.addGrupo')   
                        @include('forms.grupo.updGrupo')   
                        @include('forms.scripts.modalInformacion')         
                  </div>
                                    
                  <div class="row cuerpo">
                    <?php 

                      $bandera = false;

                      if (count($grupo) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }

                    ?>

                  <br>
                  <div class="row">
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($grupo) : 0; ?> registros. <br><br>
                          <table id="tableGrupo" class="responsive-table display tabla" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Código</th>
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
                                     <th>Descripción</th>
                                     <th>fecha_creacion</th>
                                     <th>Estado</th>
                                     <th>Acción</th>
                                  </tr>
                                </tfoot>
                                
                               <tbody>
                                <?php 
                                  foreach ($grupo as $datos) {
                                    $i++;
                                ?>
                                <tr id="tr{{$datos->idgrupo}}">                                  
                                     <td><?php echo $i; ?></td>
                                     <td><?php echo $datos->idgrupo ?></td>
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
                                       <a href="#updGrupo" id="updGrupo{{$datos->idgrupo}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Ver" data-id="{{$datos->idgrupo}}" data-descripcion="{{$datos->descripcion}}" data-glosa="{{$datos->glosa}}">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i>
                                      </a>                                    
                                       <a href="#confirmacion{{$i}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
                                        <i class="material-icons" style="color: #dd2c00">remove</i>
                                      </a>
                                      @if($datos->estado == 1)                                      
                                       <a href="#confirmacion2{{$datos->idgrupo}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
                                        <i class="material-icons" style="color: #757575 ">clear</i></a>
                                       @else
                                       <a href="#confirmacion3{{$datos->idgrupo}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
                                        <i class="material-icons" style="color: #2e7d32 ">check</i></a>
                                       @endif
                                     </td>
                                  </tr>
                                    @include('forms.grupo.scripts.alertaConfirmacion')
                                    @include('forms.grupo.scripts.alertaConfirmacion2')
                                    @include('forms.grupo.scripts.alertaConfirmacion3')
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
  @include('forms.grupo.scripts.addGrupo')
  @include('forms.grupo.scripts.updGrupo')
  @include('forms.grupo.scripts.desabilitar')
  @include('forms.grupo.scripts.habilitar')
  @include('forms.grupo.scripts.delGrupo')
@endsection
