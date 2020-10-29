@extends('layouts2.app')
@section('titulo','Lista de Cursos')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>LISTA DE CURSOS</h2>
                  </div>
                 
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" href="{{ url('/addCursos') }}" data-position="top" data-delay="500" data-tooltip="Nuevo">
                            <i class="material-icons" style="color: #03a9f4">add</i>
                          </a> 
                          <a style="margin-left: 6px"></a>                          
                                                         
                        </div>  
                        @include('forms.scripts.modalInformacion')         
                  </div>
                                    
                  <div class="row cuerpo">
                    <?php 

                      $bandera = false;

                      if (count($cursos) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }

                    ?>

                  <br>
                  <div class="row">
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($cursos) : 0; ?> registros. <br><br>
                          <table id="data-table-simple" class="responsive-table display centered" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Nombre</th>
                                     <th>Horario</th>
                                     <th>Descripción </th>
                                     <th>Clientes</th>
                                     <th>Fecha de creacion  </th>
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
                                      foreach ($cursos as $datos) {
                                      $i++;
                                   ?>
                                     <td><?php echo $i; ?></td>
                                     
                                     <td><?php echo $datos->nombre ?></td>
                                     <td>
                                       @foreach ($horarios as $item)
                                        @if ($item->codigo == $datos->horario)
                                            {{$item->descripcion}}
                                        @endif
                                           
                                       @endforeach
                                       
                                      
                                      <td>{{$datos->descripcion}}</td>
                                      <td>
                                        @php
                                            $cont_clientes =0;
                                        @endphp
                                        @foreach ($clientesDet as $clientes)
                                          @if ( $datos->codigo==$clientes->codigo_cursos)
                                              @php
                                                    $cont_clientes +=1;
                                              @endphp
                                          @endif 
                                        @endforeach
                                        {{$cont_clientes}}
                                      </td>
                                     
                                     <td><?php echo $datos->fecha_creacion ?></td>
                                     <td>
                                      @if($datos->estado == 2)
                                        <div id="u_estado" class="badge grey darken-2 white-text text-accent-5" >
                                            <b>NO DISPONIBLE</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @else
                                        <div id="u_estado2" class="badge green lighten-5 green-text text-accent-4" >
                                          <b>ACTIVO</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                     </td>
                                     <td class="center" style="width: 9rem">
                                       <a href="{{ url('/Cursos/mostrar') }}/{{$datos->codigo}}" class="tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i>
                                      </a>                                       
                                       <a href="#confirmacion{{$i}}" class="tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
                                        <i class="material-icons" style="color: #dd2c00">remove</i>
                                      </a>
                                      @if($datos->estado == 1)                                      
                                       <a href="#h_confirmacion2{{$datos->codigo}}" class="tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
                                        <i class="material-icons" style="color: #757575 ">clear</i></a>
                                       @else
                                       <a href="#h_confirmacion3{{$datos->codigo}}" class="tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
                                        <i class="material-icons" style="color: #2e7d32 ">check</i></a>
                                       @endif
                                     </td>
                                  </tr>
                                     @include('forms.cursos.scripts.alertaConfirmacion')
                                     @include('forms.cursos.scripts.alertaConfirmacion2')
                                     @include('forms.cursos.scripts.alertaConfirmacion3')
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
