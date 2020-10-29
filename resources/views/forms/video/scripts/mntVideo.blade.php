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
				window.location = "{{url('lstVideos')}}" ;   
			 },
				 error:function(){ 
					 alert("no se cargo ningun archivo"); 

			 }

		  })  
	}); 
</script>