<script>
    /* $(document).ready(function(){
      $('#horaInicio').timepicker();
      $('#horaFin').timepicker(); 
    }); */
  $("#add_Horario").click(function(e){
    e.preventDefault();

    //var _token = $("input[name=_token]").val();
  var data = $('#formCursos').serializeArray();

    $.ajax({
        url: "{{ url('/horarios/grabar') }}",
        type:"POST",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
      type:'POST',
      url:"{{ url('/horarios/grabar') }}",
      data:data,

      success:function(data){
          
          if ( data[0] == "error") {
            ( typeof data.dia != "undefined" )? $('#u_error2').text(data.dia) : null;
            ( typeof data.horaInicio != "undefined" )? $('#u_error3').text(data.horaInicio) : null;
            ( typeof data.horaFin != "undefined" )? $('#u_error4').text(data.horaFin) : null;
          } else {   

            var obj = $.parseJSON(data);
  

            setTimeout(function() {
              Materialize.toast('<span>Registro exitoso</span>', 1500);
            }, 100); 
            
            window.location = "{{ url('/lsthorarios') }}";


          }             
          
      },

      error:function(){ 
          alert("error!!!!");
    }
    });

    });


 
         
  </script>