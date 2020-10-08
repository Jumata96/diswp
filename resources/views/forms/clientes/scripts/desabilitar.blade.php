<script type="text/javascript">
  //----JPaiva-01-10-2018------------------DESABILITAR---------------------------
    @foreach ($clientes as $val)
        $('#d{{$val->id}}').click(function(e){
          e.preventDefault();

          id = $(this).data('iddesabilitar');

          $.ajax({
                url: "{{ url('/cliente/desabilitar') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/cliente/desabilitar') }}",
               data:{
                  id:id
               },

               success: function(data){
                  
                setTimeout(function() {
                  Materialize.toast('<span>Registro desabilitado</span>', 1500);
                }, 100);  

                window.location="{{ url('/clientes') }}";
              },
               error:function(){ 
                  alert("error!!!!");
            }
            });
          });
        
          
  @endforeach

   
</script>