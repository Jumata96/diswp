 <!-- Center area -->	
 <!-- End Center area -->	
 @foreach ($inicio_seccion as $seccion5) 
@if( $seccion5->codigo=='SEC5')  
 <div id="s5_pos_custom_6">
    <div id="s5_pos_custom_6_inner" class="s5_wrap">
       <div class="module_round_box_outer">
          <div class="module_round_box">
             <div class="s5_module_box_1">
                <div class="s5_module_box_2">
                   <div class="s5_outer">
                      <div class="custom"  >
                         <div class="center_text_button">
                             {{ $seccion5->titulo}}<br />
                            <a class="readon dark" href="index.php/features-mainmenu-47/template-specific-features.html">Get Started Now</a>
                            <div style="clear:both;height:0px;"></div>
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
 </div>
 <div style="clear:both; height:0px"></div>
  @endif   
@endforeach