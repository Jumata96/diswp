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
                  <div class="col m6 l6  offset-l3 ">
                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title">Datos Generales</span>

                            <div class="row">
                              
                              <div class="input-field col s12">
                                <i class="material-icons prefix">today</i>
                                <input id="titulo" name="titulo" type="text" required data-error=".errorTxt2" maxlength="200" value="">
                                <label for="titulo">Día</label>
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
                                <div id="u_error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                              </div>    
                              <div class="input-field col s12">
                                <i class="material-icons prefix">chat</i>
                                <textarea id="descripcion" name="descripcion" required class="materialize-textarea"    lenght="200" style="height: 80px"></textarea>
                                <label for="descripcion" class="">Descripción </label>
                                <div id="u_error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
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
var data = $('#myForm2').serializeArray();

  $.ajax({
      url: "{{ url('/contactanos/dGrabar') }}",
      type:"POST",
      beforeSend: function (xhr) {
          var token = $('meta[name="csrf-token"]').attr('content');

          if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
      },
    type:'POST',
    url:"{{ url('/contactanos/dGrabar') }}",
    data:data,

    success:function(data){
        
        if ( data[0] == "error") {
          ( typeof data.titulo != "undefined" )? $('#error').text(data.titulo) : null;
          ( typeof data.descripcion != "undefined" )? $('#error2').text(data.descripcion) : null;
          ( typeof data.icono != "undefined" )? $('#error3').text(data.icono) : null;
        } else {   

          var obj = $.parseJSON(data);

          $("#tableDetalle").append("<tr class='tr"+ obj[0]['id'] +"'>"+
          "<td>"+ obj[0]['id'] +"</td>"+
          "<td>"+ obj[0]['id'] +"</td>"+
          "<td>"+ obj[0]['titulo'] +"</td>"+
          "<td>"+ obj[0]['descripcion'] +"</td>"+
          "<td>"+ obj[0]['fecha_creacion'] +"</td>"+
          "<td>"+
              "<div id='u_estado2' class='chip center-align teal accent-4 white-text' style='width: 70%'>"+
                "<b>ACTIVO</b>"+
                "<i class='material-icons'></i>"+
              "</div>"+
          "</td>"+
          "<td class='center'>"+
            "<a href='{{ url('/contactanos/dMostrar') }}/"+ obj[0]['id'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped' data-position='top' data-delay='500' data-tooltip='Ver'><i class='material-icons' style='color: #7986cb'>visibility</i></a>"+                                     
            " <a href='#confirmacion"+ obj[0]['id'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger' data-position='top' data-delay='500' data-tooltip='Eliminar'><i class='material-icons' style='color: #dd2c00'>remove</i></a>"+
            " <a href='#confirmacion2"+ obj[0]['id'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger' data-position='top' data-delay='500' data-tooltip='Desabilitar'><i class='material-icons' style='color: #757575 '>clear</i></a>"+
          "</td>"+
          "</tr>");

          //alert(data.success);
          $('#cerrar').trigger('click');


          setTimeout(function() {
            Materialize.toast('<span>Registro exitoso</span>', 1500);
          }, 100); 


        }             
        
    },

    error:function(){ 
        alert("error!!!!");
  }
  });

  });
         
  </script>
@endsection

