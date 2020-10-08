             
                  <div class="card-header sub-header">
                        <div class="col s12 m12 herramienta">
                          
                          <a href="#informacion" class="btn-floating waves-effect waves-light light-blue lighten-1 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Ver información del Formulario">
                            <i class="material-icons">info</i></a>
                          <a class="dropdown-button btn-floating right waves-effect waves-light grey lighten-5" href="#!" data-activates="dropdown2">
                            <i class="material-icons" style="color: #424242">vertical_align_bottom</i></a>            
                        </div>    

                        @include('forms.scripts.modalInformacion')       
                              
                  </div>
                                    
                  <div class="row cuerpo">
                    <?php 
                      $bandera = false;

                      if (count($clientesFB) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }
                    ?>
                  <br>
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($clientesFB) : 0; ?> registros. <br><br>
                          <table id={{ ($bandera)? "data-table-simple" : "" }} class="responsive-table display" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Router</th>
                                     <th>Desc. Perfil</th>
                                     <th>Precio</th>
                                     <th>Target</th>                         
                                     <th class="center">Estado</th>
                                     <th class="center">Acciones</th>
                                  </tr>
                               </thead>
                               <?php
                                    if($bandera){                                                           
                                ?>
                               <tfoot>
                                  <tr>
                                     <tr>
                                     <th>#</th>
                                     <th>Nombre</th>
                                     <th>Apellidos</th>
                                     <th>RUC</th>
                                     <th>Razón Social</th>                         
                                     <th>Estado</th>
                                     <th>Acciones</th>
                                  </tr>
                                  </tr>
                                </tfoot>

                               <tbody>
                                <?php 
                                      foreach ($clientesFB as $valor) {
                                      $i++;
                                   ?>
                                <tr id="tr{{$valor->id}}">
                                  
                                     <td><?php echo $i; ?></td>
                                     <td>{{$valor->nombre}}</td>
                                     <td>{{$valor->apellidos}}</td>
                                     <td>{{$valor->ruc}}</td>
                                     <td>{{$valor->razon_social}}</td>
                                     <td class="center">
                                        @if($valor->estado == 0)
                                        <div class="chip center-align" style="width: 70%">
                                            <b>NO DISPONIBLE</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @else
                                        <div class="chip center-align teal accent-4 white-text" style="width: 70%">
                                          <b>ACTIVO</b>
                                          <i class="material-icons"></i>
                                        </div>
                                      @endif
                                     </td>
                                     <td class="center" style="width: 9rem">
                                       <a href="#updQueues" id="upd{{$valor->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Ver" data-id="{{$valor->id}}">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i></a>                                       
                                       <a href="#confirmacion{{$valor->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
                                        <i class="material-icons" style="color: #dd2c00">remove</i></a> 
                                       @if($valor->estado == 1)                                      
                                       <a href="#confirmacion2{{$valor->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Desabilitar">
                                        <i class="material-icons" style="color: #757575 ">clear</i></a>
                                       @else
                                       <a href="#confirmacion3{{$valor->id}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Habilitar">
                                        <i class="material-icons" style="color: #2e7d32 ">check</i></a>
                                       @endif
                                     </td>
                                  </tr>
                                    
                                  <?php }} ?>
                               </tbody>
                            </table>
                          </div> <br>                   
                  </div>

                </div>


