
// To setup the template, change the variables below
// Follow instructions in code comments or see documentation for more detail

//  1. Header Section
//	2. General Sections
//	3. Gallery Section
//	4. Home Slider Section



/*****************************************************************************
						1. Header Section
******************************************************************************/


jQuery(document).ready(function($){
"use strict";

// Menu Logo Hover logo animation

$( "a.brand-logo" ).on({
  mouseenter: function() {
    $('.brand-logo').addClass('animated pulse')
  }, mouseleave: function() {
   $('.brand-logo').removeClass('animated pulse');
  }
});
// logo animation
 
// Menu On Mobile Resolution
$(function(){
	$('#sub-nav').slicknav({
	label: '',
	duration: 1000,
	easingOpen: "easeOutQuint", //available with jQuery UI
	closeOnClick:true
});
});
// Menu On Mobile Resolution

// for mobile smooth scrolling
$(document).on('click', ".slicknav_nav a", function(e) {
        e.preventDefault();
		var h = $('#nav').outerHeight();
		if (!$('#main-menu').is(":visible")) {
			h = $('.slicknav_menu .slicknav_btn').outerHeight();
		}
		var link = this;
		$.smoothScroll({
			offset: -h,
			scrollTarget: link.hash
		});
	});
// for mobile smooth scrolling

//Top Header Fixed
var $top1= $('.header-inner').offset().top  +50;   

$(window).scroll(function()
{   

    if ($(window).scrollTop()>$top1)   
    {
     $('#fixed-header').addClass('header-fixed');
	   $(".top-bar").hide();
    }
    else
    {
     $('#fixed-header').removeClass('header-fixed');
	 	   $(".top-bar").show();
     }
     
});
//Top Header Fixed end

/**********************1. Header  END**********************/


/*************************************************************
		  		2. GENERAL SECTION
**************************************************************/

//Preloader
 $("body").jpreLoader(
			  {
				splashID:"#jSplash",
				showPercentage:!0,
				autoClose:!0,
				showSplash: true,
				splashFunction:function(){
				$("#circle").delay(1250).animate({opacity:1},700,"linear");
			  }
			 });       
//Preloader end

// Modal Section
 $('.materialboxed').materialbox();
// Modal Section

// Parallax Section
 $('.parallax').parallax();
// Parallax Section
 
 
// Modal Section
$('.modal-trigger').leanModal();  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
// Modal Section

// Date Time Picker Section
$('.datepicker').pickadate({
    selectMonths: false, // Creates a dropdown to control month
    selectYears: false, // Creates a dropdown of 15 years to control year
  });
// Date Time Picker Section

//scrollSpy
$('.scrollspy').scrollSpy();
// smooth scrolling 


//Navigation smooth Scrolling
$('#sub-nav a, .smoothscroll').on('click',function(event){
		var $anchor = $(this);
		$('html, body').stop().animate({
		scrollTop: $($anchor.attr('href')).offset().top -78}, 1500,'easeInOutExpo');
		event.preventDefault();
});
//Navigation smooth Scrolling

/*   modal video Stop On Click Close Button  */
$( ".modal" ).on({
  click: function() {
   video_containers = $('.video_containers');				// Video Stoped While The Modal Is Closed
   video_containers.html( video_containers.html() );
}
});

/*   modal video Stop On Click Close Button  */

/****************** 2. GENERAL SECTION END******************/


/*************************************************************
		  		3. GALLERY SECTION
**************************************************************/
// Gallery on mouseover opactiy
jQuery("area[data-rel^='prettyPhoto']").prettyPhoto();
		jQuery("#portfolio-grid:first a[data-rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'pp_default',slideshow:3000, autoplay_slideshow: false,deeplinking:false});
		jQuery(".portfolio-grid:gt(0) a[data-rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',slideshow:3000, deeplinking:false});
		jQuery("#custom_content a[data-rel^='prettyPhoto']:first").prettyPhoto({
		custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
		changepicturecallback: function(){ initialize(); }
		});
		jQuery("#custom_content a[data-rel^='prettyPhoto']:last").prettyPhoto({
		custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
		changepicturecallback: function(){ _bsap.exec(); }
		});


//mixitup Gallery filters
	  $('#portfolio-grid').mixitup({
		effects: ['fade','scale'],
		easing: 'snap'
	  });
//mixitup Portfolio END

//Gallery Owl Carousel **/

var carousel = $("#portfolio-grid");
  carousel.owlCarousel({
    navigation:false,
	autoPlay:true,
	loop:true,
	items : 3,
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [979,2],
	pagination:false,
    navigationText: [
      "<img src='img/prev.png' alt='' class='img-responsive' />",
      "<img src='img/next.png' alt='' class='img-responsive'/>"
      ],
  });
//	 Owl Carousel end

/****************** 3. GALLERY END******************/

/*************************************************************
		  		4. HOME SLIDER SECTION
**************************************************************/

					jQuery('.tp-banner').show().revolution(
					{
						dottedOverlay:"none",
						delay:9000,
						startwidth:1170,
						startheight:700,
						hideThumbs:200,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:5,
						
						navigationType:"none",
						navigationArrows:"solo",
						navigationStyle:"preview4",
						
						touchenabled:"on",
						onHoverStop:"on",
						
						swipe_velocity: 0.7,
						swipe_min_touches: 1,
						swipe_max_touches: 1,
						drag_block_vertical: false,
												
												
						keyboardNavigation:"on",
						
						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:20,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,
								
						shadow:0,
						fullWidth:"on",
						fullScreen:"off",

						spinner:"spinner0",
						
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						shuffle:"off",
						
						autoHeight:"off",						
						forceFullWidth:"off",						
												
												
												
						hideThumbsOnMobile:"off",
						hideNavDelayOnMobile:1500,						
						hideBulletsOnMobile:"off",
						hideArrowsOnMobile:"off",
						hideThumbsUnderResolution:0,
						
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						startWithSlide:0
					});

// Home Revolution Slider Section
/****************** 4. HOME SLIDER SECTION END******************/

});

// Document on Ready END
	


// WOW Init Reveal Animation  
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
   wow.init();
//   
// wow end 

// ******************************************************************************************
// Reservation Form Start
// ******************************************************************************************
jQuery(document).ready(function($){
"use strict";	

   $("#resbutton").click(function() {
    if ($("#reservation_form").valid()) {
        $("#reservation_form").submit();
    }
});

  $('#reservation_form').validate(
    {
    rules: {
   /* date: {
    required: true
    },*/
	time: {
    required: true,
    },
    noofpeople: {
    required: true,
   
    }
    },
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    success: function(element) {
    element
    .text('OK!').addClass('valid')
    .closest('.control-group').removeClass('error').addClass('success');
    },
	submitHandler: function(form) {
					// do other stuff for a valid form
					$.post('reservation_form.php', $("#reservation_form").serialize(), function(data) { // action file is here 
						$('#reservation_form_thanks').html(data);
					});
				}
    });

    }); // end document.ready


//Reservation Form END

// ******************************************************************************************
// Contact Form Start
// ******************************************************************************************
jQuery(document).ready(function($){
"use strict";	

$("#conbutton").click(function() {
    if ($("#contact_form").valid()) {
        $("#contact_form").submit();
    }
});


  $('#contact_form').validate(
    {
    rules: {
    name: {
    minlength: 2,
    required: true
    },
	phone: {
    required: true,
    },
    email: {
    required: true,
    email: true
    },
    message: {
    minlength: 2,
    required: true
    }
    },
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    success: function(element) {
    element
    .text('OK!').addClass('valid')
    .closest('.control-group').removeClass('error').addClass('success');
    },
	submitHandler: function(form) {
					// do other stuff for a valid form
					$.post('contact_form.php', $("#contact_form").serialize(), function(data) { // action file is here 
						$('#contact_form_thanks').html(data);
					});
				}
    });
    }); // end document.ready


//Contact Form END