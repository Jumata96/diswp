@extends('layouts2.app')
@section('titulo','Perfil Cliente')

@section('main-content')
<br>
@foreach($perfil as $datos)
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
                                  <input id="ruc" name="ruc" type="text" data-error=".errorTxt1" minlength="8" maxlength="11" value="{{ $datos->ruc }}">
                                  <label for="ruc">RUC</label>
                                  <div id="error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>   
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">clear_all</i>
                                  <input id="razon_social" name="razon_social" type="text" data-error=".errorTxt2" maxlength="50" value="{{ $datos->razon_social }}">
                                  <label for="razon_social">Razón Social</label>
                                  <div id="error2" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div> 
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">account_circle</i>
                                  <input id="nombre" name="nombre" type="text" data-error=".errorTxt4" maxlength="50" value="{{ $datos->nombre }}">
                                  <label for="nombre">Nombres</label>
                                  <div id="error3" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>   
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">account_circle</i>
                                  <input id="apellidos" name="apellidos" type="text" maxlength="50" value="{{ $datos->apellidos }}">
                                  <label for="apellidos">Apellidos</label>
                                  <div id="error4" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>   
                               
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">call</i>
                                  <input id="telefono" name="telefono" type="text" maxlength="20" value="{{ $datos->telefono }}">
                                  <label for="telefono">Teléfono</label>
                                  <div id="error7" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>    
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">pin_drop</i>
                                  <input id="direccion" name="direccion" type="text" maxlength="20" value="{{ $datos->direccion }}">
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
                                  <input id="usuario" name="usuario" type="text" data-error=".errorTxt3" maxlength="20" value="{{ $datos->usuario }}">
                                  <label for="usuario">Usuario</label>
                                  <div id="error5" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">email</i>
                                  <input id="email" name="email" type="text" value="{{ $datos->email }}">
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
                    
                      
                      
                  </div>
                  </form>
                  @include('forms.clientes.updContra') 
              </div>
  </div>
</div>
@endforeach
@endsection

@include('forms.scripts.toast')
  
@section('script')
  @include('forms.clientes.scripts.updPerfil') 
  @include('forms.clientes.scripts.updContra')
@endsection
