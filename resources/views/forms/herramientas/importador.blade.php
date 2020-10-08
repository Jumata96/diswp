@extends('layouts2.app')
@section('titulo','Importar/Exportar')

@section('main-content')
<br>
 <div class="row cuerpo">
      

      <div class="col s12 m6 l6">
                <div class="card"> 
                  <div class="card-header indigo lighten-5">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>IMPORADOR DE LINEA</h2>
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
                                      <input type="file" id="inputLinea" name="inputLinea">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" name="lineaXLS" id="lineaXLS">
                                      <p class="right"><i>Solo se permiten archivos con extensión XLS y XLSX</i></p>
                                      <div class="errorTxt1" id="h_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                    </div>
                                  
                                </div>                    
                              </div>
                              <div class="col s12 mt-2 mb-2">                                
                                <a class="waves-effect waves-light btn right indigo darken-2" id="importLinea">
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

     <div class="col s12 m6 l6">
                <div class="card"> 
                  <div class="card-header indigo lighten-5">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>IMPORADOR DE TIPOS DE LINEA</h2>
                  </div>
               
                  <form class="formValidate right-alert" id="myForm2" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
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
                                      <input type="file" id="inputTipo" name="inputTipo">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" name="tipoXLS" id="tipoXLS">
                                      <p class="right"><i>Solo se permiten archivos con extensión XLS y XLSX</i></p>
                                      <div class="errorTxt1" id="h_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                    </div>
                                  
                                </div>                    
                              </div>
                              <div class="col s12 mt-2 mb-2">                                
                                <a class="waves-effect waves-light btn right indigo darken-2" id="importTipo">
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

     <div class="col s12 m6 l6">
                <div class="card"> 
                  <div class="card-header indigo lighten-5">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>IMPORADOR DE PRODUCTOS</h2>
                  </div>
               
                  <form class="formValidate right-alert" id="myForm3" method="POST" action="{{ url('herramientas/importarProductos') }}" accept-charset="UTF-8" enctype="multipart/form-data">
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
                                      <input type="file" id="inputProducto" name="inputProducto">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" name="productoXLS" id="productoXLS">
                                      <p class="right"><i>Solo se permiten archivos con extensión XLS y XLSX</i></p>
                                      <div class="errorTxt1" id="h_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                    </div>
                                  
                                </div>                    
                              </div>
                              <div class="col s12 mt-2 mb-2">                                
                                <a class="waves-effect waves-light btn right indigo darken-2" id="importProducto">
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
      
   
      <div class="col s12 m6 l6">
                <div class="card"> 
                  <div class="card-header indigo lighten-5">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>IMPORTADOR DE IMÁGENES PARA LOS PRODUCTOS</h2>
                  </div>
               
                  <form class="formValidate right-alert" id="myForm4" method="POST" action="{{ url('/herramientas/importarImagenes') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    <div class="row cuerpo" style="margin-top: 1rem; margin-bottom: 0.5rem">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                      
                      
                      <div class="card white">
                          <div class="card-content">
                            <div class="row" style="padding-bottom: 0px; margin-bottom: 0px">
                              <div class="col s12 m12 l12" style="padding-bottom: 10px">
                                <p>Seleccione las imágenes para realizar la importación masiva</p>
                              </div>
                              <div class="col s12">
                                <div class="file-field input-field col s12 ">                                  
                                    <div class="btn light-blue darken-1">
                                      <span>File</span>
                                      <input type="file" id="archivo[]" name="archivo[]" multiple="">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" name="clienteXLS" id="clienteXLS">
                                      <p class="right"><i>Solo se permiten imágenes con extención JPG</i></p>
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

@endsection

@include('forms.scripts.toast')

@section('script')
  @include('forms.herramientas.scripts.importar')
  @include('forms.herramientas.scripts.importarTipos')
  @include('forms.herramientas.scripts.importarProductos')
@endsection
