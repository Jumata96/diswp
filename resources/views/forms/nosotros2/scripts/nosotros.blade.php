<script type="text/javascript">
//----JPaiva--24-08-2018---------------------------NOSOTROS-------------------------------------
	
	$("input[name=group1]").change(function(e){
		var val = $(this).val();		

		if (val == '0') {
			$('#comodin').data('valor','0');
			$('#bbb').hide();
			$('#aaa').show();
		}
		if (val == '1') {	
			$('#comodin').data('valor','1');
			$('#aaa').hide();
			$('#bbb').show();
		}
	})



	$("load", function(){
		$('#bbb').hide();
		var tipo = $('#tipo').val();
		
		if (tipo == 0) {          
          $("#test3").attr('checked', true);
          $('#test4').removeAttr('checked');
          $('#u_img').hide();
          $('#bbb').hide();
          $('#aaa').show();
          
          $('#u_imagen_scr').show();
          
        }

        if (tipo == 1) {
          $('#u_img').show();
          $('#u_imagen_scr').hide();
          $('#aaa').hide();
          $('#bbb').show();
          $("#test4").attr('checked', true);
          $('#test3').removeAttr('checked');
        }

	})

</script>