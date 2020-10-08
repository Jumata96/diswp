<script type="text/javascript">
  //----JPaiva-31-07-2018------------------DESABILITAR---------------------------
    @foreach ($dmision as $val)
        $('#d_dmision{{$val->id}}').click(function(e){
          e.preventDefault();
console.log('entroo');
          id = $(this).data('iddesabilitar');

          $.ajax({
                url: "{{ url('/dmision/desabilitar') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/dmision/desabilitar') }}",
               data:{
                  id:id
               },

               success: function(data){
                  
                setTimeout(function() {
                  Materialize.toast('<span>Registro desabilitado</span>', 1500);
                }, 100);  
              },
               error:function(){ 
                  alert("error!!!!");
            }
            });
          });
        
          
  @endforeach

   
</script>