<div id="udpDetalle" class="modal modal-fixed-footer" style="height: 100%; overflow: hidden;">
              <div class="modal-content" style="padding: 0px; overflow-y: disabled; height: 300%; background-color: #f9f9f9">
                                  
                                  <div class="card" style="position: fixed; width: 100%; z-index: 2">                 
                                    <div class="card-header">                    
                                      <i class="fa fa-table fa-lg material-icons">receipt</i>
                                      <h2>ACTUALIZAR DETALLE</h2>
                                    </div>
                                  </div>
                                  
                                  <div class="row card-header sub-header" style="margin-top: 3.15rem; margin-left: 0rem; margin-right: 0rem; position: fixed; width: 100%; z-index: 3">
                                        <div class="col s12 m12">                         
                                          <button id="updDet" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" type="submit" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                                            <i class="material-icons " style="color: #2E7D32">check</i></button>
                                          <a style="margin-left: 6px"></a>   
                                          <a href="#informacion" class="btn-floating waves-effect waves-light light-blue lighten-1 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Ver información del Formulario">
                                            <i class="material-icons ">info</i></a>
                                          <a href="#" id="cerrar" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped modal-close" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                                            <i class="material-icons" style="color: #424242">keyboard_tab</i></a>  
                                        </div>  

                                        @include('forms.scripts.modalInformacion')              
                                        
                                  </div>
                                                    
                                  <form style="margin-top: 70px" id="u_myForm">
                                  <div class="row cuerpo" style="margin-left: 0.5rem; margin-right: 0.5rem; padding-top:55px; z-index: 1">      <input type="hidden" id="u_id" name="u_id" value="">
                                                                                                              
                                        <div class="card white">
                                            <div class="card-content">                                               
                                              <span class="card-title">Datos Generales</span>
                                              <div class="row">
                                                <div class="file-field input-field col s12"> 
                                                        <div class="col s12  center" style="">
                                                          <i class="material-icons" id="u_imagen" style="color: #26c6da; font-size: 10rem; margin: auto">image</i>
                                                        </div>  
                                                </div>      
                                                <div class="col s12 m8 l6 offset-l3 offset-m2" style="margin-bottom: 1rem; margin-top: 1.5rem; padding-left: 18px">                             
                                                  <input type="checkbox" id="u_activo" name="u_activo" checked="">
                                                  <label for="u_activo">Es contenido principal?</label>          
                                                </div>      
                                                <div class="input-field col s12 m8 l6 offset-l3 offset-m2">
                                                  <i class="material-icons prefix active">crop_original</i>
                                                  <input id="u_icono" name="u_icono" type="text" data-error=".errorTxt2" value=" ">
                                                  <label for="u_icono">Código Icono</label>
                                                  <div id="u_error3" style="padding-left: 3rem; color: red; font-size: 12px; font-style: italic;"></div>                                                     
                                                </div>      
                                                <div class="input-field col s12 m8 l6 offset-l3 offset-m2">
                                                  <i class="material-icons prefix active">label_outline</i>
                                                  <input id="u_titulo" name="u_titulo" type="text" data-error=".errorTxt2" value=" ">
                                                  <label for="u_titulo">Título</label>
                                                  <div id="u_error" style="padding-left: 3rem; color: red; font-size: 12px; font-style: italic;"></div>
                                                </div>      
                                                <div class="input-field col s12 m8 l6 offset-l3 offset-m2">
                                                        <i class="material-icons prefix">subject</i>
                                                        <textarea id="u_descripcion" name="u_descripcion" class="materialize-textarea" style="height: 100px"> </textarea>
                                                        <label for="u_descripcion" class="">Descripción</label>
                                                        <div id="u_error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>
                                                </div>                                           
                                                        
                                              </div> 
                                            </div>
                                        </div>     

                                    </div>   
                                  </form>

              </div>
              
            </div>

