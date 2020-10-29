@extends('layouts2.app')
@section('titulo','Registrar cliente')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>REGISTRAR CLIENTE</h2>
                  </div>
                  <form class="formValidate right-alert" id="formValidate" method="POST" action="{{ url('/cliente/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="row card-header sub-header">
                        <div class="col s12 m12 herramienta">                         
                          <button class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" type="submit" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                            <i class="material-icons blue-text text-darken-2">check</i></button>
                          <a style="margin-left: 6px"></a>   
                          
                          <a href="{{url('/clientes')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                            <i class="material-icons" style="color: #424242">keyboard_tab</i></a>            
                        </div>  

                        @include('forms.scripts.modalInformacion')              
                        
                  </div>
                                    
                  
                  <div class="row cuerpo">
                    <div class="col s12 m7 l8"> 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="card white">
                          <div class="card-content">
                              <span class="card-title">Generales</span> 
                              <div class="row">
                                <div class="col s12 m6 l6">                                                                               
                                  <label for="iddocumento">Documento</label>
                                   <select class="browser-default" id="iddocumento" name="iddocumento" > 
                                      <option value="" disabled selected="">Seleccione</option>
                                      @foreach($tipo_documento as $documento)
                                      <option value="{{$documento->iddocumento}}">{{$documento->dsc_corta}} - {{$documento->descripcion}}</option> 
                                      @endforeach                                                                                  
                                    </select>
                                    <input type="hidden" id="parametro" name="parametro" value="NO">
                                  <div id="error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>  
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix active">label_outline</i>
                                  <input id="nro_documento" name="nro_documento"  type="text"  >
                                  <label for="nro_documento">Nro. doc. Identidad</label>
                                  <div id="error7" style="color: red; font-size: 12px; font-style: italic;"></div>
                                </div>    
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">account_circle</i>
                                  <input id="nombre" name="nombre" type="text"   maxlength="50">
                                  <label for="nombre">Nombres</label>
                                  <div class="errorTxt4"></div>
                                </div>   
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">perm_identity</i>
                                  <input id="apaterno" name="apaterno" type="text"  >
                                  <label for="apaterno">Apellido Paterno</label>
                                  <div id="error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">perm_identity</i>
                                  <input id="amaterno" name="amaterno" type="text" >
                                  <label for="amaterno">Apellido Materno</label>
                                  <div id="error4" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>
                                </div> 
                               
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">call</i>
                                  <input id="telefono" name="telefono" type="text" maxlength="20">
                                  <label for="telefono">Telefono</label>
                                </div>  
                                <div class="input-field col s12 m6 l6"  >
                                  <i class="material-icons prefix">room</i>
                                  <input id="direccion" name="direccion" type="text"  >
                                  <label for="direccion">Dirección</label>
                                  <div id="error6" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>
                                </div>   
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">mode_edit</i>
                                  <textarea id="glosa" name="glosa" class="materialize-textarea" lenght="200" maxlength="200" value="" style="height: 84px"></textarea>
                                  <label for="glosa" class="">Comentario</label>
                                </div>                              
                              </div>

                          </div>
                      </div>
                    </div> 
                    <div class="col s12 m5 l4"> 
                      <div class="card white">
                          <div class="card-content">
                              <span class="card-title">Datos de Acceso</span> 
                              <div class="row">                             
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">face</i>
                                  <input id="usuario" name="usuario" type="text"  >
                                  <label for="usuario">Usuario</label>  
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">email</i>
                                  <input id="email" name="email" type="text">
                                  <label for="email">Email</label>
                                </div>   
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">lock_outline</i>
                                  <input id="password_again" name="password_confirmation" type="password">
                                  <label for="password_again">contaseña</label>
                                </div>     
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">lock_outline</i>
                                  <input id="password" name="password" type="password">
                                  <label for="password">Repetir contraseña</label>
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
<br><br><br>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
  <script type="text/javascript">
    $("#formValidate").validate({
      rules: { 
        razon_social: {
            required: true,
            minlength: 3,
            maxlenght: 200
        },  
        nro_documento: {
          required: true          
        },
        apaterno:{
          required: true          
        },
        amaterno:{
          required: true          
        },
        nombre:{
          required: true          
        },
        usuario:{
          required: true          
        },
        email:{
          required: true          
        },
        password_again:{
          required: true          
        },
        telefono:{
          required: true          
        }

            
      }, 
        messages: { 
            nro_documento: {
              required: "Ingrese un numero de  documento", 
              minlength:"8",
              maxlength:"12"
            }, 
            apaterno:{
              required: "Ingrese el apellido paterno"          
            },
            amaterno:{
              required: "Ingrese el apellido materno"          
            },
            nombre:{
              required: "Ingrese el nombre"           
            },
            usuario:{
              required:  "Ingrese el nombre de usuario"           
            },
            email:{
              required:  "Ingrese el correo "           
            },
            password_again:{
              required:  "Ingrese la contraseña "          
            },
            telefono:{
              required:  "Ingrese el telefono "          
            }
  
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
   
  </script>
@endsection
