<script type="text/javascript">
	//----JPaiva-02-08-2018------------------ELIMINAR---------------------------
    @foreach ($dgeneral as $val)
        $('#e{{$val->id}}').click(function(e){
          e.preventDefault();

          id = $(this).data('ideliminar');
          console.log(id);

          $.ajax({
                url: "{{ url('/dgeneral/eliminar') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/dgeneral/eliminar') }}",
               data:{
                  id:id
               },

               success: function(data){
                
                  window.location="{{url('/general')}}";

               },
               error:function(){ 
                  alert("error!!!!");
            }
            });
        });    
          
    @endforeach

</script>