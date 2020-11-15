 <script>
      $("#addSeccion2").click(function(e) {
        e.preventDefault();
        var data = $('#formSection2').serializeArray();
        $.ajax({
        url: "{{ url('/seccion2/grabar') }}",
        type: "POST",
        beforeSend: function(xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        type: 'POST',
        url: "{{ url('/seccion2/grabar') }}",
        data: data,

        success: function(data) {

            if (data[0] == "error") {
            (typeof data.general != "undefined") ? $('#g_error1').text(data.general): null;
            (typeof data.descripcion != "undefined") ? $('#g_error2').text(data.descripcion): null;
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