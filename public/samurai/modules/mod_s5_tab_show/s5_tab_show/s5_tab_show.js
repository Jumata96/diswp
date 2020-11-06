var s5_tab_show_started = "no";

function s5_tab_show_start() {
if (s5_tab_show_started == "no") {
s5_tab_show_started = "yes";
	//Give a unique ID to each outer wrap
	var s5_tab_show_mark_outer_id_counter = 1;
	var s5_tab_show_mark_outer_id = document.getElementsByTagName("DIV");
	for (var s5_tab_show_mark_outer_id_y=0; s5_tab_show_mark_outer_id_y<s5_tab_show_mark_outer_id.length; s5_tab_show_mark_outer_id_y++) {
		if (s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].className == "s5_tab_show_outer_wrap") {
			if (s5_tab_show_mark_outer_id_counter == 1) {
				var s5_tab_show_unique_id = s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.substr(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.length - 10);
				var s5_tab_show_duration_id = "s5_tab_show_duration_id" + s5_tab_show_unique_id;
				var s5_tab_show_duration = document.getElementById(s5_tab_show_duration_id).innerHTML;
				if (s5_tab_show_duration != "disabled") {
				s5_tab_show_duration = s5_tab_show_duration * 1000;
				}
				s5_tab_show_unique_id = "s5_tab_show_slide1_button_id" + s5_tab_show_unique_id;
				s5_tab_show_trigger_slide_transition(s5_tab_show_unique_id);
				if (s5_tab_show_duration != "disabled") {
				var s5_tab_show_outer_wrap_id1 = setInterval(s5_tab_show_outer_wrap_id1_interval, s5_tab_show_duration);
				function s5_tab_show_outer_wrap_id1_clear() { clearInterval(s5_tab_show_outer_wrap_id1); }
				function s5_tab_show_outer_wrap_id1_set() { s5_tab_show_outer_wrap_id1 = setInterval(s5_tab_show_outer_wrap_id1_interval, s5_tab_show_duration); }
				if (s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].innerHTML.indexOf("5_tab_show_pause_onhover_enabled") >= 0) {
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseover", s5_tab_show_outer_wrap_id1_clear);
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseout", s5_tab_show_outer_wrap_id1_set);
				}
				}
			}
			else if (s5_tab_show_mark_outer_id_counter == 2) {
				var s5_tab_show_unique_id = s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.substr(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.length - 10);
				var s5_tab_show_duration_id = "s5_tab_show_duration_id" + s5_tab_show_unique_id;
				var s5_tab_show_duration = document.getElementById(s5_tab_show_duration_id).innerHTML;
				if (s5_tab_show_duration != "disabled") {
				s5_tab_show_duration = s5_tab_show_duration * 1000;
				}
				s5_tab_show_unique_id = "s5_tab_show_slide1_button_id" + s5_tab_show_unique_id;
				s5_tab_show_trigger_slide_transition(s5_tab_show_unique_id);
				if (s5_tab_show_duration != "disabled") {
				var s5_tab_show_outer_wrap_id2 = setInterval(s5_tab_show_outer_wrap_id2_interval, s5_tab_show_duration);
				function s5_tab_show_outer_wrap_id2_clear() { clearInterval(s5_tab_show_outer_wrap_id2); }
				function s5_tab_show_outer_wrap_id2_set() { s5_tab_show_outer_wrap_id2 = setInterval(s5_tab_show_outer_wrap_id2_interval, s5_tab_show_duration); }
				if (s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].innerHTML.indexOf("5_tab_show_pause_onhover_enabled") >= 0) {
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseover", s5_tab_show_outer_wrap_id2_clear);
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseout", s5_tab_show_outer_wrap_id2_set);
				}
				}
			}
			else if (s5_tab_show_mark_outer_id_counter == 3) {
				var s5_tab_show_unique_id = s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.substr(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.length - 10);
				var s5_tab_show_duration_id = "s5_tab_show_duration_id" + s5_tab_show_unique_id;
				var s5_tab_show_duration = document.getElementById(s5_tab_show_duration_id).innerHTML;
				if (s5_tab_show_duration != "disabled") {
				s5_tab_show_duration = s5_tab_show_duration * 1000;
				}
				s5_tab_show_unique_id = "s5_tab_show_slide1_button_id" + s5_tab_show_unique_id;
				s5_tab_show_trigger_slide_transition(s5_tab_show_unique_id);
				if (s5_tab_show_duration != "disabled") {
				var s5_tab_show_outer_wrap_id3 = setInterval(s5_tab_show_outer_wrap_id3_interval, s5_tab_show_duration);
				function s5_tab_show_outer_wrap_id3_clear() { clearInterval(s5_tab_show_outer_wrap_id3); }
				function s5_tab_show_outer_wrap_id3_set() { s5_tab_show_outer_wrap_id3 = setInterval(s5_tab_show_outer_wrap_id3_interval, s5_tab_show_duration); }
				if (s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].innerHTML.indexOf("5_tab_show_pause_onhover_enabled") >= 0) {
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseover", s5_tab_show_outer_wrap_id3_clear);
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseout", s5_tab_show_outer_wrap_id3_set);
				}
				}
			}
			else if (s5_tab_show_mark_outer_id_counter == 4) {
				var s5_tab_show_unique_id = s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.substr(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.length - 10);
				var s5_tab_show_duration_id = "s5_tab_show_duration_id" + s5_tab_show_unique_id;
				var s5_tab_show_duration = document.getElementById(s5_tab_show_duration_id).innerHTML;
				if (s5_tab_show_duration != "disabled") {
				s5_tab_show_duration = s5_tab_show_duration * 1000;
				}
				s5_tab_show_unique_id = "s5_tab_show_slide1_button_id" + s5_tab_show_unique_id;
				s5_tab_show_trigger_slide_transition(s5_tab_show_unique_id);
				if (s5_tab_show_duration != "disabled") {
				var s5_tab_show_outer_wrap_id4 = setInterval(s5_tab_show_outer_wrap_id4_interval, s5_tab_show_duration);
				function s5_tab_show_outer_wrap_id4_clear() { clearInterval(s5_tab_show_outer_wrap_id4); }
				function s5_tab_show_outer_wrap_id4_set() { s5_tab_show_outer_wrap_id4 = setInterval(s5_tab_show_outer_wrap_id4_interval, s5_tab_show_duration); }
				if (s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].innerHTML.indexOf("5_tab_show_pause_onhover_enabled") >= 0) {
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseover", s5_tab_show_outer_wrap_id4_clear);
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseout", s5_tab_show_outer_wrap_id4_set);
				}
				}
			}
			else if (s5_tab_show_mark_outer_id_counter == 5) {
				var s5_tab_show_unique_id = s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.substr(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.length - 10);
				var s5_tab_show_duration_id = "s5_tab_show_duration_id" + s5_tab_show_unique_id;
				var s5_tab_show_duration = document.getElementById(s5_tab_show_duration_id).innerHTML;
				if (s5_tab_show_duration != "disabled") {
				s5_tab_show_duration = s5_tab_show_duration * 1000;
				}
				s5_tab_show_unique_id = "s5_tab_show_slide1_button_id" + s5_tab_show_unique_id;
				s5_tab_show_trigger_slide_transition(s5_tab_show_unique_id);
				if (s5_tab_show_duration != "disabled") {
				var s5_tab_show_outer_wrap_id5 = setInterval(s5_tab_show_outer_wrap_id5_interval, s5_tab_show_duration);
				function s5_tab_show_outer_wrap_id5_clear() { clearInterval(s5_tab_show_outer_wrap_id5); }
				function s5_tab_show_outer_wrap_id5_set() { s5_tab_show_outer_wrap_id5 = setInterval(s5_tab_show_outer_wrap_id5_interval, s5_tab_show_duration); }
				if (s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].innerHTML.indexOf("5_tab_show_pause_onhover_enabled") >= 0) {
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseover", s5_tab_show_outer_wrap_id5_clear);
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseout", s5_tab_show_outer_wrap_id5_set);
				}
				}
			}
			else if (s5_tab_show_mark_outer_id_counter == 6) {
				var s5_tab_show_unique_id = s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.substr(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.length - 10);
				var s5_tab_show_duration_id = "s5_tab_show_duration_id" + s5_tab_show_unique_id;
				var s5_tab_show_duration = document.getElementById(s5_tab_show_duration_id).innerHTML;
				if (s5_tab_show_duration != "disabled") {
				s5_tab_show_duration = s5_tab_show_duration * 1000;
				}
				s5_tab_show_unique_id = "s5_tab_show_slide1_button_id" + s5_tab_show_unique_id;
				s5_tab_show_trigger_slide_transition(s5_tab_show_unique_id);
				if (s5_tab_show_duration != "disabled") {
				var s5_tab_show_outer_wrap_id6 = setInterval(s5_tab_show_outer_wrap_id6_interval, s5_tab_show_duration);
				function s5_tab_show_outer_wrap_id6_clear() { clearInterval(s5_tab_show_outer_wrap_id6); }
				function s5_tab_show_outer_wrap_id6_set() { s5_tab_show_outer_wrap_id6 = setInterval(s5_tab_show_outer_wrap_id6_interval, s5_tab_show_duration); }
				if (s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].innerHTML.indexOf("5_tab_show_pause_onhover_enabled") >= 0) {
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseover", s5_tab_show_outer_wrap_id6_clear);
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseout", s5_tab_show_outer_wrap_id6_set);
				}
				}
			}
			else if (s5_tab_show_mark_outer_id_counter == 7) {
				var s5_tab_show_unique_id = s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.substr(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.length - 10);
				var s5_tab_show_duration_id = "s5_tab_show_duration_id" + s5_tab_show_unique_id;
				var s5_tab_show_duration = document.getElementById(s5_tab_show_duration_id).innerHTML;
				if (s5_tab_show_duration != "disabled") {
				s5_tab_show_duration = s5_tab_show_duration * 1000;
				}
				s5_tab_show_unique_id = "s5_tab_show_slide1_button_id" + s5_tab_show_unique_id;
				s5_tab_show_trigger_slide_transition(s5_tab_show_unique_id);
				if (s5_tab_show_duration != "disabled") {
				var s5_tab_show_outer_wrap_id7 = setInterval(s5_tab_show_outer_wrap_id7_interval, s5_tab_show_duration);
				function s5_tab_show_outer_wrap_id7_clear() { clearInterval(s5_tab_show_outer_wrap_id7); }
				function s5_tab_show_outer_wrap_id7_set() { s5_tab_show_outer_wrap_id7 = setInterval(s5_tab_show_outer_wrap_id7_interval, s5_tab_show_duration); }
				if (s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].innerHTML.indexOf("5_tab_show_pause_onhover_enabled") >= 0) {
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseover", s5_tab_show_outer_wrap_id7_clear);
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseout", s5_tab_show_outer_wrap_id7_set);
				}
				}
			}
			else if (s5_tab_show_mark_outer_id_counter == 8) {
				var s5_tab_show_unique_id = s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.substr(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.length - 10);
				var s5_tab_show_duration_id = "s5_tab_show_duration_id" + s5_tab_show_unique_id;
				var s5_tab_show_duration = document.getElementById(s5_tab_show_duration_id).innerHTML;
				if (s5_tab_show_duration != "disabled") {
				s5_tab_show_duration = s5_tab_show_duration * 1000;
				}
				s5_tab_show_unique_id = "s5_tab_show_slide1_button_id" + s5_tab_show_unique_id;
				s5_tab_show_trigger_slide_transition(s5_tab_show_unique_id);
				if (s5_tab_show_duration != "disabled") {
				var s5_tab_show_outer_wrap_id8 = setInterval(s5_tab_show_outer_wrap_id8_interval, s5_tab_show_duration);
				function s5_tab_show_outer_wrap_id8_clear() { clearInterval(s5_tab_show_outer_wrap_id8); }
				function s5_tab_show_outer_wrap_id8_set() { s5_tab_show_outer_wrap_id8 = setInterval(s5_tab_show_outer_wrap_id8_interval, s5_tab_show_duration); }
				if (s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].innerHTML.indexOf("5_tab_show_pause_onhover_enabled") >= 0) {
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseover", s5_tab_show_outer_wrap_id8_clear);
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseout", s5_tab_show_outer_wrap_id8_set);
				}
				}
			}
			else if (s5_tab_show_mark_outer_id_counter == 9) {
				var s5_tab_show_unique_id = s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.substr(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.length - 10);
				var s5_tab_show_duration_id = "s5_tab_show_duration_id" + s5_tab_show_unique_id;
				var s5_tab_show_duration = document.getElementById(s5_tab_show_duration_id).innerHTML;
				if (s5_tab_show_duration != "disabled") {
				s5_tab_show_duration = s5_tab_show_duration * 1000;
				}
				s5_tab_show_unique_id = "s5_tab_show_slide1_button_id" + s5_tab_show_unique_id;
				s5_tab_show_trigger_slide_transition(s5_tab_show_unique_id);
				if (s5_tab_show_duration != "disabled") {
				var s5_tab_show_outer_wrap_id9 = setInterval(s5_tab_show_outer_wrap_id9_interval, s5_tab_show_duration);
				function s5_tab_show_outer_wrap_id9_clear() { clearInterval(s5_tab_show_outer_wrap_id9); }
				function s5_tab_show_outer_wrap_id9_set() { s5_tab_show_outer_wrap_id9 = setInterval(s5_tab_show_outer_wrap_id9_interval, s5_tab_show_duration); }
				if (s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].innerHTML.indexOf("5_tab_show_pause_onhover_enabled") >= 0) {
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseover", s5_tab_show_outer_wrap_id9_clear);
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseout", s5_tab_show_outer_wrap_id9_set);
				}
				}
			}
			else if (s5_tab_show_mark_outer_id_counter == 10) {
				var s5_tab_show_unique_id = s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.substr(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id.length - 10);
				var s5_tab_show_duration_id = "s5_tab_show_duration_id" + s5_tab_show_unique_id;
				var s5_tab_show_duration = document.getElementById(s5_tab_show_duration_id).innerHTML;
				if (s5_tab_show_duration != "disabled") {
				s5_tab_show_duration = s5_tab_show_duration * 1000;
				}
				s5_tab_show_unique_id = "s5_tab_show_slide1_button_id" + s5_tab_show_unique_id;
				s5_tab_show_trigger_slide_transition(s5_tab_show_unique_id);
				if (s5_tab_show_duration != "disabled") {
				var s5_tab_show_outer_wrap_id10 = setInterval(s5_tab_show_outer_wrap_id10_interval, s5_tab_show_duration);
				function s5_tab_show_outer_wrap_id10_clear() { clearInterval(s5_tab_show_outer_wrap_id10); }
				function s5_tab_show_outer_wrap_id10_set() { s5_tab_show_outer_wrap_id10 = setInterval(s5_tab_show_outer_wrap_id10_interval, s5_tab_show_duration); }
				if (s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].innerHTML.indexOf("5_tab_show_pause_onhover_enabled") >= 0) {
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseover", s5_tab_show_outer_wrap_id10_clear);
					document.getElementById(s5_tab_show_mark_outer_id[s5_tab_show_mark_outer_id_y].id).addEventListener("mouseout", s5_tab_show_outer_wrap_id10_set);
				}
				}
			}
			s5_tab_show_mark_outer_id_counter = s5_tab_show_mark_outer_id_counter + 1;
		}
	}
	window.onresize = function(event) {
		s5_tab_show_resize();
	};
}
}

