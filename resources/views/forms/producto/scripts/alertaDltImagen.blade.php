<div id="confirmacion{{$img->id}}" class="modal" style="width: 500px">
	<div class="modal-content indigo white-text center">
		<p>Está seguro que desea eliminar esta imágen?</p>
	</div>
	<div class="modal-footer indigo lighten-4">
		<a href="#" class="waves-effectwaves-light btn-flat modal-action modal-close">Cancelar</a>
		<a href="#" id="dlt_i{{$img->id}}" class="waves-effect waves-light btn-flat modal-action modal-close" data-ideliminar="{{$img->id}}" >Aceptar</a>
	</div>
</div>