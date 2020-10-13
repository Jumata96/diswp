@extends('layouts2.app')
@section('titulo','Tikets Asignados')

@section('main-content')  
@foreach ($cursos as $datos) 
<br>
<div class="row">
	{{-- <div class="col s12 m12 l12">
		<div class="card white">
						 
		 
		</div>
	</div> --}}
	<div class="col s12 m12 l12"> 
		<input type="hidden" name="idCurso" value="{{ $datos->codigo }}">
				  <div class="card">
					<div class="card-header">
					  <i class="fa fa-table fa-lg material-icons">receipt</i>
					  <h2>GESTIONAR CURSOS</h2>
					</div>
				   <form class="formValidate right-alert" id="formCursos" method="POST" action="{{ url('/carrusel/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
					<div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
						  <div class="col s12 m12">
							<a  href="#modalVideos" id="add_cursos" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" name="action" data-position="top" data-delay="500" data-tooltip="AGREGAR VIDEOS">
							 <i class="material-icons" style="color: #b71c1c">playlist_add</i>
							</a>
							<a  href="#modalClientes" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" name="action" data-position="top" data-delay="500" data-tooltip="AGREGAR CLIENTES">
								<i class="material-icons" style="color: #2E7D32">playlist_add</i>
							</a> 
							<a style="margin-left: 6px"></a>
							<a href="{{url('/lstCursos')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
							  <i class="material-icons" style="color: #424242">keyboard_tab</i>
							</a>
						  </div>
						  @include('forms.scripts.modalInformacion')
						  @include('forms.permisos.modalVideos')
						  @include('forms.permisos.modalClientes')

					</div>
  
					<br>
					<div class="row cuerpo">
					 <input type="hidden" name="_token" value="{{ csrf_token() }}">  
					 {{-- <div class="col s12 m12 l12"> 
						<div class="col s12 m6 l4">
							<div class="card light-blue lighten-2 gradient-shadow min-height-100 white-text">
								<div class="padding-4">
									<div class="col s7 m7">
									<i class="material-icons background-round mt-5">attach_money</i>
									<p>Videos</p>
									</div>
									<div class="col s5 m5 right-align">
									<h4 class="mb-0" style="color: white"> </h4>
									<p class="no-margin">Total</p>
									<p></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col s12 m6 l4">
							<div class="card green lighten-2 gradient-shadow min-height-100 white-text">
								<div class="padding-4">
									<div class="col s7 m7">
									<i class="material-icons background-round mt-5">attach_money</i>
									<p>	Clientes</p>
									</div>
									<div class="col s5 m5 right-align">
									
									<h4 class="mb-0" style="color: white"> </h4>
									<p class="no-margin">Total</p>
									<p></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col s12 m6 l4">
							<div class="card red lighten-2 gradient-shadow min-height-100 white-text">
								<div class="padding-4">
									<div class="col s7 m7">
									<i class="material-icons background-round mt-5">attach_money</i>
									<p>Ingresos</p>
									</div>
									<div class="col s5 m5 right-align">
									<h4 class="mb-0" style="color: white"></h4>
									<p class="no-margin">Total</p>
									<p></p>
									</div>
								</div>
							</div>
						</div>  							
					</div> --}} 
					 <div class="col s12 m12 l4 bordes"   >
						<ul id="task-card" class=" collection with-header " style=" background-color: white; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);" >
							<li class="collection-header cyan" >
								<h6 class="task-card-title">Videos</h6> 
							</li>  
							<li>  
							  <td  class="card-content"> 
								@foreach ($videosDet as $video)
								<div class="col s6 m4 l6 center" style="word-wrap: break-word; ">
								  <img src="{{asset('images/TipoArchivo/file-video.png')}}" alt="" id="" class=" responsive-img valign profile-image " style="width:45px;height:45px ;"><br>{{$video->nombre_video}}</div>  
								@endforeach  
							  </td>  
							</li> 
							<br><br><br><br> <br><br> 
						
						</ul>
					</div>   
					<div class="col s12 m6 l8">
						<div class="card white">
							<div class="card-content">  
									<div class="row cuerpo">
										<?php 
				  
										  $bandera = false;
				  
										  if (count($clientesDet) > 0) {
											# code...
											$bandera = true;
											$i = 0;
										  }
				  
										?> 
									  <br>
									  <div class="row">
										<div class="col s12 m12 l12">
										  
											<div class="card-content">
											  Existen <?php echo ($bandera)? count($clientesDet) : 0; ?> registros. <br><br>
											  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
												  <thead>
													  <tr>
														<th>#</th>
														<th>Cliente</th>
														<th>Documento</th> 
														<th>Estado</th>
														<th>Acción</th>
													  </tr>
												  </thead>
												  <?php
														if($bandera){                                                           
													?> 
												  <tbody>
													<tr>
													  <?php 
														  foreach ($clientesDet as $datos) {
														  $i++;
													  ?>
														<td><?php echo $i; ?></td>
														
														<td><?php echo $datos->nombre_cliente ?></td> 
														<td> {{$datos->nro_documento}}</td> 
														<td>
															@if($datos->estado == 0)
															<div id="u_estado" class="chip center-align" style="width: 70%">
																	<b>NO DISPONIBLE</b>
																<i class="material-icons"></i>
															</div>
															@else
															<div id="u_estado2" class="chip center-align teal accent-4 white-text" style="width: 70%">
																<b>ACTIVO</b>
																<i class="material-icons"></i>
															</div>
															@endif
													  </td>
													  <td class="center" style="width: 9rem">
														 {{-- <a href="{{ url('/zonas/mostrar') }}/{{$datos->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Ver">
														  <i class="material-icons" style="color: #7986cb ">visibility</i>
														</a>     --}}                                   
														 <a href="#confirmacion{{$i}}"  class="btnEliminarZona btn-floating waves-effect waves-light grey lighten-5 tooltipped  " data-id="{{$datos->id}}" data-position="top" data-delay="500" data-tooltip="Eliminar">
														  <i class="material-icons" style="color: #dd2c00">remove</i>
														</a>
														@if($datos->estado == 1)                                      
														 <a href="#h_confirmacion2{{$datos->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
														  <i class="material-icons" style="color: #757575 ">clear</i></a>
														 @else
														 <a href="#h_confirmacion3{{$datos->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
														  <i class="material-icons" style="color: #2e7d32 ">check</i></a>
														 @endif
													  </td>
													  </tr>
													  @include('forms.permisos.scripts.alertaConfirmacionClientes')
														{{-- @include('forms.cursos.scripts.alertaConfirmacion')
														@include('forms.cursos.scripts.alertaConfirmacion2')
														@include('forms.cursos.scripts.alertaConfirmacion3') --}}
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

{{-- <div class="row" onload="funload();">
	<div class="col s12 m12 l12"> 
		<div class="col s12 m6 l4">
			<div class="card light-blue lighten-2 gradient-shadow min-height-100 white-text">
				<div class="padding-4">
					<div class="col s7 m7">
					<i class="material-icons background-round mt-5">attach_money</i>
					<p>Videos</p>
					</div>
					<div class="col s5 m5 right-align">
					<h4 class="mb-0" style="color: white"> </h4>
					<p class="no-margin">Total</p>
					<p></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l4">
			<div class="card green lighten-2 gradient-shadow min-height-100 white-text">
				<div class="padding-4">
					<div class="col s7 m7">
					<i class="material-icons background-round mt-5">attach_money</i>
					<p>	Clientes</p>
					</div>
					<div class="col s5 m5 right-align">
					
					<h4 class="mb-0" style="color: white"> </h4>
					<p class="no-margin">Total</p>
					<p></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l4">
			<div class="card red lighten-2 gradient-shadow min-height-100 white-text">
				<div class="padding-4">
					<div class="col s7 m7">
					<i class="material-icons background-round mt-5">attach_money</i>
					<p>Ingresos</p>
					</div>
					<div class="col s5 m5 right-align">
					<h4 class="mb-0" style="color: white"></h4>
					<p class="no-margin">Total</p>
					<p></p>
					</div>
				</div>
			</div>
		</div>  							
	</div> 
	<div class="col s12 m12 l12"> 
		<div class="col s12 m12 l4 bordes"   >
			<ul id="task-card" class=" collection with-header " style=" background-color: white; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);" >
				<li class="collection-header cyan" >
					<h6 class="task-card-title">Videos</h6> 
				</li>  
				<li>  
				  <td  class="card-content"> 
					<div class="col s6 m4 l4 center" style="word-wrap: break-word; " >
						<img src="{{asset('images/TipoArchivo/IMAGE.png')}}" alt="" id="" class=" responsive-img valign profile-image " style="width:45px;height:45px ;"> </div>  
					<div class="col s6 m4 l4 center" style="word-wrap: break-word; " >
							<img src="{{asset('images/TipoArchivo/IMAGE.png')}}" alt="" id="" class=" responsive-img valign profile-image " style="width:45px;height:45px ;" >   </div>  
					<div class="col s6 m4 l4 center" style="word-wrap: break-word; " >
								<img src="{{asset('images/TipoArchivo/IMAGE.png')}}" alt="" id="" class=" responsive-img valign profile-image " style="width:45px;height:45px ;" >   </div>  
								<div class="col s6 m4 l4 center" style="word-wrap: break-word; " >
									<img src="{{asset('images/TipoArchivo/IMAGE.png')}}" alt="" id="" class=" responsive-img valign profile-image " style="width:45px;height:45px ;" >   </div>  
								<div class="col s6 m4 l4 center" style="word-wrap: break-word; " >
										<img src="{{asset('images/TipoArchivo/IMAGE.png')}}" alt="" id="" class=" responsive-img valign profile-image " style="width:45px;height:45px ;" >   </div>  
								<div class="col s6 m4 l4 center" style="word-wrap: break-word; " >
											<img src="{{asset('images/TipoArchivo/IMAGE.png')}}" alt="" id="" class=" responsive-img valign profile-image " style="width:45px;height:45px ;" >   </div>  
					 

				  </td>    

				</li> 
			</ul>
		</div>   
		<div class="col s12 m6 l8">
			<div class="card white">
				<div class="card-content"> 
					<div class="row cuerpo"> 
					<div class="row">
						<div class="col s12 m12 l12">
							<span>Clientes</span>
						
							<div class="card-content">
								<p id="registros"></p>
								<table id="data-table-simple" class="tablaVendedorSaldoVer responsive-table display centered" cellspacing="0">
									<thead>
										<tr>
											<th>#</th>  
											<th>Nombre</th> 
											<th>Documento</th>
											<th>Acciones</th> 
										</tr>
									</thead> 
									<tfoot  >
										<tr>
											<th class="center" >#</th> 
											<th class="center">Nombre</th> 
											<th class="center">Documento</th>
											<th class="center">Acciones</th> 
										</tr>
										</tfoot>

									<tbody>
									 
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
</div> --}}

@endforeach 
@endsection

 

@section('script')  
@include('forms.permisos.scripts.addVideo')
@include('forms.permisos.scripts.addClientes')
@endsection