function s5_tab_show_trigger_slide_transition(s5_tab_show_clicked_id) {
	var s5_tab_show_unique_id = s5_tab_show_clicked_id.substr(s5_tab_show_clicked_id.length - 10);
	var s5_tab_show_slides_wrap_id = "s5_tab_show_slides_wrap_id" + s5_tab_show_unique_id;
	var s5_tab_show_outer_wrap_id = "s5_tab_show_outer_wrap_id" + s5_tab_show_unique_id;
	var s5_tab_show_slide_id = s5_tab_show_clicked_id.split('_');
	s5_tab_show_slide_id = s5_tab_show_slide_id[3];
	s5_tab_show_slide_id = s5_tab_show_slide_id.replace(/\D/g,'');
	s5_tab_show_slide_transition(s5_tab_show_slides_wrap_id,s5_tab_show_slide_id,s5_tab_show_unique_id);
}

function s5_tab_show_slide_transition(s5_tab_show_slides_wrap_id,s5_tab_show_slide_id,s5_tab_show_unique_id) {
	set_s5_tab_show_slides_inactive(s5_tab_show_unique_id);
	var s5_tab_show_slide_active_id = "s5_tab_show_slide" + s5_tab_show_slide_id + "_id" + s5_tab_show_unique_id;
	document.getElementById(s5_tab_show_slide_active_id).className = "s5_tab_show_slide s5_tab_show_slide_active";
	var s5_tab_show_slide_button_active_id = "s5_tab_show_slide" + s5_tab_show_slide_id + "_button_id" + s5_tab_show_unique_id;
	document.getElementById(s5_tab_show_slide_button_active_id).className = "s5_tab_show_slide_button_active";
	var s5_tab_show_count_slides_counter = 0;
	var s5_tab_show_slide_width = 0;
	var s5_tab_total_margin = 0;
	var s5_tab_show_count_slides = document.getElementById(s5_tab_show_slides_wrap_id).getElementsByTagName("DIV");
	for (var s5_tab_show_count_slides_y=0; s5_tab_show_count_slides_y<s5_tab_show_count_slides.length; s5_tab_show_count_slides_y++) {
		if (s5_tab_show_count_slides[s5_tab_show_count_slides_y].className.indexOf("s5_tab_show_slide ") >= 0) {
			s5_tab_show_count_slides_counter = s5_tab_show_count_slides_counter + 1;
			s5_tab_show_slide_width = s5_tab_show_count_slides[s5_tab_show_count_slides_y].offsetWidth;
			var s5_tab_margin_style = s5_tab_show_count_slides[s5_tab_show_count_slides_y].currentStyle || window.getComputedStyle(s5_tab_show_count_slides[s5_tab_show_count_slides_y]);
			var s5_tab_margin_right = (parseInt(s5_tab_margin_style.marginRight,10));
			var s5_tab_margin_left = (parseInt(s5_tab_margin_style.marginLeft,10));
			var s5_tab_total_margin = s5_tab_margin_right + s5_tab_margin_left;
		}
	}
	s5_tab_show_slide_id = s5_tab_show_slide_id -1;
	document.getElementById(s5_tab_show_slides_wrap_id).style.marginLeft = ((s5_tab_show_slide_width * s5_tab_show_slide_id) + (s5_tab_show_slide_id * s5_tab_total_margin)) * -1 + "px";
}

