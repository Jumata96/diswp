<script>
	$('#upd_seccion4').click(function(e){
	  e.preventDefault();    
	  var $Input, $myForm; 
       // $Input = $('#archivo');
        $myForm = $('#formSeccion4');  
		  var formDataSeccion4 = new   FormData(); 
		  formDataSeccion4.append('imagen1', $('#input_imagen1')[0].files[0]); 
		  formDataSeccion4.append('imagen2', $('#input_imagen2')[0].files[0]); 
		  $.ajax({
				beforeSend: function (xhr) {
					 var token = $('meta[name="csrf-token"]').attr('content'); 
					 if (token) {
							 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
					 }
				},
				url: "{{ url('/seccion4/actualizar') }}" + '?' + $myForm.serialize(),
				method: 'POST',               
				data: formDataSeccion4,
				processData: false,
				contentType: false,

        success:function(data){
  
          if ( data[0] == "error") {

            ( typeof data.titulo != "undefined" )? $('#u_error1').text(data.titulo) : null; 
            ( typeof data.costo != "undefined" )? $('#u_error2').text(data.costo) : null;
            ( typeof data.tiempo != "undefined" )? $('#u_error4').text(data.tiempo) : null;
            ( typeof data.descripcion != "undefined" )? $('#u_error5').text(data.descripcion) : null;
            ( typeof data.imagen != "undefined" )? $('#u_error6').text(data.imagen) : null;
            ( typeof data.video != "undefined" )? $('#u_error7').text(data.video) : null;
          } else {
 

            setTimeout(function() {
              Materialize.toast('<span>Registro exitoso</span>', 1500);
            }, 100);
            window.location = "{{ url('/inicio') }}";

          }

        },
				 error:function(){ 
					 //alert("no se cargo ningun archivo");
					 $('#h_error1').text('');  
						$('#h_error2').text('');
						$('#h_error3').text(''); 
			 } 
		  }) 
	}); 
  </script> 
 
 
{{--  
 <script>
      $("#upd_seccion4").click(function(e) {
        e.preventDefault();
        var dataSeccion4 = $('#formSeccion4').serializeArray();
        $.ajax({
        url: "{{ url('/seccion4/actualizar') }}",
        type: "POST",
        beforeSend: function(xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        type: 'POST',
        url: "{{ url('/seccion4/actualizar') }}",
        data: dataSeccion4,

        success: function(data) { 
            if (data[0] == "error") {
            (typeof data.seccion1_descripcion != "undefined") ? $('#seccion1_error').text(data.seccion1_descripcion): null; 
            } else {
            setTimeout(function() {
            Materialize.toast('<span>Registro exitoso</span>', 1500);
            }, 100);
              // window.location = "{{ url('/inicio') }}"; 
            }

        },

        error: function() {
            alert("error!!!!");
        }
        });

        });
 </script> --}}