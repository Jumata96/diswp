<div id="s5_pos_custom_2">
    <div class="moduletable">
       <script type="text/javascript">//<![CDATA[
          document.write('<link href="http://www.shape5.com/demo/fitness_center/modules/mod_s5_image_and_content_fader/css/s5imagecontent.css" rel="stylesheet" type="text/css" media="screen" />');
          //]]>
       </script>
       <script type="text/javascript">
          function s5_icfstartGallery() { 
          document.getElementById("s5_iacf_content_wrap").style.display = 'block';
          window.myGallery = new gallery(jQuery('#myGallery'), {
                  timed: true,
                  showArrows: false,
                  showCarousel: true,
                  showInfopane: true,	
                  slideShowDuration:500,
                  slideHideDuration:500,
                  fadeDuration:500,
                  randomOrder:"no",						
                      
                  delay: 5000,
                      
                                              defaultTransition: "continuoushorizontal"
                      
                                                                                      });
                                  jQuery('#myGallery').bind('mouseover',function(){window.myGallery.clearTimer();});
              jQuery('#myGallery').bind('mouseout',function(){window.myGallery.prepareTimer();});
                          }
          function s5_icfstartGalleryload() {
          s5_icfstartGallery();}
          window.setTimeout(s5_icfstartGalleryload,400);		
       </script>
       <div class="content " style="position:relative;z-index:0">
          <div id="myGallery" style="background:#;width:100%;">
             <div id="myGallery_height">
                <img id="myGallery_height_img" alt="images/iacf1.jpg" src="{{asset('samurai/images/iacf1.jpg')}}" />
             </div>
             <div id="s5_iacf_content_wrap" style="display:none">
                @foreach($carrusel as $datos)
                 
                  @if($datos->img_principal == 1) 
                   <div class="imageElement right-align"  style="z-index:0;">
                     @if ($datos->alineacion=="center-align") 
                        <p style="text-shadow:1px 1px #000000;"><span class="iacf_text iacf_centered">
                           <span class="iacf_title"><span class="highlight1">{{$datos->titulo}}</span> n</span>
                           {{$datos->descripcion}} 
                           <br />
                           <a class="readon" href="index.php/features-mainmenu-47/template-specific-features.html">Empieza ahora</a>
                           </span> 
                        </p>                          
                        @endif
                        @if ($datos->alineacion=="right-align")
                           <p style="text-shadow:1px 1px #000000;" ><span  class="iacf_right"  >
                              <span class="iacf_title" ><span class="highlight1" >{{$datos->titulo}} </span> </span> 
                              {{$datos->descripcion}}
                              <br />
                              <a class="readon" href="index.php/features-mainmenu-47/template-specific-features.html">Empieza ahora</a>
                              </span> 
                           </p>  
                        @endif
                        @if ($datos->alineacion=="left-align")
                           <p style="text-shadow:1px 1px #000000;" ><span  class="iacf_left"  >
                              <span class="iacf_title" ><span class="highlight1" >{{$datos->titulo}} </span></span> 
                              {{$datos->descripcion}}
                              <br />
                              <a class="readon" href="index.php/features-mainmenu-47/template-specific-features.html">Empieza ahora</a>
                              </span> 
                           </p>  
                        @endif 
                        <a href="javascript:;" title="open image" class="open"></a> 
                        <img src="{{asset('/')}}{{$datos->url_imagen}}" alt="" class="full" /> 
                     </div> 
                  @endif
                  @if($datos->img_principal != 1) 
                   <div class="imageElement right-align"  style="z-index:0;">
                        @if ($datos->alineacion=="center-align") 
                           <p style="text-shadow:1px 1px #000000;"><span class="iacf_text iacf_centered">
                              <span class="iacf_title"><span class="highlight1">{{$datos->titulo}}</span> n</span>
                              {{$datos->descripcion}} 
                              <br />
                              <a class="readon" href="index.php/features-mainmenu-47/template-specific-features.html">Empieza ahora</a>
                              </span> 
                           </p>                          
                        @endif
                        @if ($datos->alineacion=="right-align")
                           <p style="text-shadow:1px 1px #000000;" ><span  class="iacf_right"  >
                              <span class="iacf_title" ><span class="highlight1" >{{$datos->titulo}} </span> </span> 
                              {{$datos->descripcion}}
                              <br />
                              <a class="readon" href="index.php/features-mainmenu-47/template-specific-features.html">Empieza ahora</a>
                              </span> 
                           </p>  
                        @endif
                        @if ($datos->alineacion=="left-align")
                           <p style="text-shadow:1px 1px #000000;" ><span  class="iacf_left"  >
                              <span class="iacf_title" ><span class="highlight1" >{{$datos->titulo}} </span></span> 
                              {{$datos->descripcion}}
                              <br />
                              <a class="readon" href="index.php/features-mainmenu-47/template-specific-features.html">Empieza ahora</a>
                              </span> 
                           </p>  
                        @endif 
                        <a href="javascript:;" title="open image" class="open"></a> 
                        <img src="{{asset('/')}}{{$datos->url_imagen}}" alt="" class="full" /> 
                     </div> 
                  @endif
               @endforeach 
             </div>
          </div>
       </div>
       <script type="text/javascript">//<![CDATA[
          document.write('<style>.jdGallery .slideElement {background-size:100% auto;}@media screen and (max-width: 1800px) {#myGallery { height:800px !important; } .jdGallery .slideElement {background-size:cover !important;}}</style>');
          //]]>
       </script>
    </div>
    <div style="clear:both; height:0px"></div> 
</div> 