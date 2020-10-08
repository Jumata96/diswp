<script type="text/javascript">
    //---JPaiva-11-09-2018----------------ACTUALIZAR-----------------------------
    $('#update').click(function(e){
      e.preventDefault();

      var total = 0;
      
      @foreach($vcarrito as $val)
        var id = $('#{{$val->idcarrito}}').data('id');
        var cantidad = $('#c{{$val->idcarrito}}').val() ;

        $.ajax({
            url: "{{ url('/updShop') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/updShop') }}",
           data:{
            id:id,
            cantidad:cantidad
           },

           success:function(data){   

            var obj = $.parseJSON(data);

            total = total + Number(obj[0]['total']);

            $('#t{{$val->idcarrito}}').text(obj[0]['total']);
            $('#total').text(total.toFixed(2));

           },
           error:function(){ 
              alert("error!!!!");
        }
        });
  
      @endforeach

      //$('#total').text(total);

      setTimeout(function() {
        Materialize.toast('<span>Registro actualizado</span>', 1500);
      }, 100);  

    });

  @foreach($vcarrito as $val)
    $('#c{{$val->idcarrito}}').blur(function(e){
      e.preventDefault();

      var total = 0;      
     
        var id = $('#{{$val->idcarrito}}').data('id');
        var idproducto = $('#{{$val->idcarrito}}').data('idproducto');
        var cantidad = $('#c{{$val->idcarrito}}').val() ;
        var precio = $('#p{{$val->idcarrito}}').data('precio');

        $.ajax({
            url: "{{ url('/updShop') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
           type:'POST',
           url:"{{ url('/updShop') }}",
           data:{
            id:id,
            cantidad:cantidad,
            idproducto:idproducto
           },

           success:function(data){   
              
              if (data.errors == 'EXCEDE_STOCK') {
                    setTimeout(function() {
                      Materialize.toast('<span>La cantidad ingresada excede el stock actual</span>', 5000);
                    }, 100);  
              }else{
                var obj = $.parseJSON(data);

                total = total + Number(obj['total']);
                console.log(precio);

                total2 = cantidad * precio;

                $('#t{{$val->idcarrito}}').text('$ ' +total2.toFixed(2));
                $('#total').text('$ ' + total.toFixed(2));    

                setTimeout(function() {
                  Materialize.toast('<span>Registro actualizado</span>', 1500);
                }, 100);  

              }            

           },
           error:function(){ 
              alert("error!!!!");
        }
        });

      //$('#total').text(total);

      

    });
  @endforeach


</script>