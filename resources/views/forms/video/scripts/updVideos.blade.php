<script>
	$('#upd_video').click(function(e){
	  e.preventDefault();    
        var data = $('#formVideo').serializeArray(); 
		  /* formData.append('archivo', $('#archivo')[0].files[0]); */
      console.log("ingreso");


		 $.ajax({
        url: "{{ url('/videos/update') }}",
        type:"POST",
				beforeSend: function (xhr) {
					 var token = $('meta[name="csrf-token"]').attr('content');

					 if (token) {
							 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
					 }
				},
				type:'POST',
        url:"{{ url('/videos/update') }}",
        data:data,

				 success: function(data){
          if ( data[0] == "error") {
              console.log("ingreso");
						$('#u_error2').text('');
						$('#u_error3').text('');						 
						( typeof data.titulo != "undefined" )? $('#u_error2').text(data.titulo) && $('#titulo').focus() : null;
					 ( typeof data.descripcion != "undefined" )? $('#u_error3').text(data.descripcion) : null;  
					 } 
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