@extends('pagina.layouts.app')

@section('inicio')
<div class="slider fullscreen" style="position: relative; height: 140px"></div>
@endsection

@section('main-content')
<section id="content" style="padding-top: 25px; padding-bottom: 40px">
          @foreach($nosotros as $datos)
          <div class="center">
            @if($datos->posicion == 'CENTRO')
              <center>
                <div class="intro promo">
                  <img src="{{asset('/')}}{{$datos->url_imagen}}" class="responsive-img" alt="" style="height: 250px; width: 250px">    
                </div>                
              </center>
              
              <h3 class="light text-lighten-3">{!! $datos->titulo !!}</h3>
              <div class="row">
                <div class="col l8 offset-l2" style="font-size: 18px">
                  <h5 class="light text-lighten-3">{!! $datos->descripcion !!}</h5>
                </div>
              </div>
            @endif
          </div>
            @if($datos->posicion == 'DERECHA')
              <div class="row valign-wrapper">     
                <div class="col l1"></div>            
                <div class="col s12 m7 l7 right-align" style="margin: 0px">
                  <h3 class="light text-lighten-3">{{$datos->titulo}}</h3>
                  <h5 class="light text-lighten-3">{!! $datos->descripcion !!}</h5>
                </div>
                <div class="col s12 m5 l3">
                  <center>
                    <div class="intro promo">
                      <img src="{{asset('/')}}{{$datos->url_imagen}}" class="responsive-img" alt="" style="height: 250px; width: 250px">    
                    </div>
                  </center>
                </div>
                <div class="col l1"></div>
              </div>
                            
            @endif      

            @if($datos->posicion == 'IZQUIERDA')
              <div class="row valign-wrapper">
                <div class="col s12 m4 l3">
                  <center>
                    <div class="intro promo">
                      <img src="{{asset('/')}}{{$datos->url_imagen}}" class="responsive-img" alt="" style="height: 250px; width: 250px">    
                    </div>
                  </center>
                </div>
                <div class="col s12 m7 l8 left-align" style="margin: 0px">
                  <h3 class="light text-lighten-3">{!! $datos->titulo !!}</h3>
                  <h5 class="light text-lighten-3">{!! $datos->descripcion !!}</h5>
                </div>  
                <div class="col l1"></div>              
              </div>
                            
            @endif      
          <br>
          @endforeach
</section>

<section id="content" class="blue darken-1" style="padding-top: 40px; padding-bottom: 40px">
          @foreach($mision as $datos)
          <div class="center white-text lighten-4">
            @if($datos->posicion == 'CENTRO')
              <center>
                <div class="intro promo2">
                  <img src="{{asset('/')}}{{$datos->url_imagen}}" class="responsive-img" alt="" style="height: 250px; width: 250px">    
                </div> 
              </center>
              
              <h3 class="light text-lighten-3">{!! $datos->titulo !!}</h3>
              <div class="row">
                <div class="col l8 offset-l2" style="font-size: 18px">
                  <h5 class="light text-lighten-3">{!! $datos->descripcion !!}</h5>
                </div>
              </div>
            @endif
          </div>
            @if($datos->posicion == 'DERECHA')
              <div class="row valign-wrapper white-text lighten-4">     
                <div class="col l1"></div>            
                <div class="col s12 m7 l7 right-align" style="margin: 0px">
                  <h3 class="light text-lighten-3">{!! $datos->titulo !!}</h3>
                  <h5 class="light text-lighten-3">{!! $datos->descripcion !!}</h5>
                </div>
                <div class="col s12 m5 l3">
                  <center>
                    <div class="intro promo2">
                      <img src="{{asset('/')}}{{$datos->url_imagen}}" class="responsive-img" alt="" style="height: 250px; width: 250px">    
                    </div>
                  </center>
                </div>
                <div class="col l1"></div>
              </div>
                            
            @endif      

            @if($datos->posicion == 'IZQUIERDA')
              <div class="row valign-wrapper white-text lighten-4">
                <div class="col s12 m4 l3">
                  <center>
                    <div class="intro promo2">
                      <img src="{{asset('/')}}{{$datos->url_imagen}}" class="responsive-img" alt="" style="height: 250px; width: 250px">    
                    </div>
                  </center>
                </div>
                <div class="col s12 m7 l8 left-align" style="margin: 0px">
                  <h3 class="light text-lighten-3">{!! $datos->titulo !!}</h3>
                  <h5 class="light text-lighten-3">{!! $datos->descripcion !!}</h5>
                </div>  
                <div class="col l1"></div>              
              </div>
                            
            @endif      
          <br>
          @endforeach
</section>

<section id="content" style="padding-top: 40px; padding-bottom: 40px">
          @foreach($vision as $datos)
          <div class="center">
            @if($datos->posicion == 'CENTRO')
              <center>
                <div class="intro promo">
                      <img src="{{asset('/')}}{{$datos->url_imagen}}" class="responsive-img" alt="" style="height: 250px; width: 250px">    
                </div>
              </center>
              
              <h3 class="light text-lighten-3">{{$datos->titulo}}</h3>
              <div class="row">
                <div class="col l8 offset-l2" style="font-size: 18px">
                  <h5 class="light text-lighten-3">{!! $datos->descripcion !!}</h5>
                </div>
              </div>
            @endif
          </div>
            @if($datos->posicion == 'DERECHA')
              <div class="row valign-wrapper">     
                <div class="col l1"></div>            
                <div class="col s12 m7 l7 right-align" style="margin: 0px">
                  <h3 class="light text-lighten-3">{!! $datos->titulo !!}</h3>
                  <h5 class="light text-lighten-3">{!! $datos->descripcion !!}</h5>
                </div>
                <div class="col s12 m5 l3">
                  <center>
                    <div class="intro promo">
                      <img src="{{asset('/')}}{{$datos->url_imagen}}" class="responsive-img" alt="" style="height: 250px; width: 250px">    
                    </div>
                  </center>
                </div>
                <div class="col l1"></div>
              </div>
                            
            @endif      

            @if($datos->posicion == 'IZQUIERDA')
              <div class="row valign-wrapper">
                <div class="col s12 m4 l3">
                  <center>
                    <div class="intro promo">
                      <img src="{{asset('/')}}{{$datos->url_imagen}}" class="responsive-img" alt="" style="height: 250px; width: 250px">    
                    </div>
                  </center>
                </div>
                <div class="col s12 m7 l8 left-align" style="margin: 0px">
                  <h3 class="light text-lighten-3">{!! $datos->titulo !!}</h3>
                  <h5 class="light text-lighten-3">{!! $datos->descripcion !!}</h5>
                </div>  
                <div class="col l1"></div>              
              </div>
                            
            @endif      
          <br>
          @endforeach
</section>
@endsection