<script type="text/javascript">
//----JPaiva--10-08-2018---------------------------VISIÓN-------------------------------------
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

	$("input[name=group2]").change(function(e){
		var val = $(this).val();		

		if (val == '0') {
			$('#comodin').data('valor','0');
			$('#bb').hide();
			$('#aa').show();
		}
		if (val == '1') {	
			$('#comodin').data('valor','1');
			$('#aa').hide();
			$('#bb').show();
		}
	})

	$("load", function(){
		$('#bbb').hide();
		$('#bb').hide();
	})

</script>