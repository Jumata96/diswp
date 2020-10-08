@extends('layouts2.app')
@section('titulo','Registrar Ususario')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>REGISTRAR USUARIO</h2>
                  </div>
                  <form class="formValidate right-alert" id="formValidate" method="POST" action="{{ url('/usuario/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="row card-header sub-header">
                        <div class="col s12 m12 herramienta">                         
                          <button class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" type="submit" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                            <i class="material-icons blue-text text-darken-2">check</i></button>
                          <a style="margin-left: 6px"></a>   
                          
                          <a href="{{url('/usuarios')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
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
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix active">label_outline</i>
                                  <input id="nro_documento" name="nro_documento" type="text" data-error=".errorTxt1" minlength="8" maxlength="11">
                                  <label for="nro_documento">Nro. doc. Identidad</label>
                                  <div class="errorTxt1"></div>
                                </div>   
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">clear_all</i>
                                  <input id="cargo" name="cargo" type="text" data-error=".errorTxt2" maxlength="50">
                                  <label for="cargo">Cargo</label>
                                  <div class="errorTxt2"></div>
                                </div> 
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">account_circle</i>
                                  <input id="nombre" name="nombre" type="text" data-error=".errorTxt4" maxlength="50">
                                  <label for="nombre">Nombres</label>
                                  <div class="errorTxt4"></div>
                                </div>   
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">account_circle</i>
                                  <input id="apellidos" name="apellidos" type="text" maxlength="50">
                                  <label for="apellidos">Apellidos</label>
                                </div>   
                               
                                <div class="input-field col s12 m6 l6">
                                  <i class="material-icons prefix">call</i>
                                  <input id="telefono" name="telefono" type="text" maxlength="20">
                                  <label for="telefono">Telefono</label>
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
                                  <input id="usuario" name="usuario" type="text" data-error=".errorTxt3" maxlength="20">
                                  <label for="usuario">Usuario</label>
                                  <div class="errorTxt3"></div>
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">email</i>
                                  <input id="email" name="email" type="text">
                                  <label for="email">Email</label>
                                </div>   
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">lock_outline</i>
                                  <input id="password-again" name="password_confirmation" type="password">
                                  <label for="password-again">contaseña</label>
                                </div>     
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">lock_outline</i>
                                  <input id="telefono" name="telefono" type="password">
                                  <label for="telefono">Repetir contraseña</label>
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
        idempresa: {
          required: true,
          minlength: 1,
          maxlenght: 3
        },
        razon_social: {
            required: true,
            minlength: 3,
            maxlenght: 200
        },
        RUC: {
          required: true,
          minlength: 11          
        },
        direccion: {
          required: true          
        }
      },
        //For custom messages
        messages: {
            idempresa: {
              required: "Ingrese un código para la Empresa",
              minlength: "Ingresar 1 caracter como mínimo"
            },
            razon_social:{
                required: "Ingrese una Razón Social"
            },
            RUC: {
              required: "Ingrese el RUC"
            }, 
            direccion: {
              required: "Ingrese una dirección"
            },      
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
