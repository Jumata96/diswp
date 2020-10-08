<script type="text/javascript">
      //---JPaiva-13-08-2018----------------GRABAR-----------------------------
   
    $('#update').click(function(e){
      e.preventDefault();

      
      var data = $('#myForm').serializeArray();
      //data.push({name: 'tienn2t', value: 'love'});
      //var formData = new FormData();
      //formData.append('url_imagen', $('#avatarInput')[0].files[0]);
      console.log(data);
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

              console.log(data);
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