function s5_tab_show_resize_reset_class() {
var s5_tab_show_resize_reset_class = document.getElementsByTagName("DIV");
for (var s5_tab_show_resize_reset_class_y=0; s5_tab_show_resize_reset_class_y<s5_tab_show_resize_reset_class.length; s5_tab_show_resize_reset_class_y++) {
	if (s5_tab_show_resize_reset_class[s5_tab_show_resize_reset_class_y].className.indexOf("s5_tab_show_slides_wrap") >= 0) {
		s5_tab_show_resize_reset_class[s5_tab_show_resize_reset_class_y].className = "s5_tab_show_slides_wrap";
	}
}
}

function s5_tab_show_resize() {
var s5_tab_show_resize = document.getElementsByTagName("DIV");
for (var s5_tab_show_resize_y=0; s5_tab_show_resize_y<s5_tab_show_resize.length; s5_tab_show_resize_y++) {
	if (s5_tab_show_resize[s5_tab_show_resize_y].className.indexOf("s5_tab_show_slides_wrap") >= 0) {
		s5_tab_show_resize[s5_tab_show_resize_y].className = "s5_tab_show_slides_wrap s5_tab_show_slides_wrap_resize";
		window.setTimeout(s5_tab_show_resize_reset_class,1000);
		var s5_tab_show_resize_active_id = document.getElementById(s5_tab_show_resize[s5_tab_show_resize_y].id).getElementsByTagName("DIV");
		for (var s5_tab_show_resize_active_id_y=0; s5_tab_show_resize_active_id_y<s5_tab_show_resize_active_id.length; s5_tab_show_resize_active_id_y++) {
			if (s5_tab_show_resize_active_id[s5_tab_show_resize_active_id_y].className == "s5_tab_show_slide s5_tab_show_slide_active") {
				s5_tab_show_trigger_slide_transition(s5_tab_show_resize_active_id[s5_tab_show_resize_active_id_y].id);
			}
		}
	}
}
}

