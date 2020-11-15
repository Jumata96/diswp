 
  <div id="modificarSub" class="modal modal-fixed-footer" style="height: 100%;">
  <div class="modal-content" style="padding: 0px; overflow-y: disabled; height: 300%; background-color: #f9f9f9">
    <div class="card" style="position: fixed; width: 100%; z-index: 2">
      <div class="card-header">
        <i class="fa fa-table fa-lg material-icons">receipt</i>
        <h2>AGREGAR Subtitulo </h2>
      </div>
    </div>
    <div class="row card-header sub-header" style="margin-top: 3.15rem; margin-left: 0rem; margin-right: 0rem; position: fixed; width: 100%; z-index: 3">
      <div class="col s12 m12 herramienta">                         
        <a id="updDgeneral" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped " data-position="top" data-delay="500" data-tooltip="Guardar">
        <i class="material-icons " style="color: #2E7D32">check</i></a>
        

        <a style="margin-left: 6px"></a>   
        <a   id="" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped modal-close" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
        <i class="material-icons" style="color: #424242">keyboard_tab</i></a>  
      </div>
    </div>
    <div class="row cuerpo" style="margin-left: 0.5rem; margin-right: 0.5rem; padding-top:40px; z-index: 1; margin-top: px">
      <br><br><br><br>
      <div class="card white">
        <div class="card-content">
          
           <form class="  right-alert" id="formSubtitulosUpd" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">   
             <input type="hidden" name="id_Titulo_modal_upd" id="id_Titulo_modal_upd"   >
            <div class="row"> 
               
              <div class="input-field col l6 m6 s12">
                           <i class="material-icons prefix">drag_handle</i>
                           <input id="tituloSubtituloU" name="tituloSubtituloU"  type="text" data-error=".errorTxt3" maxlength="50">
                           <label for="tituloSubtituloU">Titulo</label>
                            <div class="errorTxt1" id="dG_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
               </div>
              <div class="input-field col s12 m6 l6  "  >
                <i class="material-icons prefix">create</i>
                <label for="descripcionSubtituloUwwwwwwwwwa">Descripción del concepto manual </label> 
                <textarea id="descripcionSubtituloU"  name="descripcionSubtitulo" class="materialize-textarea"   > </textarea> 
                  <div class="errorTxt1" id="dG_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
              </div> 
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>