@extends('layouts2.app')
@section('titulo','Nosotros')

@section('main-content')
<br>
@foreach($mision as $datos)
<div class="row">
  <div class="col s12 m12 l12">

                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>Mantenedor Nosotros</h2>
                  </div>
                 <form class="formValidate right-alert" id="formMision" method="POST" action="{{ url('/carrusel/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a id="update" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                            <i class="material-icons" style="color: #2E7D32">check</i>
                          </a>   
                          <a style="margin-left: 6px"></a>                          
                                                        
                        </div>  
                        @include('forms.scripts.modalInformacion')                               
                  </div>
                  
                  <br>                  
                  <div class="row cuerpo">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <input type="hidden" name="id" value="{{ $datos->id }}">
                   <input type="hidden" name="tipo" id="tipo" value="{{ $datos->tipo_img_icon }}">

                   <div class="col m6 l4 offset-l1">
                                          <div class="card white">
                                              <div class="card-content">
                                                  <div class="row">                                                    
                                                    <div class="col s12">                                                      
                                                      <div class="file-field input-field col s12" style="margin: 0px; padding: 0px"> 
                                                        <div class="col s12  center" style="">                                                     
                                                          <img src="#" alt="" class="z-depth-1" id="u_img" style="height: 100%; width: 100%">                                                        
                                                          @if($datos->tipo_img_icon == 0)
                                                          <i class="material-icons" id="u_imagen_scr" style="color: #26c6da; font-size: 10rem; margin: auto">{{$datos->icono}}</i>
                                                          @else
                                                          <img src="{{asset('/')}}{{$datos->url_imagen}}" alt="" class="" style="height: 200px; width: 200px;">
                                                          @endif
                                                        </div>                                                         
                                                      </div>                                                    
                                                      
                                                      <div class=" col s12">
                                                        <label for="u_imagen" class="col s12" style="padding-left: 5px; padding-bottom: 5px">Seleccionar tipo</label>
                                                        <div class="col s12 m6 l6">
                                                          <p>
                                                            <input class="with-gap" name="group1" type="radio" id="test3" value="0">
                                                            <label for="test3">Icono</label>
                                                          </p>                                                          
                                                        </div>                                                        
                                                        <div class="col s12 m6 l6">
                                                          <p>
                                                            <input class="with-gap" name="group1" type="radio" id="test4" value="1">
                                                            <label for="test4">Imagen</label>
                                                          </p>
                                                        </div>                                                           
                                                      </div>    
                                                      <div class="input-field col s12" id="aaa">
                                                        <i class="material-icons prefix">crop_original</i>
                                                        <input id="u_icono" name="u_icono" type="text" maxlength="200" value=" {{$datos->icono}}">
                                                        <label for="u_icono">Nombre icono</label>
                                                      </div>   
                                                      <div class="file-field input-field col s12" id="bbb">
                                                          <div class="btn">
                                                              <span>File</span>
                                                              <input type="file" id="u_imagenURL" name="u_imagenURL">
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                              <input class="file-path validate" type="text" name="u_imagen" id="u_imagen" value="{{$datos->imagen}}">
                                                              <div class="errorTxt1" id="h_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                                            </div>             
                                                      </div> 
                                                      <div class="input-field col s12 m6 l7">                                  
                                                        <p>Seleccione la posición de la imagen</p>                                  
                                                      </div>                                              
                                                      <div class="col s12 m6 l5">
                                                        <label for="posicion">Posición</label>
                                                        <select id="posicion" class="browser-default" name="posicion"> 
                                                          @if($datos->posicion == 'CENTRO')
                                                          <option value="" disabled="">Seleccionar</option>
                                                          <option value="CENTRO" selected="">CENTRO</option>
                                                          <option value="DERECHA">DERECHA</option>
                                                          <option value="IZQUIERDA">IZQUIERDA</option>
                                                          @endif
                                                          @if($datos->posicion == 'DERECHA')
                                                          <option value="" disabled="">Seleccionar</option>
                                                          <option value="CENTRO">CENTRO</option>
                                                          <option value="DERECHA" selected="">DERECHA</option>
                                                          <option value="IZQUIERDA">IZQUIERDA</option>
                                                          @endif
                                                          @if($datos->posicion == 'IZQUIERDA')
                                                          <option value="" disabled="">Seleccionar</option>
                                                          <option value="CENTRO">CENTRO</option>
                                                          <option value="DERECHA">DERECHA</option>
                                                          <option value="IZQUIERDA" selected="">IZQUIERDA</option>
                                                          @endif
                                                          @if(empty($datos->posicion))
                                                          <option value="" disabled="" selected="">Seleccionar</option>
                                                          <option value="CENTRO">CENTRO</option>
                                                          <option value="DERECHA">DERECHA</option>
                                                          <option value="IZQUIERDA">IZQUIERDA</option>
                                                          @endif
                                                        </select>                                  
                                                      </div> 
                                                      <div id="u_error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 1rem;"></div>

                                                      <div class="input-field col s12 m6 l7">                                  
                                                        <p>Definir el color de fondo para la imagen</p>                                  
                                                      </div>  
                                                      <div class="col s12 m6 l5">
                                                        <label for="color">Definir Color</label>
                                                        <input id="img_color" name="img_color" type="text" value="{{$datos->img_color}}" maxlength="100">                                    
                                                      </div> 
                                                    
                                                    </div>

                                                  </div>
                                              </div>
                                          </div>
                            </div>

                  <div class="col m6 l6">
                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title">Datos Generales</span>

                            <div class="row">
                              
                              <div class="input-field col s12">
                                <i class="material-icons prefix">clear_all</i>
                                <input id="titulo" name="titulo" type="text" data-error=".errorTxt2" maxlength="200" value="{{$datos->titulo}}">
                                <label for="titulo">Título</label>
                                <div id="u_error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                              </div>
                              <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="descripcion" name="descripcion" class="materialize-textarea" lenght="200" style="height: 80px">{{$datos->descripcion}}</textarea>
                                <label for="descripcion" class="">Descripción</label>
                              </div>                          
                            </div>

                        </div>
                    </div>
                  </div>
                 
                </div>
              </form>
              </div>
  </div>
</div>
@endforeach


<div id="comodin" data-valor="0" class="hiden"></div>

@endsection

@include('forms.scripts.toast')
  
@section('script')
  @include('forms.nosotros2.scripts.nosotros') 
  @include('forms.nosotros2.scripts.updNosotros')   
@endsection

