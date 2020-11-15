 <script>
      $("#addSeccion1").click(function(e) {
        e.preventDefault();
        var data = $('#formSection1').serializeArray();
        $.ajax({
        url: "{{ url('/seccion1/actualizar') }}",
        type: "POST",
        beforeSend: function(xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        type: 'POST',
        url: "{{ url('/seccion1/actualizar') }}",
        data: data,

        success: function(data) { 
            if (data[0] == "error") {
            (typeof data.seccion1_descripcion != "undefined") ? $('#seccion1_error').text(data.seccion1_descripcion): null; 
            } else {
            setTimeout(function() {
            Materialize.toast('<span>Registro exitoso</span>', 1500);
            }, 100);
              window.location = "{{ url('/inicio') }}"; 
            }

        },

        error: function() {
            alert("error!!!!");
        }
        });

        });
 </script>