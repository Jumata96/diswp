<br>
<div class="row">
<div class="col s12 m12 l12">
	<div class="card">
		<div class="card-header">
			<i class="fa fa-table fa-lg material-icons">receipt</i>
			<h2>SECCIÓN 01</h2>
		</div>
		<form class="formValidate right-alert" id="formSection1" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
				<div class="col s12 m12">
					<a id="addSeccion1" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped"   data-position="top" data-delay="500" data-tooltip="Actualizar sección">
					<i class="material-icons" style="color: #03a9f4">done</i>
					</a> 
					<a style="margin-left: 6px"></a>                          
				</div>
				@include('forms.scripts.modalInformacion')         
			</div>
			<div class="row cuerpo">
				<div class="row">
					<div class="col l12 m12 s12"   >
						@foreach ($inicio_seccion as $seccion1)
						@if ($seccion1->codigo == 'SEC1')
						<div class="row cuerpo" >
							<div class="card white">
								<span>Principal</span>		<br><br>
								<input type="hidden" id="seccion1_codigo" name="seccion1_codigo" value="{{$seccion1->codigo}}"> 
						
								<div class="input-field col l12 m12 s12">
									<i class="material-icons prefix">mode_edit</i>
									<textarea id="seccion1_descripcion" name="seccion1_descripcion" class="materialize-textarea"  value="" style="height: 84px"> {{ $seccion1->descripcion}}</textarea>
									<label for="seccion1_descripcion" class="">Detalle</label>
									<div class="seccion1_error" id="seccion1_error2" style="color: red; font-size: 12px; font-style: italic;"></div>
								</div>
							</div>
						</div>
						@endif 
						@endforeach
					</div>
					<div class="col l12 m12 s12"   > 
						<div class="row cuerpo">
							<?php 
								$bandera = false; 
								if (count($inicio_seccion_det1) > 0) {
								  # code...
								  $bandera = true;
								  $i = 0;
								} 
								?>
							<div class="card white">
								<span> Secundarios</span> <br>
								<div class="card-content">
									Existen <?php echo ($bandera)? count($inicio_seccion_det1) : 0; ?> registros. <br><br>
									<table id={{ ($bandera)? "data-table-simpleII" : "" }} class="responsive-table display" cellspacing="0">
									<thead>
										<tr>
											<th>#</th>
											<th class="center">Imagen</th> 
											<th>Título</th>
											<th>Descripción</th>
											<th>estado</th>
											<th>Acción</th>
										</tr>
									</thead>
									<?php
										if($bandera){                                                           
										?>
									<tfoot>
										<th>#</th>
										<th>Imagen</th>
										<th>Título</th>
										<th>Descripción</th>
										<th>estado</th>
										<th>Acción</th>
									</tfoot>
									<tbody>
										<?php 
											foreach ($inicio_seccion_det1 as $detalleGeneral) {
											$i++;
											?>
										@if ($detalleGeneral)
										@endif
										<tr>
											<td><?php echo $i; ?></td>
											<td class="center">
														<img src="{{asset('/storage/'.$detalleGeneral->url_file)}}" alt="" class="circle responsive-img valign profile-image teal lighten-5" style="height: 50px; width: 50px"> 
													</td>
											<td><?php echo $detalleGeneral->titulo ?></td>
											<td><?php echo $detalleGeneral->descripcion ?></td>
											<td style="width: 11em">
												@if($detalleGeneral->estado == 0)
												<div id="estado" class="badge grey darken-2 white-text text-accent-5 center" >
													<b>NO DISPONIBLE</b>
													<i class="material-icons"></i>
												</div>
												@else
												<div id="estado2" class="badge green lighten-5 green-text text-accent-4 center" >
													<b>ACTIVO</b>
													<i class="material-icons"></i>
												</div>
												@endif
											</td>
											<td class="center" style="width: 9rem">
												<a  href="{{ url('/seccion1/mostrar') }}/{{$detalleGeneral->codigo}}"   target="_blank" class="tooltipped tooltip " data-position="top" data-delay="500" data-tooltip="Eliminar"   >
												<i class="material-icons" style="color: #7986cb">visibility</i>
												</a>  
												<a href="#confirmacion{{$i}}" class="tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
												<i class="material-icons" style="color: #dd2c00">remove</i>
												</a>
												@if($detalleGeneral->estado == 1)                                      
												<a href="#h_confirmacion2{{$detalleGeneral->codigo}}" class="tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
												<i class="material-icons" style="color: #757575 ">clear</i></a>
												@else
												<a href="#h_confirmacion3{{$detalleGeneral->codigo}}" class="tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
												<i class="material-icons" style="color: #2e7d32 ">check</i></a>
												@endif
											</td>
										</tr>
										{{-- @include('forms.inicio.seccion2.scripts.alertaConfirmacion')
										@include('forms.inicio.seccion2.scripts.alertaConfirmacion2')
										@include('forms.inicio.seccion2.scripts.alertaConfirmacion3')  --}}
										<?php }} ?>
									</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
		</form>
		</div>
	</div>
</div>
<br>