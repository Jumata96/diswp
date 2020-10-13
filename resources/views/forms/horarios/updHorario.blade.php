@extends('layouts2.app')
@section('titulo','Mantenedor de horarios')

@section('main-content')
<br>

<div class="row">
  <div class="col s12 m12 l12">

                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>MANTENEDOR HORARIOS</h2>
                  </div>
                 <form class="formValidate right-alert" id="formCursos" method="POST" action="{{ url('/carrusel/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a  id="add_Horario" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                            <i class="material-icons" style="color: #2E7D32">check</i>
                          </a>   
                          <a style="margin-left: 6px"></a>                          
                          <a href="{{url('/hotspot/lstPublicidad')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                            <i class="material-icons" style="color: #424242">keyboard_tab</i>
                          </a>                               
                        </div>  
                        @include('forms.scripts.modalInformacion')                               
                  </div>
                  
                  <br>                  
                  <div class="row cuerpo">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                  <div class="col m6 l6  offset-l3 offset-m3 ">
                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title">Datos Generales</span>

                            <div class="row">
                              
                              <div class="input-field col s12">
                                <i class="material-icons prefix">today</i>
                                <input id="dia" name="dia" type="text" required data-error=".errorTxt2" maxlength="200" value="">
                                <label for="dia">Día</label>
                                <div id="u_error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                              </div>
                              <div class="input-field col s12 l6">
                                <i class="material-icons prefix">access_time</i>
                                <input id="horaInicio" name="horaInicio" required type="time"  class="timepicker" lenght="200" style="height: 80px">
                                <label for="horaInicio" class="">Hora Inicio </label>
                                <div id="u_error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                              </div>   
                              <div class="input-field col s12 l6">
                                <i class="material-icons prefix">access_time</i>
                                <input id="horaFin" name="horaFin" required type="time"  class="timepicker" lenght="200" style="height: 80px">
                                <label for="horaFin" class="">Hora Fin </label>
                                <div id="u_error4" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                              </div>    
                              <div class="input-field col s12">
                                <i class="material-icons prefix">chat</i>
                                <textarea id="descripcion" name="descripcion" required class="materialize-textarea"    lenght="200" style="height: 80px"></textarea>
                                <label for="descripcion" class="">Descripción </label>
                                <div id="u_error5" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
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

 
@endsection
  
@section('script')
<script>
  /* $(document).ready(function(){
    $('#horaInicio').timepicker();
    $('#horaFin').timepicker(); 
  }); */
  $("#add_Horario").click(function(e){
    e.preventDefault();

//var _token = $("input[name=_token]").val();
var data = $('#formCursos').serializeArray();

  $.ajax({
      url: "{{ url('/horarios/grabar') }}",
      type:"POST",
      beforeSend: function (xhr) {
          var token = $('meta[name="csrf-token"]').attr('content');

          if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
      },
    type:'POST',
    url:"{{ url('/horarios/grabar') }}",
    data:data,

    success:function(data){
        
        if ( data[0] == "error") {
          ( typeof data.dia != "undefined" )? $('#u_error2').text(data.dia) : null;
          ( typeof data.horaInicio != "undefined" )? $('#u_error3').text(data.horaInicio) : null;
          ( typeof data.horaFin != "undefined" )? $('#u_error4').text(data.horaFin) : null;
        } else {   

          var obj = $.parseJSON(data);
 

          setTimeout(function() {
            Materialize.toast('<span>Registro exitoso</span>', 1500);
          }, 100); 
          
          window.location = "{{ url('/lsthorarios') }}";


        }             
        
    },

    error:function(){ 
        alert("error!!!!");
  }
  });

  });


 
         
  </script>
@endsection

