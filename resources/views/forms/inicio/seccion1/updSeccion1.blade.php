@extends('layouts2.app')
@section('titulo','Actualizar item de seccion 1')
@section('main-content')
<br>
@foreach($inicio_seccion_det as $datos)
<div class="row">
  <div class="col s12 m12 l12">
    <div class="card">
      <div class="card-header">
        <i class="fa fa-table fa-lg material-icons">receipt</i>
        <h2>ACTUALIZAR ITEM DE SECCION 1</h2>
      </div>
      <form class="formValidate right-alert" id="myForm" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
        <div class="row card-header sub-header">
          <div class="col s12 m12 herramienta">                         
            <a id="updateSeccion1Det" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
            <i class="material-icons" style="color: #2E7D32">check</i>
            </a>   
            <a style="margin-left: 6px"></a>   
            <a href="{{url('/inicio')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
            <i class="material-icons" style="color: #424242">keyboard_tab</i></a>            
          </div>
          @include('forms.scripts.modalInformacion')              
        </div>
        <div class="row">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="{{ $datos->codigo }}">
          <div class="col s12 m4 l4">
            <div class="card white">
              <div class="card-content">
                <span class="card-title">Imagen</span>
                <div class="card white">
                  <div class="card-content">
                    <input type="hidden" name="url_imagen" value="{{$datos->url_file}}">
                    @if ($datos->url_file !=null) 
                    <div class="col l12 s12 m12" >
                      <img width="100%" height="100%"  src="{{asset('/storage/'.$datos->url_file)}}" alt="" class=" responsive-img valign profile-image white lighten-5">  
                    </div>
                    <hr>
                    <div class="file-field  ">
                      <div class="btn light-blue darken-1 ">
                        <span>ACTUALIZAR IMAGEN</span>
                        <input type="file" id="imagen" name="imagen" >
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" name="text" id="inputImagen">
                        {{-- 
                        <p class="right"><i>Solo se permiten archivos con extensión  
                          PNG , DOCX , JPG , PDF y ZIP. </i>
                        </p>
                        --}}
                        <div id="u_error6" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                      </div>
                    </div>
                    @else
                    <div class="file-field input-field  ">
                      <div class="btn light-blue darken-1 ">
                        <span>SUBIR IMAGEN</span>
                        <input type="file" id="imagen" name="imagen" >
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" name="text" id="inputImagen">
                        <p class="right"><i>Solo se permiten archivos con extensión  
                          PNG , DOCX , JPG , PDF y ZIP. </i>
                        </p>
                        <div id="u_error6" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                      </div>
                    </div>
                    @endif 
                     <div id="u_error1" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div> 
                  </div>
                </div> 
              </div>
            </div>
          </div>
          <div class="col s12 m8 l8">
            <div class="card white">
              <div class="card-content">
                <span class="card-title">Datos Generales</span>
                @if ($datos->estado==1)
                <div class="input-field col s12">
                  <div id="estado" class="badge green lighten-5 green-text text-accent-4 col s12 m6 l4 offset-m6 offset-l8">
                    ESTADO:<b> ACTIVO</b>
                    <i class="material-icons"></i>
                  </div>
                </div>
                @else
                <div class="input-field col s12">
                  <div id="estado" class="badge green lighten-5  red-text text-accent-4 col s12 m6 l4 offset-m6 offset-l8">
                    ESTADO:<b>DESABILITADO</b>
                    <i class="material-icons"></i>
                  </div>
                </div>
                @endif
                <div class="row">
                  <div class="col s12">
                    <div class="col s12 l12"  >
                      <div class="input-field col s12 l12">
                        <i class="material-icons prefix">clear_all</i>
                        <input id="titulo" name="titulo" type="text" value=" {{$datos->titulo}}" required data-error=".errorTxt2" maxlength="200" value="">
                        <label for="titulo">Título</label>
                        <div id="u_error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                      </div>
                      <div class="input-field col s12 l12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="descripcion" name="descripcion" required  class="materialize-textarea" lenght="200" style="height: 80px">{{$datos->descripcion}}</textarea>
                        <label for="descripcion" class="">Descripción </label>
                        <div id="u_error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                      </div>
                    </div>
                  </div>
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
@endsection
@section('script')
@include('forms.inicio.seccion1.scripts.updSeccion1Det')    
@endsection