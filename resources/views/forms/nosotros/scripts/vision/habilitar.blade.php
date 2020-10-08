<script type="text/javascript">
   //----JPaiva-02-08-2018------------------HABILITAR---------------------------
    @foreach ($dvision as $val)
        $('#ha{{$val->id}}').click(function(e){
          e.preventDefault();

          id = $(this).data('id');
          
          $.ajax({
                url: "{{ url('/dvision/habilitar') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/dvision/habilitar') }}",
               data:{
                  id:id
               },

               success: function(data){

             
                
                setTimeout(function() {
                  Materialize.toast('<span>Registro habilitado</span>', 1500);
                }, 100);  

               },
               error:function(){ 
                  alert("error!!!!");
            }
            });
        });    
          
    @endforeach


</script>