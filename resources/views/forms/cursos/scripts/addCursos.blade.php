<script>
    $("#add_cursos").click(function(e){
      e.preventDefault();
  
      //var _token = $("input[name=_token]").val();
      var data = $('#formCursos').serializeArray();
  
      $.ajax({
          url: "{{ url('/Cursos/grabar') }}",
          type:"POST",
          beforeSend: function (xhr) {
              var token = $('meta[name="csrf-token"]').attr('content');
  
              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
        type:'POST',
        url:"{{ url('/Cursos/grabar') }}",
        data:data,
  
        success:function(data){
  
            if ( data[0] == "error") {
  
              ( typeof data.titulo != "undefined" )? $('#u_error2').text(data.titulo) : null;
              ( typeof data.descripcion != "undefined" )? $('#u_error3').text(data.descripcion) : null;
              ( typeof data.horario != "undefined" )? $('#u_error4').text(data.horario) : null;
            } else {
  
              var obj = $.parseJSON(data);
  
  
              setTimeout(function() {
                Materialize.toast('<span>Registro exitoso</span>', 1500);
              }, 100);
              window.location = "{{ url('/lstCursos') }}";
  
            }
  
        },
  
        error:function(){
            alert("error!!!!");
        }
      });
  
      });
  
  
  
  
    </script>