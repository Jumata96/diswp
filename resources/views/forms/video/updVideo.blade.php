@extends('layouts2.app')
@section('titulo','Mantenedor de videos')

@section('main-content')
<br>
@foreach ($videos as $video)
<div class="row">
  <div class="col s12 m12 l12">

                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>MANTENEDOR VIDEO</h2>
                  </div>
                 <form class="formValidate right-alert" id="formVideo" method="POST" action="{{ url('/carrusel/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a  id="upd_video" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                            <i class="material-icons" style="color: #2E7D32">check</i>
                          </a>   
                          <a style="margin-left: 6px"></a>                          
                          <a href="{{url('/lstVideos')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                            <i class="material-icons" style="color: #424242">keyboard_tab</i>
                          </a>                               
                        </div>  
                        @include('forms.scripts.modalInformacion')                               
                  </div>
                  
                  <br>                  
                  <div class="row cuerpo">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <input type="hidden" name="idVideo" value="{{$video->codigo}}">

                   <div class="col m6 l6">
                                          <div class="card white">
                                              <div class="card-content"> 
                                              <video width="560" height="300" id ="video" controls="" src="{{asset('/storage/'.$video->url_video)}}" autoplay></video>   
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
                              <input id="titulo" name="titulo" type="text" required data-error=".errorTxt2" maxlength="200" value="{{$video->titulo}}">
                                <label for="titulo">Título</label>
                                <div id="u_error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                              </div>
                              <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="descripcion" name="descripcion" required  class="materialize-textarea" lenght="200" style="height: 80px">{{$video->descripcion}}</textarea>
                                <label for="descripcion" class="">Descripción </label>
                                <div id="u_error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
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
@include('forms.video.scripts.updVideos')
@endsection

