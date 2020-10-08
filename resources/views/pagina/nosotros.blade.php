<section id="content">
          @foreach($mision as $datos)
          <div class="center">
            <h3 class="light text-lighten-3"><b>{{$datos->titulo}}</b></h3>
            <div class="row">
              <div class="col l8 offset-l2" style="font-size: 18px">
                <h5 class="light text-lighten-3">{{$datos->descripcion}}</h5>
              </div>
            </div>
            
          </div>
          @endforeach

          <div class="center light text-lighten-3">
            @foreach($ddmision as $val)           
            <div class="row">
              <div class="col s12 l8 offset-l2">
                @foreach($dmision as $datos)
                @if($datos->fila == $val->fila)
                <div class="col s12 m4 l4">
                  <div class="center promo intro">
                    @if($datos->tipo_img_icon == 0)
                      @if(empty($datos->idtipo))
                      <a href="#">
                      @else
                      <a href="{{url('/producto/tipo')}}/{{$datos->idtipo}}">
                      @endif
                        <i class="material-icons">{{$datos->icono}}</i>
                      </a>                    
                    @else
                      @if(empty($datos->idtipo))
                      <a href="#">
                      @else
                      <a href="{{url('/producto/tipo')}}/{{$datos->idtipo}}">
                      @endif
                        <img src="{{asset('/')}}{{$datos->url_imagen}}" alt=""  style="height: 120px; width: 120px">
                      </a>                    
                    @endif
                    <p class="promo-caption">{{$datos->titulo}}</p>
                    <p class="light center" style="font-size: 1.14rem">{{$datos->descripcion}}</p>
                  </div>
                </div>
                @endif
                @endforeach
              </div>              
            </div>
            @endforeach
          </div>
</section>

<section id="content" class="blue darken-1" style="padding-top: 40px; padding-bottom: 40px">
          @foreach($vision as $datos)
          <div class="center white-text lighten-4">
            <h3 class="light text-lighten-3"><b>{{$datos->titulo}}</b></h3>
            <div class="row">
              <div class="col l8 offset-l2" style="font-size: 18px">
                <h5 class="light text-lighten-3">{{$datos->descripcion}}</h5>
              </div>
            </div>   
          </div>      
          @endforeach   

          <div class="center light white-text lighten-3">
            @foreach($ddvision as $val)           
            <div class="row">
              <div class="col s12 l8 offset-l2">
                @foreach($dvision as $datos)
                @if($datos->fila == $val->fila)
                <div class="col s12 m4 l4">
                  <div class="center promo intro">
                    @if($datos->tipo_img_icon == 0)
                      @if(empty($datos->idtipo))
                      <a href="#">
                      @else
                      <a href="{{url('/producto/tipo')}}/{{$datos->idtipo}}">
                      @endif
                        <i class="material-icons">{{$datos->icono}}</i>
                      </a>                    
                    @else
                      @if(empty($datos->idtipo))
                      <a href="#">
                      @else
                      <a href="{{url('/producto/tipo')}}/{{$datos->idtipo}}">
                      @endif
                        <img src="{{asset('/')}}{{$datos->url_imagen}}" alt=""  style="height: 120px; width: 120px">
                      </a>                    
                    @endif
                    <p class="promo-caption">{{$datos->titulo}}</p>
                    <p class="light center" style="font-size: 1.14rem">{{$datos->descripcion}}</p>
                  </div>
                </div>
                @endif
                @endforeach
              </div>              
            </div>
            @endforeach
          </div>
</section>

 <section id="content" style="padding-top: 40px; padding-bottom: 40px">          
          @foreach($general as $datos)
          <div class="center">
            <h3 class="light text-lighten-3"><b>{{$datos->titulo}}</b></h3>
            <div class="row">
              <div class="col l8 offset-l2" style="font-size: 18px">
                <h5 class="light text-lighten-3">{{$datos->descripcion}}</h5>
              </div>
            </div>
            
          </div>
          @endforeach

          <div class="center light text-lighten-3">
            @foreach($ddgeneral as $val)           
            <div class="row">
              <div class="col s12 l8 offset-l2">
                @foreach($dgeneral as $datos)
                @if($datos->fila == $val->fila)
                <div class="col s12 m4 l4">
                  <div class="center promo intro">
                   @if($datos->tipo_img_icon == 0)
                      @if(empty($datos->idtipo))
                      <a href="#">
                      @else
                      <a href="{{url('/producto/tipo')}}/{{$datos->idtipo}}">
                      @endif
                        <i class="material-icons">{{$datos->icono}}</i>
                      </a>                    
                    @else
                      @if(empty($datos->idtipo))
                      <a href="#">
                      @else
                      <a href="{{url('/producto/tipo')}}/{{$datos->idtipo}}">
                      @endif
                        <img src="{{asset('/')}}{{$datos->url_imagen}}" alt=""  style="height: 120px; width: 120px">
                      </a>                    
                    @endif
                    <p class="promo-caption">{{$datos->titulo}}</p>
                    <p class="light center" style="font-size: 1.14rem">{{$datos->descripcion}}</p>
                  </div>
                </div>
                @endif
                @endforeach
              </div>              
            </div>
            @endforeach
          </div>
</section>