 <script>
      $("#addSeccion6").click(function(e) {
        e.preventDefault();
        var dataSeccion6 = $('#formSection6').serializeArray();
        $.ajax({
        url: "{{ url('/seccion6/actualizar') }}",
        type: "POST",
        beforeSend: function(xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        type: 'POST',
        url: "{{ url('/seccion6/actualizar') }}",
        data: dataSeccion6,

        success: function(data) { 
            if (data[0] == "error") {
            (typeof data.titulo_seccion6 != "undefined") ? $('#error1_seccion6').text(data.titulo_seccion6): null; 
            (typeof data.descripcion_seccion6 != "undefined") ? $('#error2_seccion6').text(data.descripcion_seccion6): null; 
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