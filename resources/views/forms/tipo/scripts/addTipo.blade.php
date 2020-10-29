<script type="text/javascript">
	//------JPaiva--06-08-2018-------------GRABAR-----------------------------------
    $('#limpiar').click(function(e){
      e.preventDefault();

      $('#error').text('');
      $('#error2').text('');
      $('#error3').text('');
    });

    $("#add").click(function(e){
        e.preventDefault();

        //var _token = $("input[name=_token]").val();
        var data = $('#myForm').serializeArray();

        $.ajax({
            url: "{{ url('/tipo/grabar') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/tipo/grabar') }}",
           data:data,

           success:function(data){
              
              if ( data[0] == "error") {
                ( typeof data.idgrupo != "undefined" )? $('#error1').text(data.idgrupo) : null;
                ( typeof data.idtipo != "undefined" )? $('#error2').text(data.idtipo) : null;
                ( typeof data.descripcion != "undefined" )? $('#error3').text(data.descripcion) : null;
              } else {   

                var obj = $.parseJSON(data);

                $("#tableTipo").append("<tr class='tr"+ obj[0]['idtipo'] +"'>"+
                "<td>"+ obj[0]['idgrupo'] +"</td>"+
                "<td>"+ obj[0]['idgrupo'] +"</td>"+
                "<td>"+ obj[0]['idtipo'] +"</td>"+
                "<td>"+ obj[0]['descripcion'] +"</td>"+
                "<td>"+
                    "<div id='u_estado2' class='badge green lighten-5 green-text text-accent-4' style='width: 70%'>"+
                      "<b>ACTIVO</b>"+
                      "<i class='material-icons'></i>"+
                    "</div>"+
                "</td>"+
                "<td class='center'>"+
                  "<a href='{{ url('/tipo/mostrar') }}/"+ obj[0]['idtipo'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped' data-position='top' data-delay='500' data-tooltip='Ver'><i class='material-icons' style='color: #7986cb'>visibility</i></a>"+                                     
                  " <a href='#confirmacion"+ obj[0]['idtipo'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger' data-position='top' data-delay='500' data-tooltip='Eliminar'><i class='material-icons' style='color: #dd2c00'>remove</i></a>"+
                  " <a href='#p_confirmacion2"+ obj[0]['idtipo'] +"' class='btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger' data-position='top' data-delay='500' data-tooltip='Desabilitar'><i class='material-icons' style='color: #757575 '>clear</i></a>"+
                "</td>"+
                "</tr>");

                //alert(data.success);
                $('#cerrar').trigger('click');


                setTimeout(function() {
                  Materialize.toast('<span>Registro exitoso</span>', 1500);
                }, 100); 


              }

              
              
           },

           error:function(){ 
              alert("error!!!!");
        }
        });
  });

    
</script>

<script type="text/javascript">
  //----------------------vARIOS DATATABLE--------------------
    $(document).ready(function() {
    $('table.display').DataTable();
} );
</script>
