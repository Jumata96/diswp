@extends('layouts2.app')
@section('titulo','Lista de Documentos Electrónicos')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>LISTA DOCUMENTOS ELECTRÓNICOS</h2>
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

                      if (count($edocs) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }

                    ?>

                  <br>
                  <div class="row">
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($edocs) : 0; ?> registros. <br><br>
                          <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Nombre</th>
                                     <th>Extención</th>
                                     <th>RUC</th>
                                     <th>Fecha creación</th>
                                     <th>Estado</th>
                                     <th class="center">Acción</th>
                                  </tr>
                               </thead>
                               <?php
                                    if($bandera){                                                           
                                ?>
                               
                               <tbody>
                                <tr>
                                  <?php 
                                      foreach ($edocs as $datos) {
                                      $i++;
                                   ?>
                                     <td><?php echo $i; ?></td>                                     
                                     <td><?php echo $datos->nombre ?></td>
                                     <td><?php echo $datos->extencion ?></td>
                                     <td><?php echo $datos->ruc ?></td>
                                     <td><?php echo $datos->fecha_creacion ?></td>
                                     <td>
                                        @if($datos->estado == 0)
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
                                      <a href="{{asset('docs')}}/{{$datos->nombre}}" download="{{$datos->nombre}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
                                        <i class="material-icons grey-text text-darken-4">vertical_align_bottom</i>
                                      </a>                                       
                                       
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

