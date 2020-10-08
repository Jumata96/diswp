@extends('layouts2.app')
@section('titulo','Lista de clientes')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>LISTA DE CLIENTES</h2>
                  </div>
                 
                 
                                    
                  <div class="row cuerpo">
                    <?php 
                      $bandera = false;

                      if (count($clientes) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }
                    ?>
                 
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($clientes) : 0; ?> registros. <br><br>
                          <table id={{ ($bandera)? "data-table-simple" : "" }} class="responsive-table display" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Nombre</th>
                                     <th>Apellidos</th>
                                     <th>RUC</th>
                                     <th>Razón Social</th>                    
                                     <th class="center">Estado</th>
                                     <th class="center">Acciones</th>
                                  </tr>
                               </thead>
                               <?php
                                    if($bandera){                                                           
                                ?>
                               <tfoot>
                                  <tr>
                                     <tr>
                                     <th>#</th>
                                     <th>Nombre</th>
                                     <th>Apellidos</th>
                                     <th>RUC</th>
                                     <th>Razón Social</th>                         
                                     <th>Estado</th>
                                     <th>Acciones</th>
                                  </tr>
                                  </tr>
                                </tfoot>

                               <tbody>
                                <?php 
                                      foreach ($clientes as $valor) {
                                      $i++;
                                   ?>
                                <tr id="tr{{$valor->id}}">
                                  
                                     <td><?php echo $i; ?></td>
                                     <td>{{$valor->nombre}}</td>
                                     <td>{{$valor->apellidos}}</td>
                                     <td>{{$valor->ruc}}</td>
                                     <td>{{$valor->razon_social}}</td>
                                     <td class="center" style="width: 9rem">
                                        @if($valor->estado == 0)
                                        <div class="chip center-align" style="width: 70%">
                                            <b>NO DISPONIBLE</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @else
                                        <div class="chip center-align teal accent-4 white-text" style="width: 70%">
                                          <b>ACTIVO</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                     </td>
                                     <td class="center" style="width: 9rem">
                                       <a href="{{ url('/cliente/mostrar') }}/{{$valor->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i>
                                       </a>                                         
                                       <a href="#confirmacion{{$valor->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
                                        <i class="material-icons" style="color: #dd2c00">remove</i></a> 
                                       @if($valor->estado == 1)                                      
                                       <a href="#confirmacion2{{$valor->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
                                        <i class="material-icons" style="color: #757575 ">clear</i></a>
                                       @else
                                       <a href="#confirmacion3{{$valor->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
                                        <i class="material-icons" style="color: #2e7d32 ">check</i></a>
                                       @endif
                                     </td>
                                  </tr>

                                  @include('forms.clientes.scripts.alertaConfirmacion')  
                                  @include('forms.clientes.scripts.alertaConfirmacion2')  
                                  @include('forms.clientes.scripts.alertaConfirmacion3')  
                                    
                                  <?php }} ?>
                               </tbody>
                            </table>
                          </div> <br>                   
                  </div>

                </div>
              </div>
</div>

@endsection

@section('script')
  @include('forms.clientes.scripts.desabilitar')
  @include('forms.clientes.scripts.habilitar')
  @include('forms.clientes.scripts.delCliente')
@endsection
