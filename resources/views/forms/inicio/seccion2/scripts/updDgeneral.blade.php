 <script>
     
      $(".btnActualizarSub").click(function(e) { 
        e.preventDefault();  
        	var id_sub = $(this).attr("data-id"); 
            var titulo_sub = $(this).attr("data-titulo");
            var descripcion_sub = $(this).attr("data-descripcion"); 
        console.log(id_sub ,titulo_sub ,descripcion_sub );

        $("#id_Titulo_modal_upd").val(id_sub);
        $("#tituloSubtituloU").val(titulo_sub);
        $("#descripcionSubtituloU").text(descripcion_sub); 
        $("#modificarSub").modal('open');
         $("#updDgeneral").click(function(e) { 
        e.preventDefault();  
        console.log("ingreso");
        var dataUpdSub = $('#formSubtitulosUpd').serializeArray(); 
        $.ajax({
        url: "{{ url('/seccion2/actualizarD') }}",
        type: "POST",
        beforeSend: function(xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        type: 'POST',
        url: "{{ url('/seccion2/actualizarD') }}",
        data: dataUpdSub,

        success: function(data) {

            if (data[0] == "error") {
            (typeof data.tituloSubtituloU != "undefined") ? $('#g_error1').text(data.tituloSubtituloU): null;
            (typeof data.descripcionSubtituloU != "undefined") ? $('#g_error2').text(data.descripcionSubtituloU): null;
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

        
 
      });
 </script>