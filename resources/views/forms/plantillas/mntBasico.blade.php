@extends('layouts2.app')
@section('titulo','Mantenedor Básico')

@section('main-content')
<br>
	<div class="row">
	<div class="col s12 m12 l12">
                <div class="card-panel-2 grey lighten-5">
                  <div class="row cabecera gradient-45deg-light-blue-cyan" style="margin-left: -0.75rem; margin-right: -0.75rem;">                 
                    <div class="col s12 m12 l12">
                      <i class="material-icons left" style="padding-top: 0.42rem; font-size: 20px; margin-right: 2px">receipt</i>
                      <p style="margin-top: 0.42rem"><b>Registrar Router Mikrotik</b></p>  
                    </div>
                  </div>
                  <form class="formValidate right-alert" id="formValidate" method="POST" action="{{ url('/grabar-router') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="row grey lighten-3" style="height: 52px; margin-left: -0.75rem; margin-right: -0.75rem; margin-top: -21.7px">
                        <div class="col s12 m12 herramienta" style="margin-top: -0.3rem">
                          <button class="btn-floating waves-effect waves-light  grey lighten-5">                          	
                          	<i class="material-icons" style="color: #03a9f4">add</i>
                          </button>
                          <a class="btn-floating waves-effect waves-light grey lighten-5">
                          	<i class="material-icons" style="color: #dd2c00">remove</i>
                          </a>
                          <a style="margin-left: 6px"></a>   
                          <button class="btn-floating waves-effect waves-light grey lighten-5" type="submit" name="action">
                          	<i class="material-icons" style="color: #2E7D32">check</i>
                          </button>
                          <a class="btn-floating waves-effect waves-light  grey lighten-5">
                          	<i class="material-icons" style="color: #0277bd">edit</i>
                          </a>
                          <a style="margin-left: 6px"></a>   
                          <a class="btn-floating waves-effect waves-light light-blue lighten-1">
                          	<i class="material-icons">info</i>
                          </a>
                          <a class="dropdown-button btn-floating right waves-effect waves-light grey lighten-5" href="#!" data-activates="dropdown2">
                          	<i class="material-icons" style="color: #424242">arrow_forward</i>
                          </a>            
                        </div>                   
                        
                  </div>
                                    
                  
                 <div class="card white">
                        <div class="card-content" style="padding-top: 10px">
                          <span class="card-title">Generales</span>
                          <div class="row">
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix active">chevron_right</i>
                              <input id="documento" name="documento" type="text" data-error=".errorTxt1" maxlength="50">
                              <label for="documento">Tipo Documento</label>
                              <div class="errorTxt1"></div>
                            </div>   
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">maps</i>
                              <input id="nro_documento" name="nro_documento" type="text" data-error=".errorTxt2" maxlength="11">
                              <label for="nro_documento">Nro. Documento</label>
                              <div class="errorTxt2"></div>
                            </div>   
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">account_circle</i>
                              <input id="apaterno" name="apaterno" type="text" data-error=".errorTxt3">
                              <label for="apaterno">Apellido Paterno</label>
                              <div class="errorTxt3"></div>
                            </div>
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">account_circle</i>
                              <input id="amaterno" name="amaterno" type="text" data-error=".errorTxt4">
                              <label for="amaterno">Apellido Materno</label>
                              <div class="errorTxt4"></div>
                            </div>   
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">face</i>
                              <input id="nombres" name="nombres" type="text" data-error=".errorTxt5">
                              <label for="nombres">Nombres</label>
                              <div class="errorTxt5"></div>
                            </div>  
                            <div class="input-field col s12 m6 l6">
                              <i class="material-icons prefix">room</i>
                              <input id="direccion" name="direccion" type="text">
                              <label for="direccion">Dirección</label>
                            </div>                     
                          </div>
                        </div>
          		</div>
                  </form>
              </div>
  </div>
</div>

@endsection