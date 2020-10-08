@extends('layouts2.app')
@section('titulo','Registrar Producto')

@section('main-content')
<br>
<div class="row">
	<div class="col s12 m12 l12">
                 <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>REGISTRAR EQUIPO</h2>
                  </div>
                  
                  <form class="formValidate right-alert" id="avatarForm" method="POST" action="{{ url('/producto/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="row card-header sub-header">
                        <div class="col s12 m12">                         
                          <button id="addProducto" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" type="submit" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                            <i class="material-icons blue-text text-darken-2">check</i></button>
                          <a style="margin-left: 6px"></a>   
                         
                          <a href="{{url('/productos')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                            <i class="material-icons" style="color: #424242">keyboard_tab</i></a>
                        </div>  

                        @include('forms.scripts.modalInformacion')              
                        
                  </div>
                                    
    <div class="row">
      <div class="col s12 m12 l12">
          <div class="card white">
            <div class="card-content">
              <div class="row">
                <div class="col s12 m6 l3">
                  <label for="idgrupo">Linea</label>
                  <select class="browser-default" id="idgrupo" name="idgrupo" data-error=".errorTxt1" > 
                    <option value="" disabled="" selected="">Elija una linea</option>
                    @foreach($grupo as $val)
                      <option value="{{$val->idgrupo}}">{{$val->descripcion}}</option>
                    @endforeach                                                      
                  </select>
                  <div class="errorTxt1" id="error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                </div>

                <div class="col s12 m6 l3">
                  <label for="idtipo">Tipo</label>
                  <select class="browser-default" id="idtipo" name="idtipo" data-error=".errorTxt1" disabled=""> 
                    <option value="" disabled="" selected="">Seleccione un tipo</option>
                    @foreach($tipo as $val)
                      <option value="{{$val->idtipo}}">{{$val->descripcion}}</option>
                    @endforeach                                                      
                  </select>
                  <div class="errorTxt1" id="error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                </div>

              <div class="input-field col s12 s12 m6 l6 right-align">
                <div class="chip center-align" style="width: 70%">
                  <b>Estado:</b> No Disponible
                  <i class="material-icons mdi-navigation-close"></i>
                </div>
              </div> 
            </div>                     
          </div>
        </div>       
    </div>
      <div class="col s12 m4 l4">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title">Imagen</span>

                            <div class="row">
                              <div class="col s12">
                                <div class="file-field input-field col s12 "> 
                                  <div class="col s8 m8 l6 offset-s2 offset-m2 offset-l3 center" style="">
                                    <img src="{{asset('images/usu-perfil.png')}}" alt="" id="avatarImage" class="circle responsive-img valign profile-image teal lighten-5" style="height: 100%; width: 100%">
                                  </div> 
                                  <div class="col s12" style="padding: 0px; padding-top:50px">
                                    <div class="btn">
                                      <span>File</span>
                                      <input type="file" id="avatarInput" name="url_imagen">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" name="imagen">
                                      <div class="errorTxt1" id="h_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                    </div>
                                  </div>   
                                </div>                    
                              </div>                                  
                            </div>

                        </div>
                    </div>
      </div>

      <div class="col s12 m8 l8">                        
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card white">
                        <div class="card-content">
                          <span class="card-title">Datos generales</span>

                          <div class="row">   
                            <div class="input-field col s12 m6 l6">                                  
                              <p>Ingrese el código de un color que se muestra en la sección de la paleta de colores para diferenciar este producto de los demas </p>
                            </div>                                    
                            <div class="col s12 m6 l6">
                              <label for="idcolor">Código Color</label>
                              <input id="idcolor" name="idcolor" type="text" data-error=".errorTxt2" minlength="7" maxlength="100" value="">                                    
                            </div>  
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">label_outline</i>
                              <input id="codigo" name="codigo" type="text" data-error=".errorTxt4" minlength="1" maxlength="10">
                              <label for="codigo">Código Producto</label>
                              <div class="errorTxt4"></div>
                            </div>      
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">label</i>
                              <input id="idprov" name="idprov" type="text" data-error=".errorTxt4" maxlength="20">
                              <label for="idprov">Código Proveedor</label>
                              <div class="errorTxt4"></div>
                            </div>    
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">keyboard_arrow_right</i>
                              <input id="nombre" name="nombre" type="text" data-error=".errorTxt4" minlength="5">
                              <label for="nombre">Producto</label>
                              <div class="errorTxt4"></div>
                            </div>                                 
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">clear_all</i>
                              <input id="descripcion" name="descripcion" type="text" data-error=".errorTxt4" minlength="1" maxlength="100">
                              <label for="descripcion">Descripcion</label>
                              <div class="errorTxt4" id="error4" style="color: red; font-size: 12px; font-style: italic;"></div>
                            </div>                             
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">attach_money</i>
                              <input id="mon_nacional" name="mon_nacional" type="number" data-error=".errorTxt3">
                              <label for="mon_nacional">Precio MN</label>
                              <div class="errorTxt3"></div>
                            </div>
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">attach_money</i>
                              <input id="mon_extranjera" name="mon_extranjera" type="number" data-error=".errorTxt4">
                              <label for="mon_extranjera">Precio MEX</label>
                              <div class="errorTxt4" id="error5" style="color: red; font-size: 12px; font-style: italic;"></div>
                            </div>    
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">keyboard_arrow_right</i>
                              <input id="stock" name="stock" type="number" data-error=".errorTxt4">
                              <label for="stock">Stock</label>
                              <div class="errorTxt4"></div>
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
<br><br><br><br><br>
@endsection

@section('script')
  @include('forms.producto.scripts.producto')        
  @include('forms.producto.scripts.addProducto')                            
@endsection
