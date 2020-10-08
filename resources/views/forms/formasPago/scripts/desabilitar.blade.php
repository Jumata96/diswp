<script type="text/javascript">
  //----JPaiva-31-07-2018------------------DESABILITAR---------------------------
    @foreach ($fpago as $val)
        $('#d{{$val->codigo}}').click(function(e){
          e.preventDefault();

          id = $(this).data('iddesabilitar');

          $.ajax({
                url: "{{ url('/fpago/desabilitar') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/fpago/desabilitar') }}",
               data:{
                  id:id
               },

               success: function(data){
                  
                setTimeout(function() {
                  Materialize.toast('<span>Registro desabilitado</span>', 1500);
                }, 100);  

                window.location="{{ url('/formas-de-pago') }}";
              },
               error:function(){ 
                  alert("error!!!!");
            }
            });
          });
        
          
  @endforeach

   
</script>