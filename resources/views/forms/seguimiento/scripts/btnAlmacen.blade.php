<script type="text/javascript">
      //---JPaiva-28-09-2018----------------ACEPTAR-----------------------------
    $('#btnAlmacen').click(function(e){
      e.preventDefault();

      var data = $('#formAlm').serializeArray();

      $.ajax({
            url: "{{ url('/btnAlmacen') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/btnAlmacen') }}",
           data:data,

           success:function(data){
              
              if ( data[0] == "error") {
                //( typeof data.facturacion != "undefined" )? $('#error1').text(data.facturacion) : null;
                ( typeof data.almacen != "undefined" )? $('#error3').text("Seleccione una opción") : null;
                ( typeof data.a_descripcion != "undefined" )? $('#error4').text("Este campo es obligatorio") : null;
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