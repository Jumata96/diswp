<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Página de Ingreso | ArdiniTrading</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="cPanel desarrollado por InnovaTec.me">
    <meta name="keywords" content="InnovaTec, repuestos, autopartes, autos">
    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->

<!-- CORE CSS-->
  <link href="{{asset('css/materialize5.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{asset('css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{asset('css/estilos5.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="{{asset('css/custom/custom-style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="gray darken-4">
  

  @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card-panel" id="pagina-login" style="width: 26rem; padding: 0">
      <div class="card-header center white-text"; style="border-bottom: 1px solid red; background-color: #0091ea; height: 60px; padding-top: 8px">
        <span class="logo-text sideusuario" style="padding-left: 0px; font-size: 32px">
            <b style="color: #fafafa; font-style: normal;">ARDINITRADING</b>
        </span>                             
      </div>
      
      <form action="{{ url('/login') }}" method="post" style="padding: 10px">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="url" value="{{ $url }}">

        <div class="row">
          <div class="input-field col s12 center">              
            <p class="center login-form-text" style="color: #9e9e9e; font-size: 14px;margin-top: 0px">Bienvenido al Portal Cliente</p>
            <div class="divider"></div>
      <!--      <h6><i>Por su seguridad no revele su usuario y contraseña a terceros</i></h6>   -->
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="material-icons prefix">person_outline</i>
            <input type="text" class="form-control" name="usuario" id="usuario">
            <label for="usuario" class="center-align">Usuario</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="material-icons prefix">lock_outline</i>
            <input id="password" type="password" class="form-control" name="password">
            <label for="password">Contraseña</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me" name="remember">Recordarme</label>
          </div>
          <div class="form-ref-box">
                                            
                                        </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light  col s12" style="background-color: #757575; height: 44px;    background: #0091ea !important;letter-spacing: .5px;">Iniciar sessión
              <i class="mdi-content-send right"></i>
            </button>
          </div>
          @foreach($parametros as $val)
          @if($val->parametro == 'REG_FACEBOOK' && $val->valor == 'SI')
          <div class="input-field col s12">
              <a href="{{ route('social.auth', 'facebook') }}" type="submit" class="btn waves-effect waves-light  col s12" style="height: 44px; padding-top: 0.3rem; background: #4267B2 !important;letter-spacing: .5px;">Ingresar con Facebook
                  <i class="mdi-content-send right"></i>
              </a>
          </div>
          @endif
          @endforeach
        </div>
        <div class="row">
          <div class="input-field col s5 m5 l5">
            @foreach($parametros as $val)
            @if($val->parametro == 'REG_MANUAL' && $val->valor == 'SI')
            <p class="margin medium-small"><a href="{{ url('/registroUsuario') }}">Registrate Ahora!</a></p>
            @endif
            @endforeach
          </div>
          <div class="input-field col s7 m7 l7">
              <p class="margin right-align medium-small"><a href="#">Olvidaste tu contraseña?</a></p>
          </div>                
        </div>

      </form>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="{{ asset('js/plugins/jquery-1.11.2.min.js') }}"></script>
  <!--materialize js-->
  <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
  <!--prism-->
  <script type="text/javascript" src="{{ asset('js/plugins/prism/prism.js') }}"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ asset('js/plugins.min.js') }}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{ asset('js/custom-script.js') }}"></script>

</body>

</html>