 <script type="text/javascript">
    //---JPaiva-02-10-2018----------------GRABAR-----------------------------
    $(function () {
        var $Input, $myForm;
        
        $Input = $('#inputClientes');
        $myForm = $('#myForm');

     

        //$avatarInput.on('change', function () {
        $('#importClientes').on('click', function () {
            //alert('change');
            
            var formData = new FormData();
            formData.append('clientesXLS', $Input[0].files[0]);

            $.ajax({
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                url: "{{ url('clientes/import') }}" + '?' + $myForm.serialize(),
                method: 'POST',               
                data: formData,
                processData: false,
                contentType: false,

                 success: function(data){
                  
                setTimeout(function() {
                  Materialize.toast('<span>Importación de Clienes exitoso</span>', 2000);
                }, 200);  
              },
                 error:function(){ 
                    alert("error!!!!");
              }

            })
        });
    });

   
  </script>
    