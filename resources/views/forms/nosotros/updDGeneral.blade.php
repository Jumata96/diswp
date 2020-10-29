<div id="updDGeneral" class="modal modal-fixed-footer" style="height: 100%; overflow: hidden;">
              <div class="modal-content" style="padding: 0px; overflow-y: disabled; height: 300%; background-color: #f9f9f9">
                                  
                                  <div class="card" style="position: fixed; width: 100%; z-index: 2">                 
                                    <div class="card-header">                    
                                      <i class="fa fa-table fa-lg material-icons">receipt</i>
                                      <h2>ACTUALIZAR DETALLE GENERAL</h2>
                                    </div>
                                  </div>
                                  
                                  <div class="row card-header sub-header" style="margin-top: 3.15rem; margin-left: 0rem; margin-right: 0rem; position: fixed; width: 100%; z-index: 3">
                                        <div class="col s12 m12 herramienta">                         
                                          <button id="u_DGeneral" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" type="submit" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                                            <i class="material-icons " style="color: #2E7D32">check</i></button>
                                          <a style="margin-left: 6px"></a>   
                                          <a href="#informacion" class="btn-floating waves-effect waves-light light-blue lighten-1 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Ver información del Formulario">
                                            <i class="material-icons ">info</i></a>
                                          <a href="#" id="cAddDMision" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped modal-close" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                                            <i class="material-icons" style="color: #424242">keyboard_tab</i></a>  
                                        </div>  

                                        @include('forms.scripts.modalInformacion')              
                                        
                                  </div>
                                                    
                                  <form style="margin-top: 70px" id="u_myForm">
                                  <div class="row" style="margin-left: 0.5rem; margin-right: 0.5rem; padding-top:55px; z-index: 1">   

                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                                  <input type="hidden" name="u_id" id="u_id">   
                                      
                                        <div class="col m8 l5 offset-m2 ">
                                          <div class="card white">
                                              <div class="card-content">
                                                  <div class="row">                                                    
                                                    <div class="col s12">                                                      
                                                      <div class="file-field input-field col s12"> 
                                                        <div class="col s12  center" style="">                                                     
                                                          <img src="#" alt="" class="z-depth-1" id="u_img" style="height: 100%; width: 100%">                                                        
                                                          <i class="material-icons" id="u_imagen_scr" style="color: #26c6da; font-size: 10rem; margin: auto">image</i>
                                                        
                                                        </div>                                                         
                                                      </div>                                                    
                                                      
                                                      <div class=" col s12">
                                                        <label for="u_imagen" class="col s12" style="padding-left: 5px; padding-bottom: 5px">Seleccionar tipo</label>
                                                        <div class="col s12 m6 l6">
                                                          <p>
                                                            <input class="with-gap" name="group1" type="radio" id="test3" value="0">
                                                            <label for="test3">Icono</label>
                                                          </p>                                                          
                                                        </div>                                                        
                                                        <div class="col s12 m6 l6">
                                                          <p>
                                                            <input class="with-gap" name="group1" type="radio" id="test4" value="1">
                                                            <label for="test4">Imagen</label>
                                                          </p>
                                                        </div>                                                           
                                                      </div>    
                                                      <div class="input-field col s12" id="aaa">
                                                        <i class="material-icons prefix">crop_original</i>
                                                        <input id="u_icono" name="u_icono" type="text" maxlength="200" value=" ">
                                                        <label for="u_icono">Nombre icono</label>
                                                        <div id="u_error" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                                                      </div>   
                                                      <div class="file-field input-field col s12" id="bbb">
                                                          <div class="btn">
                                                              <span>File</span>
                                                              <input type="file" id="u_imagenURL" name="u_imagenURL">
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                              <input class="file-path validate" type="text" name="u_imagen" id="u_imagen">
                                                              <div class="errorTxt1" id="h_error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                                            </div>             
                                                      </div> 
                                                    
                                                    </div>

                                                  </div>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="col m8 l7 offset-m2 ">
                                          <div class="card white">
                                              <div class="card-content">
                                                  <span class="card-title">Datos Generales</span>

                                                  <div class="row">
                                                    
                                                    <div class="col s12">
                                                      <div class="input-field col s12">
                                                       <div id="u_estado" class="badge green lighten-5 green-text text-accent-4 col s12 m6 l6 offset-m6 offset-l6">
                                                          ESTADO:<b> ACTIVO</b>                                                          
                                                        </div>
                                                        <div id="u_estado2" class="badge grey darken-2 white-text text-accent-5 grey accent-4 white-text col s12 m6 l6 offset-m6 offset-l6">
                                                          ESTADO:<b> NO DISPONIBLE</b>                                                          
                                                        </div>
                                                      </div> 
                                                     
                                                      <div class="col s12">
                                                        <div class="input-field col s12 m6 l8">                                  
                                                          <p>Ingrese un número de fila para este item</p>
                                                        </div>                                                         
                                                        <div class="col s12 m6 l4">
                                                          <label for="u_fila">Fila</label>  
                                                          <input id="u_fila" name="u_fila" type="number" min="1" max="20">
                                                        </div>           
                                                      </div>   
                                                      <div class="col s12" style="padding-bottom: 10px; padding-top: 10px"> 
                                                        <div class="input-field col s12 m6 l8">                                  
                                                          <p>Ingrese el código del tipo para enlazarlo con este Item</p>
                                                        </div>                                    
                                                        <div class="col s12 m6 l4">
                                                          <label for="u_idtipo">Cod. Tipo</label>
                                                          <input id="u_idtipo" name="u_idtipo" type="text" data-error=".errorTxt2" value=" ">
                                                          
                                                        </div> 
                                                      </div>        
                                                     
                                                      <div class="input-field col s12">
                                                        <i class="material-icons prefix">mode_edit</i>
                                                        <input id="u_titulo" name="u_titulo" type="text" maxlength="50" value=" ">
                                                        <label for="u_titulo">Título</label>
                                                        <div id="u_error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                                                      </div>       
                                                      <div class="input-field col s12">
                                                        <i class="material-icons prefix">subject</i>
                                                        <textarea id="u_descripcion" name="u_descripcion" class="materialize-textarea" lenght="200" maxlength="200" value="" style="height: 100px"> </textarea>
                                                        <label for="u_descripcion" class="">Descripción</label>
                                                        <div id="u_error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>
                                                      </div>
                                                    </div>

                                                  </div>
                                              </div>
                                          </div>
                                        </div>                                
                                                                               
                                            

                                    </div>   
                                  </form>

              </div>
              
            </div>


<div id="comodin" data-valor="0" class="hiden"></div>

