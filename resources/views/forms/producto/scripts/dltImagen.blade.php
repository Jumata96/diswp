<script type="text/javascript">
	//----JPaiva-06-08-2018------------------ELIMINARs---------------------------
    @foreach ($imagenes as $val)
        $('#dlt_i{{$val->id}}').click(function(e){
          e.preventDefault();

          id = $(this).data('ideliminar');
          console.log(id);

          $.ajax({
                url: "{{ url('/producto/dltImagen') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/producto/dltImagen') }}",
               data:{
                  id:id
               },

               success: function(data){
                
                $('#tr' + id ).remove();

                setTimeout(function() {
                  Materialize.toast('<span>Registro de imágen eliminado</span>', 1500);
                }, 100);  

               },
               error:function(){ 
                  alert("error!!!!");
            }
            });
        });    
          
    @endforeach

</script>