function s5_tab_show_trigger_next(s5_tab_show_next_id) {
	var s5_tab_show_unique_id = s5_tab_show_next_id.substr(s5_tab_show_next_id.length - 10);
	s5_tab_show_find_and_set_active(s5_tab_show_unique_id);
}

function s5_tab_show_trigger_prev(s5_tab_show_prev_id) {
	//Find the previous id
	var s5_tab_show_unique_id = s5_tab_show_prev_id.substr(s5_tab_show_prev_id.length - 10);
	var s5_tab_show_slides_wrap_id = "s5_tab_show_slides_wrap_id" + s5_tab_show_unique_id;
	var s5_tab_show_prev_child_counter = 0;
	var s5_tab_show_prev = document.getElementById(s5_tab_show_slides_wrap_id).getElementsByTagName("DIV");
	var s5_tab_show_prev_children = document.getElementById(s5_tab_show_slides_wrap_id).getElementsByTagName("DIV");
	for (var s5_tab_show_prev_children_y=0; s5_tab_show_prev_children_y<s5_tab_show_prev_children.length; s5_tab_show_prev_children_y++) {
		if (s5_tab_show_prev_children[s5_tab_show_prev_children_y].className.indexOf("s5_tab_show_slide_active") >= 0 || s5_tab_show_prev_children[s5_tab_show_prev_children_y].className.indexOf("s5_tab_show_slide_inactive") >= 0) {
			s5_tab_show_prev_child_counter = s5_tab_show_prev_child_counter + 1;
		}
	}
	for (var s5_tab_show_prev_y=0; s5_tab_show_prev_y<s5_tab_show_prev.length; s5_tab_show_prev_y++) {
		if (s5_tab_show_prev[s5_tab_show_prev_y].className.indexOf("s5_tab_show_slide_active") >= 0) {
			var s5_tab_show_find_active_button_id = s5_tab_show_prev[s5_tab_show_prev_y].id;
			s5_tab_show_find_active_button_id = s5_tab_show_find_active_button_id.split('_');
			s5_tab_show_find_active_button_id = s5_tab_show_find_active_button_id[3];
			s5_tab_show_find_active_button_id = s5_tab_show_find_active_button_id.replace(/\D/g,'');
			s5_tab_show_find_active_button_id = parseInt(s5_tab_show_find_active_button_id);
			s5_tab_show_find_active_button_id_prev = s5_tab_show_find_active_button_id - 1;
			var s5_tab_show_slide_prev_id = "s5_tab_show_slide" + s5_tab_show_find_active_button_id_prev + "_button_id" + s5_tab_show_unique_id;
			if (document.getElementById(s5_tab_show_slide_prev_id)) {
				s5_tab_show_trigger_slide_transition(s5_tab_show_slide_prev_id);
			} else{
				//If it's the first slide go to the last slide
				var s5_tab_show_slide_last_id = "s5_tab_show_slide" + s5_tab_show_prev_child_counter + "_button_id" + s5_tab_show_unique_id;
				s5_tab_show_trigger_slide_transition(s5_tab_show_slide_last_id);
			}
			return;
		}
	}
}

