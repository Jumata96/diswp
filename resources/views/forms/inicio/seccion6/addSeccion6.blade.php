@extends('layouts2.app')
@section('titulo','Actualizar item de seccion 1')
@section('main-content')
<br>
@foreach($inicio_seccion6 as $seccion6)
<div class="row">
  <div class="col s12 m12 l12">
    <div class="card">
      <div class="card-header">
        <i class="fa fa-table fa-lg material-icons">receipt</i>
        <h2>  SECCION 5 -Imagenes</h2>
      </div>
      <form class="formValidate right-alert" id="myForm" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
        <div class="row card-header sub-header">
          <div class="col s12 m12 herramienta">                         
            <a id="addSeccion6Det" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
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
          <input type="hidden" name="id" value="{{ $seccion6->codigo }}">
          <div class="col s12 m4 l4">
            <div class="card white">
              <div class="card-content">
                <span class="card-title">Imagen</span>
                <div class="card white">
                  <div class="card-content"> 
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
              
                <div class="row">
                  <div class="col s12">
                    <div class="col s12 l12"  >
                      <div class="input-field col s12 l12">
                        <i class="material-icons prefix">clear_all</i>
                        <input id="titulo" name="titulo" type="text"  required data-error=".errorTxt2" maxlength="200" value="">
                        <label for="titulo">Título</label>
                        <div id="u_error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                      </div>
                      <div class="input-field col s12 l12">
                        
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="descripcion" name="descripcion" required  class="materialize-textarea" lenght="200" style="height: 80px"> </textarea>
                        <label for="descripcion" class="">Descripción </label>
                        <div id="u_error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                      </div>
                      
											<div class="col s12 m12 l12">
                        <i class="material-icons prefix">mode_edit</i>
												<label for="tipo">Tipo de imagen</label>
												<select id="tipo" class="browser-default" name="tipo" data-error=".errorTxt1">
                          <option value="" disabled="">TIPO DE IMAGEN</option>
                          <option value="1">ALL</option>
													<option value="2" selected="">AEROBICS</option> 
													<option value="3" selected="">STRENGTH</option> 
													<option value="4" selected="">NUTRITION</option> 
                        </select>
                         <div id="u_error4" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
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
@include('forms.inicio.seccion6.scripts.addSeccion6Det')    
@endsection