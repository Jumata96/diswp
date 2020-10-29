@extends('layouts2.app')
@section('titulo','Mantenedor de horarios')

@section('main-content')
<br> 
<div class="row">
  <div class="col s12 m12 l12"> 
      <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>MANTENEDOR HORARIOS</h2>
                  </div>
              <form class="formValidate right-alert" id="formCursos" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="card-header" style="height: 50px; padding-top: 5px; background-color: #f6f6f6">
                        <div class="col s12 m12">
                          <a  id="add_Horario" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                            <i class="material-icons" style="color: #2E7D32">check</i>
                          </a>   
                          <a style="margin-left: 6px"></a>                          
                          <a href="{{url('/lsthorarios')}}" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped" href="#!" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                            <i class="material-icons" style="color: #424242">keyboard_tab</i>
                          </a>                               
                        </div>  
                        @include('forms.scripts.modalInformacion')                               
                  </div> 
                  <br>                  
                  <div class="row cuerpo">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                    <div class="col m6 l6  offset-l3 offset-m3 ">
                      <div class="card white">
                          <div class="card-content">
                              <span class="card-title">Datos Generales</span> 
                              <div class="row"> 
                                <div class="input-field col s12">  
                                  <div class=" col s12 l2">
                                    <i class="material-icons prefix">today</i>
                                    <label for="dia">Días</label>
                                  </div>
                                  <div class=" col s12 l10">
                                    <div id="Dias"  name="Diass" class="chips chips-initial Dias"></div><br> 
                                  </div>
                                  <div id="u_error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div> 
                                </div>
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">description</i>
                                  <input id="detalle" name="detalle"  type="text"   > 
                                  <label for="detalle" class="">Detalle</label>
                                  <div id="u_error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                                </div>   
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">chat</i>
                                  <textarea id="glosa" name="glosa" required class="materialize-textarea"    lenght="200" style="height: 80px"></textarea>
                                  <label for="glosa" class="">Glosa </label>
                                  <div id="u_error5" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                                </div>                          
                              </div> 
                          </div>
                      </div>
                    </div>
                 
                  </div>
              </form>
      </div>
  </div>
</div>

 
@endsection
  
@section('script')
@include('forms.horarios.scripts.addHorario')
<script> 
  $('.chips-initial').material_chip({
    data: [{
      tag: 'Lunes',
    }, {
      tag: 'Martes',
    }, {
      tag: 'Miercoles',
    }, {
      tag: 'Jueves',
    }, {
      tag: 'Viernes',
    }, {
      tag: 'Sabado',
    }, {
      tag: 'Domingo',
    }],
  });
    
</script>
@endsection

