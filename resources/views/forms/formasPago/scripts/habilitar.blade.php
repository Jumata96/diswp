<script type="text/javascript">
   //----JPaiva-30-07-2018------------------HABILITAR---------------------------
    @foreach ($fpago as $val)
        $('#ha{{$val->codigo}}').click(function(e){
          e.preventDefault();

          id = $(this).data('id');

          $.ajax({
                url: "{{ url('/fpago/habilitar') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/fpago/habilitar') }}",
               data:{
                  id:id
               },

               success: function(data){

             
                
                setTimeout(function() {
                  Materialize.toast('<span>Registro habilitado</span>', 1500);
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