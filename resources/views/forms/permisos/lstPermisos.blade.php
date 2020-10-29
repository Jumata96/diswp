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
                 
                  {{-- <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                           
                          <a style="margin-left: 6px"></a>                          
                                                         
                        </div>  
                        @include('forms.scripts.modalInformacion')         
                  </div> --}}
                                    
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
                            <table id="data-table-simple" class="responsive-table display centered" cellspacing="0">
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
                                      <td>
                                        @php
                                            $cont_videos=0;
                                        @endphp
                                        @foreach ($videosDet as $videos)
                                          @if ( $datos->codigo==$videos->codigo_cursos)
                                              @php
                                                    $cont_videos +=1;
                                              @endphp
                                          @endif 
                                        @endforeach
                                        {{$cont_videos}}</td> 
                                      <td style="text-align: center;">
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
                                        <a href="{{ url('/permisos/gestionar') }}/{{$datos->codigo}}" class="tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
                                          <i class="material-icons" style="color: #7986cb ">visibility</i>
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
