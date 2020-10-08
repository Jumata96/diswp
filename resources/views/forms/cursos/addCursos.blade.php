@extends('layouts2.app')
@section('titulo','Mantenedor de Cursos')

@section('main-content')
<br>

<div class="row">
  <div class="col s12 m12 l12">

                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>MANTENEDOR DE CURSOS</h2>
                  </div>
                 <form class="formValidate right-alert" id="formVideo" method="POST" action="{{ url('/carrusel/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a  id="add_video" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
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

                   

                  <div class="col m6 l6 offset-l3">
                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title">Datos Generales</span>

                            <div class="row">
                              
                              <div class="input-field col s12">
                                <i class="material-icons prefix">clear_all</i>
                                <input id="titulo" name="titulo" type="text" required data-error=".errorTxt2" maxlength="200" value="">
                                <label for="titulo">Título</label>
                                <div id="u_error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                              </div>
                              <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="descripcion" name="descripcion" required  class="materialize-textarea" lenght="200" style="height: 80px"></textarea>
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
	$('#add_video').click(function(e){
	  e.preventDefault();   
	  var $Input, $myForm;
        
       // $Input = $('#archivo');
        $myForm = $('#formVideo'); 
        
		  

      var formData = new FormData(); 
		  formData.append('archivo', $('#archivo')[0].files[0]);
      console.log( $('#archivo')[0].files[0]);


		 $.ajax({
				beforeSend: function (xhr) {
					 var token = $('meta[name="csrf-token"]').attr('content');

					 if (token) {
							 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
					 }
				},
				url: "{{ url('/carrusel/grabar') }}" + '?' + $myForm.serialize(),
				method: 'POST',               
				data: formData,
				processData: false,
				contentType: false,

				 success: function(data){
          if ( data[0] == "error") {
						$('#u_error1').text('');
						$('#u_error2').text('');
						$('#u_error3').text('');						 
						( typeof data.titulo != "undefined" )? $('#u_error2').text(data.iddocumento) && $('#titulo').focus() : null;
					 ( typeof data.iddocumento != "undefined" )? $('#u_error3').text(data.iddocumento) : null;  
					 }	 
					console.log(data);  
					 setTimeout(function() {
                  Materialize.toast('<span>DOCUEMNTO ADJUNTADO CORRECTAMENTE</span>', 2000);
                }, 200);  
			 },
				 error:function(){ 
					 alert("no se cargo ningun archivo"); 

			 }

		  })  
	}); 
  </script>
@endsection

