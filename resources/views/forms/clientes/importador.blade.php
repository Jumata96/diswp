@extends('layouts2.app')
@section('titulo','Importador de Clientes')

@section('main-content')
<br>
<div class="row">
	<div class="col s12 m12 l12">
    <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>IMPORTADOR DE CLIENTES</h2>
                  </div>

                  <div class="row card-header sub-header">
                        <div class="col s12 m12 herramienta">                         
                          <button id="addEquipo" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" type="submit" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                            <i class="material-icons blue-text text-darken-2">check</i></button>
                          <a style="margin-left: 6px"></a>   
                          
                        </div>  

                        @include('forms.scripts.modalInformacion')              
                        
                  </div>
                                    
    <div class="row cuerpo">
      

      <div class="col s12 m6 l6 offset-m3 offset-l3">
                <div class="card"> 
                  <div class="card-header indigo lighten-5">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>IMPORTAR CLIENTES</h2>
                  </div>
               
                  <form class="formValidate right-alert" id="myForm" method="POST" action="{{ url('herramientas/importar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    <div class="row cuerpo" style="margin-top: 1rem; margin-bottom: 0.5rem">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                      
                      
                      <div class="card white">
                          <div class="card-content">
                            <div class="row" style="padding-bottom: 0px; margin-bottom: 0px">
      				                <div class="col s12 m12 l12" style="padding-bottom: 10px">
        				                <p>Ingrese un archivo en excel para realizar la importación</p>
        				              </div>
                              <div class="col s12">
                                <div class="file-field input-field col s12 ">                                  
                                    <div class="btn light-blue darken-1">
                                      <span>File</span>
                                      <input type="file" id="inputClientes" name="inputClientes">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" name="clienteXLS" id="clienteXLS">
                                      <p class="right"><i>Solo se permiten archivos con extensión XLS y XLSX</i></p>
                                      <div class="errorTxt1" id="h_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                    </div>
                                  
                                </div>                    
                              </div>
                              <div class="col s12 mt-2 mb-2">                                
                                <a class="waves-effect waves-light btn right indigo darken-2" id="importClientes">
                                  <i class="material-icons left">file_upload</i> Importar
                                </a>                               
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
  </div>
</div>
<br><br><br><br><br>
@endsection

@section('script')
  @include('forms.clientes.scripts.importar')
@endsection
