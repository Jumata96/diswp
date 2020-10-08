<header id="header" class="page-topbar">
      <!-- start header nav-->
      
      <div class="navbar-fixed">
            <nav class="active">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo center" style="padding-top: 0.6rem;">
                        <div style="padding-bottom: 14px">
                        @foreach($empresa as $datos)
                        @if(!empty($datos->url_imagen))
                          <img src="{{asset('/')}}{{$datos->url_imagen}}" alt="{{$datos->imagen}}" style="width: 90px; height: 60px">   
                        @endif
                        @endforeach
                        </div>
                        <div>
                          <b style="color: #fafafa; font-style: normal; font-size: 25px">{{$marca}}</b>                       
                        </div>
                        
                    </a>
                    <a href="#" data-activates="slide-out" class="button-collapse" style="margin-top: 25px;">
                        <i class="material-icons" style="font-size: 30px">menu</i>
                    </a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                        <li><a href="{{url('/')}}" class="waves-effect waves-dark">Inicio</a></li>
                        <li><a href="{{url('/nosotros')}}" class="waves-effect waves-dark">Nosotros</a></li>
                        <li><a href="{{url('/contactanos')}}" class="waves-effect waves-dark">Contactanos</a></li>
                    </ul>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{url('/catalogo')}}" class="waves-effect waves-dark">Catalogo</a></li>
                        <li>                            
                            @if(Auth::check())
                            <a href="{{url('/carrito')}}" class="waves-effect" style="padding-right: 0px">Carrito</a>
                            <a class="waves-effect notification-button" data-activates="notifications-dropdown" style="padding-left: 0px">
                              <i class="material-icons">shopping_cart
                                <small class="notification-badge red lighten-1" id="contador">{{count($vcarrito)}}</small>
                              </i>
                            </a>
                            @else
                            <a href="{{url('/carrito')}}" class="waves-effect">Carrito</a>
                            @endif
                        </li>
                        <li><a href="{{url('/portal-usuario')}}" class="waves-effect waves-dark">Portal</a></li>
           <!--              @if(Auth::check())                        
                          <li style="padding-top: 18px;padding-right: 0px; width: 40px"><a href="{{ url('cerrar') }}"  style="color: black; padding-right: 0px; padding-left: 0px">
                            <i class="material-icons">keyboard_tab</i> Cerrar</a>
                          </li>                        
                        @endif -->
                    </ul>                  
                </div>
            </nav>
        </div>

      <div>
        <ul class="side-nav blue lighten-4" id="slide-out">
                        <br>
                        
                        <li><a href="{{url('/')}}" class="waves-effect waves-dark">Inicio</a></li>
                        <li><a href="{{url('/nosotros')}}" class="waves-effect waves-dark">Nosotros</a></li>
                        <li><a href="{{url('/contactanos')}}" class="waves-effect waves-dark">Contactanos</a></li>
                        <li><a href="{{url('/catalogo')}}" class="waves-effect waves-dark">Catalogo</a></li>
                        <li><a href="{{url('/carrito')}}" class="waves-effect waves-dark">Carrito</a></li>
                        <li><a href="{{url('/portal-usuario')}}" class="waves-effect waves-dark">Portal</a></li>
                      </ul>
      </div>
    </header>