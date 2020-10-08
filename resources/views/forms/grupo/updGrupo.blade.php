<div id="updGrupo" class="modal modal-fixed-footer" style="height: 100%; overflow: hidden;">
              <div class="modal-content" style="padding: 0px; overflow-y: disabled; height: 300%; background-color: #f9f9f9">
                                  
                                  <div class="card" style="position: fixed; width: 100%; z-index: 2">                 
                                    <div class="card-header">                    
                                      <i class="fa fa-table fa-lg material-icons">receipt</i>
                                      <h2>ACTUALIZAR GRUPO</h2>
                                    </div>
                                  </div>
                                  
                                  <div class="row card-header sub-header" style="margin-top: 3.15rem; margin-left: 0rem; margin-right: 0rem; position: fixed; width: 100%; z-index: 3">
                                        <div class="col s12 m12">                         
                                          <button id="upd" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" type="submit" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                                            <i class="material-icons " style="color: #2E7D32">check</i></button>
                                          <a style="margin-left: 6px"></a>   
                                         
                                          <a href="#" id="u_cerrar" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped modal-close" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                                            <i class="material-icons" style="color: #424242">keyboard_tab</i></a>  
                                        </div>  

                                        @include('forms.scripts.modalInformacion')              
                                        
                                  </div>
                                                    
                                  <form style="margin-top: 70px" id="u_myForm">
                                  <div class="row cuerpo" style="margin-left: 0.5rem; margin-right: 0.5rem; padding-top:55px; z-index: 1"> 
                                  <input type="hidden" name="u_id" id="u_id" value="">     
                                                                                                              
                                        <div class="card white">
                                            <div class="card-content">                                               
                                              <span class="card-title">Datos Generales</span>
                                              <div class="row">
                                                <div class="input-field col s12 m8 l6 offset-l3 offset-m2">
                                                  <i class="material-icons prefix active">label_outline</i>
                                                  <input id="u_idgrupo" name="u_idgrupo" type="text" data-error=".errorTxt2" value=" " disabled="">
                                                  <label for="u_idgrupo">Código Grupo</label>
                                                  <div id="error1" style="padding-left: 3rem; color: red; font-size: 12px; font-style: italic;"></div>
                                                </div>      

                                                <div class="input-field col s12 m8 l6 offset-l3 offset-m2">
                                                  <i class="material-icons prefix">attach_money</i>
                                                  <input id="u_descripcion" name="u_descripcion" type="text" data-error=".errorTxt3" value=" ">
                                                  <label for="u_descripcion">Descripción</label>
                                                  <div id="u_error2" style="padding-left: 3rem; color: red; font-size: 12px; font-style: italic;"></div>
                                                </div>                                                  
                                                <div class="input-field col s12 m8 l6 offset-l3 offset-m2">
                                                  <i class="material-icons prefix">mode_edit</i>
                                                  <textarea id="u_glosa" name="u_glosa" class="materialize-textarea" lenght="200" maxlength="200" style="height: 80px;"> </textarea>
                                                  <label for="u_glosa" class="">Comentario</label>
                                                </div>            
                                              </div> 
                                            </div>
                                        </div>     

                                    </div>   
                                  </form>

              </div>
              
            </div>
