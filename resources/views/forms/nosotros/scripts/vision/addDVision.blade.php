<script type="text/javascript">
      //---JPaiva-31-07-2018----------------GRABAR-----------------------------
    $('#limpiar').click(function(e){
      e.preventDefault();

      $('#error').text('');
      $('#error2').text('');
      $('#error3').text('');
    });

    $('#add').click(function(e){
      e.preventDefault();

      var val = $('#comodin').data('valor');
      var data = $('#myForm').serializeArray();
      //data.push({name: 'tienn2t', value: 'love'});
      //var formData = new FormData();
      //formData.append('url_imagen', $('#avatarInput')[0].files[0]);
            
      if(val == '0'){
        $.ajax({
            url: "{{ url('/dvision/grabar') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/dvision/grabar') }}",
           data:data,

           success:function(data){              

              console.log(data);
              if ( data[0] == "error") {
                ( typeof data.imagen != "undefined" )? $('#error').text(data.imagen) : null;
                ( typeof data.titulo != "undefined" )? $('#error2').text(data.titulo) : null;
                ( typeof data.descripcion != "undefined" )? $('#error3').text(data.descripcion) : null;
              } else {  
                var obj = $.parseJSON(data); 


                $('#cAddDVision').trigger('click');

                window.location="{{ url('/vision') }}";
              }
           },
           error:function(){ 
              alert("error!!!!");
        }
        });  
      }

       if(val == '1'){
        var formData = new FormData();
        formData.append('imagenURL', $('#pruebaImagen')[0].files[0]);
      
      console.log(formData);

        $.ajax({
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                url: "{{ url('/dvision/imgGrabar') }}" + '?' + $('#myForm').serialize(),
                method: "POST",               
                data: formData,
                processData: false,
                contentType: false
            }).done(function (data) {
              
                if (data.success)
                    //$avatarImage.attr('src', data.path);
                   window.location="{{ url('/vision') }}";
                    
            }).fail(function () {
                alert('La imagen subida no tiene un formato correcto');
            });
      }  


    });    

</script>