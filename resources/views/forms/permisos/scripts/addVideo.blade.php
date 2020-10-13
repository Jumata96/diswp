<script>
	$('.btnSeleccionarVideo').on('click',function () { 
		var dataId = $(this).attr("data-id"); 
		var idCurso = $("input[name=idCurso]").val(); 
		console.log(dataId);
		$.ajax({
          url: "{{ url('/permisos/gestionar/videos') }}",
          type:"POST",
          beforeSend: function (xhr) {
              var token = $('meta[name="csrf-token"]').attr('content');
  
              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
        type:'POST',
        url:"{{ url('/permisos/gestionar/videos') }}",
        data:{
			idVideo:dataId,
			idCurso:idCurso
		},
  
        success:function(data){
			setTimeout(function() {
                Materialize.toast('<span>Registro exitoso</span>', 1500);
              }, 100);
              window.location = "{{ url('/permisos/gestionar') }}"+"/"+data.idCurso;   
        },
  
        error:function(){
            alert("error!!!!");
        }
      });

	});
</script>