function set_s5_tab_show_slides_inactive(s5_tab_show_unique_id) {
var s5_tab_show_outer_wrap_id = "s5_tab_show_outer_wrap_id" + s5_tab_show_unique_id;
var s5_tab_show_mark_buttons_inactive = document.getElementById(s5_tab_show_outer_wrap_id).getElementsByTagName("DIV");
for (var s5_tab_show_mark_buttons_inactive_y=0; s5_tab_show_mark_buttons_inactive_y<s5_tab_show_mark_buttons_inactive.length; s5_tab_show_mark_buttons_inactive_y++) {
	if (s5_tab_show_mark_buttons_inactive[s5_tab_show_mark_buttons_inactive_y].className.indexOf("s5_tab_show_slide_active") >= 0 || s5_tab_show_mark_buttons_inactive[s5_tab_show_mark_buttons_inactive_y].className.indexOf("tab_show_slide_inactive") >= 0) {
		s5_tab_show_mark_buttons_inactive[s5_tab_show_mark_buttons_inactive_y].className = "s5_tab_show_slide s5_tab_show_slide_inactive";
	}
	if (s5_tab_show_mark_buttons_inactive[s5_tab_show_mark_buttons_inactive_y].className.indexOf("s5_tab_show_slide_button") >= 0) {
		s5_tab_show_mark_buttons_inactive[s5_tab_show_mark_buttons_inactive_y].className = "s5_tab_show_slide_button_inactive";
	}
}
}

