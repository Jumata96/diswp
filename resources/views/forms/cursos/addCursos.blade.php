@extends('layouts2.app')
@section('titulo','Mantenedor de Cursos')

@section('main-content')
<br>

<div class="row">
  <div class="col s12 m12 l12">

                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>MANTENEDOR DE CURSOS</h2>
                  </div>
                 <form class="formValidate right-alert" id="formCursos" method="POST" action="{{ url('/carrusel/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a  id="add_cursos" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                            <i class="material-icons" style="color: #2E7D32">check</i>
                          </a>
                          <a style="margin-left: 6px"></a>
                          <a href="{{url('/lstCursos')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                            <i class="material-icons" style="color: #424242">keyboard_tab</i>
                          </a>
                        </div>
                        @include('forms.scripts.modalInformacion')
                  </div>

                  <br>
                  <div class="row cuerpo">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">



                  <div class="col s12 l8  ">
                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title">Datos Generales</span>

                            <div class="row">

                              <div class="input-field col s12 l6">
                                <i class="material-icons prefix">clear_all</i>
                                <input id="titulo" name="titulo" type="text" required data-error=".errorTxt2" maxlength="200" value="">
                                <label for="titulo">Título</label>
                                <div id="u_error1" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                              </div>
                              
                              <div class="input-field col s12 l6">
                                <i class="material-icons prefix">attach_money</i>
                                <input id="costo" name="costo"  type="number"   > 
                                <label for="costo" class="">Costo del curso </label>
                                <div id="u_error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                              </div> 
                              <div class="col s12 m12 l6">
                                
                                <div class="col s1  m1 l1"> 
                                  <i class="material-icons prefix">content_paste</i> 
                                  <br>
                                </div> 
                                <div class="col s11 l11 m11"> 
                                  <label for="horario">  Horario</label>
                                  <select class="browser-default" id="horario" name="horario" required>
                                    <option   disabled selected="">Seleccione </option>
                                    @foreach($horarios as $val)
                                      <option value="{{$val->codigo}}" selected> {{$val->dia}}</option> 
                                    @endforeach
                                  </select>
                                  <div id="u_error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                                </div>
                               <br><br>
                            </div>  
                            <div class="input-field col s12 l6">
                              <i class="material-icons prefix">rotate_right</i>
                              <input id="tiempo" name="tiempo"  type="text"   > 
                              <label for="tiempo" class="">Duraciòn del curso </label>
                              <div id="u_error4" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                            </div>
                            <div class="input-field col s12 l12">
                              <i class="material-icons prefix">mode_edit</i>
                              <textarea id="descripcion" name="descripcion" required  class="materialize-textarea" lenght="200" style="height: 80px"></textarea>
                              <label for="descripcion" class="">Descripción </label>
                              <div id="u_error5" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                            </div> 
                            

                            </div>

                        </div>
                    </div>
                  </div>   
                  <div class="col s12 l4"> 
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
                                         PNG , DOCX , JPG , PDF y ZIP. </i></p>
                                         <div id="u_error6" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                                    </div>
                                  
                                </div>   

                        </div>
                    </div>
                  </div> 
                  <div class="col s12 l4"> 
                    <div class="card white">
                        <div class="card-content"> 
                                  <div class="file-field input-field  ">                                  
                                    <div class="btn light-blue darken-1 ">
                                      <span>SUBIR VIDEO</span>
                                      <input type="file" id="video" name="video" >
                                    </div> 
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" name="inputVideo" id="inputVideo">
                                      <p class="right"><i>Solo se permiten archivos con extensión  
                                         FLK , MP4 ,MKV, AVI. </i></p>
                                         <div id="u_error7" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
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


@endsection

@section('script')
@include('forms.cursos.scripts.addCursos')
@endsection

