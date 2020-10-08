@extends('pagina.layouts.app')


@section('main-content')
@foreach($contactanos as $datos)
	<div style="height: 9rem"></div>
	<div class="container">
		<div class="row cuerpo">
      <div class="col s12">
        <div class="card white">
          <div class="card-content" style="padding: 0px">            
            <div class="card-content">

              <div class="card-image waves-effect waves-block waves-light">
                @if(empty($datos->ubicacion))
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1666.31408100779!2d-79.04374378917821!3d-8.128800067678275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1529210325989" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                @else
                  <div id="" style="height:400px;width:100%;">
                      {!! $datos->ubicacion !!}
                  </div>
                @endif
              </div>           
            </div>
          </div>
        </div>                
      </div>       
      <div class="col s12">
        <div class="card white">
          <div class="card-content" style="padding: 0px">
            
            <div class="card-content">
              <span class="card-title">Contactanos</span>
                  <form style="margin-top: 70px" id="myForm">
                  <div class="row">
                    <div class="col s12 m6">
                      <form class="contact-form">
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="nombre" name="nombre" type="text">
                            <label for="nombre">Nombre</label>
                            <div id="error" style="color: red; font-size: 12px; font-style: italic;"></div>    
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="email" name="email" type="email">
                            <label for="email">Email</label>
                            <div id="error2" style="color: red; font-size: 12px; font-style: italic;"></div>    
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="empresa" name="empresa" type="text">
                            <label for="empresa">Empresa</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <textarea id="mensaje" name="mensaje" class="materialize-textarea"></textarea>
                            <label for="mensaje">Mensaje</label>
                            <div id="error3" style="color: red; font-size: 12px; font-style: italic;"></div>    
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <a id="enviar" class="btn cyan waves-effect waves-light right">Enviar
                                <i class="material-icons right">send</i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col s12 m6">
                      <ul class="collapsible popout" data-collapsible="accordion">
                        @foreach($dcontactanos as $datos)
                        @if($datos->activo === '1')
                        <li class="active">
                          <div class="collapsible-header active">
                        @else
                        <li>
                          <div class="collapsible-header">
                        @endif                          
                            <i class="material-icons">{{$datos->icono}}</i> {{$datos->titulo}}</div>
                          <div class="collapsible-body" style="display: block;">
                            {!! $datos->descripcion !!}
                          </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </div>                
      </div>       

    </div>

	</div>
	<div style="height: 2rem"></div>
@endforeach
@endsection

@section('script')
  @include('forms.contactanos.scripts.addMensajes')  
@endsection
