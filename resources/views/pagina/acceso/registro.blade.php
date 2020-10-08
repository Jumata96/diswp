
<!DOCTYPE html>
<html lang="es">

<!--================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 3.0
  Author: GeeksLabs
  Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Página de Registro | ArdiniTrading</title>
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
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="{{asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{asset('css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{asset('css/estilos.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
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

    <div class="col s12 z-depth-4 card" style=" min-width: 10rem; max-width: 45rem; margin-top: 4rem; margin-left: 10px; margin-right: 10px">
      <div class="card-header center white-text"; style="border-bottom: 1px solid red; background-color: #0091ea; height: 60px; padding-top: 8px">
           <span class="logo-text sideusuario" style="padding-left: 0px; font-size: 32px">
            <b style="color: #fafafa; font-style: normal;">ARDINITRADING</b>
        </span>                        
      </div>
      <form method="POST" action="{{ route('register') }}" style="padding: 10px">
        <div class="row">
          <div class="input-field col s12 center">              
            <p class="center login-form-text" style="color: #9e9e9e; font-size: 14px;margin-top: 0px">REGISTRO DE USUARIO</p>
            <div class="divider"></div>
      <!--      <h6><i>Por su seguridad no revele su usuario y contraseña a terceros</i></h6>   -->
          </div>
        </div>
        
        @csrf
        <div class="row">

          <input type="hidden" name="usu" value="CLE">
         
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">person_inline</i>
            <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>
            @if ($errors->has('name'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
            <label for="apellidos" class="center-align">Nombre</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">perm_identity</i>
            <input id="apellidos" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ old('apellidos') }}" required>
            @if ($errors->has('name'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
            <label for="apellidos" class="center-align">Apellidos</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">clear_all</i>
            <input id="razon_social" type="text" class="form-control{{ $errors->has('razon_social') ? ' is-invalid' : '' }}" name="razon_social" value="{{ old('razon_social') }}" required>
            @if ($errors->has('razon_social'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('razon_social') }}</strong>
              </span>
            @endif
            <label for="razon_social" class="center-align">Razón Social</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">sim_card</i>
            <input id="ruc" type="number" minlength="9" maxlength="11" class="form-control{{ $errors->has('ruc') ? ' is-invalid' : '' }}" name="ruc" value="{{ old('ruc') }}" required>
            @if ($errors->has('ruc'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('ruc') }}</strong>
              </span>
            @endif
            <label for="ruc" class="center-align">RUC</label>
          </div>          
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">clear_all</i>
            <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required>
            @if ($errors->has('telefono'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('telefonoco') }}</strong>
              </span>
            @endif
            <label for="telefonoco" class="center-align">Nro. Telefónico</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">clear_all</i>
            <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" required>
            @if ($errors->has('razon_social'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('direccion') }}</strong>
              </span>
            @endif
            <label for="direccion" class="center-align">Dirección</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">face</i>
            <input id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" value="{{ old('usuario') }}" required>
            @if ($errors->has('usuario'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('usuario') }}</strong>
              </span>
            @endif
            <label for="usuario" class="center-align">Usuario</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">email</i>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
            <label for="email" class="center-align">Email</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">lock_outline</i>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
            <label for="password">Contraseña</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">lock_outline</i>
            <input id="password-again" type="password" name="password_confirmation" required>

            <label for="password-again">Repetir contraseña</label>
          </div>
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light  col s12" style="background-color: #757575; height: 44px;    background: #0091ea !important;letter-spacing: .5px;">
              Registrar</button>
          </div>
          @foreach($parametros as $val)
          @if($val->parametro == 'REG_FACEBOOK' && $val->valor == 'SI')
          <div class="input-field col s12">
              <a href="{{ route('social.auth', 'facebook') }}" type="submit" class="btn waves-effect waves-light  col s12" style="height: 44px; padding-top: 0.3rem; background: #4267B2 !important;letter-spacing: .5px;">Registrar con Facebook
                  <i class="mdi-content-send right"></i>
              </a>
          </div>
          @endif
          @endforeach
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Ya tienes una cuenta? <a href="{{ url('/usuarioLogin') }}">Ingresar</a></p>
          </div>
        </div>
      </form>
    </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js/plugins/prism/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

</body>

</html>