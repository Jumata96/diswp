@foreach ($inicio_seccion as $seccion) 
@if( $seccion->codigo=='SEC1')  
<section>
      <div id="s5_custom_3_4_wrap">
         <div id="s5_custom_3_4_wrap_inner" class="s5_wrap">
            <div id="s5_pos_custom_3">
               <div class="module_round_box_outer">
                  <div class="module_round_box">
                     <div class="s5_module_box_1">
                        <div class="s5_module_box_2">
                           <div class="s5_outer">
                              <div class="custom"  >
                                 <div class="top_boxes">
                                    @foreach ($inicio_seccion_det as $seccion_det) 
                                    @if ($seccion_det->id_seccion == $seccion->codigo )
                                       <div class="top_box">
                                          <a href="index.php/features-mainmenu-47/template-specific-features.html">
                                             <div class="top_box_text">
                                                <h3>{{$seccion_det->titulo}}</h3>
                                                <span class="highlight1"> {{$seccion_det->descripcion}}</span>
                                             </div> 
                                             <img alt="" src="{{asset('/storage/'.$seccion_det->url_file)}}" /> 
                                          </a> 
                                       </div>  
                                    @endif 
                                    @endforeach
                                    <div style="clear:both;height:0px"></div>
                                 </div>
                              </div>
                           </div>
                           <div style="clear:both; height:0px"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div style="clear:both; height:0px"></div>
            </div>
            <div style="clear:both; height:0px"></div>
            <div id="s5_pos_custom_4">
               <div class="module_round_box_outer">
                  <div class="module_round_box">
                     <div class="s5_module_box_1">
                        <div class="s5_module_box_2">
                           <div class="s5_outer">
                              <div class="custom"  >
                                 <span class="centered_text"> 
                                    {{$seccion->descripcion}}
                                 <br />
                                 <img alt="" src="{{asset( $seccion->url_file)}}" />
                                 </span>
                              </div>
                           </div>
                           <div style="clear:both; height:0px"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div style="clear:both; height:0px"></div>
            </div>
            <div style="clear:both;height:0px"></div>
         </div>
      </div>
</section>
@endif   
@endforeach