@extends('layouts2.app')
@section('titulo','Registrar Ususario')

@section('main-content')
<br>
@foreach($usuario as $datos)
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>ACTUALIZAR USUARIO</h2>
                  </div>
                  <form class="formValidate right-alert" id="formValidate" method="POST" action="{{ url('/usuario/actualizar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="row card-header sub-header">
                        <div class="col s12 m12 herramienta">                         
                          <button class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" type="submit" name="action" data-position="top" data-delay="500" data-tooltip="Actualizar">
                            <i class="material-icons blue-text text-darken-2">check</i></button>
                          <a style="margin-left: 6px"></a>   
                          
                          <a href="{{url('/usuarios')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
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
                                  <input id="nro_documento" name="nro_documento" type="text" data-error=".errorTxt1" minlength="8" maxlength="11" value="{{ $datos->nro_documento }}">
                                  <label for="nro_documento">Nro. doc. Identidad</label>
                                  <div class="errorTxt1"></div>
                                </div>   
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">clear_all</i>
                                  <input id="cargo" name="cargo" type="text" data-error=".errorTxt2" maxlength="50" value="{{ $datos->cargo }}">
                                  <label for="cargo">Cargo</label>
                                  <div class="errorTxt2"></div>
                                </div> 
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">account_circle</i>
                                  <input id="nombre" name="nombre" type="text" data-error=".errorTxt4" maxlength="50" value="{{ $datos->nombre }}">
                                  <label for="nombre">Nombres</label>
                                  <div class="errorTxt4"></div>
                                </div>   
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">account_circle</i>
                                  <input id="apellidos" name="apellidos" type="text" maxlength="50" value="{{ $datos->apellidos }}">
                                  <label for="apellidos">Apellidos</label>
                                </div>   
                               
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">call</i>
                                  <input id="telefono" name="telefono" type="text" maxlength="20" value="{{ $datos->telefono }}">
                                  <label for="telefono">Telefono</label>
                                </div>    
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">mode_edit</i>
                                  <textarea id="glosa" name="glosa" class="materialize-textarea" lenght="200" maxlength="200" value="" style="height: 84px">{{ $datos->glosa }}</textarea>
                                  <label for="glosa" class="">Comentario</label>
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
                                  <div class="errorTxt3"></div>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">email</i>
                                  <input id="email" name="email" type="text" value="{{ $datos->email }}">
                                  <label for="email">Email</label>
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
                  @include('forms.usuarios.updContra') 
              </div>
  </div>
</div>
@endforeach
@endsection

@section('script')  
  @include('forms.usuarios.scripts.updContra')
@endsection
