<script type="text/javascript">
      //---JPaiva-28-09-2018----------------ACEPTAR-----------------------------
    $('#btnFacturacion').click(function(e){
      e.preventDefault();

      var data = $('#formFac').serializeArray();

      $.ajax({
            url: "{{ url('/btnFacturacion') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/btnFacturacion') }}",
           data:data,

           success:function(data){
              
              if ( data[0] == "error") {
                //( typeof data.facturacion != "undefined" )? $('#error1').text(data.facturacion) : null;
                ( typeof data.facturacion != "undefined" )? $('#error1').text("Seleccione una opción") : null;
                ( typeof data.f_descripcion != "undefined" )? $('#error2').text("Este campo es obligatorio") : null;
              } else {  
                var obj = $.parseJSON(data); 

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