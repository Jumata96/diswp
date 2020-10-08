@extends('pagina.layouts.app')


@section('main-content')
	<div style="height: 9rem"></div>

  @foreach($producto as $datos)
  <div class="container">
     <div class="row card-content">
        <div class="col s12 m7 l7">
          <div class="row" style="margin-bottom: 0px">
            @foreach($parametros as $val)
            @if($val->parametro == 'COLOR_FONDO_PROD' and !empty($val->valor_long))
            <div class="card slider {{$val->valor_long}}">
                <ul class="slider {{$val->valor_long}}" style="height: 600px;">
            @endif
            @endforeach
              @if(!empty($datos->url_imagen))
                  <li class="center">
                    <img class="materialboxed responsive-img" src="{{asset($datos->url_imagen)}}" style="background-size: 40%; background-repeat: no-repeat; margin-left: auto; margin-right: auto; display: block;">                   
                  </li> 
              @else
                @foreach($imagenes as $img)
                  @if($img->idproducto == $datos->codigo and $img->principal == 1)
                  <li class="center">
                      <img class="materialboxed responsive-img" src="{{asset($img->url_imagen)}}" style="background-size: 50%; background-repeat: no-repeat; margin-left: auto; margin-right: auto; display: block;"> 
                  </li>                         
                  @else
                  <li class="center">
                    <img class="materialboxed responsive-img" src="{{asset('/images/productos/SIN FOTO.png')}}" style="background-size: 50%; background-repeat: no-repeat; margin-left: auto; margin-right: auto; display: block;"> 
                  </li>  
                  @break     
                  @endif
                @endforeach
              @endif

                
                </ul>
              </div>
              <ul class="indicators">
                <li class="indicator-item active"></li>
                @foreach($imagenes as $img)
                  @if($img->idproducto == $datos->codigo and $img->principal != 1)
                    <li class="indicator-item active"></li>
                  @endif
                @endforeach 
              </ul>
            </div>

            <div class="row">               
              @foreach($imagenes as $img)
              @if($img->idproducto == $datos->codigo and $img->principal != 1)
              <div class="card animate fadeLeft col s12 m6 l2" style="height: 120px; margin-right: 10px">
                <div class="card-content">                  
                  <img class="materialboxed responsive-img" src="{{asset($img->url_imagen)}}" style="margin-left: auto; margin-right: auto; display: block;"> 
                </div>                  
              </div>
              
              @endif
              @endforeach             
            </div>
          </div>

       
        
     
      <div class="col s12 m5 l5">
        <ul class="collection with-header">
          <li class="collection-header">
            <h4>Datos Generales</h4>
          </li>
          <li class="collection-item">
            <div><b>CÓDIGO: </b>{{$datos->codigo}}</div>
          </li>
          <li class="collection-item">
            <div><b>PRODUCTO: </b>{{$datos->nombre}}</div>
          </li>
          <li class="collection-item">
            @foreach($grupo as $grup)
            <div><b>LINEA: </b>{{$grup->descripcion}}</div>
            @break
            @endforeach
          </li>
          <li class="collection-item">
            @foreach($tipo as $tip)
            <div><b>TIPO: </b>{{$tip->descripcion}}</div>
            @break
            @endforeach
          </li>
          <li class="collection-item">
            <div><b>DESCRIPCIÓN: </b>{{$datos->descripcion}}</div>
          </li>  
          @if(Auth::check())
          <li class="collection-item">
            <div><b>STOCK DISPONIBLE: </b>{{$datos->stock}}</div>
          </li>  
          @endif     
          @if(Auth::check())
          <li class="collection-item">
            <div><b>PRECIO: </b>$ {{$datos->mon_extranjera}}</div>
          </li>  
          @endif                 
        </ul>

        <a id="{{$datos->codigo}}" data-codigo='{{$datos->codigo}}' class="waves-effect waves-light btn-large right cyan" style="width: 100%">
          <i class="material-icons left">shopping_cart</i> Agregar al carrito
        </a>
        
      </div>   
 </div>
</div> 
  @endforeach
	<div style="height: 10rem"></div>
@endsection

 

@section('script')
  @include('pagina.carrito.scripts.addCarrito')
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.materialboxed');
      var instances = M.Materialbox.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
      $('.materialboxed').materialbox();
    });
  </script>
@endsection