function s5_tab_show_find_and_set_active(s5_tab_show_unique_id) {
	var s5_tab_show_find_active_button_id = "";
	var s5_tab_show_find_active_slides_id = "s5_tab_show_slides_buttons_id" + s5_tab_show_unique_id;
	var s5_tab_show_mark_button_active_id = document.getElementById(s5_tab_show_find_active_slides_id).getElementsByTagName("DIV");
	for (var s5_tab_show_mark_button_active_id_y=0; s5_tab_show_mark_button_active_id_y<s5_tab_show_mark_button_active_id.length; s5_tab_show_mark_button_active_id_y++) {
		if (s5_tab_show_mark_button_active_id[s5_tab_show_mark_button_active_id_y].className == "s5_tab_show_slide_button_active") {
			s5_tab_show_find_active_button_id = s5_tab_show_mark_button_active_id[s5_tab_show_mark_button_active_id_y].id;
		}
	}
	set_s5_tab_show_slides_inactive(s5_tab_show_unique_id);
	s5_tab_show_find_active_button_id = s5_tab_show_find_active_button_id.split('_');
	s5_tab_show_find_active_button_id = s5_tab_show_find_active_button_id[3];
	s5_tab_show_find_active_button_id = s5_tab_show_find_active_button_id.replace(/\D/g,'');
	s5_tab_show_find_active_button_id = parseInt(s5_tab_show_find_active_button_id);
	s5_tab_show_find_active_button_id_next = s5_tab_show_find_active_button_id + 1;
	var s5_tab_show_slide_next_id = "s5_tab_show_slide" + s5_tab_show_find_active_button_id_next + "_button_id" + s5_tab_show_unique_id;
	if (document.getElementById(s5_tab_show_slide_next_id)) {
		s5_tab_show_trigger_slide_transition(s5_tab_show_slide_next_id);
	} else {
		var s5_tab_show_slide1_id = "s5_tab_show_slide1_button_id" + s5_tab_show_unique_id;
		s5_tab_show_trigger_slide_transition(s5_tab_show_slide1_id);
	}
}

function s5_tab_show_outer_wrap_id1_interval() {
	//Find the unique id of the parent wrap
	var s5_tab_show_unique_id = "";
	var s5_tab_show_outer_id_counter = 1;
	var s5_tab_show_outer_id = document.getElementsByTagName("DIV");
	for (var s5_tab_show_outer_id_y=0; s5_tab_show_outer_id_y<s5_tab_show_outer_id.length; s5_tab_show_outer_id_y++) {
		if (s5_tab_show_outer_id[s5_tab_show_outer_id_y].className == "s5_tab_show_outer_wrap") {
			if (s5_tab_show_outer_id_counter == 1) {
			s5_tab_show_unique_id = s5_tab_show_outer_id[s5_tab_show_outer_id_y].id;
			s5_tab_show_unique_id = s5_tab_show_unique_id.substr(s5_tab_show_unique_id.length - 10);
			}
			s5_tab_show_outer_id_counter = s5_tab_show_outer_id_counter + 1;
		}
	}
	//Find the active button
	s5_tab_show_find_and_set_active(s5_tab_show_unique_id);
}

