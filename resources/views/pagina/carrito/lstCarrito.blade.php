@extends('pagina.layouts.app')

@section('main-content')
<div class="row" style="padding-top: 10rem">
  <div class="col s12 m10 l10 offset-m1 offset-l1">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>CARRITO DE COMPRAS</h2>
                  </div>
                 
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" href="{{ url('/empresa/nuevo') }}" data-position="top" data-delay="500" data-tooltip="Nuevo">
                            <i class="material-icons" style="color: #03a9f4">add</i>
                          </a>
                          <a style="margin-left: 6px"></a>                          
                            
                        </div>  
                        @include('forms.scripts.modalInformacion')         
                  </div>
                                    
                  <div class="row cuerpo">
                    <?php 

                      $bandera = false;

                      if (count($vcarrito) > 0) {
                        # code...
                        $bandera = true;
                        $i = 0;
                      }

                    ?>

                  <br>
                  <div class="row">
                    <div class="col s12 m12 l12">
                      
                        <div class="card-content">
                          Existen <?php echo ($bandera)? count($vcarrito) : 0; ?> registros. <br><br>
                          <table id="{{ ($bandera)? "data-table-simple" : "" }}" class="responsive-table display" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th width="10px">#</th>
                                     <th width="100px" class="center">Imagen</th>
                                     <th width="250px">Producto</th>
                                     <th width="20px" class="center">Stock</th>
                                     <th width="20px" class="center">Precio</th>
                                     <th width="20px" class="center">Cantidad</th>
                                     <th width="20px" class="center">Total</th>    
                                     <th width="20px" class="center">Acción</th>
                                  </tr>
                               </thead>
                               <?php
                                    if($bandera){                                                           
                                ?>
                               <tfoot>
                                <?php 
                                    $total = 0;

                                    foreach ($vcarrito as $val) {
                                      $total = $total + $val->total;
                                    }
                                  ?>
                                  <tr>
                                     <th></th>
                                     <th class="center"></th>
                                     <th></th>
                                     <th></th>
                                     <th class="center">TOTAL</th>
                                     <th id="total" class="center">$ {{$total}}</th>    
                                     <th class="center"></th>
                                  </tr>
                                </tfoot>

                               <tbody>
                                  <?php 
                                      foreach ($vcarrito as $datos) {
                                      $i++;
                                  ?>
                                  <tr id="{{$datos->idcarrito}}" data-id="{{$datos->idcarrito}}" data-idproducto="{{$datos->idproducto}}">                                  
                                     <td><?php echo $i; ?></td>
                                     @foreach($producto as $prod)
                                     @if($prod->codigo == $datos->idproducto)  
                                     <td class="center">                                      
                                       <img src="{{asset('/')}}{{$prod->url_imagen}}" alt="" class=" responsive-img valign profile-image white lighten-5" style="height: 100px; width: 100px">                                      
                                     </td>
                                     <td><?php echo $prod->descripcion ?></td>
                                     <td class="center"><?php echo $prod->stock ?></td>
                                     @endif
                                    @endforeach
                                     <td class="center" id="p{{$datos->idcarrito}}" data-precio="{{$datos->precio}}">$ <?php echo $datos->precio ?></td>
                                     <td>
                                      <input type="number" id="c{{$datos->idcarrito}}" value="{{$datos->cantidad}}">                                        
                                      </td>
                                     <td class="center"><b id="t{{$datos->idcarrito}}">$ <?php echo $datos->total ?></b></td>                                   
                                     <td class="center">
                                       <a href="#confirmacion{{$i}}" class="btn-large btn-floating waves-effect waves-light grey lighten-5 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Eliminar">
                                        <i class="material-icons" style="color: #dd2c00">remove</i>
                                      </a>
                                     </td>
                                  </tr>
                                    @include('pagina.carrito.scripts.alertaConfirmacion')

                                  <?php }} ?>                                  
                               </tbody>
                            </table>
                            <div class="col s12" style="padding-top: 40px">                                
                                <a href="{{url('/shopCart')}}" class="waves-effect waves-light btn-large right light-green darken-3" id="importLinea" style="margin-left: 20px;">
                                  <i class="material-icons left">exit_to_app</i> Finalizar Compra
                                </a>    
                                <a id="update" class="waves-effect waves-light btn-large right grey" id="importLinea">
                                  <i class="material-icons left">autorenew</i> Actualizar Carrito
                                </a>                               
                              </div>
                          </div>
                    
                  </div>

                  </div>
                </div>
              </div>
</div>     
@endsection

@section('script')
  @include('pagina.carrito.scripts.updCarrito')
  @include('pagina.carrito.scripts.dltCarrito')
@endsection
