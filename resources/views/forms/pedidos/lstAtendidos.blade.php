             
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

                      if (count($patendidos) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }
                    ?>
                  <br>
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($patendidos) : 0; ?> registros. <br><br>
                          <table id={{ ($bandera)? "data-table-simple" : "" }} class="responsive-table display" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Cliente</th>
                                     <th>Fecha Pedido</th>
                                     <th>Importe</th>                      
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
                                     <th>Cliente</th>
                                     <th>Fecha Pedido</th>
                                     <th>Importe</th>                          
                                     <th>Estado</th>
                                     <th>Acciones</th>
                                  </tr>
                                  </tr>
                                </tfoot>

                               <tbody>
                                <?php 
                                      foreach ($patendidos as $valor) {
                                      $i++;
                                   ?>
                                <tr id="tr{{$valor->idcarrito}}">
                                  
                                     <td><?php echo $i; ?></td>
                                     
                                     @foreach($clientes as $clie)
                                     @if($clie->id === $valor->idcliente)
                                     <td>{{$clie->nombre}}  {{$clie->apellidos}}</td>
                                     @endif
                                     @endforeach
                                     <td>{{$valor->fecha}}</td>
                                     <td>{{$valor->total}}</td>
                                     <td class="center">
                                        @if($valor->estado == 'PE')
                                        <div class="chip center-align" style="width: 70%">
                                            <b>PENDIENTE DE PAGO</b>
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
                                       <a href="#updQueues" id="upd{{$valor->idcarrito}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Ver" data-id="{{$valor->idcarrito}}">
                                        <i class="material-icons" style="color: #7986cb ">visibility</i></a>                                  
                                     </td>
                                  </tr>
                                    
                                  <?php }} ?>
                               </tbody>
                            </table>
                          </div> <br>                   
                  </div>

                </div>


