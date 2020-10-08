@extends('layouts2.app')
@section('titulo','Registrar Empresa')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>REGISTRAR EMPRESA</h2>
                  </div>
                  <form id="myForm"  accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="row card-header sub-header">
                        <div class="col s12 m12 herramienta">                         
                          <button id="add" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" type="submit" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                            <i class="material-icons blue-text text-darken-2">check</i></button>
                          <a style="margin-left: 6px"></a>   
                          <a href="#informacion" class="btn-floating waves-effect waves-light light-blue lighten-1 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Ver información del Formulario">
                            <i class="material-icons">info</i></a>
                          <a href="{{url('/empresa')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                            <i class="material-icons" style="color: #424242">keyboard_tab</i></a>            
                        </div>  

                        @include('forms.scripts.modalInformacion')              
                        
                  </div>
                                    
                  
                  <div class="row cuerpo">
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title">Datos Generales</span>

                            <div class="row">
                              <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix active">label_outline</i>
                                <input id="idempresa" name="idempresa" type="text" data-error=".errorTxt1" maxlength="3">
                                <label for="idempresa">Cod. Empresa</label>
                                <div id="error1" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                              </div>   
                              <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix">clear_all</i>
                                <input id="descripcion" name="descripcion" type="text" data-error=".errorTxt2" maxlength="200">
                                <label for="descripcion">Descripción</label>
                                <div id="error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                              </div>       
                              
                            </div>

                        </div>
                    </div>

                  
                      
                  </div>
                  </form>
              </div>
  </div>
</div>
<br><br><br>
@endsection

@section('script')
  @include('forms.prueba.scripts.addPrueba')
@endsection
