<script type="text/javascript">
  //----JPaiva-30-07-2018------------------DESABILITAR---------------------------
    @foreach ($productos as $val)
        $('#d{{$val->codigo}}').click(function(e){
          e.preventDefault();

          id = $(this).data('iddesabilitar');

          $.ajax({
                url: "{{ url('/producto/desabilitar') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/producto/desabilitar') }}",
               data:{
                  id:id
               },

               success: function(data){

              if ( data[0] == "error") {
                ( typeof data.descripcion != "undefined" )? $('#u_error2').text(data.descripcion) : null;
              } else {  
                var obj = $.parseJSON(data); 

                $('#tr'+obj[0]['codigo']).replaceWith(
                "<td>"+ obj[0]['codigo'] +"</td>"+                
                "<td class='center'>"+
                  "<img src='{{asset('/')}}"+obj[0]['url_imagen']+"' class='circle responsive-img valign profile-image teal lighten-5' style='height: 50px; width: 50px'>"+
                "</td>"+
                "<td>"+ obj[0]['codigo'] +"</td>"+
                "<td>"+ obj[0]['idgrupo'] +"</td>"+
                "<td>"+ obj[0]['idprov'] +"</td>"+
                "<td>"+ obj[0]['descripcion'] +"</td>"+
                "<td>"+ obj[0]['stock'] +"</td>"+
                "<td class='center'>"+
                    "<div id='hestado' class='chip center-align' style='width: 70%'>"+
                      "<b>NO DISPONIBLE</b>"+
                      "<i class='material-icons'></i>"+
                    "</div>"+
                "</td>"+
                "<td class='center'>"+
                   "<a href='{{ url('/producto/mostrar') }}/"+obj[0]['codigo']+"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped' data-position='top' data-delay='500' data-tooltip='Ver'><i class='material-icons' style='color: #7986cb'>visibility</i></a>"+                                     
                  " <a href='#confirmacion"+ obj[0]['codigo'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger' data-position='top' data-delay='500' data-tooltip='Eliminar'><i class='material-icons' style='color: #dd2c00'>remove</i></a>"+
                  " <a href='#confirmacion3"+ obj[0]['codigo'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger' data-position='top' data-delay='500' data-tooltip='Habilitar'><i class='material-icons' style='color: #2e7d32'>check</i></a>"+
                "</td>"
                );}
                
                
                setTimeout(function() {
                  Materialize.toast('<span>Registro desabilidado</span>', 1500);
                }, 100);  

               },
               error:function(){ 
                  alert("error!!!!");
            }
            });
        });    
          
    @endforeach

   
</script>