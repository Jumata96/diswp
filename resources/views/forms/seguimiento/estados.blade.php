@extends('layouts2.app')
@section('titulo','Estado del Seguimiento de Compra')

@section('main-content')
<br>

<div class="row">
  <div class="col s12 m12 l12">
          <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>ESTADO DEL FLUJO DE SEGUIMIENTO</h2>
                  </div>
                
                          <br>
                <div class="row cuerpo">
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                   
                    
                    <div class="row">
                      <form id="formFac" accept-charset="UTF-8" enctype="multipart/form-data">
                      <div class="col s12 m4 l4">
                        <div class="card white">
                          <div class="card-content">
                              <span class="card-title">Facturación</span>
                                  @foreach($seguimiento as $val)
                                  <input type="hidden" name="idfac" value="{{ $val->idpedido }}">                   
                                  @endforeach

                                  <div class=" col s12">
                                    <label for="imagen" class="col s12" style="padding-left: 5px; padding-bottom: 5px">Seleccionar tipo</label>
                                    <div class="col s12 m6 l6">
                                      <p>
                                        <input class="with-gap" name="facturacion" type="radio" id="test1" value="0">
                                        <label for="test1">Aprobar</label>
                                      </p>                                                          
                                    </div>                                                        
                                    <div class="col s12 m6 l6">
                                      <p>
                                        <input class="with-gap" name="facturacion" type="radio" id="test2" value="1">
                                        <label for="test2">Rechazar</label>
                                      </p>
                                    </div>  
                                    <div id="error1" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>                                                        
                                  </div>
                                  <div class="input-field col s12">
                                    <i class="material-icons prefix">subject</i>
                                    <textarea disabled="" id="f_descripcion" name="f_descripcion" class="materialize-textarea" lenght="200" maxlength="200" value="" style="height: 100px; margin-bottom: 0px"></textarea>
                                    <label for="descripcion" class="">Observación</label>
                                    <div id="error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>
                                  </div>
                                  <div class="col s12" style="padding-bottom: 20px; padding-top: 20px">
                                    <a id="btnFacturacion" class="waves-effect waves-light btn-large right orange darken-4" style="width: 100%">
                                      <i class="material-icons left">save</i> GUARDAR CAMBIOS
                                    </a>
                                  </div>
                            </div>                          
                          </div>    
                        </div>
                      </form>

                      <form id="formAlm" accept-charset="UTF-8" enctype="multipart/form-data">
                        <div class="col s12 m4 l4">
                        <div class="card white">
                          <div class="card-content">
                              <span class="card-title">Almacén</span>
                                  @foreach($seguimiento as $val)
                                  <input type="hidden" name="idalm" value="{{ $val->idpedido }}">                   
                                  @endforeach
                                
                                  <div class=" col s12">
                                    <label for="imagen" class="col s12" style="padding-left: 5px; padding-bottom: 5px">Seleccionar tipo</label>
                                    <div class="col s12 m6 l6">
                                      <p>
                                        <input class="with-gap" name="almacen" type="radio" id="test3" value="0">
                                        <label for="test3">Despachado</label>
                                      </p>                                                          
                                    </div>                                                        
                                    <div class="col s12 m6 l6">
                                      <p>
                                        <input class="with-gap" name="almacen" type="radio" id="test4" value="1">
                                        <label for="test4">Rechazado</label>
                                      </p>
                                    </div>      
                                    <div id="error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>                                                     
                                  </div>
                                  <div class="input-field col s12">
                                    <i class="material-icons prefix">subject</i>
                                    <textarea disabled="" id="a_descripcion" name="a_descripcion" class="materialize-textarea" lenght="200" maxlength="200" value="" style="height: 100px; margin-bottom: 0px"></textarea>
                                    <label for="descripcion" class="">Observación</label>
                                    <div id="error4" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>
                                  </div>
                                  <div class="col s12" style="padding-bottom: 20px; padding-top: 20px">
                                    <a id="btnAlmacen" class="waves-effect waves-light btn-large right indigo darken-4" style="width: 100%">
                                      <i class="material-icons left">save</i> GUARDAR CAMBIOS
                                    </a>
                                  </div>
                            </div>                          
                          </div>    
                        </div>
                      </form>

                      <form id="formTransportista" accept-charset="UTF-8" enctype="multipart/form-data">
                        <div class="col s12 m4 l4">
                        <div class="card white">
                          <div class="card-content">
                              <span class="card-title">Transportista</span>
                                @foreach($seguimiento as $val)
                                  <input type="hidden" name="idtra" value="{{ $val->idpedido }}">                   
                                  @endforeach
                                
                                  <div class=" col s12">
                                    <label for="imagen" class="col s12" style="padding-left: 5px; padding-bottom: 5px">Seleccionar tipo</label>
                                    <div class="col s12 m6 l6">
                                      <p>
                                        <input class="with-gap" name="transporte" type="radio" id="test5" value="0">
                                        <label for="test5">Enviado</label>
                                      </p>                                                          
                                    </div>                                                        
                                    <div class="col s12 m6 l6">
                                      <p>
                                        <input class="with-gap" name="transporte" type="radio" id="test6" value="1">
                                        <label for="test6">Rechazado</label>
                                      </p>
                                    </div>       
                                    <div id="error5" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>                                                    
                                  </div>
                                  <div class="input-field col s12">
                                    <i class="material-icons prefix">subject</i>
                                    <textarea disabled="" id="t_descripcion" name="t_descripcion" class="materialize-textarea" lenght="200" maxlength="200" value="" style="height: 100px; margin-bottom: 0px"></textarea>
                                    <label for="descripcion" class="">Observación</label>
                                    <div id="error6" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>
                                  </div>
                                  <div class="col s12" style="padding-bottom: 20px; padding-top: 20px">
                                    <a id="btnTransportista" class="waves-effect waves-light btn-large right green darken-4" style="width: 100%">
                                      <i class="material-icons left">save</i> GUARDAR CAMBIOS
                                    </a>
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


@endsection

@section('script')
  @include('forms.seguimiento.scripts.seguimiento')
  @include('forms.seguimiento.scripts.btnFacturacion')
  @include('forms.seguimiento.scripts.btnAlmacen')
  @include('forms.seguimiento.scripts.btnTransportista')
@endsection

