<script>
    /* $(document).ready(function(){
      $('#horaInicio').timepicker();
      $('#horaFin').timepicker(); 
    }); */
  $("#add_Horario").click(function(e){
    e.preventDefault();

    //var _token = $("input[name=_token]").val();
    // document.getElementById('HIDDEN-INPUT').value = document.getElementById('Dias').innerHTML;
    console.log( $('.chips-initial').material_chip('data'));
    let dias = [ ];
    dias=$('.chips-initial').material_chip('data');
  
    if(dias.length>1){
      $('#formCursos').append("<input type='hidden' name='dias' value='si' />");
    }else{
      $('#formCursos').append("<input type='hidden' name='dias' value='' />");
    } 
    
   let dias_horario="";
   if(dias.length == 1){
     for (y=0;y<dias.length; y++) {  
      dias_horario=dias[y].tag ; 
     } 
   }else {
    for (y=0;y<dias.length; y++) { 
      if(y==dias.length-1){
        dias_horario  +=" y "+dias[y].tag;
      }else if(y==0){ 
        dias_horario  +=dias[y].tag;
      }else{ 
        dias_horario  +=" , "+dias[y].tag;
      }

    } 
   } 
   $('#formCursos').append("<input type='hidden' name='dias' value='"+dias_horario+"' />");    
         

  var data = $('#formCursos').serializeArray();
                         

    $.ajax({
        url: "{{ url('/horarios/update') }}",
        type:"POST",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
      type:'POST',
      url:"{{ url('/horarios/update') }}",
      data:data,

      success:function(data){
          
          if ( data[0] == "error") {
            ( typeof data.dias != "undefined" )? $('#u_error2').text(data.dias) : null; 
            ( typeof data.detalle != "undefined" )? $('#u_error3').text(data.detalle) : null; 
            
          } else {    
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
