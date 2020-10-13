@extends('layouts2.app')
@section('titulo','Gestión de contenidos ')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>GESTIÓN DE CONTENIDO</h2>
                  </div>
                 
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" href="{{ url('/addpermisos') }}" data-position="top" data-delay="500" data-tooltip="Nuevo">
                            <i class="material-icons" style="color: #03a9f4">add</i>
                          </a>
                          {{-- <a href="{{ url('/hotspot/pagina-permisos') }}" target="_blank" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Ver prototipo página">
                            <i class="material-icons" style="color: #7986cb ">visibility</i>
                          </a>  --}}
                          <a style="margin-left: 6px"></a>                          
                                                         
                        </div>  
                        @include('forms.scripts.modalInformacion')         
                  </div>
                                    
                <div class="row cuerpo">
                      <?php 

                        $bandera = false;

                        if (count($permisos) > 0) {
                          # code...
                          $bandera = true;
                          $i = 0;
                        }

                      ?> 
                    <br>
                    <div class="row">
                      <div class="col s12 m12 l12">
                        
                          <div class="card-content">
                            Existen <?php echo ($bandera)? count($permisos) : 0; ?> registros. <br><br>
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Clase</th>
                                      <th>Clientes</th>
                                      <th>videos </th> 
                                      <th>Estado</th>
                                      <th>Acción</th>
                                    </tr>
                                </thead>
                                <?php
                                      if($bandera){                                                           
                                  ?> 
                                <tbody>
                                  <tr>
                                    <?php 
                                        foreach ($permisos as $datos) {
                                        $i++;
                                    ?>
                                      <td><?php echo $i; ?></td>
                                      
                                      <td><?php echo $datos->nombre ?></td> 
                                      <td></td>
                                      <td></td> 
                                      <td>
                                        @if($datos->estado == 2)
                                          <div id="u_estado" class="chip center-align" style="width: 70%">
                                              <b>NO DISPONIBLE</b>
                                            <i class="material-icons"></i>
                                          </div>
                                        @else
                                          <div id="u_estado2" class="chip center-align teal accent-4 white-text" style="width: 70%">
                                            <b>ACTIVO</b>
                                            <i class="material-icons"></i>
                                          </div>
                                        @endif
                                      </td>
                                      <td class="center" style="width: 9rem">
                                        <a href="{{ url('/permisos/gestionar') }}/{{$datos->codigo}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
                                          <i class="material-icons" style="color: #7986cb ">visibility</i>
                                        </a>  
                                                                            
                                        <a href="#confirmacion{{$i}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="GESTIONAR VIDEOS">
                                          <i class="material-icons" style="color: #e65100  ">format_list_numbered</i>
                                        </a>
                                        <a href="#c " class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="GESTIONAR CLIENTES">
                                          <i class="material-icons" style="color: #e65100  ">format_list_numbered</i>
                                        </a> 
                                      </td>
                                    </tr>
                                      {{-- @include('forms.cursos.scripts.alertaConfirmacion')
                                      @include('forms.cursos.scripts.alertaConfirmacion2')
                                      @include('forms.cursos.scripts.alertaConfirmacion3') --}}
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
