<script type="text/javascript">
      //---JPaiva-14-08-2018----------------GUARDAR MENSAJES ENVIADOS DESDE LA PAGINA-----------------------------
   
    $('#enviar').click(function(e){
      e.preventDefault();

      
      var data = $('#myForm').serializeArray();
      //data.push({name: 'tienn2t', value: 'love'});
      //var formData = new FormData();
      //formData.append('url_imagen', $('#avatarInput')[0].files[0]);
      
      $.ajax({
            url: "{{ url('/mensajes/grabar') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/mensajes/grabar') }}",
           data:data,

           success:function(data){              

              console.log(data);
              if ( data[0] == "error") {
                ( typeof data.nombre != "undefined" )? $('#error').text(data.nombre) : null;
                ( typeof data.email != "undefined" )? $('#error2').text(data.email) : null;
                ( typeof data.mensaje != "undefined" )? $('#error3').text(data.mensaje) : null;
              } else {  
               
                //window.location="{{ url('/contactanos') }}";
                setTimeout(function() {
                  Materialize.toast('<span>Mensaje enviado</span>', 1500);
                }, 100);  


              }
           },
           error:function(){ 
              alert("error!!!!");
        }
      });


    });    

</script>