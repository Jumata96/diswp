@extends('layouts2.app')
@section('titulo','Lista de Tipos')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>LISTA DE TIPOS</h2>
                  </div>
                 
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                           <a href="#addTipo" class="btn-floating waves-effect waves-light grey lighten-5 modal-trigger" data-position="top" data-delay="500" data-tooltip="Nuevo">
                            <i class="material-icons" style="color: #03a9f4">add</i>
                          </a>
                          <a style="margin-left: 6px"></a>                          
                         
                        </div>  
                        @include('forms.tipo.addTipo')  
                        @include('forms.tipo.updTipo')
                        @include('forms.scripts.modalInformacion')         
                  </div>
                                    
                  <div class="row cuerpo">
                    <?php 

                      $bandera = false;

                      if (count($tipo) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }

                    ?>

                  <br>
                  <div class="row">
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($tipo) : 0; ?> registros. <br><br>
                          <table id="tableTipo" class="responsive-table display tabla" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Cod. Grupo</th>
                                     <th>Cod. Tipo</th>
                                     <th>Dsc. Tipo</th>
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
                                     <th>Cod. Grupo</th>
                                     <th>Cod. Tipo</th>
                                     <th>Dsc. Tipo</th>
                                     <th>Estado</th>
                                     <th>Acción</th>
                                  </tr>
                                </tfoot>
                                
                               <tbody>
                                <?php 
                                  foreach ($tipo as $datos) {
                                    $i++;
                                ?>
                                <tr id="tr{{$datos->idtipo}}">                                  
                                     <td><?php echo $i; ?></td>                                     
                                     <td><?php echo $datos->idgrupo ?></td>
                                     <td><?php echo $datos->idtipo ?></td>
                                     <td><?php echo $datos->descripcion ?></td>
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
                                      <a href="#updTipo" id="updTipo{{$datos->idtipo}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Ver" data-idgrupo="{{$datos->idgrupo}}" data-idtipo="{{$datos->idtipo}}" data-descripcion="{{$datos->descripcion}}" data-glosa="{{$datos->glosa}}">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i>
                                      </a>                                        
                                       <a href="#confirmacion{{$i}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
                                        <i class="material-icons" style="color: #dd2c00">remove</i>
                                      </a>
                                      @if($datos->estado == 1)                                      
                                       <a href="#confirmacion2{{$datos->idtipo}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
                                        <i class="material-icons" style="color: #757575 ">clear</i></a>
                                       @else
                                       <a href="#confirmacion3{{$datos->idtipo}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
                                        <i class="material-icons" style="color: #2e7d32 ">check</i></a>
                                       @endif
                                     </td>
                                </tr>
                                    @include('forms.tipo.scripts.alertaConfirmacion')
                                    @include('forms.tipo.scripts.alertaConfirmacion2')
                                    @include('forms.tipo.scripts.alertaConfirmacion3')
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
  @include('forms.tipo.scripts.addTipo')
  @include('forms.tipo.scripts.updTipo')
  @include('forms.tipo.scripts.desabilitar')
  @include('forms.tipo.scripts.habilitar')
@endsection
