<div id="h_confirmacion3{{$detalleGeneral->id}}" class="modal" style="width: 500px">
	<div class="modal-content indigo white-text center">
		<p>Está seguro que desea habilitar este registro ?</p>
	</div>
	<div class="modal-footer indigo lighten-4">
		<a href="#" class="waves-effectwaves-light btn-flat modal-action modal-close">Cancelar</a>
		<a href="{{url('/seccion2/habilitar')}}/{{$detalleGeneral->id}}"class="waves-effect waves-light btn-flat modal-action modal-close"  >Aceptar</a>
	</div>
</div>
