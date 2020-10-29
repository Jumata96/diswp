<div id="modalVideos" class="modal modal-fixed-footer" style="height: 100%; overflow: hidden;">  
	<div class="modal-content" style="padding: 0px; overflow-y: disabled; height: 300%; background-color: #f9f9f9">
		<div class="card-header" style="position: fixed; width: 100%; z-index: 2">                    
			<i class="fa fa-table fa-lg material-icons">receipt</i>
			<h2>LISTA DE VIDEOS</h2>   
			</div> <div class="row card-header sub-header" style="margin-top: 3.15rem; margin-left: 0rem; margin-right: 0rem; position: fixed; width: 100%; z-index: 3">
			<div class="col s12 m12 herramienta">                         
			  <a id="select" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" data-position="top" data-delay="500" data-tooltip="Seleccionar">
				<i class="material-icons " style="color: #2E7D32">check</i></a>
			  <a style="margin-left: 6px"></a>    
			  <a   id="" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped modal-close" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
				<i class="material-icons" style="color: #424242">keyboard_tab</i></a>  
			</div>  
			@include('forms.scripts.modalInformacion')              
			
	  </div>
	  <br>
		<form action="#" id="myFormCkeck">
			<div class="row cuerpo">
				<?php  
				$bandera = false; 
				if (count($videos) > 0) { 
					$bandera = true;
					$i = 0;
				} 
				?> 
				<br> 
				<div class="row">  
						<div class="card-content herramienta">
							@php
								$contador=0;
							@endphp
							Existen <?php echo ($bandera)? count($videos) : 0; ?> registros. <br><br><br>
							<table class="centered striped" >
								<thead>
									<tr>
										<th>#</th>
										<th class="center">Titulo</th>
										<th>descripción</th> 
										<th>Fecha de registro</th>
										<th>Acciones</th>
									</tr>
								</thead>
								
								<tbody>
									<?php
										if($bandera){                                                           
									?> 
									<tr>
									<?php foreach ($videos as $datos) { $i++;?>
										 <td ><?php echo $i; ?></td>
										 <td> {{$datos['titulo'] }}</td>
										 <td>{{$datos['descripcion']}}</td>
										 <td>{{ date("Y-m-d", strtotime($datos['fecha_creacion']))}}</td> 
										 <td class="center" style="width: 9rem"> 
											<a  class="btnSeleccionarVideo btn-floating waves-effect waves-light grey lighten-5 tooltipped"
											 data-tooltip="Seleccionar"  data-id="{{$datos['codigo']}}" ><i class="material-icons " style="color: #2E7D32">check</i></a>  
								  		</td>
									</tr>  
									 <?php }} else{?>
										<tr>
											<td colspan="5" class="center" style="color: red"><h5>Todos los alumnos fueron agregados </h5></td>
										</tr>
										<?php } ?> 

								 
								</tbody>
							</table> 
						</div>  
				</div>
			
			</div>
		</form>
	</div>


</div>

