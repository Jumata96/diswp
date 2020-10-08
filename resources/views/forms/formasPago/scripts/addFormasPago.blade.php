<script type="text/javascript">
      //---JPaiva-12-09-2018----------------GRABAR-----------------------------
 /*   $('#addFPago').click(function(e){
      e.preventDefault();
      $('#error1').text('');
      $('#error2').text('');
      $('#error3').text('');
      $('#error4').text('');
    });
  */

    $('#add').click(function(e){
      e.preventDefault();

      var data = $('#myForm').serializeArray();
      
      var formData = new FormData();
      formData.append('imagenURL', $('#pruebaImagen')[0].files[0]);
      
        $.ajax({
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                url: "{{ url('/fpago/grabar') }}" + '?' + $('#myForm').serialize(),
                method: "POST",               
                data: formData,
                processData: false,
                contentType: false
            }).done(function (data) {
              
                if ( data[0] == "error") {
                ( typeof data.titular != "undefined" )? $('#error1').text(data.titular) : null;
                ( typeof data.numero_cta != "undefined" )? $('#error2').text(data.numero_cta) : null;
                ( typeof data.banco != "undefined" )? $('#error3').text(data.banco) : null;
                ( typeof data.moneda != "undefined" )? $('#error4').text(data.moneda) : null;
              }

                if (data.success)
                    //$avatarImage.attr('src', data.path);
                   window.location="{{ url('/formas-de-pago') }}";
                    
            }).fail(function () {
                alert('La imagen subida no tiene un formato correcto');
            });

    });    

</script>