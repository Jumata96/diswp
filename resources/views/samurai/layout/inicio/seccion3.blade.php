 <!-- Top Row2 -->	
 <section id="s5_top_row2_area1" class="s5_slidesection s5_no_custom_bg">
    <div id="s5_top_row2_area2" class="s5_no_custom_bg">
       <div id="s5_top_row2_area_inner" class="s5_wrap">
          <div id="s5_top_row2_wrap">
             <div id="s5_top_row2">
                <div id="s5_top_row2_inner">
                   <div id="s5_pos_top_row2_1" class="s5_float_left" style="width:100%">
                      <div class="module_round_box_outer">
                         <div class="module_round_box">
                            <div class="s5_module_box_1">
                               <div class="s5_module_box_2">
                                  <div class="s5_outer">
                                     <div class="custom"  >
                                        <div class="success_area_wrap">
                                           <div class="success_area_left">
                                              @foreach ($general as $gener)
                                                  
                                              @endforeach
                                              <h3>{{$gener->titulo}}</h3>
                                               {{ $gener->descripcion}}
                                              <br />
                                              {{-- <a class="readon dark" href="index.php/features-mainmenu-47/template-specific-features.html">What Are You Waiting For?</a> --}}
                                           </div>
                                           <ul class="success_area_right" style="width: 50% !important">
                                                 @php
                                                     $cont_dgeneral=0;
                                                 @endphp
                                                  @foreach ($dgeneral as $dgene)
                                                  @php
                                                      $cont_dgeneral +=1;
                                                   @endphp
                                                   <li class="success_area_section"> 
                                                      <div class="success_area_number">
                                                         {{ $cont_dgeneral}}
                                                      </div>
                                                      <div class="success_area_right_text">
                                                         <strong>{{$dgene->titulo}}</strong>
                                                         {{$dgene->descripcion}}
                                                         <br /><br /><br />
                                                      </div> 
                                                   </li> 
                                                @endforeach 
                                           </ul>
                                           <div style="clear:both;height:0px;"></div>
                                        </div>
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
 <!-- End Top Row2 -->