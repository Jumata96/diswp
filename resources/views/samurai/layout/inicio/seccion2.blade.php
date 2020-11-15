
 <!-- Top Row1 -->	
 <section id="s5_top_row1_area1" class="s5_slidesection s5_yes_custom_bg"> 
    <div class="col l12">
      <div class="col l4"> 
         <div id="s5_top_row1_area2" class="s5_no_custom_bg">
            <div id="s5_top_row1_area_inner" class="s5_wrap">
               <div id="s5_top_row1_wrap">
                  <div id="s5_top_row1">
                     <div id="s5_top_row1_inner">
                        <div id="s5_pos_top_row1_1" class="s5_float_left" style="width:100%">
                           <div class="module_round_box_outer">
                              <div class="module_round_box">
                                 <div class="s5_module_box_1">
                                    <div class="s5_module_box_2">
                                       <div class="s5_outer">
                                          <div class="custom"  >
                                             <div class="classes_wrap"> 
                                                <div class="class_row">
                                                   @foreach ($cursos as $curso) 
                                                   <div class="class_item">
                                                      <a href="index.php/features-mainmenu-47/template-specific-features.html">
                                                         <div class="class_item_img_wrap">
                                                            <img src="{{asset('/storage/'.$curso->url_imagen)}}" alt="" /> 
                                                         </div>
                                                      </a>
                                                      <div class="class_item_text">
                                                         <h3> {{$curso->nombre}}</h3>
                                                         <div class="class_item_price">
                                                            <span class="class_item_dollar_sign">S/.</span>
                                                            <span class="class_item_dollar">{{$curso->costo}}</span>
                                                            {{-- <span class="class_item_cents">99</span> --}}
                                                            {{-- <span class="class_item_dash">/</span> --}}
                                                            {{-- <span class="class_item_period">Month</span> --}}
                                                         </div>
                                                          {{$curso->descripcion}}
                                                         <br /><br />
                                                         <span class="ion-ios-calendar-outline class_item_icon"></span> 
                                                         @foreach ($horarios as $horario)
                                                         @if ($horario->codigo == $curso->horario)
                                                             {{$horario->dia}}
                                                         @endif
                                                             
                                                         @endforeach
                                                         <br />
                                                         {{-- <span class="ion-android-time class_item_icon"></span> 9:00am and 3:30pm --}}
                                                         <br />
                                                         <a class="readon" href="#">Únete a la clase</a>
                                                      </div>
                                                      </div> 
                                                   
                                                   <div style="clear:both:height:0px;"></div>
                                                   @endforeach 
                                                </div>
                                                <div style="clear:both:height:0px;"></div>
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
      </div> 
   </div>
 </section>
 <!-- End Top Row1 -->	

 

 

 