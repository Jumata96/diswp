<br>
<div class="row">
<div class="col s12 m12 l12">
	<div class="card">
		<div class="card-header">
			<i class="fa fa-table fa-lg material-icons">receipt</i>
			<h2>SECCIÓN 06</h2>
		</div>
		<form class="formValidate right-alert" id="formSection6" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
				<div class="col s12 m12">
					<a id="addSeccion6" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped"   data-position="top" data-delay="500" data-tooltip="Actualizar sección">
					<i class="material-icons" style="color: #03a9f4">done</i>
					</a> 
					<a class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" href="{{ url('/seccion6/nuevo') }}" data-position="top" data-delay="500" data-tooltip="Nuevo">
					<i class="material-icons" style="color: #03a9f4">add</i>
					</a>
					<a style="margin-left: 6px"></a>                          
				</div>
				@include('forms.scripts.modalInformacion')         
			</div>
			<div class="row cuerpo">
				<div class="row">
					<div class="col l12 m6 s12"   >
						@foreach ($inicio_seccion as $seccion6)
						@if ($seccion6->codigo == 'SEC6')
						<div class="row cuerpo" >
							<div class="card white">
								<span>Principal</span>
								<input type="hidden" id="seccion6_codigo" name="seccion6_codigo" value="{{$seccion6->codigo}}"> 
								<br>
								<div class="input-field col l12 m12 s12">
									<div class="input-field col s12 m12 l6">
										<i class="material-icons prefix">clear_all</i>
										<input id="titulo_seccion6" name="titulo_seccion6" type="text" required data-error=".errorTxt2" maxlength="200" value="{{$seccion6->titulo}}">
										<label for="titulo_seccion6">Título</label>
										<div id="error1_seccion6" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
									</div>
									<div class="input-field col s12 l6">
										<i class="material-icons prefix">mode_edit</i>
										<textarea id="descripcion_seccion6" name="descripcion_seccion6" required  class="materialize-textarea">{{$seccion6->descripcion}} </textarea>
										<label for="descripcion_seccion6" class="">Descripción </label>
										<div id="error2_seccion6" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
									</div>
								</div>
							</div>
						</div>
						@endif 
						@endforeach
					</div>
					<div class="col l12 m12 s12"   >
						<div class="col l12 m12 s12 "  >
							<div class="card white">
							<div class="row cuerpo">
								<?php 
									$bandera = false;
									
									if (count( $inicio_seccion_det6) > 0) {
									  # code...
									  $bandera = true;
									  $i = 0;
									}
									
									?>
								<br>
								<div class="row">
									<div class="col s12 m12 l12">
										<div class="card-content">
											Existen <?php echo ($bandera)? count($inicio_seccion_det6) : 0; ?> registros. <br><br>
											<table id={{ ($bandera)? "data-table-simpleIII" : "" }} class="responsive-table display" cellspacing="0">
											<thead>
												<tr>
													<th>#</th>
													<th class="center">Imagen</th> 
													<th>Tipo</th>
													<th>Título</th>
													<th>Descripción</th>
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
													<th>Tipo</th>
													<th>Título</th>
													<th>Descripción</th>
													<th>Fecha creación</th>
													<th>Estado</th>
													<th>Acción</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
													foreach ($inicio_seccion_det6 as $seccion6Det) {
													$i++;
													?>
												<tr >
													<td><?php echo $i; ?></td>
													<td class="center">
														<img src="{{asset('/storage/'.$seccion6Det->url_file)}}" alt="" class="circle responsive-img valign profile-image teal lighten-5" style="height: 50px; width: 50px"> 
													</td>
													<td>
														@if ($seccion6Det->tipo==1)
																		ALL
														@endif
														@if ($seccion6Det->tipo==2)
																		AEROBICS
														@endif
														@if ($seccion6Det->tipo==3)
																		STRENGTH
														@endif
														@if ($seccion6Det->tipo==4)
																		NUTRITION
														@endif 
													 </td>
													<td>{{$seccion6Det->titulo}}</td>
													<td>{{$seccion6Det->descripcion}}</td>
													 
													<td><?php echo $seccion6Det->fecha_creacion ?></td>
													<td class="center" >
														@if($seccion6Det->estado == 0)
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
														<a href="{{ url('/seccion6/mostrar') }}/{{$seccion6Det->codigo}}" class=" tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
														<i class="material-icons" style="color: #7986cb ">visibility</i>
														</a>                                       
														<a href="#confirmacion_sec6{{$i}}" class=" tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
														<i class="material-icons" style="color: #dd2c00">remove</i>
														</a>
														@if($seccion6Det->estado == 1)                                      
														<a href="#confirmacion2_sec6{{$seccion6Det->codigo}}" class=" tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
														<i class="material-icons" style="color: #757575 ">clear</i></a>
														@else
														<a href="#confirmacion3_sec6{{$seccion6Det->codigo}}" class=" tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
														<i class="material-icons" style="color: #2e7d32 ">check</i></a>
														@endif
													</td>
												</tr>
												@include('forms.inicio.seccion6.scripts.alertaConfirmacion')
												@include('forms.inicio.seccion6.scripts.alertaConfirmacion2')
												@include('forms.inicio.seccion6.scripts.alertaConfirmacion3')
												{{-- @include('forms.inicio.scripts.alertaConfirmacion')
												@include('forms.inicio.scripts.alertaConfirmacion2')
												@include('forms.inicio.scripts.alertaConfirmacion3') --}}
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
				</div>
		</form>
		</div>
	</div>
</div>
<br>