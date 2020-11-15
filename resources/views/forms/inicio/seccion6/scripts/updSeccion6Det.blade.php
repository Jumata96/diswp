 
    <script>
      $('#updateSeccion6Det').click(function(e){
        e.preventDefault();    
        var $Input, $myForm; 
           // $Input = $('#archivo');
            $myForm = $('#myForm');  
          var formData = new FormData();  
          formData.append('imagen', $('#imagen')[0].files[0]); 
          $.ajax({
            beforeSend: function (xhr) {
               var token = $('meta[name="csrf-token"]').attr('content'); 
               if (token) {
                   return xhr.setRequestHeader('X-CSRF-TOKEN', token);
               }
            },
            url: "{{ url('/seccion6Det/actualizarDet') }}" + '?' + $myForm.serialize(),
            method: 'POST',               
            data: formData,
            processData: false,
            contentType: false,
    
            success:function(data){
      
              if ( data[0] == "error") {
                 ( typeof data.imagen != "undefined" )? $('#u_error1').text(data.imagen) : null;  
                ( typeof data.titulo != "undefined" )? $('#u_error2').text(data.titulo) : null;  
                ( typeof data.descripcion != "undefined" )? $('#u_error3').text(data.descripcion) : null; 
                ( typeof data.tipo != "undefined" )? $('#u_error4').text(data.tipo) : null; 
              } else {
     
    
                setTimeout(function() {
                  Materialize.toast('<span>Registro exitoso</span>', 1500);
                }, 100);
                  // window.location = "{{ url('/inicio') }}";
    
              }
    
            },
             error:function(){ 
               //alert("no se cargo ningun archivo");
               $('#h_error1').text('');  
                $('#h_error2').text('');
                $('#h_error3').text(''); 
           } 
          }) 
      }); 
    </script>