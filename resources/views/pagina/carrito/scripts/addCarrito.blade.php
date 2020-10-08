<script type="text/javascript">
	//------JPaiva--11-09-2018-------------GRABAR-----------------------------------
  @foreach($tipo as $tip)
  @foreach($grupo as $grup)
  @if($tip->idgrupo == $grup->idgrupo)
    @foreach($producto as $datos)
      @if($grup->idgrupo == $datos->idgrupo and $tip->idtipo == $datos->idtipo)
        $(document).on('click','#{{$datos->codigo}}', function(){    
         
          //var _token = $("input[name=_token]").val();
          var data = $(this).data('codigo');

          console.log(data);

          $.ajax({
              url: "{{ url('/addShop') }}",
              type:"POST",
              beforeSend: function (xhr) {
                  var token = $('meta[name="csrf-token"]').attr('content');

                  if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                  }
              },
             type:'POST',
             url:"{{ url('/addShop') }}",
             data:{
              codigo:data
             },

             success:function(data){              
                if ( data[0] == "error") {
                  
                } else {   
                  
                  if (data.errors == 'NO') {
                    location.href="{{url('/usuarioLogin')}}";
                  }
                  else if (data.errors == 'EXITE_PEDIDO') {
                    setTimeout(function() {
                      Materialize.toast('<span>Existe una orden de pedido pendiente...</span><a href="{{url('/carrito')}}"><b>ver pedido</b></a>', 5000);
                    }, 100); 

                  }else if (data.errors == 'EXITE_PRODUCTO') {
                    setTimeout(function() {
                      Materialize.toast('<span>Este producto se encuentra agregado en el carrito de compra</span>', 5000);
                    }, 100); 

                  }else if (data.errors == 'CORRECTO'){
                    var cont = Number($('#contador').text());
                    cont = cont + 1;
                    
                    $('#contador').text(cont);

                    $('#{{$datos->codigo}}').attr('disabled',false);

                    setTimeout(function() {
                      Materialize.toast('<span>Se agregó un producto al carrito</span>', 1500);
                    }, 100); 
                  }                  
                  
                }
                
             },

             error:function(){ 
                alert("error!!!!");
          }
          });
        });
      @endif
    @endforeach
  @endif
  @endforeach
  @endforeach


    

    
</script>
