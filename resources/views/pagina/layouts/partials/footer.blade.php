<footer class="page-footer blue darken-1" style="padding-left: 0px; padding-top: 30px">
@foreach($contactanos as $datos)
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">{{$datos->titulo}}</h5>
                <p class="grey-text text-lighten-4">{{$datos->descripcion}}</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Siguenos en</h5>
                <ul>
                  @if(!empty($datos->link_facebook))                  
                  <li>
                    <div class="row">
                      <div class="col s2">
                        <img class="responsive-img" src="{{asset('/img/png/fb.png')}}" style="width: 1.5rem;">
                      </div>
                      <div class="col s10" style="padding-left: -20px; margin-left: -55px">
                        <a class="grey-text text-lighten-3" href="{{$datos->link_facebook}}" style="margin-bottom: 20px">Facebook</a>
                      </div>
                    </div>
                     
                  </li>
                  @endif
                  @if(!empty($datos->link_twitter))
                  <li><a class="grey-text text-lighten-3" href="{{$datos->link_twitter}}">Twitter</a></li>
                  @endif
                  @if(!empty($datos->link_youtube))
                  <li><a class="grey-text text-lighten-3" href="{{$datos->link_youtube}}">Youtube</a></li>
                  @endif
                  @if(!empty($datos->link_linkending))
                  <li><a class="grey-text text-lighten-3" href="{{$datos->link_linkending}}">Linkending</a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright" style="padding-left: 30px; padding-right: 30px">
            © 2018 Copyright InnovaTec
            <a class="grey-text text-lighten-4 right" href="http://innovatec.me"> Todos los derechos reservados</a>            
          </div>
@endforeach
</footer>