function s5_tab_show_outer_wrap_id2_interval() {
	//Find the unique id of the parent wrap
	var s5_tab_show_unique_id = "";
	var s5_tab_show_outer_id_counter = 1;
	var s5_tab_show_outer_id = document.getElementsByTagName("DIV");
	for (var s5_tab_show_outer_id_y=0; s5_tab_show_outer_id_y<s5_tab_show_outer_id.length; s5_tab_show_outer_id_y++) {
		if (s5_tab_show_outer_id[s5_tab_show_outer_id_y].className == "s5_tab_show_outer_wrap") {
			if (s5_tab_show_outer_id_counter == 2) {
			s5_tab_show_unique_id = s5_tab_show_outer_id[s5_tab_show_outer_id_y].id;
			s5_tab_show_unique_id = s5_tab_show_unique_id.substr(s5_tab_show_unique_id.length - 10);
			}
			s5_tab_show_outer_id_counter = s5_tab_show_outer_id_counter + 1;
		}
	}
	//Find the active button
	s5_tab_show_find_and_set_active(s5_tab_show_unique_id);
}

function s5_tab_show_outer_wrap_id3_interval() {
	//Find the unique id of the parent wrap
	var s5_tab_show_unique_id = "";
	var s5_tab_show_outer_id_counter = 1;
	var s5_tab_show_outer_id = document.getElementsByTagName("DIV");
	for (var s5_tab_show_outer_id_y=0; s5_tab_show_outer_id_y<s5_tab_show_outer_id.length; s5_tab_show_outer_id_y++) {
		if (s5_tab_show_outer_id[s5_tab_show_outer_id_y].className == "s5_tab_show_outer_wrap") {
			if (s5_tab_show_outer_id_counter == 3) {
			s5_tab_show_unique_id = s5_tab_show_outer_id[s5_tab_show_outer_id_y].id;
			s5_tab_show_unique_id = s5_tab_show_unique_id.substr(s5_tab_show_unique_id.length - 10);
			}
			s5_tab_show_outer_id_counter = s5_tab_show_outer_id_counter + 1;
		}
	}
	//Find the active button
	s5_tab_show_find_and_set_active(s5_tab_show_unique_id);
}

function s5_tab_show_outer_wrap_id4_interval() {
	//Find the unique id of the parent wrap
	var s5_tab_show_unique_id = "";
	var s5_tab_show_outer_id_counter = 1;
	var s5_tab_show_outer_id = document.getElementsByTagName("DIV");
	for (var s5_tab_show_outer_id_y=0; s5_tab_show_outer_id_y<s5_tab_show_outer_id.length; s5_tab_show_outer_id_y++) {
		if (s5_tab_show_outer_id[s5_tab_show_outer_id_y].className == "s5_tab_show_outer_wrap") {
			if (s5_tab_show_outer_id_counter == 4) {
			s5_tab_show_unique_id = s5_tab_show_outer_id[s5_tab_show_outer_id_y].id;
			s5_tab_show_unique_id = s5_tab_show_unique_id.substr(s5_tab_show_unique_id.length - 10);
			}
			s5_tab_show_outer_id_counter = s5_tab_show_outer_id_counter + 1;
		}
	}
	//Find the active button
	s5_tab_show_find_and_set_active(s5_tab_show_unique_id);
}

function s5_tab_show_outer_wrap_id5_interval() {
	//Find the unique id of the parent wrap
	var s5_tab_show_unique_id = "";
	var s5_tab_show_outer_id_counter = 1;
	var s5_tab_show_outer_id = document.getElementsByTagName("DIV");
	for (var s5_tab_show_outer_id_y=0; s5_tab_show_outer_id_y<s5_tab_show_outer_id.length; s5_tab_show_outer_id_y++) {
		if (s5_tab_show_outer_id[s5_tab_show_outer_id_y].className == "s5_tab_show_outer_wrap") {
			if (s5_tab_show_outer_id_counter == 5) {
			s5_tab_show_unique_id = s5_tab_show_outer_id[s5_tab_show_outer_id_y].id;
			s5_tab_show_unique_id = s5_tab_show_unique_id.substr(s5_tab_show_unique_id.length - 10);
			}
			s5_tab_show_outer_id_counter = s5_tab_show_outer_id_counter + 1;
		}
	}
	//Find the active button
	s5_tab_show_find_and_set_active(s5_tab_show_unique_id);
}

function s5_tab_show_outer_wrap_id6_interval() {
	//Find the unique id of the parent wrap
	var s5_tab_show_unique_id = "";
	var s5_tab_show_outer_id_counter = 1;
	var s5_tab_show_outer_id = document.getElementsByTagName("DIV");
	for (var s5_tab_show_outer_id_y=0; s5_tab_show_outer_id_y<s5_tab_show_outer_id.length; s5_tab_show_outer_id_y++) {
		if (s5_tab_show_outer_id[s5_tab_show_outer_id_y].className == "s5_tab_show_outer_wrap") {
			if (s5_tab_show_outer_id_counter == 6) {
			s5_tab_show_unique_id = s5_tab_show_outer_id[s5_tab_show_outer_id_y].id;
			s5_tab_show_unique_id = s5_tab_show_unique_id.substr(s5_tab_show_unique_id.length - 10);
			}
			s5_tab_show_outer_id_counter = s5_tab_show_outer_id_counter + 1;
		}
	}
	//Find the active button
	s5_tab_show_find_and_set_active(s5_tab_show_unique_id);
}

