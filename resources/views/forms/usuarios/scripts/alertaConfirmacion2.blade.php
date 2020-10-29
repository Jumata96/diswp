<div id="confirmacion2{{$datos->idcliente}}" class="modal" style="width: 500px">
    <div class="modal-content indigo white-text center">
    	<p>Está seguro que desea desabilitar este registro?</p>
    </div>
    <div class="modal-footer indigo lighten-4">
	    <a href="#" class="waves-effectwaves-light btn-flat modal-action modal-close">Cancelar</a>
    	<a  href="{{url('/cliente/desabilitar')}}/{{$datos->idcliente}}"  class="waves-effect waves-light btn-flat modal-action modal-close" id="d{{$datos->idcliente}}" data-iddesabilitar="{{$datos->idcliente}}">Aceptar</a>
    </div>
</div>