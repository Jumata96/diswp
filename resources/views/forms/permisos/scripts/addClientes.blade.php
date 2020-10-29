<script>
	$('.btnSeleccionarCliente').on('click',function () { 
		var dataId = $(this).attr("data-id"); 
    console.log(dataId,"registrar");
		var idCurso = $("input[name=idCurso]").val(); 
		console.log(dataId,idCurso);
		$.ajax({
          url: "{{ url('/permisos/gestionarClientes') }}",
          type:"POST",
          beforeSend: function (xhr) {
              var token = $('meta[name="csrf-token"]').attr('content');
  
              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
        type:'POST',
        url:"{{ url('/permisos/gestionarClientes') }}",
        data:{
			idCliente:dataId,
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