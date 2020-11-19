@extends('layouts2.app')
@section('titulo','Mantenedor de Cursos')

@section('main-content')
<br>
@foreach ($cursos as $curso) 
{{-- @foreach ($videos as $video)  --}}
  <div id="app">

<div class="row " style="z-index: inherit">
  <div class="col s12 m12 l12"> 
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>MANTENEDOR DE CURSOS</h2>
                  </div>
                 <form class="formValidate right-alert" id="formCursos" method="POST" action="{{ url('/carrusel/grabar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6 ;z-index: 5;">
                        <div class="col s12 l12 m12">
                           
                          <a style="margin-left: 6px"></a>
                          <a href="{{url('/Cursos/disponibles')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                            <i class="material-icons" style="color: #424242">keyboard_tab</i>
                          </a>
                        </div> 
                  </div>

                  <br>
                  <div class="row cuerpo">
                   <div class="col s12 m12 l12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $curso->codigo }}" >  
                    <div><center><h3>{{ strtoupper($curso->nombre) }}</h3></center></div>
                    <videosn   curso-id="{{ $curso->codigo }}"></videosn> 
                   </div> 
  
                   

                   
                  {{--   @{{message}} --}}
 
                   {{-- <example-component></example-component><br> --}}
             

                    {{-- <div class="col m6 l6 ">   
                              <div class="card-content"> 
                              <video width="500" height="300" id ="video" controls="" src="{{asset('/storage/'.$video->url_video)}}" autoplay></video>   
                              </div> 
                    </div> --}}
                    {{-- 
                    <div class="col s12 m12 l2"></div>
                    <div class="col s12 m12 l4 bordes"   >
                      <ul id="task-card" class=" collection with-header " style=" background-color: white; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);" >
                        <li class="collection-header cyan" >
                          <h6 class="task-card-title">Videos</h6> 
                        </li>  
                        <li>  
                          <td  class="card-content"> 
                          @foreach ($videos as $video)
                          <div class="col s6 m4 l12 " style="word-wrap: break-word; ">
                            <img src="{{asset('images/TipoArchivo/file-video.png')}}" alt="" id="" class=" responsive-img valign profile-image " style="width:45px;height:45px ;"><b> {{$video->titulo}}</b></div>  
                          @endforeach  
                          </td>  
                        </li> 
                        <br><br><br><br> <br><br> 
                      
                      </ul>
                    </div>  --}}

                </div>
              </form>
              </div>
  </div>
</div>
</div>
@endforeach
{{-- @endforeach --}}
<script src="{{asset('js/appI.js')}}"></script>  
@endsection

@section('script')
  @include('forms.cursos.scripts.updCursos')
  
{{-- <script src="{{asset('js/appI.js')}}"></script>   --}}
@endsection

