<script type="text/javascript">
  //----JPaiva-02-08-2018------------------DESABILITAR---------------------------
    @foreach ($dgeneral as $val)
        $('#d_dgeneral{{$val->id}}').click(function(e){
          e.preventDefault();

          id = $(this).data('iddesabilitar');

          $.ajax({
                url: "{{ url('/dgeneral/desabilitar') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/dgeneral/desabilitar') }}",
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