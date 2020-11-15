 <script>
      $("#addDgeneral").click(function(e) { 
        e.preventDefault(); 
        var Titulo_id= $('#titulo_id').val();
        $('#id_Titulo_modal').val(Titulo_id);
        var data2 = $('#formSubtitulos').serializeArray(); 
        $.ajax({
        url: "{{ url('/seccion2/grabarD') }}",
        type: "POST",
        beforeSend: function(xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        type: 'POST',
        url: "{{ url('/seccion2/grabarD') }}",
        data: data2,

        success: function(data) {

            if (data[0] == "error") {
            (typeof data.tituloSubtitulo != "undefined") ? $('#g_error1').text(data.tituloSubtitulo): null;
            (typeof data.descripcionSubtitulo != "undefined") ? $('#g_error2').text(data.descripcionSubtitulo): null;
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