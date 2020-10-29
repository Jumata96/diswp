@extends('layouts2.app')
@section('titulo','Lista de Cursos')

@section('main-content')
<br>
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card" {{-- style=" height: 400%" --}}>
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>LISTA DE CURSOS</h2>
                  </div>
                 
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12"> 
                          <a style="margin-left: 6px"></a>                          
                                                         
                        </div>  
                        @include('forms.scripts.modalInformacion')         
                  </div>
                  <br><br>
                  <div  class="row">
                    @foreach ($cursos  as $curso) 
                    <div class="col l4"  >
                      <div class="card"  {{-- style="background-image: url({{asset('/storage/'.$curso->url_imagen)}});width: 100%; " --}}>
                        <div class="card-image waves-effect waves-block waves-light">
                          <a href="{{ url('/Curso') }}/{{$curso->codigo}}"> <img height="200px" src="{{asset('/storage/'.$curso->url_imagen)}} "></a> 
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4 ">{{
                            strtoupper($curso->nombre)}}<i class="material-icons right">more_vert</i></span>
                          <div class="border-non mt-5 center">
                            <a   href="{{ url('/Curso') }}/{{$curso->codigo}}" class="waves-effect waves-light btn red border-round box-shadow">VER</a>
                          </div>  
                        </div>
                        <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i><b>{{strtoupper($curso->nombre)}}</b></span>
                          <P>
                            <b>Descripción</b>
                            {{$curso->descripcion}}
                          </P>
                          <p><b>Horario :</b>
                            @foreach ($horarios as $item)
                              @if ($item->codigo == $curso->horario)
                                {{$item->descripcion}}
                              @endif
                                            
                            @endforeach
                            
                            </p>
                        </div>
                      </div>

                    </div> 
                    @endforeach 
                  </div>                  

              </div>
</div>

@endsection
@include('forms.scripts.toast')
