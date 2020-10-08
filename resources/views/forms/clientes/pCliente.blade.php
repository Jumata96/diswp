@extends('layouts2.app')
@section('titulo','Perfil Cliente')

@section('main-content')
<br>
@foreach($cliente as $datos)
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>Perfil Cliente</h2>
                  </div>
                  <form class="formValidate right-alert" id="myForm" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="row card-header sub-header">
                        <div class="col s12 m12 herramienta">                         
                          <button class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" id="update" name="action" data-position="top" data-delay="500" data-tooltip="Actualizar">
                            <i class="material-icons blue-text text-darken-2">check</i></button>
                          <a style="margin-left: 6px"></a>   
                          
                          <a href="{{url('/clientes')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                            <i class="material-icons" style="color: #424242">keyboard_tab</i></a>            
                        </div>  

                        @include('forms.scripts.modalInformacion')              
                        
                  </div>
                                    
                  
                  <div class="row cuerpo">
                    <div class="col s12 m7 l8">
                      
                      <input type="hidden" name="id" value="{{ $datos->id }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="card white">
                          <div class="card-content">
                              <span class="card-title">Generales</span>

                              <div class="row">
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix active">label_outline</i>
                                  <input id="ruc" name="ruc" type="text" data-error=".errorTxt1" minlength="8" maxlength="11" value="{{ $datos->ruc }}" disabled="">
                                  <label for="ruc">RUC</label>
                                  <div id="error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>   
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">clear_all</i>
                                  <input id="razon_social" name="razon_social" type="text" data-error=".errorTxt2" maxlength="50" value="{{ $datos->razon_social }}" disabled="">
                                  <label for="razon_social">Razón Social</label>
                                  <div id="error2" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div> 
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">account_circle</i>
                                  <input id="nombre" name="nombre" type="text" data-error=".errorTxt4" maxlength="50" value="{{ $datos->nombre }}" disabled="">
                                  <label for="nombre">Nombres</label>
                                  <div id="error3" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>   
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">account_circle</i>
                                  <input id="apellidos" name="apellidos" type="text" maxlength="50" value="{{ $datos->apellidos }}" disabled="">
                                  <label for="apellidos">Apellidos</label>
                                  <div id="error4" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>   
                               
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">call</i>
                                  <input id="telefono" name="telefono" type="text" maxlength="20" value="{{ $datos->telefono }}" disabled="">
                                  <label for="telefono">Teléfono</label>
                                  <div id="error7" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>    
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">pin_drop</i>
                                  <input id="direccion" name="direccion" type="text" maxlength="20" value="{{ $datos->direccion }}" disabled="">
                                  <label for="direccion">Direción</label>
                                  <div id="error8" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>                            
                              </div>

                          </div>
                      </div>
                    </div>

                    <div class="col s12 m5 l4">

                      <div class="card white">
                          <div class="card-content">
                              <span class="card-title">Datos de Acceso</span>

                              <div class="row">                             
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">face</i>
                                  <input id="usuario" name="usuario" type="text" data-error=".errorTxt3" maxlength="20" value="{{ $datos->usuario }}" disabled="">
                                  <label for="usuario">Usuario</label>
                                  <div id="error5" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">email</i>
                                  <input id="email" name="email" type="text" value="{{ $datos->email }}" disabled="">
                                  <label for="email">Email</label>
                                  <div id="error6" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>   
                                <div class="input-field col s12">
                                  <a href="#updContra" class="waves-effect modal-trigger waves-light btn-large blue darken-2" style="width: 100%">
                                    <i class="material-icons left">lock</i>Cambiar contraseña
                                  </a>
                                </div>  
                                
                              </div>

                          </div>
                      </div>
                    </div>

                    <div class="col s12">
                      <div class="card white">
                        <div class="card-content">
                            <span class="card-title">Historial de Compras</span>
                            <div class="row cuerpo">
                    <?php 

                      $bandera = false;

                      if (count($pagos) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }

                    ?>
                  <div class="row">
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($pagos) : 0; ?> registros. <br><br>
                          <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Código</th>
                                     <th>Descuento</th>
                                     <th>Total</th>
                                     <th class="center">Fecha Emisión</th>
                                     <th class="center">Estado</th>
                                     <th class="center">Acción</th>
                                  </tr>
                               </thead>
                               <?php
                                    if($bandera){                                                           
                                ?>
                               <tfoot>
                                  <tr>
                                     <th>#</th>
                                     <th>Código</th>
                                     <th>Descuento</th>
                                     <th>Total</th>
                                     <th>Fecha creación</th>
                                     <th>Estado</th>
                                     <th>Acción</th>
                                  </tr>
                                </tfoot>

                               <tbody>
                                <tr>
                                  <?php 
                                      foreach ($pagos as $datos) {
                                      $i++;
                                   ?>
                                     <td><?php echo $i; ?></td>                                     
                                     <td><?php echo $datos->idcarrito ?></td>
                                     <td><?php echo $datos->descuento ?></td>
                                     <td><?php echo $datos->total ?></td>
                                     <td class="center"><?php echo $datos->fecha ?></td>
                                     <td class="center">
                                      @if($datos->estado == 'PE')
                                        <div id="u_estado" class="chip" style="width: 70%">
                                            <b>PENDIENTE DE PAGO</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                      @if($datos->estado == 'PV')
                                        <div id="u_estado2" class="chip orange accent-1 white-text" style="width: 70%">
                                          <b>VERIFICANDO PAGO</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                      @if($datos->estado == 'PA')
                                        <div id="u_estado" class="chip indigo lighten-2 white-text center" style="width: 70%">
                                            <b>PENDIENTE DE ENTREGA</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                     </td>
                                     <td class="center" style="width: 9rem">
                                       <a href="{{ url('/pagos/mostrar') }}/{{$datos->idcarrito}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i>
                                      </a>        
                                     </td> 
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
                    </div>
                    
                    
                      
                      
                  </div>
                  </form>
                  @include('forms.clientes.updContra2') 
              </div>
  </div>
</div>
@endforeach
@endsection
  
@section('script')
  @include('forms.clientes.scripts.updContra')
@endsection
