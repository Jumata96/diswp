<script type="text/javascript">
      //---JPaiva-12-09-2018----------------ACTUALIZAR-----------------------------
    $('#u_FPago').click(function(e){
      e.preventDefault();

      var data = $('#u_myForm').serializeArray();
      console.log('prueba');
      var formData = new FormData();
      formData.append('url_imagen', $('#u_imagenURL')[0].files[0]);
        
        $.ajax({
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                url: "{{ url('/fpago/actualizar') }}" + '?' + $('#u_myForm').serialize(),
                method: "POST",               
                data: formData,
                processData: false,
                contentType: false
            }).done(function (data) {
              
                if (data.success)
                    //$avatarImage.attr('src', data.path);
                   window.location="{{ url('/formas-de-pago') }}";
                    
            }).fail(function () {
                alert('La imagen subida no tiene un formato correcto');
            });
    });   

    @foreach ($fpago as $val)
      $(document).on('click','#updFPago{{$val->codigo}}', function(){
console.log($(this).data('codigo'));
        var imagen = $(this).data('imagen');
        var tipo = $(this).data('tipo_cta');
        
        if(imagen.length > 0){
          val = "{{url('/images')}}"+"/"+ $(this).data('imagen'); 
          $('#u_imagen_scr').hide();
          $('#u_img').show();
        }else{
          $('#u_imagen_scr').show();
          $('#u_img').hide();
        }
                
        $("#u_id").val($(this).data('codigo'));
        $("#u_banco").val($(this).data('banco'));
        $("#u_titular").val($(this).data('titular'));
        $("#u_numero_cta").val($(this).data('numero_cta'));
        $("#u_imagen").val($(this).data('imagen'));
        $("#u_moneda").val($(this).data('moneda'));
        $("#u_img").attr('src',val);
        $("#u_glosa").text($(this).data('glosa'));

        if (tipo == 'MNA') {
          
          $("#test3").attr('checked', true);
          $('#test4').removeAttr('checked');
          
          
          
          
        }
        if (tipo == 'MEX') {
          $('#u_img').show();
          $('#u_imagen_scr').hide();
          $("#test4").attr('checked', true);
          $('#test3').removeAttr('checked');
        }

        if($(this).data('estado') === 0){
          $('#u_estado').hide();
          $('#u_estado2').show();
        }else{
          $('#u_estado2').hide();
          $('#u_estado').show();
        }

      });      
    @endforeach 

</script>