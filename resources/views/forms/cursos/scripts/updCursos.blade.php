{{-- <script>
    $("#upd_cursos").click(function(e){
      console.log("ingreso");
      e.preventDefault();
  
      //var _token = $("input[name=_token]").val();
      var data = $('#formCursos').serializeArray();
  
      $.ajax({
          url: "{{ url('/Cursos/update') }}",
          type:"POST",
          beforeSend: function (xhr) {
              var token = $('meta[name="csrf-token"]').attr('content');
  
              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
        type:'POST',
        url:"{{ url('/Cursos/update') }}",
        data:data,
  
        success:function(data){
  
            if ( data[0] == "error") {
  
              ( typeof data.titulo != "undefined" )? $('#u_error2').text(data.titulo) : null;
              ( typeof data.descripcion != "undefined" )? $('#u_error3').text(data.descripcion) : null;
              ( typeof data.horario != "undefined" )? $('#u_error4').text(data.horario) : null;
              ( typeof data.costo != "undefined" )? $('#u_error4').text(data.costo) : null;

            } else {  
              setTimeout(function() {
                Materialize.toast('<span>Registro exitoso</span>', 1500);
              }, 100);
              window.location = "{{ url('/lstCursos') }}";
  
            }
  
        },
  
        error:function(){
            alert("error!!!!");
      }
      });
  
      });
  
  
  
  
    </script> --}}
    <script>
      $('#upd_cursos').click(function(e){
        e.preventDefault();    
        var $Input, $myForm; 
           // $Input = $('#archivo');
            $myForm = $('#formCursos');  
          var formData = new FormData(); 
          formData.append('video', $('#video')[0].files[0]); 
          formData.append('imagen', $('#imagen')[0].files[0]); 
          $.ajax({
            beforeSend: function (xhr) {
               var token = $('meta[name="csrf-token"]').attr('content'); 
               if (token) {
                   return xhr.setRequestHeader('X-CSRF-TOKEN', token);
               }
            },
            url: "{{ url('/Cursos/update') }}" + '?' + $myForm.serialize(),
            method: 'POST',               
            data: formData,
            processData: false,
            contentType: false,
    
            success:function(data){
      
              if ( data[0] == "error") {
    
                ( typeof data.titulo != "undefined" )? $('#u_error1').text(data.titulo) : null; 
                ( typeof data.costo != "undefined" )? $('#u_error2').text(data.costo) : null;
                ( typeof data.tiempo != "undefined" )? $('#u_error4').text(data.tiempo) : null;
                ( typeof data.descripcion != "undefined" )? $('#u_error5').text(data.descripcion) : null;
                ( typeof data.imagen != "undefined" )? $('#u_error6').text(data.imagen) : null;
                ( typeof data.video != "undefined" )? $('#u_error7').text(data.video) : null;
              } else {
     
    
                setTimeout(function() {
                  Materialize.toast('<span>Registro exitoso</span>', 1500);
                }, 100);
                window.location = "{{ url('/lstCursos') }}";
    
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