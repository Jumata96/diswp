<script type="text/javascript">
      //---JPaiva-25-08-2018----------------ACTUALIZAR-----------------------------
    $('#update').click(function(e){
      e.preventDefault();

      var val = $('#comodin').data('valor');
      var data = $('#formMision').serializeArray();
      //data.push({name: 'tienn2t', value: 'love'});
      //var formData = new FormData();
      //formData.append('url_imagen', $('#avatarInput')[0].files[0]);
      
      console.log(data);
      console.log("prueba");

      if (val == '0') {
         $.ajax({
            url: "{{ url('/nosotros/actualizar') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/nosotros/actualizar') }}",
           data:data,

           success:function(data){
              
              if ( data[0] == "error") {
                ( typeof data.titulo != "undefined" )? $('#u_error2').text(data.posicion) : null;
                ( typeof data.posicion != "undefined" )? $('#u_error3').text(data.posicion) : null;
              } else {  
                var obj = $.parseJSON(data); 

                setTimeout(function() {
                  Materialize.toast('<span>Registro actualizado</span>', 1500);
                }, 100);  
              }
           },
           error:function(){ 
              alert("error!!!!");
        }
        });
      }

    if(val == '1'){
        var formData = new FormData();
        formData.append('url_imagen', $('#u_imagenURL')[0].files[0]);
        console.log(formData);
      //console.log(data);,

        $.ajax({
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                url: "{{ url('nosotros/iactualizar') }}" + '?' + $('#formMision').serialize(),
                method: "POST",               
                data: formData,
                processData: false,
                contentType: false
            }).done(function (data) {
              
                if (data.success)
                    //$avatarImage.attr('src', data.path);
                   window.location="{{ url('/mntNosotros') }}";
                    
            }).fail(function () {
                alert('La imagen subida no tiene un formato correcto');
            });
      } 


    });    

</script>