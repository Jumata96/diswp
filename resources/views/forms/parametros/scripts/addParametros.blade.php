<script type="text/javascript">
    //---JPaiva-26-07-2018----------------ACTUALIZAR-----------------------------
    $('#update').click(function(e){
      e.preventDefault();
      
      @foreach($parametros as $val)
        var data = $('#myForm').serializeArray();
        console.log(data);
        $.ajax({
            url: "{{ url('/parametros/actualizar') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/parametros/actualizar') }}",
           data:data,

           success:function(data){
              

           },
           error:function(){ 
              alert("error!!!!");
        }
        });
  
      @endforeach

      setTimeout(function() {
        Materialize.toast('<span>Registro actualizado</span>', 1500);
      }, 100);  

    });


</script>