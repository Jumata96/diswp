<script type="text/javascript">
      //---JPaiva-06-08-2018----------------ACTUALIZAR-----------------------------
    $('#upd').click(function(e){
      e.preventDefault();

      var data = $('#u_myForm').serializeArray();

      $.ajax({
            url: "{{ url('/tipo/actualizar') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/tipo/actualizar') }}",
           data:data,

           success:function(data){
              
              if ( data[0] == "error") {
                ( typeof data.idgrupo != "undefined" )? $('#u_error1').text(data.idgrupo) : null;
                ( typeof data.descripcion != "undefined" )? $('#u_error2').text(data.descripcion) : null;
              } else {  
                var obj = $.parseJSON(data); 

                $('#tr'+obj[0]['idtipo']).replaceWith(
                "<td>"+ obj[0]['idgrupo'] +"</td>"+
                "<td>"+ obj[0]['idgrupo'] +"</td>"+
                "<td>"+ obj[0]['idtipo'] +"</td>"+
                "<td>"+ obj[0]['descripcion'] +"</td>"+
                "<td>"+
                    "<div id='u_estado2' class='chip center-align teal accent-4 white-text' style='width: 70%'>"+
                      "<b>ACTIVO</b>"+
                      "<i class='material-icons'></i>"+
                    "</div>"+
                "</td>"+
                "<td class='center' style='width: 9rem'>"+
                  "<a href='{{ url('/tipo/mostrar') }}/"+obj[0]['idtipo']+"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped' data-position='top' data-delay='500' data-tooltip='Ver'><i class='material-icons' style='color: #7986cb'>visibility</i></a>"+                                     
                  " <a href='#confirmacion"+ obj[0]['idtipo'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger' data-position='top' data-delay='500' data-tooltip='Eliminar'><i class='material-icons' style='color: #dd2c00'>remove</i></a>"+

                  " <a href='#confirmacion2"+ obj[0]['idtipo'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger' data-position='top' data-delay='500' data-tooltip='Desabilitar'><i class='material-icons' style='color: #757575'>clear</i></a>"+
                "</td>"
                );
                //alert(data.success);

                //$('#updTipoAcceso').hide();
                $('#u_cerrar').trigger('click');

                setTimeout(function() {
                  Materialize.toast('<span>Registro actualizado</span>', 1500);
                }, 100);  
              }
           },
           error:function(){ 
              alert("error!!!!");
        }
        });


    });    
    

    @foreach ($tipo as $val)
      $(document).on('click','#updTipo{{$val->idtipo}}', function(){
        $("#u_id").val($(this).data('idtipo'));
        $("#u_idgrupo").val($(this).data('idgrupo'));
        $("#u_idtipo").val($(this).data('idtipo'));
        $("#u_descripcion").val($(this).data('descripcion'));
        $("#u_glosa").val($(this).data('glosa'));
console.log('entro');
        if($(this).data('estado') == 1){
          $('#u_estado').hide();
          $('#u_estado2').show();
        }else{
          $('#u_estado2').hide();
          $('#u_estado').show();
        }

      });      
    @endforeach

 
</script>

