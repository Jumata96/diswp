<div class="row">
	<div class="col s12 m12 l12">
		<div class="card">
			<div class="card-header">
				<i class="fa fa-table fa-lg material-icons">receipt</i>
				<h2>LISTA DE ITEMS DEL CARRUSEL</h2>
			</div>
			<div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
				<div class="col s12 m12">
					<a class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" href="{{ url('/carrusel/nuevo') }}" data-position="top" data-delay="500" data-tooltip="Nuevo">
					<i class="material-icons" style="color: #03a9f4">add</i>
					</a>
					<a style="margin-left: 6px"></a>                          
				</div>
				@include('forms.scripts.modalInformacion')         
			</div>
			<div class="row cuerpo">
				<?php 
					$bandera = false;
					if (count($carrusel) > 0) {
					  # code...
					  $bandera = true;
					  $i = 0;
					} 
					?>
				<br>
				<div class="row">
					<div class="col s12 m12 l12">
						<div class="card-content">
							Existen <?php echo ($bandera)? count($carrusel) : 0; ?> registros. <br><br>
							<table id={{ ($bandera)? "data-table-simple" : "" }} class="responsive-table display" cellspacing="0">
							<thead>
								<tr>
									<th>#</th>
									<th class="center">Imagen</th>
									<th>url imagen</th>
									<th>Extensión</th>
									<th>Título</th>
									<th>Fecha creación</th>
									<th>Estado</th>
									<th>Acción</th>
								</tr>
							</thead>
							<?php
								if($bandera){                                                           
								?>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Imagen</th>
									<th>url imagen</th>
									<th>Extensión</th>
									<th>Título</th>
									<th>Fecha creación</th>
									<th>Estado</th>
									<th>Acción</th>
								</tr>
							</tfoot>
							<tbody>
								<?php 
									foreach ($carrusel as $datos) {
									$i++;
									?>
								<tr id="tr{{$datos->id}}">
									<td><?php echo $i; ?></td>
									<td class="center">
										<img src="{{asset('/')}}{{$datos->url_imagen}}" alt="" class="circle responsive-img valign profile-image teal lighten-5" style="height: 50px; width: 50px">
									</td>
									<td><?php echo $datos->url_imagen ?></td>
									<td><?php echo $datos->extension ?></td>
									<td><?php echo $datos->titulo ?></td>
									<td><?php echo $datos->fecha_creacion ?></td>
									<td  class="center">
										@if($datos->estado == 0)
										<div id="estado" class="badge grey darken-2 white-text text-accent-5" >
											<b>NO DISPONIBLE</b>
											<i class="material-icons"></i>
										</div>
										@else
										<div id="estado2" class="badge green lighten-5 green-text text-accent-4" >
											<b>ACTIVO</b>
											<i class="material-icons"></i>
										</div>
										@endif
									</td>
									<td class="center" style="width: 9rem">
										<a href="{{ url('/carrusel/mostrar') }}/{{$datos->id}}" class=" tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
										<i class="material-icons" style="color: #7986cb ">visibility</i>
										</a>                                       
										<a href="#confirmacion_carrucel{{$i}}" class=" tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
										<i class="material-icons" style="color: #dd2c00">remove</i>
										</a>
										@if($datos->estado == 1)                                      
										<a href="#confirmacion2_carrucel{{$datos->id}}" class=" tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
										<i class="material-icons" style="color: #757575 ">clear</i></a>
										@else
										<a href="#confirmacion3_carrucel{{$datos->id}}" class=" tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
										<i class="material-icons" style="color: #2e7d32 ">check</i></a>
										@endif
									</td>
								</tr> 
								@include('forms.inicio.carrusel.script.alertaConfirmacion')
								@include('forms.inicio.carrusel.script.alertaConfirmacion2')
								@include('forms.inicio.carrusel.script.alertaConfirmacion3')
								<?php }} ?>
							</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>