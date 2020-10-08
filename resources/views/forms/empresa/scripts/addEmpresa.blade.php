<script type="text/javascript">
      //---JPaiva-12-08-2018----------------GRABAR-----------------------------
    
    $('#add').click(function(e){
      e.preventDefault();
      
      var data = $('#myForm').serializeArray();
      //data.push({name: 'tienn2t', value: 'love'});
      //var formData = new FormData();
      //formData.append('url_imagen', $('#avatarInput')[0].files[0]);
      var formData = new FormData();
      formData.append('imagenURL', $('#imagenURL')[0].files[0]);
      
      console.log(formData);

        $.ajax({
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                url: "{{ url('/empresa/actualizar') }}" + '?' + $('#myForm').serialize(),
                method: "POST",               
                data: formData,
                processData: false,
                contentType: false
            }).done(function (data) {
              
                if (data.success)
                    //$avatarImage.attr('src', data.path);
                   window.location="{{ url('/empresa') }}";
                    
            }).fail(function () {
                alert('La imagen subida no tiene un formato correcto');
            });
    });    

</script>