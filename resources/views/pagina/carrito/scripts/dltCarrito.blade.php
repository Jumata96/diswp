<script type="text/javascript">
	//----JPaiva-11-09-2018------------------ELIMINAR---------------------------
    @foreach ($vcarrito as $val)
        $('#e{{$val->idcarrito}}').click(function(e){
          e.preventDefault();

          id = $(this).data('ideliminar');

          $.ajax({
                url: "{{ url('/dltShop') }}",
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
               type:'POST',
               url:"{{ url('/dltShop') }}",
               data:{
                  id:id
               },

               success: function(data){
                
                $('#' + id ).remove();

                setTimeout(function() {
                  Materialize.toast('<span>Registro eliminado</span>', 1500);
                }, 100);  

               },
               error:function(){ 
                  alert("error!!!!");
            }
            });
        });    
          
    @endforeach

</script>