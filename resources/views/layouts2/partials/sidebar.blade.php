<!-- START LEFT SIDEBAR NAV-->
       {{--  <aside id="left-sidebar-nav" data-valor="0" class="nav-expanded nav-lock nav-collapsible ">  --}}
        
     
            <aside  id="left-sidebar-nav"     data-valor="0" class="sidenav-main  main-full nav-collapsible   sidenav-active-square nav-collapsed ">

              <div class="brand-sidebar  z-depth-4"   > 
                <h1 class="logo-wrapper " style="padding-top: 8px; padding-left: 15px; "> 
                  <a href="http://innovawisp.com" class="brand-logo darken-1 " target="_blank">
                    <img src="{{asset('images/Isotipo.png')}}" alt="InnovaWifi" style=" height: 43px ;background-image: url('{{asset('images/Isotipo.png')}}') !importar;" >  
                    <span id="LogoInnovaTec" {{-- style="color:black;" --}} class="logo-text hide-on-med-and-down "><b >Innova</b>Tec</span>  
                  </a>  
                  <a href="#" class="navbar-toggler"   id="radio" onclick="Materialize.fadeInImage('#sideusuario')" style="margin-left: 70px;padding-top: 5px;">
                    <i class="material-icons"  style="color:black;"   id="radio2">radio_button_checked</i>
                  </a>
                </h1>  
              </div> 
 
           
          
          <ul id="slide-out" class="  z-depth-3 side-nav fixed leftside-navigation collapsible sidenav-fixed" data-collapsible="menu-accordion">
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">
                <li class="hide indigo darken-4 sideusuario" id="" style="height: 100px; padding-top: 10px; margin-bottom: 10px; background: url({{asset('images/fondo-perfil.png')}}); background-size: 270px">
                  <div class="row">
                      <div class="col col s5 m5 l5">
                          <img src="{{asset('images/usu-perfil.png')}}" alt="" class="circle responsive-img valign profile-image indigo lighten-5" style="height: 70px; width: 70px">
                      </div>
                      <div class="col col s7 m7 l7" style="margin-left: -15px; width: 128px">
                          
                          <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown" style="width: 130%">{{ Auth::user()->nombre }}<i class="mdi-navigation-arrow-drop-down right"></i></a><ul id="profile-dropdown" class="dropdown-content" style="width: 100px; padding-top: 20px; border: 10px">
                              <li><a href="#"><i class="mdi-action-face-unlock"></i> Perfil</a>
                              </li>
                              <li><a href="#"><i class="mdi-action-settings"></i> Config.</a>
                              </li>
                              <li><a href="#"><i class="mdi-communication-live-help"></i> Ayuda</a>
                              </li>
                              <li class="divider"></li>
                              
                              <li style="padding-top: 15px"><a href="http://localhost/innovamk/public/cerrar"><i class="mdi-hardware-keyboard-tab"></i> Cerrar</a>
                              </li>
                          </ul>
                          <p class="user-roal">{{ substr(Auth::user()->cargo,0,18) }}</p>
                      </div>
                  </div>
              </li>
                <li class="bold">
                  <a class=" waves-effect waves-cyan" href="{{ url('/home') }}">
                    <i class="material-icons">dashboard</i>
                    <span class="nav-text">DashBoard</span>
                  </a>                  
                </li>
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">settings</i>
                    <span class="nav-text">Configuración</span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li>
                        <a href="{{ url('/empresa') }}">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span> Empresa</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/usuarios') }}">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span> Usuarios del Sistema</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{url('/clientes')}}">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span> Registro de Alumnos</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{url('/lsthorarios')}}">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span> Registro de Horarios</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{url('/lstCursos')}}">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span> Registro de Cursos</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/parametros') }}">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span> Parámetros</span>
                        </a>
                      </li>
                      {{-- <li>
                        <a href="{{ url('/clientes/importar') }}">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span> Importador Clientes</span>
                        </a>
                      </li> --}}
                    </ul>
                  </div>
                </li>
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">videocam</i>
                    <span class="nav-text">Gestión de videos</span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="{{ url('/lstVideos') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Registro de videos </span>
                      </a>
                      </li> 
                      <li><a href="{{ url('/lstPermisos') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Permisos del contenido</span></a>
                      </li> 
                      <li><a href="{{ url('#') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Parámetros</span></a>
                      </li>  
                    </ul>
                  </div>
                </li>
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">web</i>
                    <span class="nav-text">Gestión de Portal Web</span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="{{ url('#') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>página nosotros</span>
                      </a>
                      </li> 
                      <li><a href="{{ url('#') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>página de Servicios</span>
                      </a>
                      </li> 
                      <li><a href="{{ url('#') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>página de Galería</span>
                      </a>
                      </li> 
                      <li><a href="{{ url('#') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>página de Inicio</span></a>
                      </li> {{-- 
                      <li><a href="{{ url('#') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Parámetros</span></a>
                      </li>  --}} 
                    </ul>
                  </div>
                </li>
                {{-- <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">home</i>
                    <span class="nav-text">Inicio</span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="{{ url('/carrusel') }}">
                      <i class="material-icons">keyboard_arrow_right</i>
                      <span>carrusel</span></a>
                      </li> 
                      <li><a href="{{ url('/general') }}">
                      <i class="material-icons">keyboard_arrow_right</i>
                      <span>Sección 01</span></a>
                      </li> 
                      <li><a href="{{ url('/mision') }}">
                      <i class="material-icons">keyboard_arrow_right</i>
                      <span>Sección 02</span></a>
                      </li> 
                      <li><a href="{{ url('/vision') }}">
                      <i class="material-icons">keyboard_arrow_right</i>
                      <span>Sección 03</span></a>
                      </li>  
                      <li><a href="{{ url('/mntContactanos') }}">
                      <i class="material-icons">keyboard_arrow_right</i>
                      <span>Contactanos</span></a>
                      </li>  
                    </ul>
                  </div>
                </li>
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">supervisor_account</i>
                    <span class="nav-text">Nosotros</span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="{{ url('/mntNosotros') }}">
                      <i class="material-icons">keyboard_arrow_right</i>
                      <span>Nosotros</span></a>
                      </li> 
                      <li><a href="{{ url('/mntMision') }}">
                      <i class="material-icons">keyboard_arrow_right</i>
                      <span>Misión</span></a>
                      </li> 
                      <li><a href="{{ url('/mntVision') }}">
                      <i class="material-icons">keyboard_arrow_right</i>
                      <span>Visión</span></a>
                      </li>  
                    </ul>
                  </div>
                </li>
                <li class="bold">
                  <a class="collapsible-header  waves-effect waves-cyan">
                    <i class="material-icons">work</i>
                    <span class="nav-text">Catálogo</span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="{{ url('/productos') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Productos</span>
                      </a>
                      </li> 
                      <li><a href="{{ url('/grupo') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>grupo</span>
                      </a>
                      </li>  
                      <li><a href="{{ url('/tipo') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Tipo</span>
                      </a>
                      </li>  
                      <li><a href="{{ url('/herramientas') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Herramientas</span>
                      </a>
                      </li>  
                    </ul>
                  </div>
                </li>
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">shopping_cart</i>
                    <span class="nav-text">Carrito de compras</span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="{{ url('/clientes') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Registo de Usuario</span>
                      </a>
                      </li> 
                      <li><a href="{{ url('/pedidos') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Pedidos</span></a>
                      </li> 
                      <li><a href="{{ url('/formas-de-pago') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Formas de Pago</span></a>
                      </li> 
                      <li><a href="{{ url('/compras/historial') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Historial de Compras</span></a>
                      </li> 
                    </ul>
                  </div>
                </li>
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">archive</i>
                    <span class="nav-text">Docs. Electrónicos</span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="{{ url('/edocs/lista') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>eDocs</span>
                      </a>
                      </li> 
                      <li><a href="{{ url('/edocs/importar') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Importador</span></a>
                      </li>                       
                    </ul>
                  </div>
                </li>
                <li class="bold">
                  <a class=" waves-effect waves-cyan" href="{{ url('/mails') }}">
                    <i class="material-icons">email</i>
                    <span class="nav-text">Mensajes</span>
                  </a>                  
                </li> --}}
          <!--
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">equalizer</i>
                    <span class="nav-text">Reportes</span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="{{ url('#') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Mis Ventas</span></a>
                      </li> 
                      <li><a href="{{ url('#') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Stock de Equipos</span></a>
                      </li>                                       
                      <li><a href="{{ url('#') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Salidas de Almacen</span></a>
                      </li> 
                      <li><a href="{{ url('#') }}">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span>Historial Clientes</span></a>
                      </li> 
                    </ul>
                  </div>
                </li>
          -->
              </ul>
            </li>
             <li class="li-hover">
              <p class="ultra-small margin more-text" id="mas_opciones">Mas opciones</p>
            </li>
            <li>
              <a href="{{url('/colores')}}" target="_blank">
                <i class="material-icons">palette</i>
                <span class="nav-text">Colores</span>
              </a>
            </li>
            <li>
              <a href="{{url('/iconos')}}" target="_blank">
                <i class="material-icons">insert_emoticon</i>
                <span class="nav-text">Iconos</span>
              </a>
            </li>
          </ul>
          <div class="navigation-background"></div><a href="#" data-activates="slide-out" class=" sidenav-trigger sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
            <i class="material-icons">menu</i> 
          </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->