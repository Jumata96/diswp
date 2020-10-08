<script type="text/javascript">
   //----JPaiva-30-07-2018------------------HABILITAR---------------------------
    @foreach ($dmision as $val)
        $('#ha{{$val->id}}').click(function(e){
          e.preventDefault();

          id = $(this).data('id');
          console.log(id);

          $.ajax({
                url: "{{ url('/dmision/habilitar') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/dmision/habilitar') }}",
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