@extends('samurai.layout.app')
@section('titulo','Contactanos')

@section('titulo','Inicio')
@section('main-content')
 
 @foreach ($contactanos as $contacto) 
 @foreach ($empresas as $empresa) 
  @include('samurai.layout.inicio.seccion7')
<section id="s5_bottom_row2_area1" class="s5_slidesection s5_yes_custom_bg">
  <div id="s5_bottom_row2_area2" class="s5_no_custom_bg">
    <div id="s5_bottom_row2_area_inner" class="s5_wrap">
      <div id="s5_bottom_row2_wrap">
        <div id="s5_bottom_row2">
          <div id="s5_bottom_row2_inner">
            <div id="s5_pos_bottom_row2_1" class="s5_float_left" style="width:100%">
              <div class="module_round_box_outer">
                <div class="module_round_box-dark">
                  <div class="s5_module_box_1">
                    <div class="s5_module_box_2">
                      <div class="s5_mod_h3_outer">
                        <h3 class="s5_mod_h3">
                          <span class="s5_h3_first"> <center>En Google Maps  </center></span><span class="s5_h3_last"></span>
                        </h3>
                      </div>
                      <div class="s5_mod_h3_below" style="clear:both"></div>
                      <div class="s5_outer-dark"> 
                        <div id="s5_map_canvas" class="s5_mapdisplay" style="  position: relative; overflow: hidden;"> 
                            <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q={{ $contacto->latitud }},{{$contacto->longitud}}+(empresa)&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>

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
@endforeach
@endforeach
 <script type = "text/javascript" >
    function s5_qc_isValidEmail(str_email) {
       jQuery('#error1').text("");
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(str_email)) { 
            var data = jQuery('#formContactanos').serializeArray(); 
            jQuery.ajax({
                url: "{{ url('constactanos/mensaje') }}",
                type: "POST",
                beforeSend: function(xhr) {
                    var token = jQuery('meta[name="csrf-token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                type: 'POST',
                url: "{{ url('constactanos/mensaje') }}",
                data: data,

                success: function(data) {
                    if (data[0] == "error") {
                        (typeof data.nombre != "undefined") ? jQuery('#error2').text(data.nombre) && jQuery('#nombre').focus(): null;
                        (typeof data.idzona != "undefined") ? jQuery('#error1').text(data.idzona): null;
                    } else {
                        setTimeout(function() {
                              M.toast({ html: '<span>Registro exitoso.</span>'});
                        }, 200); 
                        window.location = "{{ url('/contactanos') }}";
                    }
                },

                error: function() {
                    alert("error!!!!");
                }
            });
        } else { 
            jQuery('#error1').text(" Tu dirección de correo electrónico no es válida");
            document.getElementById("s5_qc_emailbox").className = "inputbox s5_qc_required";
        }
    }
    var s5_qc_subject_type = "user";
    var s5_qc_spambox_text = "Enter The Code...";
    var s5_qc_subject_text = "Asunto...";
    var s5_qc_name_text = "Nombre...";
    var s5_qc_email_text = "Correo...";
    var s5_qc_field1_text = "Mensaje...";
    var s5_qc_field2_text = "Field 2...";
    var s5_qc_field3_text = "Field 3...";
    var s5_qc_field4_text = "Field 4...";
    var s5_qc_field5_text = "Field 5...";
    var s5_qc_field6_text = "Field 6...";
    var s5_qc_field7_text = "Field 7...";
    var s5_qc_field8_text = "Field 8...";
    var s5_qc_field9_text = "Field 9...";
    var s5_qc_field10_text = "Field 10...";

    function s5_qc_clear_inputs(s5_qc_click_id) {
        s5_qc_clear_inputs_values(s5_qc_click_id);
    }
    var s5_qc_field1_type = "textarea_required";
    var s5_qc_field2_type = "1";
    var s5_qc_field3_type = "1";
    var s5_qc_field4_type = "1";
    var s5_qc_field5_type = "1";
    var s5_qc_field6_type = "1";
    var s5_qc_field7_type = "1";
    var s5_qc_field8_type = "1";
    var s5_qc_field9_type = "1";
    var s5_qc_field10_type = "1";
    var s5_qc_required_missing = "no";
    var s5_qc_all_content = "";

    function s5_qc_submit() {
        s5_qc_check_required();
        if (s5_qc_required_missing == "yes") {
            // alert('The fields indicated in red are required, please complete the form - Thank you!');
            jQuery('#error2').text("Todos los campos  son obligatorios ");

            return false;
        }
        s5_qc_find_all_values();
        if (s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0 || s5_qc_all_content.indexOf("s5_qc_null") >= 0) {
            return false;
        } else {
            var email_str = document.getElementById("s5_qc_emailbox").value;
            s5_qc_isValidEmail(email_str);
        }
    }

    function s5_qc_load_pikaday() {}

    function s5_qc_load_pikaday_timer() {
        window.setTimeout(s5_qc_load_pikaday, 500);
    }
    window.onload = s5_qc_load_pikaday_timer(); 
</script>
 
 
@endsection 
