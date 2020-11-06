@extends('layouts2.app')
@section('titulo','Contactanos')

@section('main-content')
<br>
@foreach($contactanos as $datos)
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>Mantenedor Contactanos</h2>
                  </div>
                 <form class="formValidate right-alert" id="myForm" method="POST" action="{{ url('/vision/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
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
                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title">Datos Generales</span>

                            <div class="row">
                              
                              <div class="col s6">
                                {{-- <div class="input-field col s12">
                                  <i class="material-icons prefix">clear_all</i>
                                  <input id="titulo" name="titulo" type="text" data-error=".errorTxt2" maxlength="200" value="{{$datos->titulo}}">
                                  <label for="titulo">Título</label>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">mode_edit</i>
                                  <textarea id="descripcion" name="descripcion" class="materialize-textarea" lenght="200" style="height: 80px">{{$datos->descripcion}}</textarea>
                                  <label for="descripcion" class="">Descripción</label>
                                </div>  --}}   
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">email</i>
                                <input type="text" name="correo" id="correo" value="{{$datos->email}}">
                                  <label for="correo" class="">Correo de Contacto</label> 

                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">add_location</i>
                                  <textarea id="ubicacion" name="ubicacion" class="materialize-textarea" lenght="200" style="height: 150px">{{$datos->ubicacion}}</textarea>
                                  <label for="descripcion" class="">Ubicación Google Maps</label>
                                </div> 
                                <div class=" col s12">
                                  <div class="col l1">
                                    <i class="material-icons prefix">event_available</i>
                                  </div>
                                  <div class="col l11"> 
                                    <label for="horario" class="">Horario</label> 
                                  </div>
                                  <div class="col l12">
                                    
                                    {{-- <textarea id="horario" name="horario" class="materialize-textarea" lenght="200" style="height: 80px">{{$datos->horario}}</textarea> --}}
                                  <textarea class="ckeditor" name="editor1" name="horario" id="editor1" rows="10" cols="80" >{{$datos->horario}}</textarea>
                                    <input type="hidden" id="horario"  name="horario" value="">

                                  </div>
                                 
                                 
                                </div>
                                  
                              </div>

                              <div class="col s6">
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">share</i>
                                  <input id="link_facebook" name="link_facebook" type="text" data-error=".errorTxt2" maxlength="200" value="{{$datos->link_facebook}}">
                                  <label for="link_facebook">Link Facebook</label>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">share</i>
                                  <input id="link_twitter" name="link_twitter" type="text" data-error=".errorTxt2" maxlength="200" value="{{$datos->link_twitter}}">
                                  <label for="link_twitter">Link Twitter</label>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">share</i>
                                  <input id="link_youtube" name="link_youtube" type="text" data-error=".errorTxt2" maxlength="200" value="{{$datos->link_youtube}}">
                                  <label for="link_youtube">Link Youtube</label>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">share</i>
                                  <input id="link_linkending" name="link_linkending" type="text" data-error=".errorTxt2" maxlength="200" value="{{$datos->link_linkending}}">
                                  <label for="link_linkending">Link Linkending</label>
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

@include('forms.scripts.toast')
  
@section('script')
  @include('forms.contactanos.scripts.updContactanos')
  @include('forms.contactanos.scripts.addDetalle')
  @include('forms.contactanos.scripts.updDetalle')
  @include('forms.contactanos.scripts.delDetalle')
  @include('forms.contactanos.scripts.desabilitar')
  @include('forms.contactanos.scripts.habilitar')
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection

