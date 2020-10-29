<script type="text/javascript">
      //---JPaiva-06-08-2018----------------ACTUALIZAR-----------------------------
    $('#updDet').click(function(e){
      e.preventDefault();

      var data = $('#u_myForm').serializeArray();

      $.ajax({
            url: "{{ url('/contactanos/dActualizar') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/contactanos/dActualizar') }}",
           data:data,

           success:function(data){
              
              if ( data[0] == "error") {
                ( typeof data.titulo != "undefined" )? $('#u_error').text(data.titulo) : null;
                ( typeof data.descripcion != "undefined" )? $('#u_error2').text(data.descripcion) : null;
                ( typeof data.icono != "undefined" )? $('#u_error3').text(data.icono) : null;
              } else {  
                var obj = $.parseJSON(data); 

                $('#tr'+obj[0]['id']).replaceWith(
                "<td>"+ obj[0]['id'] +"</td>"+
                "<td>"+ obj[0]['id'] +"</td>"+
                "<td>"+ obj[0]['titulo'] +"</td>"+
                "<td>"+ obj[0]['descripcion'] +"</td>"+
                "<td>"+ obj[0]['fecha_creacion'] +"</td>"+
                "<td>"+
                    "<div id='u_estado2' class='badge green lighten-5 green-text text-accent-4' style='width: 70%'>"+
                      "<b>ACTIVO</b>"+
                      "<i class='material-icons'></i>"+
                    "</div>"+
                "</td>"+
                "<td class='center' style='width: 9rem'>"+
                  "<a href='{{ url('/contactanos/mostrar') }}/"+obj[0]['id']+"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped' data-position='top' data-delay='500' data-tooltip='Ver'><i class='material-icons' style='color: #7986cb'>visibility</i></a>"+                                     
                  " <a href='#confirmacion"+ obj[0]['id'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger' data-position='top' data-delay='500' data-tooltip='Eliminar'><i class='material-icons' style='color: #dd2c00'>remove</i></a>"+

                  " <a href='#confirmacion2"+ obj[0]['id'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger' data-position='top' data-delay='500' data-tooltip='Desabilitar'><i class='material-icons' style='color: #757575'>clear</i></a>"+
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
    

    @foreach ($dcontactanos as $val)
      $(document).on('click','#updDetalle{{$val->id}}', function(){

        var activo = $(this).data('activo');

        $("#u_id").val($(this).data('id'));
        $("#u_icono").val($(this).data('icono'));
        $("#u_imagen").text($(this).data('icono'));
        $("#u_titulo").val($(this).data('titulo'));
        $("#u_descripcion").val($(this).data('descripcion'));
        
        if(activo == 1){
          $('#u_activo').attr('checked',true);
        }else{
          $('#u_activo').removeAttr('checked');
        }

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

