<div id="modalAddCurso" class="modal modal-fixed-footer">  
			<div class="card-header">                    
				<i class="fa fa-table fa-lg material-icons">receipt</i>
				<h2>LISTA DE CURSOS</h2>   
			</div> 
			<div class="row card-header sub-header"  >
				<div class="col s12 m12 herramienta">   
					<center><h5>LISTA DE CURSOS</h5></center>  
				</div>   
			</div>
					<div class="row cuerpo">
						<?php  
						$bandera = false; 
						if (count($cursos) > 0) {
							# code...
							$bandera = true;
							$i = 0;
						} 
						?>  
						<div class="row">  
								<div class="card-content">
									Existen <?php echo ($bandera)? count($cursos) : 0; ?> registros. <br><br>
									<table id={{ ($bandera)? "data-table-simple" : "" }} class="responsive-table display" cellspacing="0">
										<thead>
											<tr>
												<th>#</th>
												<th>Nombre</th>
												<th>Descripción</th>
												<th>Acción</th>
											</tr>
										</thead>
										<?php
												if($bandera){                                                           
											?>
										<tfoot>
											<tr>
												<th>#</th>
												<th>Nombre</th>
												<th>Descripción</th>
												<th>Acción</th>
											</tr>
											</tfoot>

										<tbody>
											<tr>
											<?php 
													foreach ($cursos as $datos) {
													$i++;
												?>
												<td><?php echo $i; ?></td> 
												<td><?php echo $datos->nombre ?></td>
												<td>{{$datos->descripcion}}</td>
												<td class="center" style="width: 9rem">
													<a  class="btnSeleccionarCurso btn-floating waves-effect waves-light grey lighten-5 tooltipped " data-tooltip="Seleccionar Equipo" 
													data-id="{{$datos->codigo}}"    
													><i class="material-icons " style="color: #2E7D32">check</i></a>
												</td>
											</tr>
												{{-- @include('forms.cursos.scripts.alertaConfirmacion') --}}
											<?php }} ?>
										</tbody>
									</table>
								</div>  
						</div>
					</div>
	   
 
</div>
  
