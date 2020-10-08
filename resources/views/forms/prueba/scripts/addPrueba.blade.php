<script type="text/javascript">
      //---JPaiva-01-10-2018----------------GRABAR-----------------------------
   
    $('#add').click(function(e){
      e.preventDefault();
      console.log('pruebaa...');

      var data = $('#myForm').serializeArray();
      
      $.ajax({
            url: "{{ url('/prueba/grabar') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/prueba/grabar') }}",
           data:data,

           success:function(data){              

              console.log(data);
              if ( data[0] == "error") {
                ( typeof data.idempresa != "undefined" )? $('#error1').text(data.idempresa) : null;
                ( typeof data.descripcion != "undefined" )? $('#error2').text(data.descripcion) : null;
              } else {  
               
                window.location="{{ url('/prueba') }}";
              }
           },
           error:function(){ 
              alert("error!!!!");
        }
        });

  

    });    

</script>