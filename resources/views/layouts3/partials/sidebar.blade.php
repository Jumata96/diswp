<!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav" data-valor="0" class="nav-expanded nav-lock nav-collapsible">
          <div class="brand-sidebar" style="height: 62px">
            <h1 class="logo-wrapper">
              <a href="{{url('/')}}" class="brand-logo darken-1">
                <img id="imglogo" src="{{asset('img/logo.png')}}" alt="ardiniTrading" style="height: 26px">
                <span class="logo-text sideusuario" style="padding-left: 0px;">
                  <b style="color: #fafafa; font-style: normal;">ARDINI</b>TRADING
                </span>
              </a>
              <a href="#" class="navbar-toggler" id="radio" onclick="Materialize.fadeInImage('.sideusuario')" >
                <i class="material-icons" id="radio2">radio_button_checked</i>
              </a>
            </h1>
          </div>
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">                
                <li class="bold">
                  <a class=" waves-effect waves-cyan" href="{{ url('/home') }}">
                    <i class="material-icons">widgets</i>
                    <span class="nav-text">DashBoard</span>
                  </a>                  
                </li>
              </ul>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">                
                <li class="bold">
                  <a class=" waves-effect waves-cyan" href="{{ url('/pagos') }}">
                    <i class="material-icons">payment</i>
                    <span class="nav-text">Registrar Pago</span>
                  </a>                  
                </li>
              </ul>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">                
                <li class="bold">
                  <a class=" waves-effect waves-cyan" href="{{ url('/perfil') }}">
                    <i class="material-icons">person</i>
                    <span class="nav-text">Pefil de Usuario</span>
                  </a>                  
                </li>
              </ul>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">                
                <li class="bold">
                  <a class=" waves-effect waves-cyan" href="{{ url('/eDocs') }}">
                    <i class="material-icons">archive</i>
                    <span class="nav-text">eDoc</span>
                  </a>                  
                </li>
              </ul>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">                
                <li class="bold">
                  <a class=" waves-effect waves-cyan" href="{{ url('/compras') }}">
                    <i class="material-icons">storage</i>
                    <span class="nav-text">Historial de Compras</span>
                  </a>                  
                </li>
              </ul>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">                
                <li class="bold">
                  <a class=" waves-effect waves-cyan" href="{{ url('/seguimiento') }}">
                    <i class="material-icons">linear_scale</i>
                    <span class="nav-text">Seguimiento Compra</span>
                  </a>                  
                </li>
              </ul>
            </li>
          </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
            <i class="material-icons">menu</i>
          </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->