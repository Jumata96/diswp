@extends('samurai.layout.app')
@section('titulo','Contactanos')

@section('titulo','Inicio')
@section('main-content')
 
 @foreach ($contactanos as $contacto) 
 @foreach ($empresas as $empresa) 
  @include('samurai.layout.inicio.seccion7')
<section id="s5_bottom_row2_area1" class="s5_slidesection s5_yes_custom_bg">
  <div id="s5_bottom_row2_area2" class="s5_no_custom_bg">
    <div id="s5_bottom_row2_area_inner" class="s5_wrap">
      <div id="s5_bottom_row2_wrap">
        <div id="s5_bottom_row2">
          <div id="s5_bottom_row2_inner">
            <div id="s5_pos_bottom_row2_1" class="s5_float_left" style="width:100%">
              <div class="module_round_box_outer">
                <div class="module_round_box-dark">
                  <div class="s5_module_box_1">
                    <div class="s5_module_box_2">
                      <div class="s5_mod_h3_outer">
                        <h3 class="s5_mod_h3">
                          <span class="s5_h3_first"> <center>En Google Maps  </center></span><span class="s5_h3_last"></span>
                        </h3>
                      </div>
                      <div class="s5_mod_h3_below" style="clear:both"></div>
                      <div class="s5_outer-dark"> 
                        <div id="s5_map_canvas" class="s5_mapdisplay" style="  position: relative; overflow: hidden;"> 
                            <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q={{ $contacto->latitud }},{{$contacto->longitud}}+(empresa)&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>

                        </div> 
                      </div>
                      <div style="clear:both; height:0px"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="clear:both; height:0px"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach
@endforeach
@include('forms.contactanos.scripts.enviarMensaje')
@endsection 
