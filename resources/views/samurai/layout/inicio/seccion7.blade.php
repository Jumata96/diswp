 
   <div>
      <section id="s5_bottom_row3_area1" class="s5_slidesection s5_yes_custom_bg">
      <div id="s5_bottom_row3_area2" class="s5_no_custom_bg">
         <div id="s5_bottom_row3_area_inner" class="s5_wrap">
            <div id="s5_bottom_row3_wrap">
               <div id="s5_bottom_row3">
                  <div id="s5_bottom_row3_inner">
                     <div id="s5_pos_custom_7">
                        <div id="s5_pos_custom_7_inner" class="s5_wrap">
                           <div class="module_round_box_outer">
                              <div class="module_round_box">
                                 <div class="s5_module_box_1">
                                    <div class="s5_module_box_2">
                                       <div class="s5_outer">
                                          <div class="custom"  >
                                             <h3 class="large_h3" style="text-align:center;display:block;"> CONTÁCTANOS</h3>
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
                     <div id="s5_pos_bottom_row3_1" class="s5_float_left" style="width:43%">
                        <div class="module_round_box_outer">
                           <div class="module_round_box">
                              <div class="s5_module_box_1">
                                 <div class="s5_module_box_2">
                                    <div class="s5_outer">
                                       <div class="custom"  >
                                          <ul class="bottom_info">
                                             <li>
                                                <h3>Horario :</h3>
                                                {!! $contacto->horario !!} 
                                                 
                                             </li>
                                             <li>
                                                <h3>Dirección :</h3>
                                                 {{ $empresa->direccion}}
                                             </li>
                                             <li>
                                                <h3>Telefono :</h3>
                                                 {{ $empresa->telefono}}
                                             </li>
                                             {{-- <li>
                                                <h3>Fax:</h3>
                                                1-800-555-1212
                                             </li> --}}
                                             <li>
                                                <h3>Correo :</h3>
                                                {{$contacto->email}}
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div style="clear:both; height:0px"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="s5_pos_bottom_row3_2" class="s5_float_left" style="width:57%">
                        <div class="module_round_box_outer">
                           <div class="module_round_box">
                              <div class="s5_module_box_1">
                                 <div class="s5_module_box_2">
                                    <div class="s5_outer">
                                       <div id="s5_quick_contact_wrap">
                                          <form class="formValidate right-alert" id="formContactanos"{{--  method="POST" action="{{ url('/constactanos/mensaje') }}" --}} accept-charset="UTF-8" enctype="multipart/form-data">
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                          {{-- <form name="s5_quick_contact" method="POST" id="s5_quick_contact" enctype="multipart/form-data " class="FormContactanos">	 --}}
                                             	 <div id="error2" style="color: red; font-size: 12px; font-style: italic;"></div>
                                             <span class="s5_qc_name_wrap" id="s5_qc_namebox_span">
                                             <input class="inputbox" id="s5_qc_namebox" onfocus="s5_qc_clear_inputs(this.id)" onblur="s5_qc_clear_inputs(this.id)" style="height:auto;width:100%;padding:12px;margin:;text-transform:none !important;" type="text" value="Nombre..." name="s5_qc_name" />		
                                             </span>
                                             <span class="s5_qc_email_wrap" id="s5_qc_emailbox_span">
                                             <input class="inputbox" id="s5_qc_emailbox" onfocus="s5_qc_clear_inputs(this.id)" onblur="s5_qc_clear_inputs(this.id)" style="height:auto;width:100%;padding:12px;margin:;text-transform:none !important;" type="text" value="Correo..." name="s5_qc_email" />		
                                               <div id="error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                             </span>
                                             <span id="s5_qc_subjectbox_span" class="s5_qc_subject_wrap">		
                                             <input class="inputbox" id="s5_qc_subjectbox" onfocus="s5_qc_clear_inputs(this.id)" onblur="s5_qc_clear_inputs(this.id)" style="height:auto;width:100%;padding:12px;margin:;text-transform:none !important;" type="text" value="Asunto..." name="s5_qc_subject" />
                                             </span>	
                                             <span id="s5_qc_field1box_span" class="s5_qc_textarea_required">
                                             <textarea id="s5_qc_field1box" class="inputbox textarea" onfocus="s5_qc_clear_inputs(this.id)" onblur="s5_qc_clear_inputs(this.id)" style="overflow:auto;width:100%;padding:12px;margin:;height:162px;text-transform:none !important;" name="s5_qc_field1">Mensaje...</textarea>			
                                             </span>				
                                             {{-- <input id="returnurl" type="hidden" value="http://www.shape5.com/demo/fitness_center/index.php" name="returnurl" />	 --}}
                                             <span class="s5_qc_button_wrap">	
                                             <button class="button btn" type="button" style="margin:" id="s5_qc_submitbutton" onclick="s5_qc_submit()">Enviar Mensaje</button>	
                                             {{-- <a class="button btn  btnEnviar" type="button" style="margin:" id="s5_qc_submitbutton"  ><center>Send Message</center></a>	 --}}
                                             </span>
                                          </form>
                                          <div style="clear:both;height:0px;"></div>
                                         
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
   </div>
   
  
 <!-- End Bottom Row3 -->