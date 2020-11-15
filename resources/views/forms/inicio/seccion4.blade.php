<div class="row">
<div class="col s12 m12 l12">
<div class="card">
	<div class="card-header">
		<i class="fa fa-table fa-lg material-icons">receipt</i>
		<h2>SECCION 4</h2>
	</div>
	<form class="formValidate right-alert" id="formSeccion4" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
		<div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
			<div class="col s12 m12">
				<a  id="upd_seccion4" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
				<i class="material-icons" style="color: #2E7D32">check</i>
				</a>
				<a style="margin-left: 6px"></a> 
			</div>
			@include('forms.scripts.modalInformacion')
		</div>
		<br>
		<div class="row cuerpo">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			@foreach ($inicio_seccion as $seccion4)
			@if ($seccion4->codigo == 'SEC4') 
			<input type="hidden" name="id_seccion4" value="{{ $seccion4->codigo }}">
			<div class="col m12 s12 l12">
				<div class="card white">
					<div class="card-content">
						<span class="card-title">Datos Generales</span>
						<div class="row">
							<div class="input-field col s12 m12 l6">
								<i class="material-icons prefix">clear_all</i>
								<input id="titulo_seccion4" name="titulo_seccion4" type="text" required data-error=".errorTxt2" maxlength="200" value="{{$seccion4->titulo}}">
								<label for="titulo_seccion4">Título</label>
								<div id="u_error1" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
							</div>
							<div class="input-field col s12 l6">
								<i class="material-icons prefix">mode_edit</i>
								<textarea id="descripcion_seccion4" name="descripcion_seccion4" required  class="materialize-textarea">{{$seccion4->descripcion}} </textarea>
								<label for="descripcion_seccion4" class="">Descripción </label>
								<div id="u_error5" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col m12 l12 s12   ">
				@php
				$cont =0;
				@endphp
				@foreach ($inicio_seccion_det4 as $seccion_det4)  
				@php
				$cont +=1;
				@endphp
				<div class="col l6 m12 s12">
					<input type="hidden" id="id_Sec4Det{{$cont}}" name="id_Sec4Det{{$cont}}" value="{{$seccion_det4->codigo}}"> 
					<div class="card white">
						<div class="col s12">
							<div class="file-field input-field col s12 ">
								<div class="col s12 m12 l12  center" style="">
									<input type="hidden" id="url_imagen{{$cont}}" name="url_imagen{{$cont}}" value="{{$seccion_det4->url_file}}">
									<img  src="{{asset('/storage/'.$seccion_det4->url_file)}}" alt="" id="avatarImage{{$cont}}" class="z-depth-1" style="height: 50%; width: 50%">
								</div>
								<div class="col s12" style="padding: 0px; padding-top:50px">
									<div class="btn">
										<span>Imagen</span>
										<input type="file" id="input_imagen{{$cont}}" name="url_imagen{{$cont}}">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" name="imagenName{{$cont}}" value="{{$seccion_det4->name_file}}">
										<div class="errorTxt1" id="error1{{$cont}}" style="color: red; font-size: 12px; font-style: italic;"></div>
									</div>
									</div class="card white">
									<div class="input-field col s12 l12 ">
										<i class="material-icons prefix">clear_all</i>
										<input id="seccion4_titulo{{$cont}}" name="seccion4_titulo{{$cont}}" type="text" data-error=".errorTxt2" maxlength="150" value="{{$seccion_det4->titulo}}">
										<label for="seccion4_titulo{{$cont}}">Título</label>
										<div class="errorTxt2"></div>
									</div>
									<div class="input-field col s12 l12">
										<i class="material-icons prefix">mode_edit</i>
										<textarea id="descripcion{{$cont}}" name="descripcion{{$cont}}" class="materialize-textarea"  value="" style="height: 100px">{{$seccion_det4->descripcion}}</textarea>
										<label for="descripcion{{$cont}}" class="">Descripción</label>
									</div>
									<div class="col l12 m12 s12">
										<div class="input-field col s6 l6">
											<i class="material-icons prefix">chat</i>
											<input type="text" id="item1{{$cont}}" name="item1{{$cont}}" value="{{$seccion_det4->item_1}}">
											<label for="item1{{$cont}}">Item 1</label>
										</div>
										<div class="input-field col s6 l6">
											<i class="material-icons prefix">av_timer</i>
											<input id="porcentaje1{{$cont}}" name="porcentaje1{{$cont}}" type="number"  min="0" max="100"   data-error=".errorTxt2"  value="{{$seccion_det4->porcentaje_1}}">
											<label for="porcentaje1{{$cont}}">Porcentaje 1</label>
										</div>
									</div>
									<div class="col l12 m12 s12">
										<div class="input-field col s6 l6">
											<i class="material-icons prefix">chat</i>
											<input type="text" id="item2{{$cont}}" name="item2{{$cont}}"  value="{{$seccion_det4->item_2}}">
											<label for="item2{{$cont}}">Item 2</label>
										</div>
										<div class="input-field col s6 l6">
											<i class="material-icons prefix">av_timer</i>
											<input id="porcentaje2{{$cont}}" name="porcentaje2{{$cont}}" type="number"  min="0" max="100"   data-error=".errorTxt2"value="{{$seccion_det4->porcentaje_2}}">
											<label for="porcentaje2{{$cont}}">Porcentaje 2</label>
										</div>
									</div>
									<div class="col l12 m12 s12">
										<div class="input-field col s6 l6">
											<i class="material-icons prefix">chat</i>
											<input type="text" id="item3{{$cont}}" name="item3{{$cont}}"  value="{{$seccion_det4->item_3}}">
											<label for="item3{{$cont}}">Item 3</label>
										</div>
										<div class="input-field col s6 l6">
											<i class="material-icons prefix">av_timer</i>
											<input id="porcentaje3{{$cont}}" name="porcentaje3{{$cont}}" type="number"  min="0" max="100"   data-error=".errorTxt2"value="{{$seccion_det4->porcentaje_3}}">
											<label for="porcentaje3{{$cont}}">Porcentaje 3</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach 
					<input type="hidden" name="seccion4_cont" value="{{ $cont }}">
					@endif
					@endforeach
				</div>
	</form>
	</div>
	</div>
</div>