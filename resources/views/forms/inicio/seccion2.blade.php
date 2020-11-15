<div class="row">
<div class="col s12 m12 l12">
	<div class="card">
		<div class="card-header">
			<i class="fa fa-table fa-lg material-icons">receipt</i>
			<h2>SECCIÓN 02</h2>
		</div>
		<form class="formValidate right-alert" id="formSection2" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
				<div class="col s12 m12">
					<a id="addSeccion2" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" href="{{ url('/inicio/seccion2') }}" data-position="top" data-delay="500" data-tooltip="Actualizar sección">
					<i class="material-icons" style="color: #03a9f4">done</i>
					</a>
					<a id="addSeccion2Sub"  href="#viewComprobante" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger"  data-position="top" data-delay="50" data-tooltip="Agregar Subtitulos">
					<i class="material-icons" style="color: #03a9f4">add</i>
					</a>
					<a style="margin-left: 6px"></a>                          
				</div>
				@include('forms.scripts.modalInformacion')         
			</div>
			<div class="row cuerpo">
				<div class="row">
					<div class="col l12  m12 s12"   >
						@foreach ($general as $genearlTitulo)
						<div class="row cuerpo" >
							<div class="card white">
								<span>Titulo principal</span>
								<input type="hidden" id="titulo_id" name="generalId" value="{{$genearlTitulo->id}}">
								<div class="input-field col l6 m6 s12">
									<i class="material-icons prefix">face</i>
									<input id="general" name="general" value="{{ $genearlTitulo->titulo}}" type="text" data-error=".errorTxt3" maxlength="50">
									<label for="general">Titulo</label>
									<div class="errorTxt1" id="g_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
								</div>
								<br>
								<div class="input-field col l6 m6 s12">
									<i class="material-icons prefix">mode_edit</i>
									<textarea id="descripcion" name="descripcion" class="materialize-textarea"  value="" style="height: 84px"> {{ $genearlTitulo->descripcion}}</textarea>
									<label for="descripcion" class="">Detalle</label>
									<div class="errorTxt1" id="g_error2" style="color: red; font-size: 12px; font-style: italic;"></div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="col l12 m12 s12"   >
						<div class="row cuerpo">
							<?php 
								$bandera = false;
								
								if (count($dgeneral) > 0) {
								  # code...
								  $bandera = true;
								  $i = 0;
								}
								
								?>
							<div class="card white">
								<span>Titulos Secundarios</span> 
								<div class="card-content">
									Existen <?php echo ($bandera)? count($dgeneral) : 0; ?> registros. <br><br>
									<table id={{ ($bandera)? "data-table-simpleI" : "" }} class="responsive-table display" cellspacing="0">
									<thead>
										<tr>
											<th>#</th>
											<th>Título</th>
											<th>Descripción</th>
											<th>estado</th>
											<th class="center" >Acción</th>
										</tr>
									</thead>
									<?php
										if($bandera){                                                           
										?>
									<tfoot>
										<th>#</th>
										<th>Título</th>
										<th>Descripción</th>
										<th>estado</th>
										<th class="center" >Acción</th>
									</tfoot>
									<tbody>
										<?php 
											foreach ($dgeneral as $detalleGeneral) {
											$i++;
											?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $detalleGeneral->titulo ?></td>
											<td><?php echo $detalleGeneral->descripcion ?></td>
											<td  >
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
											<td class="center" style="width: 8rem">
												<a   class="tooltipped tooltip  btnActualizarSub" data-position="top" data-delay="500" data-tooltip="Eliminar"  
													data-descripcion="{{$detalleGeneral->descripcion}}"
													data-titulo="{{$detalleGeneral->titulo}}" 
													data-id="{{$detalleGeneral->id}}"
													>
												<i class="material-icons" style="color: #7986cb">visibility</i>
												</a>  
												<a href="#confirmacion{{$i}}" class="tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
												<i class="material-icons" style="color: #dd2c00">remove</i>
												</a>
												@if($detalleGeneral->estado == 1)                                      
												<a href="#h_confirmacion2{{$detalleGeneral->id}}" class="tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
												<i class="material-icons" style="color: #757575 ">clear</i></a>
												@else
												<a href="#h_confirmacion3{{$detalleGeneral->id}}" class="tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
												<i class="material-icons" style="color: #2e7d32 ">check</i></a>
												@endif
											</td>
										</tr>
										@include('forms.inicio.seccion2.scripts.alertaConfirmacion')
										@include('forms.inicio.seccion2.scripts.alertaConfirmacion2')
										@include('forms.inicio.seccion2.scripts.alertaConfirmacion3') 
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