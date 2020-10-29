<div id="h_confirmacion_V3{{$datos->id }}" class="modal" style="width: 500px">
	<div class="modal-content teal white-text">
	  <p>Está  seguro que desea habilitar este registro v ?</p>
	</div>
	<div class="modal-footer teal lighten-4">
		<a href="#" class="waves-effectwaves-light btn-flat modal-action modal-close">Cancelar</a>
	  <a  href="{{url('/permisos/habilitarVideo')}}/{{$datos->id}}"  class="waves-effect waves-light btn-flat modal-action modal-close" id="hV{{$datos->id }}" data-idcliente="{{$datos->id }}">Aceptar</a>
	</div>
 </div>



 

 


