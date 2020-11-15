<div class="row">
	<div class="col s12 m12 l12">
		<div class="card">
			<div class="card-header">
				<i class="fa fa-table fa-lg material-icons">receipt</i>
				<h2>Seccion 05</h2>
			</div>
			<form  id="myForm_seccion5" accept-charset="UTF-8" enctype="multipart/form-data">
				<div class="row card-header sub-header">
					<div class="col s12 m12 herramienta">                         
						<a id="updSeccion5" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Guardar">
						<i class="material-icons blue-text text-darken-2">check</i></a>
						<a style="margin-left: 6px"></a>      
					</div>
					<div class="row cuerpo">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
						<div class="col col s12 m10 l12  ">
							<br>
							<div class="card white">
								<div class="card-content">
									<span class="card-title">Datos Generales</span>
									@foreach ($inicio_seccion as $seccion5)
									@if ($seccion5->codigo == 'SEC5') 
									<input type="hidden" id="id_seccion5" name="id_seccion5" value="{{$seccion5->codigo}}">
									<div class="row">
										<div class="input-field col s12">
											<i class="material-icons prefix">clear_all</i>
											<input id="titulo_seccion5" name="titulo_seccion5" type="text" data-error=".errorTxt2" maxlength="50" value="{{$seccion5->titulo}}">
											<label for="titulo_seccion5">Título</label>
											<div class="errorTxt2"></div>
										</div>
										<div class="col s12">
											<div class="input-field col s12 m6 l8">
												<p>Mostrar botón para la redirección del contenido mostrado</p>
											</div>
											<div class="col s12 m6 l4">
												<label for="btn_estado_seccion5">Habilitar</label>
												<select id="btn_estado_seccion5" class="browser-default" name="btn_estado_seccion5" data-error=".errorTxt1">
													<option value="" disabled="">Seleccionar</option>
													@if($seccion5->btn_estado == 0)
													<option value="1">SI</option>
													<option value="0" selected="">NO</option>
													@endif
													@if($seccion5->btn_estado == 1)
													<option value="1" selected="">SI</option>
													<option value="0">NO</option>
													@endif
												</select>
											</div>
										</div>
										<div class="col s12" style="padding-bottom: 10px; padding-top: 10px">
											<div class="input-field col s12 m6 l8">
												<p>Ingrese el código del producto para realizar el enlace con el botón</p>
											</div>
											<div class="col s12 m6 l4">
												<label for="btn_codigo_seccion5">Cod. Producto</label>
												<input id="btn_codigo_seccion5" name="btn_codigo_seccion5" type="text" data-error=".errorTxt2" minlength="7" maxlength="100" value="{{$seccion5->btn_codigo}}">
											</div>
										</div>
									</div>
									@endif
									@endforeach     
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>