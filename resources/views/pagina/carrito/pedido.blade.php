@extends('pagina.layouts.app')

@section('main-content')
<div class="row" style="padding-top: 10rem">
  <div class="col s12 m10 l10 offset-m1 offset-l1">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>COMPRA</h2>
                  </div>
                 
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          @foreach($carrito as $datos)
                          <a href="{{url('/pedido/eliminar')}}/{{$datos->idcarrito}}" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped"  data-position="top" data-delay="500" data-tooltip="eliminar orden">
                            <i class="material-icons" style="color: #03a9f4">delete</i>
                          </a>
                          @endforeach
                          <a style="margin-left: 6px"></a>                          
                                                        
                        </div>  
                        @include('forms.scripts.modalInformacion')         
                  </div>
                                    
                  <div class="row cuerpo">
                    <div class="row">
                      <br> 
                      <form class="right-alert" id="myForm" method="POST" accept-charset="UTF-8">
                      @foreach($carrito as $val)                      
                      <div class="col s12 m8 l8">                                      
                        <div class="row">
                          <input type="hidden" name="id" value="{{ $val->idcarrito }}">
                          
                          <div class="card white">
                            <div class="card-content">
                                <span class="card-title">Datos Generales</span>
                                <div class="row">                              
                                  <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">sim_card</i>
                                    <input id="RUC" name="ruc" type="text" value="{{Auth::user()->ruc}}" maxlength="11">
                                    <label for="RUC">RUC</label>
                                    <div id="error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                  </div>
                                  <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">clear_all</i>
                                    <input id="razon_social" name="razon_social" type="text" data-error=".errorTxt2" maxlength="150" value="{{Auth::user()->razon_social}}">
                                    <label for="razon_social" class="active">Razón Social</label>
                                    <div id="error2" style="color: red; font-size: 12px; font-style: italic;"></div>
                                  </div>                                
                                  <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">person_inline</i>
                                    <input id="nombre" name="nombre" type="text" value="{{Auth::user()->nombre}}" minlength="9" maxlength="11">
                                    <label for="nombre">Nombre</label>
                                    <div id="error3" style="color: red; font-size: 12px; font-style: italic;"></div>
                                  </div>
                                  <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">person_outline</i>
                                    <input id="apellidos" name="apellidos" type="text" value="{{Auth::user()->apellidos}}" maxlength="50">
                                    <label for="apellidos">Apellidos</label>
                                    <div id="error4" style="color: red; font-size: 12px; font-style: italic;"></div>
                                  </div>
                                  <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">room</i>
                                    <input id="direccion" name="direccion" type="text" value="{{Auth::user()->direccion}}">
                                    <label for="direccion" class="">Dirección</label>
                                    <div id="error5" style="color: red; font-size: 12px; font-style: italic;"></div>
                                  </div>                                
                                  <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">call</i>
                                    <input id="telefono" name="telefono" type="number" value="{{Auth::user()->telefono}}">
                                    <label for="telefono">Telefono/Celular</label>
                                    <div id="error6" style="color: red; font-size: 12px; font-style: italic;"></div>
                                  </div>                          
                                </div>

                            </div>
                        </div>
                        
                        </div>

                        <div class="row">
                          <div class="col s12 m12 l12">                                      
                            <div class="card white">
                              <div class="card-content">
                                  <span class="card-title">Datos Bancarios</span>
                                  <div class="row">                                     
                                    <div class="col s12">
                                      <table class="striped">
                                        <thead>
                                          <tr>
                                            <th data-field="id">Imagen</th>
                                            <th data-field="name">Banco</th>
                                            <th data-field="price">Nro. de Cuenta</th>
                                            <th data-field="titular">Titular</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($fpago as $val)
                                          <tr>
                                            <td>
                                              <input class="with-gap" name="group1" type="radio" id="test{{$val->codigo}}" value="{{$val->codigo}}" checked="">
                                              <label for="test{{$val->codigo}}"></label>
                                              <img src="{{asset('/')}}{{$val->url_imagen}}" alt="" class="responsive-img valign profile-image white lighten-5" style="height: 50px; width: 50px">
                                            </td>
                                            <td>{{$val->banco}}</td>
                                            <td>{{$val->numero_cta}}</td>
                                            <td>{{$val->titular}}</td>                                            
                                          </tr>   
                                          @endforeach                                       
                                        </tbody>
                                      </table>
                                      <div id="error8" style="color: red; font-size: 12px; font-style: italic;"></div>
                                    </div>                         
                                                                             
                                  </div>

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col s12 m12 l12">                                      
                            <div class="card white">
                              <div class="card-content">
                                  <span class="card-title">Indicar agencia de transporte y direcciones alternativas</span>
                                  <div class="row">                              
                                    <div class="input-field col s12">
                                      <i class="material-icons prefix">mode_edit</i>
                                      <textarea id="descripcion" name="descripcion" class="materialize-textarea" lenght="200" style="height: 150px;"></textarea>
                                      <label for="descripcion" class="active">Descripción</label>
                                    </div>                
                                    <div id="error7" style="color: red; font-size: 12px; font-style: italic; padding-left: 4rem"></div>
                                  </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>                      
                      @endforeach
                      </form>

                      <div class="col s12 m5 l4 ">
                                  <ul id="task-card" class="collection with-header" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
                                      <li class="collection-header cyan">
                                          <h4 class="task-card-title">Detalle Orden</h4>
                                          
                                      </li>
                                     @foreach($dcarrito as $val)
                                      <li class="collection-item dismissable grey-text darken-1" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                        <div class="row">
                                          <div class="col l9">
                                          @foreach($producto as $prod)
                                          @if($prod->codigo == $val->idproducto)
                                            {{$prod->descripcion}} <b>x {{$val->cantidad}}</b>
                                          @endif
                                          @endforeach  
                                        </div>
                                        <div class="col l3">
                                          <a><span class="task-cat teal" style="font-size: 16px; margin: 0px; padding: 0px">$ {{$val->total}}</span></a>
                                        </div>  
                                        </div>
                                        
                                                                                
                                      </li>
                                      @endforeach

                                      <li class="collection-item dismissable grey lighten-4 center" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                          <b style="font-size: 20px">TOTAL</b>
                                          @foreach($carrito as $val)
                                          <a href="#" class="secondary-content"><span class="task-cat light-green darken-4" style="font-size: 20px">$ {{$val->total}}</span></a> @endforeach                                       
                                      </li>
                                      
                                  </ul>
                      </div>

                      
                      <div class="col s12 m8 l4">                                
                                  <a id="add" class="waves-effect waves-light btn-large right grey darken-1" style="width: 100%">
                                    <i class="material-icons left">exit_to_app</i> Realizar la Compra
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
  @include('pagina.carrito.scripts.addCompra')
@endsection
