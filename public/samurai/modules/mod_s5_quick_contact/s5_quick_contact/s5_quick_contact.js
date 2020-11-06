function s5_qc_clear_inputs_values(s5_qc_click_id) {
	if (document.getElementById("s5_qc_spambox")) {
		if (document.getElementById("s5_qc_spambox").value == "") {
			document.getElementById("s5_qc_spambox").value = s5_qc_spambox_text;
		} else if (document.getElementById("s5_qc_spambox").value == s5_qc_spambox_text && s5_qc_click_id == "s5_qc_spambox") {
			document.getElementById("s5_qc_spambox").value = "";
			document.getElementById("s5_qc_spambox").className = "inputbox";
		}
	}
	if (document.getElementById("s5_qc_subjectbox")) {
		if (document.getElementById("s5_qc_subjectbox").value == "") {
			document.getElementById("s5_qc_subjectbox").value = s5_qc_subject_text;
		} else if (document.getElementById("s5_qc_subjectbox").value == s5_qc_subject_text && s5_qc_click_id == "s5_qc_subjectbox") {
			document.getElementById("s5_qc_subjectbox").value = "";
			document.getElementById("s5_qc_subjectbox").className = "inputbox";
		}
	}
	if (document.getElementById("s5_qc_namebox")) {
		if (document.getElementById("s5_qc_namebox").value == "") {
			document.getElementById("s5_qc_namebox").value = s5_qc_name_text;
		} else if (document.getElementById("s5_qc_namebox").value == s5_qc_name_text && s5_qc_click_id == "s5_qc_namebox") {
			document.getElementById("s5_qc_namebox").value = "";
			document.getElementById("s5_qc_namebox").className = "inputbox";
		}
	}
	if (document.getElementById("s5_qc_emailbox")) {
		if (document.getElementById("s5_qc_emailbox").value == "") {
			document.getElementById("s5_qc_emailbox").value = s5_qc_email_text;
		} else if (document.getElementById("s5_qc_emailbox").value == s5_qc_email_text && s5_qc_click_id == "s5_qc_emailbox") {
			document.getElementById("s5_qc_emailbox").value = "";
			document.getElementById("s5_qc_emailbox").className = "inputbox";
			if (document.getElementById("s5_qc_emailbox").className == "inputbox s5_qc_required") {
				document.getElementById("s5_qc_emailbox").className = "inputbox";
			}
		}
		if (s5_qc_click_id == "s5_qc_emailbox") {
			document.getElementById("s5_qc_emailbox").className = "inputbox";
		}
	}
	if (document.getElementById("s5_qc_field1box")) {
		if (document.getElementById("s5_qc_field1box").value == "") {
			document.getElementById("s5_qc_field1box").value = s5_qc_field1_text;
		} else if (document.getElementById("s5_qc_field1box").value == s5_qc_field1_text && s5_qc_click_id == "s5_qc_field1box") {
			document.getElementById("s5_qc_field1box").value = "";
			document.getElementById("s5_qc_field1box").className = "inputbox";
			if (document.getElementById("s5_qc_field1box").nodeName == "TEXTAREA") {
				document.getElementById("s5_qc_field1box").className = "inputbox textarea";
			}
			if (document.getElementById("s5_qc_field1box").nodeName == "SELECT") {
				document.getElementById("s5_qc_field1box").className = "inputbox select";
			}
		}
	}
	if (document.getElementById("s5_qc_field2box")) {
		if (document.getElementById("s5_qc_field2box").value == "") {
			document.getElementById("s5_qc_field2box").value = s5_qc_field2_text;
		} else if (document.getElementById("s5_qc_field2box").value == s5_qc_field2_text && s5_qc_click_id == "s5_qc_field2box") {
			document.getElementById("s5_qc_field2box").value = "";
			document.getElementById("s5_qc_field2box").className = "inputbox";
			if (document.getElementById("s5_qc_field2box").nodeName == "TEXTAREA") {
				document.getElementById("s5_qc_field2box").className = "inputbox textarea";
			}
			if (document.getElementById("s5_qc_field2box").nodeName == "SELECT") {
				document.getElementById("s5_qc_field2box").className = "inputbox select";
			}
		}
	}
	if (document.getElementById("s5_qc_field3box")) {
		if (document.getElementById("s5_qc_field3box").value == "") {
			document.getElementById("s5_qc_field3box").value = s5_qc_field3_text;
		} else if (document.getElementById("s5_qc_field3box").value == s5_qc_field3_text && s5_qc_click_id == "s5_qc_field3box") {
			document.getElementById("s5_qc_field3box").value = "";
			document.getElementById("s5_qc_field3box").className = "inputbox";
			if (document.getElementById("s5_qc_field3box").nodeName == "TEXTAREA") {
				document.getElementById("s5_qc_field3box").className = "inputbox textarea";
			}
			if (document.getElementById("s5_qc_field3box").nodeName == "SELECT") {
				document.getElementById("s5_qc_field3box").className = "inputbox select";
			}
		}
	}
	if (document.getElementById("s5_qc_field4box")) {
		if (document.getElementById("s5_qc_field4box").value == "") {
			document.getElementById("s5_qc_field4box").value = s5_qc_field4_text;
		} else if (document.getElementById("s5_qc_field4box").value == s5_qc_field4_text && s5_qc_click_id == "s5_qc_field4box") {
			document.getElementById("s5_qc_field4box").value = "";
			document.getElementById("s5_qc_field4box").className = "inputbox";
			if (document.getElementById("s5_qc_field4box").nodeName == "TEXTAREA") {
				document.getElementById("s5_qc_field4box").className = "inputbox textarea";
			}
			if (document.getElementById("s5_qc_field4box").nodeName == "SELECT") {
				document.getElementById("s5_qc_field4box").className = "inputbox select";
			}
		}
	}
	if (document.getElementById("s5_qc_field5box")) {
		if (document.getElementById("s5_qc_field5box").value == "") {
			document.getElementById("s5_qc_field5box").value = s5_qc_field5_text;
		} else if (document.getElementById("s5_qc_field5box").value == s5_qc_field5_text && s5_qc_click_id == "s5_qc_field5box") {
			document.getElementById("s5_qc_field5box").value = "";
			document.getElementById("s5_qc_field5box").className = "inputbox";
			if (document.getElementById("s5_qc_field5box").nodeName == "TEXTAREA") {
				document.getElementById("s5_qc_field5box").className = "inputbox textarea";
			}
			if (document.getElementById("s5_qc_field5box").nodeName == "SELECT") {
				document.getElementById("s5_qc_field5box").className = "inputbox select";
			}
		}
	}
	if (document.getElementById("s5_qc_field6box")) {
		if (document.getElementById("s5_qc_field6box").value == "") {
			document.getElementById("s5_qc_field6box").value = s5_qc_field6_text;
		} else if (document.getElementById("s5_qc_field6box").value == s5_qc_field6_text && s5_qc_click_id == "s5_qc_field6box") {
			document.getElementById("s5_qc_field6box").value = "";
			document.getElementById("s5_qc_field6box").className = "inputbox";
			if (document.getElementById("s5_qc_field6box").nodeName == "TEXTAREA") {
				document.getElementById("s5_qc_field6box").className = "inputbox textarea";
			}
			if (document.getElementById("s5_qc_field6box").nodeName == "SELECT") {
				document.getElementById("s5_qc_field6box").className = "inputbox select";
			}
		}
	}
	if (document.getElementById("s5_qc_field7box")) {
		if (document.getElementById("s5_qc_field7box").value == "") {
			document.getElementById("s5_qc_field7box").value = s5_qc_field7_text;
		} else if (document.getElementById("s5_qc_field7box").value == s5_qc_field7_text && s5_qc_click_id == "s5_qc_field7box") {
			document.getElementById("s5_qc_field7box").value = "";
			document.getElementById("s5_qc_field7box").className = "inputbox";
			if (document.getElementById("s5_qc_field7box").nodeName == "TEXTAREA") {
				document.getElementById("s5_qc_field7box").className = "inputbox textarea";
			}
			if (document.getElementById("s5_qc_field7box").nodeName == "SELECT") {
				document.getElementById("s5_qc_field7box").className = "inputbox select";
			}
		}
	}
	if (document.getElementById("s5_qc_field8box")) {
		if (document.getElementById("s5_qc_field8box").value == "") {
			document.getElementById("s5_qc_field8box").value = s5_qc_field8_text;
		} else if (document.getElementById("s5_qc_field8box").value == s5_qc_field8_text && s5_qc_click_id == "s5_qc_field8box") {
			document.getElementById("s5_qc_field8box").value = "";
			document.getElementById("s5_qc_field8box").className = "inputbox";
			if (document.getElementById("s5_qc_field8box").nodeName == "TEXTAREA") {
				document.getElementById("s5_qc_field8box").className = "inputbox textarea";
			}
			if (document.getElementById("s5_qc_field8box").nodeName == "SELECT") {
				document.getElementById("s5_qc_field8box").className = "inputbox select";
			}
		}
	}
	if (document.getElementById("s5_qc_field9box")) {
		if (document.getElementById("s5_qc_field9box").value == "") {
			document.getElementById("s5_qc_field9box").value = s5_qc_field9_text;
		} else if (document.getElementById("s5_qc_field9box").value == s5_qc_field9_text && s5_qc_click_id == "s5_qc_field9box") {
			document.getElementById("s5_qc_field9box").value = "";
			document.getElementById("s5_qc_field9box").className = "inputbox";
			if (document.getElementById("s5_qc_field9box").nodeName == "TEXTAREA") {
				document.getElementById("s5_qc_field9box").className = "inputbox textarea";
			}
			if (document.getElementById("s5_qc_field9box").nodeName == "SELECT") {
				document.getElementById("s5_qc_field9box").className = "inputbox select";
			}
		}
	}
	if (document.getElementById("s5_qc_field10box")) {
		if (document.getElementById("s5_qc_field10box").value == "") {
			document.getElementById("s5_qc_field10box").value = s5_qc_field10_text;
		} else if (document.getElementById("s5_qc_field10box").value == s5_qc_field10_text && s5_qc_click_id == "s5_qc_field10box") {
			document.getElementById("s5_qc_field10box").value = "";
			document.getElementById("s5_qc_field10box").className = "inputbox";
			if (document.getElementById("s5_qc_field10box").nodeName == "TEXTAREA") {
				document.getElementById("s5_qc_field10box").className = "inputbox textarea";
			}
			if (document.getElementById("s5_qc_field10box").nodeName == "SELECT") {
				document.getElementById("s5_qc_field10box").className = "inputbox select";
			}
		}
	}
}
function s5_qc_check_required() {
	s5_qc_required_missing = "no";
	if (document.getElementById("s5_qc_spambox") && document.getElementById("s5_qc_spambox").value == s5_qc_spambox_text) {
		document.getElementById("s5_qc_spambox").className = "inputbox s5_qc_required";
		s5_qc_required_missing = "yes";
	}
	if (document.getElementById("s5_qc_subjectbox") && document.getElementById("s5_qc_subjectbox").value == s5_qc_subject_text && s5_qc_subject_type != "predefined") {
		document.getElementById("s5_qc_subjectbox").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_subjectbox").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_subjectbox").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (document.getElementById("s5_qc_emailbox") && document.getElementById("s5_qc_emailbox").value == s5_qc_email_text) {
		document.getElementById("s5_qc_emailbox").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_emailbox").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_emailbox").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (document.getElementById("s5_qc_namebox") && document.getElementById("s5_qc_namebox").value == s5_qc_name_text) {
		document.getElementById("s5_qc_namebox").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_namebox").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_namebox").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (s5_qc_field1_type.indexOf("required") > 0 && document.getElementById("s5_qc_field1box") && document.getElementById("s5_qc_field1box").value == s5_qc_field1_text) {
		document.getElementById("s5_qc_field1box").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_field1box").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_field1box").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (s5_qc_field2_type.indexOf("required") > 0 && document.getElementById("s5_qc_field2box") && document.getElementById("s5_qc_field2box").value == s5_qc_field2_text) {
		document.getElementById("s5_qc_field2box").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_field2box").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_field2box").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (s5_qc_field3_type.indexOf("required") > 0 && document.getElementById("s5_qc_field3box") && document.getElementById("s5_qc_field3box").value == s5_qc_field3_text) {
		document.getElementById("s5_qc_field3box").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_field3box").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_field3box").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (s5_qc_field4_type.indexOf("required") > 0 && document.getElementById("s5_qc_field4box") && document.getElementById("s5_qc_field4box").value == s5_qc_field4_text) {
		document.getElementById("s5_qc_field4box").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_field4box").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_field4box").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (s5_qc_field5_type.indexOf("required") > 0 && document.getElementById("s5_qc_field5box") && document.getElementById("s5_qc_field5box").value == s5_qc_field5_text) {
		document.getElementById("s5_qc_field5box").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_field5box").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_field5box").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (s5_qc_field6_type.indexOf("required") > 0 && document.getElementById("s5_qc_field6box") && document.getElementById("s5_qc_field6box").value == s5_qc_field6_text) {
		document.getElementById("s5_qc_field6box").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_field6box").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_field6box").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (s5_qc_field7_type.indexOf("required") > 0 && document.getElementById("s5_qc_field7box") && document.getElementById("s5_qc_field7box").value == s5_qc_field7_text) {
		document.getElementById("s5_qc_field7box").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_field7box").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_field7box").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (s5_qc_field8_type.indexOf("required") > 0 && document.getElementById("s5_qc_field8box") && document.getElementById("s5_qc_field8box").value == s5_qc_field8_text) {
		document.getElementById("s5_qc_field8box").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_field8box").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_field8box").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (s5_qc_field9_type.indexOf("required") > 0 && document.getElementById("s5_qc_field9box") && document.getElementById("s5_qc_field9box").value == s5_qc_field9_text) {
		document.getElementById("s5_qc_field9box").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_field9box").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_field9box").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
	if (s5_qc_field10_type.indexOf("required") > 0 && document.getElementById("s5_qc_field10box") && document.getElementById("s5_qc_field10box").value == s5_qc_field10_text) {
		document.getElementById("s5_qc_field10box").className = "inputbox s5_qc_required";
		if (document.getElementById("s5_qc_field10box").nodeName == "TEXTAREA") {
			document.getElementById("s5_qc_field10box").className = "inputbox textarea s5_qc_required";
		}
		s5_qc_required_missing = "yes";
	}
}
function s5_qc_find_all_values() {
	s5_qc_all_content = "";
	var s5_qc_find_values1 = document.getElementById("s5_quick_contact_wrap").getElementsByTagName("INPUT");
	for (var s5_qc_find_values1_y=0; s5_qc_find_values1_y<s5_qc_find_values1.length; s5_qc_find_values1_y++) {
		s5_qc_all_content = s5_qc_all_content + s5_qc_find_values1[s5_qc_find_values1_y].value;
	}
	var s5_qc_find_values2 = document.getElementById("s5_quick_contact_wrap").getElementsByTagName("TEXTAREA");
	for (var s5_qc_find_values2_y=0; s5_qc_find_values2_y<s5_qc_find_values2.length; s5_qc_find_values2_y++) {
		s5_qc_all_content = s5_qc_all_content + s5_qc_find_values2[s5_qc_find_values2_y].value;
	}
}