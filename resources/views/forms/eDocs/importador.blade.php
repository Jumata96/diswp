@extends('layouts2.app')
@section('titulo','Importador de Clientes')

@section('main-content')
<br><br>
<div class="row">
	<div class="col s12 m12 l12">
   <div class="col s12 m6 l6 offset-m3 offset-l3">
                <div class="card"> 
                  <div class="card-header indigo lighten-5">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>IMPORTAR EDOCS</h2>
                  </div>
               
                  <form class="formValidate right-alert" id="myForm" method="POST" action="{{ url('/edocs/import') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    <div class="row cuerpo" style="margin-top: 1rem; margin-bottom: 0.5rem">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                      
                      
                      <div class="card white">
                          <div class="card-content">
                            <div class="row" style="padding-bottom: 0px; margin-bottom: 0px">
                              <div class="col s12 m12 l12" style="padding-bottom: 10px">
                                <p>Ingrese los archivos para realizar la importación masiva</p>
                              </div>
                              <div class="col s12">
                                <div class="file-field input-field col s12 ">                                  
                                    <div class="btn light-blue darken-1">
                                      <span>File</span>
                                      <input type="file" id="archivo[]" name="archivo[]" multiple="">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" name="clienteXLS" id="clienteXLS">
                                      <p class="right"><i>Solo se permiten archivos con extensión ZIP, XML y PDF</i></p>
                                      <div class="errorTxt1" id="h_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                    </div>
                                  
                                </div>                    
                              </div>
                              <div class="col s12 mt-2 mb-2">                                
                                <button type="submit" class="waves-effect waves-light btn right indigo darken-2" >
                                  <i class="material-icons left">file_upload</i> Importar
                                </button>
                              </div>
                            </div>                              
                          </div>
                      </div>   
                    </div>
                  </form>       


                </div>
     </div>
        
  </div>
</div>

@endsection

@include('forms.scripts.toast')

@section('script')
  @include('forms.eDocs.scripts.importar')
@endsection
