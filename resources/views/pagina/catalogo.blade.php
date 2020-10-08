@extends('pagina.layouts.app')


@section('main-content')
	<div style="height: 7rem"></div>  
	<div class="container">
    <div class="row" style="position: fixed;  z-index: 2; width: 98.5%;">
      <form method="POST" class="fixed" action="{{ url('/catalogo/producto') }}" accept-charset="UTF-8" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">   
        <input type="text"  style="height: 2rem;" name="codigo"  class="header-search-input z-depth-2" placeholder="Ingrese el código del producto a buscar">
      </form>
    </div>
    <br><br>
    <div class="row">
      <div class="col s10">
        @foreach($tipo as $tip)
        @foreach($grupo as $grup)
        @if($tip->idgrupo == $grup->idgrupo)

         <?php 
            $i = 0; 
            $cont = 0;
            foreach ($producto as $prod) {
              if($prod->idtipo == $tip->idtipo){
                $cont = $cont + 1;
              }
            }
        ?>
        @if($cont > 0)
        <div class="row">      
         
          
          <h4 class="header" style="padding-bottom: 0px; margin-bottom: 0px">LINEA: {{$grup->descripcion}} 
          </h4>   
          <h4 class="header" style="padding-top: 0px; margin-top: 0px">TIPO: {{$tip->descripcion}}       
            @if($i > 10)
            <a href="{{url('/linea/mostrar')}}/{{$grup->idgrupo}}/{{$tip->idtipo}}" style="font-size: 14px"> ver más...</a>
            @endif
          </h4>  
           
            @foreach($producto as $datos)
              @if($grup->idgrupo == $datos->idgrupo and $tip->idtipo == $datos->idtipo )
              <?php $i = $i + 1; ?>
              <div class="col s12 m4 l3">
                <div class="item product" style="width: 100%">
                          <div class="card" style="overflow: hidden;">
                            <?php
                              $color = null; 
                              foreach ($parametros as $value) {
                                if($value->parametro == 'COLOR_DEFAULT'){
                                  $color = $value->valor_long;
                                }
                              }
                             ?>
                            @if(empty($color))
                            <div class="card-image waves-effect waves-block waves-light grey lighten-3" style="height: 15rem">
                            @else
                            <div class="card-image waves-effect waves-block waves-light {{$color}}" style="height: 15rem">
                            @endif 

                              @foreach($parametros as $val)
                              @if($val->parametro === 'MOSTRAR_PRECIO' and  $val->valor === 'SI')
                                @foreach($parametros as $param)
                                @if($param->parametro === 'PRECIO_DOLAR' and  $param->valor === 'SI')
                                  @if(!empty($datos->mon_extranjera))
                                  <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light teal accent-4">${{$datos->mon_extranjera}}</a>                         
                                  @endif
                                @endif
                                @if($param->parametro === 'PRECIO_DOLAR' and  $param->valor === 'NO')
                                  @if(!empty($datos->mon_nacional))
                                  <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light teal accent-4">S/{{$datos->mon_nacional}}</a>
                                  @endif
                                @endif
                                @endforeach
                              @endif
                              @endforeach
                              <a href="{{url('/catalogo/producto')}}/{{$datos->codigo}}" style="height: 100%">
                                @if(!empty($datos->url_imagen))
                                <div>
                                  <img src="{{asset('/')}}{{$datos->url_imagen}}" alt="item-img" class="center" style="width: 14rem; display: block; margin: auto;">
                                </div>
                                @else
                                @foreach($imagenes as $img)
                                  @if($img->idproducto == $datos->codigo AND $img->principal == 1)
                                    <img src="{{asset('/')}}{{$img->url_imagen}}" alt="item-img" class="center" style="width: 14rem; display: block; margin: auto;">
                                  @else
                                    <div class="center">
                                      <img src="{{asset('/images/productos/SIN FOTO.png')}}" alt="item-img" class="center" style="width: 14rem; display: block; margin: auto;">
                                    </div>
                                  @endif
                                @endforeach                                
                                @endif
                                
                              </a>
                            </div>
                            <ul class="card-action-buttons">
                              <li>
                                <a class="btn-floating waves-effect waves-light cyan" id="{{$datos->codigo}}" data-codigo='{{$datos->codigo}}'>
                                  <i class="material-icons">add_shopping_cart</i>
                                </a>
                              </li>
                              <li>
                                <a class="btn-floating waves-effect waves-light red accent-2">
                                  <i class="material-icons">thumb_up</i>
                                </a>
                              </li>
                              <li>
                                <a class="btn-floating waves-effect waves-light deep-orange accent-2">
                                  <i class="material-icons activator">info_outline</i>
                                </a>
                              </li>
                            </ul>
                            <div class="card-content" style="height: 90px">
                              <div class="row">
                                <div class="col s12">
                                  <p class="card-title grey-text text-darken-4" style="font-size: 16px"><a href="#" class="grey-text text-darken-4">{{substr($datos->nombre,0,30)}}...</a>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="card-reveal" style="display: none;">
                              <span class="card-title grey-text text-darken-4">
                                <i class="material-icons right">close</i>{{$datos->nombre}}</span>
                                <h5 class="blue-text text-darken-3"><b>COD.: </b>{{$datos->codigo}}</h5>
                              <p>{{$datos->descripcion}}</p>
                              @if(Auth::check())
                              <p><b>Stock disponible:</b> {{$datos->stock}}</p>
                              @endif
                            </div>
                          </div>
                    </div>
              </div>
                <?php 
                  if ($i == 7) {
                ?>

                @if($cont > 0)
                <div class="col s12 m4 l3">
                    <div class="item product" style="width: 100%">
                              <div class="card" style="overflow: hidden;">
                                  <div class="card-image waves-effect waves-block waves-light gradient-45deg-light-blue-cyan lighten-3" style="height: 15rem">
                                    <a href="{{url('/linea/mostrar')}}/{{$grup->idgrupo}}/{{$tip->idtipo}}" style="height: 100%">
                                      <i class="material-icons center" style="color:white; font-size: 10rem; display: block; padding-top: 20px">linear_scale</i>                                                                
                                  </a>
                                </div>
                                <div class="card-content">
                                  <div class="row">
                                    <div class="col s12">
                                      <p class="card-title grey-text text-darken-4" style="font-size: 16px">
                                        <a href="{{url('/linea/mostrar')}}/{{$grup->idgrupo}}/{{$tip->idtipo}}" class="grey-text text-darken-4">VER MÁS PRODUCTOS</a>
                                      </p>
                                    </div>
                                  </div>
                                </div>                            
                              </div>
                        </div>
                </div>
                @endif
                
                <?php
                    break;
                  }
                ?>
              @endif
            @endforeach
            
         
        </div>
        @endif   
        @endif
        @endforeach
        @endforeach
        <div class="center">
          {{ $producto->links() }}
        </div>
        
      </div>

      <div class="col s2" style="padding-left: 0px; padding-right: 0px; ">
        <div style="height: 7.4rem"></div>

        <div class="row">
                <div class="col s12">
                  <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                    <h5 style="padding-left: 0.5rem">CATEGORÍAS</h5>
                    @foreach($grupo2 as $grup)
                    <li class="">
                      <div class="collapsible-header">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <h6>{{$grup->descripcion}}</h6>
                      </div>
                      @foreach($tipo2 as $tip)
                      @if($tip->idgrupo == $grup->idgrupo)
                      <div class="collapsible-body" style="display: none; padding: 0px">
                        <div class="collection with-header">                              
                          <a href="{{url('/linea/mostrar')}}/{{$grup->idgrupo}}/{{$tip->idtipo}}" class="collection-item indigo-text text-lighten-1">{{$tip->descripcion}}</a>                            
                        </div>
                      </div>
                      @endif
                      @endforeach
                    </li>                   
                    @endforeach
                  </ul>
                </div>
        </div>
   
      </div>
    </div>
    
	
	</div>

	<div style="height: 2rem"></div>
@endsection

@section('script')
  @include('pagina.carrito.scripts.addCarrito')
@endsection