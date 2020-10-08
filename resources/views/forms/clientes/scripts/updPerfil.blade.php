<script type="text/javascript">
      //---JPaiva-27-08-2018----------------ACTUALIZAR-----------------------------
    $('#update').click(function(e){
      e.preventDefault();

      var data = $('#myForm').serializeArray();
      console.log(data);

      $.ajax({
            url: "{{ url('/perfil/actualizar') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/perfil/actualizar') }}",
           data:data,

           success:function(data){
              
              if ( data[0] == "error") {
                ( typeof data.ruc != "undefined" )? $('#error1').text(data.ruc) : null;
                ( typeof data.razon_social != "undefined" )? $('#error2').text(data.razon_social) : null;
                ( typeof data.nombre != "undefined" )? $('#error3').text(data.nombre) : null;
                ( typeof data.apellidos != "undefined" )? $('#error4').text(data.apellidos) : null;
                ( typeof data.usuario != "undefined" )? $('#error5').text(data.usuario) : null;
                ( typeof data.email != "undefined" )? $('#error6').text(data.email) : null;
                ( typeof data.telefono != "undefined" )? $('#error7').text(data.telefono) : null;
                ( typeof data.direccion != "undefined" )? $('#error8').text(data.direccion) : null;
              } else {  
                var obj = $.parseJSON(data); 

                setTimeout(function() {
                  Materialize.toast('<span>Perfil actualizado</span>', 1500);
                }, 100);  
              }
           },
           error:function(){ 
              alert("error!!!!");
        }
      });    

    });    

</script>