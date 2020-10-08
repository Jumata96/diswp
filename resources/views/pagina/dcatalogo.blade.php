@extends('pagina.layouts.app')


@section('main-content')
	<div style="height: 9rem"></div>
	<div class="container">
    @foreach($tipo as $tip)
    @foreach($grupo as $grup)
    @if($tip->idgrupo == $grup->idgrupo)

		<div class="row">      
      <div class="col s10">
      <h4 class="header">LINEA: {{$grup->descripcion}} TIPO: {{$tip->descripcion}}       
        <a href="#" style="font-size: 14px"></a>        
      </h4>      
        @foreach($producto as $datos)
          @if($grup->idgrupo == $datos->idgrupo and $tip->idtipo == $datos->idtipo)
          
    			<div class="col s12 m4 l3">
    				<div class="item product" style="width: 100%">
                      <div class="card" style="overflow: hidden;">
                        @if(empty($datos->idcolor))
                        <div class="card-image waves-effect waves-block waves-light grey lighten-3" style="height: 15rem">
                        @else
                        <div class="card-image waves-effect waves-block {{$datos->idcolor}}" style="height: 15rem">
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
                            <div class="center">
                              <img src="{{asset('/images/productos/img.jpg')}}" alt="item-img" class="align-" style="height: 15rem; background-size: 100% 100%;">sentiment_satisfied</i>
                            </div>
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
                        <div class="card-content">
                          <div class="row">
                            <div class="col s12">
                              <p class="card-title grey-text text-darken-4" style="font-size: 16px"><a href="#" class="grey-text text-darken-4">{{substr($datos->nombre,0,30)}}...</a>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="card-reveal" style="display: none; transform: translateY(0px);">
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
           
          @endif
        @endforeach
      </div> 

      <div class="col s2" style="padding-left: 0px; padding-right: 0px; ">
        <div style="height: 4.8rem"></div>

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
    @endif
    @endforeach
    @endforeach
	
	</div>
	<div style="height: 2rem"></div>
@endsection

@section('script')
  @include('pagina.carrito.scripts.addCarrito')
@endsection