<script type="text/javascript">
      //---JPaiva-13-08-2018----------------GRABAR-----------------------------
     /*  CKEDITOR.instances["editor1"].on('change', function() {  
          $('#horario').val(this.getData())
      });
    */
    $('#update').click(function(e){
      e.preventDefault();
      $('#horario').val(CKEDITOR.instances["editor1"].getData() ); 
      var data = $('#myForm').serializeArray(); 
      console.log(data,CKEDITOR.instances["editor1"].getData() );
      $.ajax({
            url: "{{ url('/contactanos/actualizar') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/contactanos/actualizar') }}",
           data:data,

           success:function(data){      
              if ( data[0] == "error") {
                
                ( typeof data.descripcion != "undefined" )? $('#error3').text(data.descripcion) : null;
              } else {  
               
                //window.location="{{ url('/contactanos') }}";
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

</script>