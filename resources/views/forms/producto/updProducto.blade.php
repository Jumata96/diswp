@extends('layouts2.app')
@section('titulo','Registrar Producto')

@section('main-content')
<br>
@foreach($producto as $datos)
<div class="row">
	<div class="col s12 m12 l12">
                 <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>REGISTRAR EQUIPO</h2>
                  </div>
                  
                  <form class="formValidate right-alert" id="avatarForm" method="POST" action="{{ url('/producto/actualizar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="row card-header sub-header">
                        <div class="col s12 m12">                         
                          <button id="updProducto" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" type="submit" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
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
                <div class="col s12 m3 l3">
                  <label for="idgrupo">Grupo</label>
                  <select class="browser-default" id="idgrupo" name="idgrupo" data-error=".errorTxt1" > 
                    <option value="" disabled="">Elija un grupo</option>
                    @foreach($grupo as $val)
                    @if($val->idgrupo == $datos->idgrupo)
                      <option value="{{$val->idgrupo}}" selected="">{{$val->descripcion}}</option>
                    @else
                      <option value="{{$val->idgrupo}}">{{$val->descripcion}}</option>
                    @endif
                    @endforeach                                                      
                  </select>
                  <div class="errorTxt1" id="error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                </div>

                <div class="col s12 m3 l3">
                  <label for="idtipo">Tipo</label>
                  <select class="browser-default" id="idtipo" name="idtipo" data-error=".errorTxt1"> 
                    <option value="">Seleccione un tipo</option>
                    @foreach($tipo as $val)
                    @if($val->idgrupo == $datos->idgrupo)
                      @if($val->idtipo == $datos->idtipo)
                        <option value="{{$val->idtipo}}" selected="">{{$val->descripcion}}</option>
                      @else
                        <option value="{{$val->idtipo}}">{{$val->descripcion}}</option>
                      @endif
                    @endif
                    @endforeach                                                      
                  </select>
                  <div class="errorTxt1" id="error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                </div>

              <div class="input-field col s12 s12 m6 l6 right-align">
                @if($datos->estado == 0)
                <div id="estado" class="chip center-align" style="width: 70%">
                  <b>ESTADO: NO DISPONIBLE</b>
                  <i class="material-icons"></i>
                </div>
                @else
                <div id="estado2" class="chip center-align teal accent-4 white-text" style="width: 70%">
                  <b>ESTADO: ACTIVO</b>
                  <i class="material-icons"></i>
                </div>
                @endif
                
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
                                  <div class="col s12 m12 l12  center" style="">
                                    @if(!empty($datos->url_imagen))
                                    <img src="{{asset('/')}}{{$datos->url_imagen}}" alt="" id="avatarImage" class="z-depth-1" style="height: 100%; width: 100%">
                                    @else
                                    <i class="material-icons gradient-45deg-blue-grey-blue-grey z-depth-1" style="font-size: 9rem; height:  100%; width: 100%">sentiment_satisfied</i>
                                    @endif
                                  </div> 
                                  <div class="col s12" style="padding: 0px; padding-top:50px">
                                    <div class="btn">
                                      <span>File</span>
                                      <input type="file" id="avatarInput" name="url_imagen">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" name="imagen" value="{{$datos->imagen}}">
                                      <div class="errorTxt1" id="h_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                    </div>
                                  </div>   
                                </div>  
                                @foreach($imagenes as $img)
                                <div id="tr{{$img->id}}" class="col s12 m6 l4 center">
                                  <img src="{{asset('/')}}{{$img->url_imagen}}" alt="" id="avatarImage" style="height: 5rem">
                                  <a href="#confirmacion{{$img->id}}" class="waves-effect waves-light btn right red lighten-2 center modal-trigger" style="width: 100%">
                                    <i class="material-icons left" style="font-size: 35px">delete</i>
                                  </a>
                                </div>   
                                @include('forms.producto.scripts.alertaDltImagen')
                                @endforeach               
                              </div>                                  
                            </div>

                        </div>
                    </div>
                    </div>

      <div class="col s12 m8 l8">                        
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $datos->codigo }}">
                    <div class="card white">
                        <div class="card-content">
                          <span class="card-title">Datos generales</span>

                          <div class="row">  
                            <div class="input-field col s12 m6 l6">                                  
                              <p>Ingrese el código de un color que se muestra en la sección de la paleta de colores para diferenciar este producto de los demas </p>
                            </div>                                    
                            <div class="col s12 m6 l6">
                              <label for="idcolor">Código Color</label>
                              <input id="idcolor" name="idcolor" type="text" data-error=".errorTxt2" minlength="7" maxlength="100" value="{{$datos->idcolor}}">                                    
                            </div>  
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">label_outline</i>
                              <input id="codigo" name="codigo" type="text" data-error=".errorTxt4" minlength="1" maxlength="10" value="{{$datos->codigo}}" disabled="">
                              <label for="codigo">Código Producto</label>
                              <div class="errorTxt4"></div>
                            </div>      
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">label</i>
                              <input id="idprov" name="idprov" type="text" data-error=".errorTxt4" maxlength="20" value="{{$datos->idprov}}">
                              <label for="idprov">Código Proveedor</label>
                              <div class="errorTxt4"></div>
                            </div>    
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">keyboard_arrow_right</i>
                              <input id="nombre" name="nombre" type="text" data-error=".errorTxt4" value="{{$datos->nombre}}" minlength="2">
                              <label for="nombre">Producto</label>
                              <div class="errorTxt4"></div>
                            </div>                                
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">clear_all</i>
                              <input id="descripcion" name="descripcion" type="text" data-error=".errorTxt4" minlength="1" maxlength="100" value="{{$datos->descripcion}}">
                              <label for="descripcion">Descripcion</label>
                              <div class="errorTxt4" id="error4" style="color: red; font-size: 12px; font-style: italic;"></div>
                            </div>                              
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">attach_money</i>
                              <input id="mon_nacional" name="mon_nacional" type="number" data-error=".errorTxt3" value="{{$datos->mon_nacional}}">
                              <label for="mon_nacional">Precio MN</label>
                              <div class="errorTxt3"></div>
                            </div>
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">attach_money</i>
                              <input id="mon_extranjera" name="mon_extranjera" type="number" data-error=".errorTxt4" value="{{$datos->mon_extranjera}}">
                              <label for="mon_extranjera">Precio MEX</label>
                              <div class="errorTxt4" id="error5" style="color: red; font-size: 12px; font-style: italic;"></div>
                            </div>    
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">keyboard_arrow_right</i>
                              <input id="stock" name="stock" type="number" data-error=".errorTxt4" value="{{$datos->stock}}">
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
@endforeach
@endsection

@section('script')
  @include('forms.producto.scripts.producto')        
  @include('forms.producto.scripts.updProducto')    
  @include('forms.producto.scripts.dltImagen')                            
@endsection
