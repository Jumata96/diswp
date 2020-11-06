<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
 
   @include('samurai.layout.partials.htmlHead')
   
   <body id="s5_body">
      <div id="s5_scrolltotop"></div>
      <!-- Top Vertex Calls -->
      <!-- Call mobile sidebar -->
      <div id="s5_responsive_mobile_sidebar" class="s5_responsive_mobile_sidebar_hide_ltr">
         
        @include('samurai.layout.partials.mobileSidebar')

      </div>
      <div id="s5_responsive_mobile_sidebar_body_wrap">
         <div id="s5_responsive_mobile_sidebar_body_wrap_inner">
            <!-- Call top bar for mobile devices if layout is responsive -->	
            <!-- s5_responsive_mobile_top_bar_spacer must be called to keep a space at the top of the page since s5_responsive_mobile_top_bar_wrap is position absolute. -->	
            <div id="s5_responsive_mobile_top_bar_spacer"></div>
            <!-- s5_responsive_mobile_top_bar_wrap must be called off the page and not with display:none or it will cause issues with the togglers. -->
            <div id="s5_responsive_mobile_top_bar_wrap" style="margin-top:-50000px;position:absolute;z-index:20;top:0px">
               <div id="s5_responsive_mobile_top_bar" onclick="s5_responsive_mobile_sidebar()" class="s5_responsive_mobile_bar_light">
                  <div id="s5_responsive_mobile_toggle_click_menu">
                     <span></span>
                  </div>
                  <div id="s5_responsive_mobile_bar_active">
                     <span>
                     Home							</span>
                  </div>
                  <div style="clear:both;height:0px"></div>
               </div>
            </div>
            <script type="text/javascript">
               var s5_responsive_trigger = 750;
               var s5_responsive_layout = "sidebar";
               var s5_responsive_layout_direction = "_ltr";
               var s5_responsive_menu_auto_open = "open";
            </script>
            <script type="text/javascript" src="{{asset('samurai/templates/fitness_center/js/core/s5_responsive_mobile_bar-min.js')}}"></script>
            <!-- Fixed Tabs -->	
            <!-- Drop Down -->	
            <!-- Parallax Backgrounds -->
            <script type="text/javascript">//<![CDATA[
               var s5_load_parallax_scroll_speed = 4.0;
               function s5_check_parallax_scroll(s5_parallax_element,s5_parallax_position) {
               	if (document.getElementById(s5_parallax_element)) {
               		//Detect elements that are view when page loads so that they start at background-position:0 0
               		if (document.getElementById(s5_parallax_element).offsetTop <= window.innerHeight) {
               			document.getElementById(s5_parallax_element).style.backgroundPosition = s5_parallax_position + (((window.pageYOffset + document.getElementById(s5_parallax_element).offsetTop) - (document.getElementById(s5_parallax_element).offsetTop)) / s5_load_parallax_scroll_speed)*-1 + "px";
               		}
               		//Detect elements that are outside of the viewable area so they do not start scrolling until they come into view
               		else {
               			if ((window.pageYOffset + window.innerHeight >= document.getElementById(s5_parallax_element).offsetTop) && (window.pageYOffset <= (document.getElementById(s5_parallax_element).offsetTop + document.getElementById(s5_parallax_element).offsetHeight))) {
               				document.getElementById(s5_parallax_element).style.backgroundPosition = s5_parallax_position + (((window.pageYOffset + window.innerHeight) - (document.getElementById(s5_parallax_element).offsetTop)) / s5_load_parallax_scroll_speed)*-1 + "px";
               			}
               		}
               	}
               }
               	jQuery(document).ready( function() {
               	function s5_parallax_scroll_handler() {
               												s5_check_parallax_scroll("s5_top_row3_area1","50% ");
               																																    } 
               	s5_parallax_scroll_handler();
                   if(window.addEventListener) {
                       window.addEventListener('scroll', s5_parallax_scroll_handler, false);   
               		window.addEventListener('resize', s5_parallax_scroll_handler, false);   
               	}
                   else if (window.attachEvent) {
                       window.attachEvent('onscroll', s5_parallax_scroll_handler); 
               		window.attachEvent('onresize', s5_parallax_scroll_handler); 
               	}
               	});		
               	
               //]]>
            </script>
            <!-- Floating Menu Spacer -->
            <div id="s5_floating_menu_spacer" style="display:none;width:100%;"></div>
            <!-- Body Padding Div Used For Responsive Spacing -->		
            <div id="s5_body_padding">
               
                <!-- CABECERA DE LA PAGINA -->
                @include('samurai.layout.partials.header')

               <div id="s5_content_body_wrap">
                  
                  @yield('main-content')
                  <!-- Footer Area -->
                  @include('samurai.layout.partials.footer')
                  <!-- End Footer Area -->
                  <!-- Bottom Vertex Calls -->
                  <!-- Page scroll, tooltips, multibox, and ie6 warning -->	
                  <div id="s5_scroll_wrap" class="s5_wrap">
                     <script type="text/javascript">
                        /*! Jquery scrollto function */
                        (function(a,c){var b=(function(){var d=c(a.documentElement),f=c(a.body),e;if(d.scrollTop()){return d}else{e=f.scrollTop();if(f.scrollTop(e+1).scrollTop()==e){return d}else{return f.scrollTop(e)}}}());c.fn.smoothScroll=function(d){d=~~d||400;return this.find('a[href*="#s5"]').click(function(f){var g=this.hash,e=c(g);if(location.pathname.replace(/^\//,'')===this.pathname.replace(/^\//,'')&&location.hostname===this.hostname){if(e.length){f.preventDefault();b.stop().animate({scrollTop:e.offset().top},d,function(){location.hash=g})}}}).end()}}(document,jQuery));
                        function initSmoothscroll(){
                        	jQuery('html').smoothScroll(700);
                        }
                        jQuery(document).ready(function(){
                        	initSmoothscroll();
                        });
                        var s5_page_scroll_enabled = 1;
                        function s5_page_scroll(obj){ if(jQuery.browser.mozilla) var target = 'html'; else var target='html body'; jQuery(target).stop().animate({scrollTop:jQuery(obj).offset().top},700,function(){location.hash=obj}); } 
                        function s5_hide_scroll_to_top_display_none() { if (window.pageYOffset < 300) { document.getElementById("s5_scrolltopvar").style.display = "none"; } }
                        function s5_hide_scroll_to_top_fadein_class() { document.getElementById("s5_scrolltopvar").className = "s5_scrolltop_fadein"; }
                        function s5_hide_scroll_to_top() {
                        	if (window.pageYOffset >= 300) {document.getElementById("s5_scrolltopvar").style.display = "block";
                        		document.getElementById("s5_scrolltopvar").style.visibility = "visible";
                        		window.setTimeout(s5_hide_scroll_to_top_fadein_class,300);}
                        	else {document.getElementById("s5_scrolltopvar").className = "s5_scrolltop_fadeout";window.setTimeout(s5_hide_scroll_to_top_display_none,300);}}
                        jQuery(document).ready( function() {s5_hide_scroll_to_top();});
                        jQuery(window).resize(s5_hide_scroll_to_top);
                        if(window.addEventListener) {
                        	window.addEventListener('scroll', s5_hide_scroll_to_top, false);   
                        }
                        else if (window.attachEvent) {
                        	window.attachEvent('onscroll', s5_hide_scroll_to_top); 
                        }
                     </script>
                     <div id="s5_scrolltopvar" class="s5_scrolltop_fadeout" style="visibility:hidden">
                        <a href="#s5_scrolltotop" id="s5_scrolltop_a" class="s5_scrolltotop"></a>
                     </div>
                  </div>
                  <!-- Start compression if enabled -->	
                  <script type="text/javascript">
                     var s5_multibox_enabled = 1;
                     jQuery(document).ready(function(){
                     	jQuery('.s5mb').each(function(i,z){if(!z.getAttribute('rel'))z.setAttribute('rel','[me]');});
                     }(jQuery));
                     var s5mbox = {};
                     		        jQuery(document).ready(function($){
                               initMultibox('.s5mb');
                           });
                     
                     	function initMultibox(mbClass){
                     window.s5mbox = new multiBox({
                     	mbClass: mbClass,/*class you need to add links that you want to trigger multiBox with (remember and update CSS files)*/
                     	container: jQuery(document.body),/*where to inject multiBox*/
                     	path: 'http://www.shape5.com/demo/fitness_center/templates/fitness_center/js/multibox/',/*path to mp3player and flvplayer etc*/
                     	useOverlay: true,/*detect overlay setting*/
                     	maxSize: {w:800, h:500},/*max dimensions (width,height) - set to null to disable resizing*/
                     	movieSize: {w:800, h:500},
                     	addDownload: false,/*do you want the files to be downloadable?*/
                     	descClassName: 's5_multibox',/*the class name of the description divs*/
                     	pathToDownloadScript: 'http://www.shape5.com/demo/fitness_center/templates/fitness_center/js/multibox/forceDownload.asp',/*if above is true, specify path to download script (classicASP and ASP.NET versions included)*/
                     	addRollover: false,/*add rollover fade to each multibox link*/
                     	addOverlayIcon: false,/*adds overlay icons to images within multibox links*/
                     	addChain: false,/*cycle through all images fading them out then in*/
                     	recalcTop: true,/*subtract the height of controls panel from top position*/
                     	addTips: false,/*adds MooTools built in 'Tips' class to each element (see: http://mootools.net/docs/Plugins/Tips)*/
                     	autoOpen: 0/*to auto open a multiBox element on page load change to (1, 2, or 3 etc)*/
                     });	}
                     <!--}(jQuery));-->
                     		Eventx.onResizend(function(){		
                     	s5mbox.resize(); 
                     });
                     	
                  </script>
                  <!-- Additional scripts to load just before closing body tag -->
                  <!-- Info Slide script - JS and CSS called in header -->
                  <script type='text/javascript'>
                     jQuery(document).ready(function(){
                         jQuery('.s5_is_slide').each(function (i, d) {
                     			jQuery(d).wrapInner(jQuery('<div class="s5_is_display"></div>'));
                     		});
                     		var options = {
                     			wrapperId: "s5_body"
                     		};
                     		var slide = new Slidex();
                     		slide.init(options);
                     	});
                  </script>
                  <!-- Scroll Reavel script - JS called in header -->
                  <script type='text/javascript'>
                     jQuery(document).ready(function(){
                     	if (jQuery(this).width() > 1025) {
                     		window.scrollReveal = new scrollReveal();
                        }
                     });
                  </script>
                  <!-- File compression. Needs to be called last on this file -->	
                  <!-- Responsive Bottom Mobile Bar -->
                  <!-- Call bottom bar for mobile devices if layout is responsive -->	
                  <div id="s5_responsive_mobile_bottom_bar_outer" style="display:none">
                     <div id="s5_responsive_mobile_bottom_bar" class="s5_responsive_mobile_bar_light">
                        <!-- Call mobile links if links are enabled and cookie is currently set to mobile -->	
                        <div id="s5_responsive_mobile_scroll">
                           <a href="#s5_scrolltotop" class="s5_scrolltotop"></a>
                        </div>
                        <div style="clear:both;height:0px"></div>
                     </div>
                  </div>
                  <!-- Call bottom bar for all devices if user has chosen to see desktop version -->	
                  <!-- Closing call for mobile sidebar body wrap defined in includes top file -->
                  <div style="clear:both"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Body Padding -->
      <script>
         function s5_search_open() {
         	document.getElementById('s5_search_overlay').className = "s5_search_open";
         	if (document.getElementById("s5_drop_down_container")) { 
         		document.getElementById("s5_drop_down_container").style.display = "none"; 
         	}
         }
         function s5_search_close() {
         	document.getElementById('s5_search_overlay').className = "s5_search_close";
         	if (document.getElementById("s5_drop_down_container")) { 
         		document.getElementById("s5_drop_down_container").style.display = "block"; 
         	}
         }
      </script>
   </body>
   <!-- Mirrored from www.shape5.com/demo/fitness_center/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Oct 2020 23:59:24 GMT -->
</html>