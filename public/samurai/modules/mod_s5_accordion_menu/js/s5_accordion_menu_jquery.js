/*function (tmp){
	tmp.parents('.s5_am_innermenu').each(function(i,d){
		jQuer(d).css('height','auto');
		console.log(d);
		jQuery(d).animate({'height' :jQuery(d).height()},{duration:1000,'queue':false});
	});
}
*/

jQuery(document).ready(function(){
		jQuery('.handleopen').each(function(i,d){
			if(toolbar.visible){
				jQuery(d).click(function(e){
							e.preventDefault();
							if(jQuery(d).attr('href2')!='javascript:;' && jQuery(d).attr('href2'))window.open(jQuery(d).attr('href2'),'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');
				});
			}else{
				d.href=d.getAttribute('href2');
			}
		});
		jQuery('.handleopenx').each(function(i,d){
			jQuery(d).click(function(e){
						e.preventDefault();
						var onclickx = jQuery(d).attr('onclickx');
						if(onclickx)eval(onclickx);
			});
		});
	});

function s5_am_click_handle_inner(j, tmp){
	if(console)console.log(jQuery('a', jQuery(tmp).prev())[0].href);
	//if(jQuery('a', jQuery(tmp).prev())[0].href!='javascrit:;') return;
	var flag = false;
	if(jQuery(tmp).hasClass('.s5_innermenu_current')) flag = true;
	if(jQuery(tmp).parents('.s5_innermenu_current').length==0 && jQuery('.s5_innermenu_current',tmp).length==0)
		jQuery('.s5_innermenu_current').animate({'height':0,opacity:0}, {duration:1000,'queue':false}).removeClass('s5_innermenu_current');
	if(flag) return;
	if(tmp.height() > 0){
	tmp.animate({'height':0,opacity:0}, {duration:1000,'queue':false,complete:function (){
	tmp.parents('.s5_am_innermenu').each(function(i,d){
		jQuery(d).css('height','auto');
		jQuery(d).animate({'height' :jQuery(d).height()},{duration:1000,'queue':false});
	});
}});
	}else{
		tmp.css('height','auto');
		tmp.animate({'height' :tmp.height(), opacity:1}, {duration:1000,'queue':false,complete:function (){
		tmp.parents('.s5_am_innermenu').each(function(i,d){
				jQuery(d).css('height','auto');
				jQuery(d).animate({'height' :jQuery(d).height()},{duration:1000,'queue':false});
			});
		}}).addClass('s5_innermenu_current');
	}
	/*
	console.log(tmp.parents('.s5_am_innermenu'));
	tmp.parents('.s5_am_innermenu').each(function(i,d){
		jQuery(d).animate({'height' :jQuery(d).height()},{duration:1000,'queue':false});
		});
		*/ 
}
jQuery(document).ready((function ($) {
    if (s5_am_parent_link_enabled == "0") {
        var s5_am_parent_link = document.getElementById("s5_accordion_menu").getElementsByTagName("A");
        for (var s5_am_parent_link_y = 0; s5_am_parent_link_y < s5_am_parent_link.length; s5_am_parent_link_y++) {
            if (s5_am_parent_link[s5_am_parent_link_y].parentNode.parentNode.tagName == "H3") {
                s5_am_parent_link[s5_am_parent_link_y].href = "javascript:;";
            }
        }
    }
    function s5_am_h3_background_load() {
        var s5_am_h3_close = document.getElementById("s5_accordion_menu").getElementsByTagName("H3");
        for (var s5_am_h3_close_y = 0; s5_am_h3_close_y < s5_am_h3_close.length; s5_am_h3_close_y++) {
            if (s5_am_h3_close[s5_am_h3_close_y].nextSibling.innerHTML == "" || s5_am_h3_close[s5_am_h3_close_y].nextSibling.innerHTML == " ") {
                s5_am_h3_close[s5_am_h3_close_y].className = "s5_am_toggler s5_am_not_parent";
            }
            if (s5_am_h3_close[s5_am_h3_close_y].nextSibling.innerHTML != "" && s5_am_h3_close[s5_am_h3_close_y].nextSibling.innerHTML != " ") {
                s5_am_h3_close[s5_am_h3_close_y].className = "s5_am_toggler s5_am_parent";
            }
        }
        if (this.nextSibling.innerHTML == "" || this.nextSibling.innerHTML == " ") {
            this.className = "s5_am_toggler s5_am_open s5_am_not_parent";
        }
        if (this.nextSibling.innerHTML != "" && this.nextSibling.innerHTML != " ") {
            this.className = "s5_am_toggler s5_am_open s5_am_parent";
        }
    }
    var s5_am_h3_background = document.getElementById("s5_accordion_menu").getElementsByTagName("H3");
    for (var s5_am_h3_background_y = 0; s5_am_h3_background_y < s5_am_h3_background.length; s5_am_h3_background_y++) {
        s5_am_h3_background[s5_am_h3_background_y].onclick = s5_am_h3_background_load;
    }
    var s5_am_element = document.getElementById("s5_accordion_menu").getElementsByTagName("DIV");
    for (var s5_am_element_y = 0; s5_am_element_y < s5_am_element.length; s5_am_element_y++) {
        if (s5_am_element[s5_am_element_y].className == "s5_accordion_menu_element") {
            if (s5_am_element[s5_am_element_y].innerHTML != "") {
                s5_am_element[s5_am_element_y].style.display = s5_accordion_menu_display;
            }
            if (s5_am_element[s5_am_element_y].innerHTML == " " || s5_am_element[s5_am_element_y].innerHTML == "") {
                s5_am_element[s5_am_element_y].previousSibling.className = "s5_am_toggler s5_am_not_parent";
            }
            if (s5_am_element[s5_am_element_y].innerHTML != " " && s5_am_element[s5_am_element_y].innerHTML != "") {
                s5_am_element[s5_am_element_y].previousSibling.className = "s5_am_toggler s5_am_parent";
            }
        }
    }
    var s5_am_current_level = 0;
    var s5_am_h3_current = document.getElementById("s5_accordion_menu").getElementsByTagName("H3");
    for (var s5_am_h3_current_y = 0; s5_am_h3_current_y < s5_am_h3_current.length; s5_am_h3_current_y++) {
        if (s5_am_h3_current[s5_am_h3_current_y].id == "current") {
            s5_am_current_level = s5_am_h3_current_y;
        }
    }
    var s5_am_li_current = document.getElementById("s5_accordion_menu").getElementsByTagName("LI");
    for (var s5_am_li_current_y = 0; s5_am_li_current_y < s5_am_li_current.length; s5_am_li_current_y++) {
        if (s5_am_li_current[s5_am_li_current_y].id == "current") {
            if (s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.className == "s5_accordion_menu_element") {
                s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.id = "s5_am_parent_div_current";
            } else if (s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.parentNode.className == "s5_accordion_menu_element") {
                s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.parentNode.id = "s5_am_parent_div_current";
            } else if (s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.parentNode.parentNode.className == "s5_accordion_menu_element") {
                s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.parentNode.parentNode.id = "s5_am_parent_div_current";
            } else if (s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.parentNode.parentNode.parentNode.className == "s5_accordion_menu_element") {
                s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.parentNode.parentNode.parentNode.id = "s5_am_parent_div_current";
            } else if (s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.className == "s5_accordion_menu_element") {
                s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id = "s5_am_parent_div_current";
            } else if (s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.className == "s5_accordion_menu_element") {
                s5_am_li_current[s5_am_li_current_y].parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id = "s5_am_parent_div_current";
            }
            var s5_am_div_current = document.getElementById("s5_accordion_menu").getElementsByTagName("DIV");
            for (var s5_am_div_current_y = 0; s5_am_div_current_y < s5_am_div_current.length; s5_am_div_current_y++) {
                if (s5_am_div_current[s5_am_div_current_y].id == "s5_am_parent_div_current") {
                    s5_am_current_level = s5_am_div_current_y - 1;
                }
            }
        }
    }
    var togglers = $('h3.s5_am_toggler');
  //  var elms = $('div.s5_accordion_menu_element');
    var elms = $('div.s5_accordion_menu_element');
    $(togglers).each(function (i, d) {
       /* if (i == 0) {
            elms.eq(0).css({
                'height': $(this).children(0).height(),
                'opacity': 1
            });
        } else*/ {
            $(d).removeClass('s5_am_open');
            elms.eq(i).css({
                'height': 0,
                'opacity': 0
            });
        }
        $(d).click(function (e) {
            var flag = togglers.index(e.target) != elms.index($('div.vacurrentmenu'));
            $('div.vacurrentmenu').removeClass('vacurrentmenu').animate({
                'height': 0,
                'opacity': 0
            }, {
                'duration': 1600,
                'queue': false,
                'easing': 'easeOutExpo'
            });
            $(this).removeClass('s5_am_open');
            for(var tmp = e.target; tmp.nodeName != 'A' && tmp.nodeName != 'BODY'; tmp = tmp.parentNode);
            if (tmp.nodeName == 'A' && tmp.href != 'javascript:;' && tmp.target!='_blank' && tmp.onclick==null) {
                //self.location.href = e.target.parentNode.href;
                self.location.href = tmp.href;
                return false;
            }
            if (flag) {
                if (elms.eq(i).children(0).length > 0) h = elms.eq(i).children(0).outerHeight();
                else h = elms.eq(i).outerHeight();
                $(this).addClass('s5_am_open');
                elms.eq(i).addClass('vacurrentmenu').animate({
                    'height': h,
                    'opacity': 1
                }, {
                    'duration': 1600,
                    'queue': false,
                    'easing': 'easeOutExpo'
                });
            }
        });
    });;
    
	

    $('.s5_accordion_menu_left').each(function (i, d) {
        $(d).click(function (e) {
            var tmp = $(e.target).parent()[0];
           /*
            *  var href = $(e.target).parentsUntil('a').parent().attr('href');
            if(console)console.log(href);
            if(href && href != 'javascript:;') {

			}
			* */
			//for(var tmp = e.target; tmp.nodeName != 'A' && tmp.nodeName != 'BODY'; tmp = tmp.parentNode);
            if(console) console.log(e.target);
            var j = togglers.index(d.parentNode);
            for(var tmp2 = e.target; tmp2.className!='s5_accordion_menu_left';tmp2=tmp2.parentNode);
            
			// causing spacing issue in IE9 if enabled
			// if(console)console.log(tmp2);
            if(console)console.log($(tmp2).next().hasClass('s5_am_innermenu'));
            if(/*tmp.nodeName=='A' && tmp.href=='javascript:;' &&*/ $(tmp2).next().hasClass('s5_am_innermenu')){
				tmp = $(tmp2).next();
			}
			 if(console)console.log($(tmp).hasClass('s5_am_innermenu'));
            if(tmp.nodeName == 'A'){
				if(console) console.log(1);
				s5_am_click_handle(j,tmp);
			}else if($(tmp).hasClass('s5_am_innermenu')){
				s5_am_click_handle(j,tmp);
			}else{  
				if(console) console.log(2,e.target);
				//if($('a', tmp).size() > 0 ){
						s5_am_click_handle(j,tmp);
				/*}else{
						for(; tmp.nodeName!='A'; tmp=tmp.parentNode	);
						s5_am_click_handle(j,tmp);
				}*/
			}
        });
    });;
    /**
     * i == index
     * tmp == A tag
     */
    function s5_am_click_handle(i,tmp){
		if($(tmp).hasClass('s5_am_innermenu')){
			s5_am_click_handle_inner(i,tmp);
			return ;
		}
		// causing spacing issue in IE9 if enabled
		//if(console)console.log(tmp);
		if(tmp.href == 'javascript:;' || tmp.nodeName=='H3'){
					 var flag = i !== elms.index($('div.vacurrentmenu'));
					$('div.vacurrentmenu').removeClass('vacurrentmenu').animate({
						'height': 0,
						'opacity': 0
					}, {
						'duration': 1600,
						'queue': false,
						'easing': 'easeOutExpo'
					});
					if (flag) {
						if (elms.eq(i).children(0).length > 0) h = elms.eq(i).children(0).outerHeight();
						else h = elms.eq(i).outerHeight();
						$(this).addClass('s5_am_open');
						elms.eq(i).addClass('vacurrentmenu').animate({
							'height': h,
							'opacity': 1
						}, {
							'duration': 1600,
							'queue': false,
							'easing': 'easeOutExpo'
						});
					}
		}else{
					if(console) console.log(tmp.nodeName!='H3' && tmp.nodeName == 'A' && tmp.target != '_blank' &&tmp.onclick == null);
					 if(tmp.nodeName!='H3' && tmp.nodeName == 'A' && tmp.target != '_blank' &&tmp.onclick == null)
						self.location.href=tmp.href;
		}
	}
	
	
    var s5_am_h3_first = document.getElementById("s5_accordion_menu").getElementsByTagName("H3");
    for (var s5_am_h3_first_y = 0; s5_am_h3_first_y < s5_am_h3_first.length; s5_am_h3_first_y++) {
        if (s5_am_h3_first_y == s5_am_current_level) {
            if (s5_am_h3_first[s5_am_h3_first_y].nextSibling.innerHTML == "" || s5_am_h3_first[s5_am_h3_first_y].nextSibling.innerHTML == " ") {
                s5_am_h3_first[s5_am_h3_first_y].className = "s5_am_toggler s5_am_open s5_am_not_parent";
            }
			if (s5_closed_or_open == "open") {
				if (s5_am_h3_first[s5_am_h3_first_y].nextSibling.innerHTML != "" && s5_am_h3_first[s5_am_h3_first_y].nextSibling.innerHTML != " ") {
					s5_am_h3_first[s5_am_h3_first_y].className = "s5_am_toggler s5_am_open  s5_am_parent";
					if (elms.eq(s5_am_h3_first_y).children(0).length > 0) h = elms.eq(s5_am_h3_first_y).children(0).outerHeight();
					else h = elms.eq(s5_am_h3_first_y).outerHeight();
					elms.eq(s5_am_h3_first_y).addClass('vacurrentmenu').animate({
						'height': h,
						'opacity': 1
					}, {
						'duration': 1900,
						'queue': false,
						'easing': 'easeOutExpo'
					});
				}
			}
        }
    }
})(jQuery));
