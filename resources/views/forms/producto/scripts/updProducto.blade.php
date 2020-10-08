<script type="text/javascript">
      //---JPaiva-06-08-2018----------------ACTUALIZAR-----------------------------
    $('#updProducto').click(function(e){
      e.preventDefault();

      //var data = $('#myForm').serializeArray();
      //data.push({name: 'tienn2t', value: 'love'});
      var formData = new FormData();
      formData.append('url_imagen', $('#avatarInput')[0].files[0]);
      
      //console.log(data);

      $.ajax({
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                url: "{{ url('/producto/actualizar') }}" + '?' + $('#avatarForm').serialize(),
                method: "POST",               
                data: formData,
                processData: false,
                contentType: false
            }).done(function (data) {
              
                if (data.success)
                    //$avatarImage.attr('src', data.path);
                   window.location="{{ url('/productos') }}";
                    
            }).fail(function () {
                alert('La imagen subida no tiene un formato correcto');
            });


    });    

    //--------JPaiva--07-08-2018--------------------------------------LISTAR PERFILES---------------------------------------------------------
     $('#idgrupo').change(function(e){
      var val = $("select[name=idgrupo]").val();
      
      $("#idtipo option[value=0]").attr("selected", true);

      if ( val != '0') {
        $.ajax({
            url: "{{ url('/getTipo') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/getTipo') }}",
           data:{
              idgrupo:val
           },

           success:function(data){
            
              //var obj = $.parseJSON(data); 
              $('#idtipo').empty();  
              $('#idtipo').removeAttr('disabled');
              //$('#h_dsc_perfil').removeAttr('disabled');  

              $('#idtipo').append("<option value='0' disabled selected>Seleccione un tipo</option>"); 

              $.each(data, function(i, item) {
                  $('#idtipo').append("<option value='"+item.idtipo+"'>"+item.descripcion+"</option>");
              });

           },
           error:function(){ 
              alert("error!!!!");
        }

        });           
      };
    });

</script>