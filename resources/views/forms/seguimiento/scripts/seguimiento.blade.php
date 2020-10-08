<script type="text/javascript">
//----JPaiva--05-10-2018---------------------------GENERAL-------------------------------------
	$("input[name=facturacion]").change(function(e){
		var val = $(this).val();		

		if (val == '0') {
			$("#f_descripcion").attr("disabled",'true');
		}
		if (val == '1') {	
			$("#f_descripcion").removeAttr("disabled");
		}
	})

	$("input[name=transporte]").change(function(e){
		var val = $(this).val();
		
		if (val == '0') {
			$("#t_descripcion").attr("disabled",'true');
		}
		if (val == '1') {	
			$("#t_descripcion").removeAttr("disabled");
		}
	})

	$("input[name=almacen]").change(function(e){
		var val = $(this).val();		

		if (val == '0') {
			$("#a_descripcion").attr("disabled",'true');
		}
		if (val == '1') {	
			$("#a_descripcion").removeAttr("disabled");
		}
	})

	

	@foreach($seguimiento as $val)
		@if($val->idarea == 'FAC')
			$("#t_descripcion").attr("disabled",'true');
			$("#a_descripcion").attr("disabled",'true');
			$("#test3").attr("disabled",'true');
			$("#test4").attr("disabled",'true');
			$("#test5").attr("disabled",'true');
			$("#test6").attr("disabled",'true');
			$("#btnTransportista").attr("disabled",'true');
			$("#btnAlmacen").attr("disabled",'true');
		@endif
		@if($val->idarea == 'ALM')
			$("#t_descripcion").attr("disabled",'true');
			$("#f_descripcion").attr("disabled",'true');
			$("#test1").attr("disabled",'true');
			$("#test2").attr("disabled",'true');
			$("#test5").attr("disabled",'true');
			$("#test6").attr("disabled",'true');
			$("#btnTransportista").attr("disabled",'true');
			$("#btnFacturacion").attr("disabled",'true');
		@endif
		@if($val->idarea == 'TRA')
			$("#f_descripcion").attr("disabled",'true');
			$("#a_descripcion").attr("disabled",'true');
			$("#test3").attr("disabled",'true');
			$("#test4").attr("disabled",'true');
			$("#test1").attr("disabled",'true');
			$("#test2").attr("disabled",'true');
			$("#btnFacturacion").attr("disabled",'true');
			$("#btnAlmacen").attr("disabled",'true');
		@endif
	@endforeach
	@if(count($seguimiento) == 0)
		$("#t_descripcion").attr("disabled",'true');
		$("#f_descripcion").attr("disabled",'true');
			$("#a_descripcion").attr("disabled",'true');
			$("#test3").attr("disabled",'true');
			$("#test4").attr("disabled",'true');
			$("#test1").attr("disabled",'true');
			$("#test2").attr("disabled",'true');
			$("#test5").attr("disabled",'true');
			$("#test6").attr("disabled",'true');
			$("#btnTransportista").attr("disabled",'true');
			$("#btnFacturacion").attr("disabled",'true');
			$("#btnAlmacen").attr("disabled",'true');

	@endif
	
</script>