function s5_tab_show_outer_wrap_id7_interval() {
	//Find the unique id of the parent wrap
	var s5_tab_show_unique_id = "";
	var s5_tab_show_outer_id_counter = 1;
	var s5_tab_show_outer_id = document.getElementsByTagName("DIV");
	for (var s5_tab_show_outer_id_y=0; s5_tab_show_outer_id_y<s5_tab_show_outer_id.length; s5_tab_show_outer_id_y++) {
		if (s5_tab_show_outer_id[s5_tab_show_outer_id_y].className == "s5_tab_show_outer_wrap") {
			if (s5_tab_show_outer_id_counter == 7) {
			s5_tab_show_unique_id = s5_tab_show_outer_id[s5_tab_show_outer_id_y].id;
			s5_tab_show_unique_id = s5_tab_show_unique_id.substr(s5_tab_show_unique_id.length - 10);
			}
			s5_tab_show_outer_id_counter = s5_tab_show_outer_id_counter + 1;
		}
	}
	//Find the active button
	s5_tab_show_find_and_set_active(s5_tab_show_unique_id);
}

function s5_tab_show_outer_wrap_id8_interval() {
	//Find the unique id of the parent wrap
	var s5_tab_show_unique_id = "";
	var s5_tab_show_outer_id_counter = 1;
	var s5_tab_show_outer_id = document.getElementsByTagName("DIV");
	for (var s5_tab_show_outer_id_y=0; s5_tab_show_outer_id_y<s5_tab_show_outer_id.length; s5_tab_show_outer_id_y++) {
		if (s5_tab_show_outer_id[s5_tab_show_outer_id_y].className == "s5_tab_show_outer_wrap") {
			if (s5_tab_show_outer_id_counter == 8) {
			s5_tab_show_unique_id = s5_tab_show_outer_id[s5_tab_show_outer_id_y].id;
			s5_tab_show_unique_id = s5_tab_show_unique_id.substr(s5_tab_show_unique_id.length - 10);
			}
			s5_tab_show_outer_id_counter = s5_tab_show_outer_id_counter + 1;
		}
	}
	//Find the active button
	s5_tab_show_find_and_set_active(s5_tab_show_unique_id);
}

function s5_tab_show_outer_wrap_id9_interval() {
	//Find the unique id of the parent wrap
	var s5_tab_show_unique_id = "";
	var s5_tab_show_outer_id_counter = 1;
	var s5_tab_show_outer_id = document.getElementsByTagName("DIV");
	for (var s5_tab_show_outer_id_y=0; s5_tab_show_outer_id_y<s5_tab_show_outer_id.length; s5_tab_show_outer_id_y++) {
		if (s5_tab_show_outer_id[s5_tab_show_outer_id_y].className == "s5_tab_show_outer_wrap") {
			if (s5_tab_show_outer_id_counter == 9) {
			s5_tab_show_unique_id = s5_tab_show_outer_id[s5_tab_show_outer_id_y].id;
			s5_tab_show_unique_id = s5_tab_show_unique_id.substr(s5_tab_show_unique_id.length - 10);
			}
			s5_tab_show_outer_id_counter = s5_tab_show_outer_id_counter + 1;
		}
	}
	//Find the active button
	s5_tab_show_find_and_set_active(s5_tab_show_unique_id);
}

function s5_tab_show_outer_wrap_id10_interval() {
	//Find the unique id of the parent wrap
	var s5_tab_show_unique_id = "";
	var s5_tab_show_outer_id_counter = 1;
	var s5_tab_show_outer_id = document.getElementsByTagName("DIV");
	for (var s5_tab_show_outer_id_y=0; s5_tab_show_outer_id_y<s5_tab_show_outer_id.length; s5_tab_show_outer_id_y++) {
		if (s5_tab_show_outer_id[s5_tab_show_outer_id_y].className == "s5_tab_show_outer_wrap") {
			if (s5_tab_show_outer_id_counter == 10) {
			s5_tab_show_unique_id = s5_tab_show_outer_id[s5_tab_show_outer_id_y].id;
			s5_tab_show_unique_id = s5_tab_show_unique_id.substr(s5_tab_show_unique_id.length - 10);
			}
			s5_tab_show_outer_id_counter = s5_tab_show_outer_id_counter + 1;
		}
	}
	//Find the active button
	s5_tab_show_find_and_set_active(s5_tab_show_unique_id);
}
