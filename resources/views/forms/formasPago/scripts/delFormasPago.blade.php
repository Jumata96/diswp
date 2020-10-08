<script type="text/javascript">
	//----JPaiva-31-07-2018------------------ELIMINARs---------------------------
    @foreach ($fpago as $val)
        $('#e{{$val->codigo}}').click(function(e){
          e.preventDefault();

          id = $(this).data('ideliminar');
          console.log(id);

          $.ajax({
                url: "{{ url('/fpago/eliminar') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/fpago/eliminar') }}",
               data:{
                  id:id
               },

               success: function(data){
                
                  window.location="{{url('/formas-de-pago')}}";

               },
               error:function(){ 
                  alert("error!!!!");
            }
            });
        });    
          
    @endforeach

</script>