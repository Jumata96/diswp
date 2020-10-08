<script type="text/javascript">
	//----JPaiva-31-07-2018------------------ELIMINARs---------------------------
    @foreach ($dmision as $val)
        $('#e{{$val->id}}').click(function(e){
          e.preventDefault();

          id = $(this).data('ideliminar');
          console.log(id);

          $.ajax({
                url: "{{ url('/dmision/eliminar') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/dmision/eliminar') }}",
               data:{
                  id:id
               },

               success: function(data){
                
                  window.location="{{url('/mision')}}";

               },
               error:function(){ 
                  alert("error!!!!");
            }
            });
        });    
          
    @endforeach

</script>