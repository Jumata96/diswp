<div id="addDGeneral" class="modal modal-fixed-footer" style="height: 100%; overflow: hidden;">
              <div class="modal-content" style="padding: 0px; overflow-y: disabled; height: 300%; background-color: #f9f9f9">
                                  
                                  <div class="card" style="position: fixed; width: 100%; z-index: 2">                 
                                    <div class="card-header">                    
                                      <i class="fa fa-table fa-lg material-icons">receipt</i>
                                      <h2>REGISTRAR DETALLE GENERAL</h2>
                                    </div>
                                  </div>
                                  
                                  <div class="row card-header sub-header" style="margin-top: 3.15rem; margin-left: 0rem; margin-right: 0rem; position: fixed; width: 100%; z-index: 3">
                                        <div class="col s12 m12 herramienta">                         
                                          <button id="add" class="btn-floating waves-effect waves-light grey lighten-5 tooltipped" type="submit" name="action" data-position="top" data-delay="500" data-tooltip="Guardar">
                                            <i class="material-icons " style="color: #2E7D32">check</i></button>
                                          <a style="margin-left: 6px"></a>   
                                          <a href="#informacion" class="btn-floating waves-effect waves-light light-blue lighten-1 tooltipped modal-trigger" data-position="top" data-delay="500" data-tooltip="Ver información del Formulario">
                                            <i class="material-icons ">info</i></a>
                                          <a href="#" id="cAddDMision" class="btn-floating right waves-effect waves-light grey lighten-5 tooltipped modal-close" data-activates="dropdown2" data-position="top" data-delay="500" data-tooltip="Regresar">
                                            <i class="material-icons" style="color: #424242">keyboard_tab</i></a>  
                                        </div>  

                                        @include('forms.scripts.modalInformacion')              
                                        
                                  </div>
                                                    
                                  <form style="margin-top: 70px" id="myForm">
                                  <div class="row" style="margin-left: 0.5rem; margin-right: 0.5rem; padding-top:55px; z-index: 1">   

                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                                      
                                        <div class="col m8 l5 offset-m2 ">
                                          <div class="card white">
                                              <div class="card-content">
                                                  <div class="row">                                                    
                                                    <div class="col s12">                                                      
                                                      <div class="file-field input-field col s12"> 
                                                        <div class="col s12  center" style="">                                                     
                                                                                                               
                                                          <i class="material-icons" id="imagen_scr" style="color: #26c6da; font-size: 10rem; margin: auto">image</i>
                                                        
                                                        </div>                                                         
                                                      </div>                                                    
                                                      
                                                      <div class=" col s12">
                                                        <label for="imagen" class="col s12" style="padding-left: 5px; padding-bottom: 5px">Seleccionar tipo</label>
                                                        <div class="col s12 m6 l6">
                                                          <p>
                                                            <input class="with-gap" name="group2" type="radio" id="test1" value="0" checked="">
                                                            <label for="test1">Icono</label>
                                                          </p>                                                          
                                                        </div>                                                        
                                                        <div class="col s12 m6 l6">
                                                          <p>
                                                            <input class="with-gap" name="group2" type="radio" id="test2" value="1">
                                                            <label for="test2">Imagen</label>
                                                          </p>
                                                        </div>                                                           
                                                      </div>    
                                                      <div class="input-field col s12" id="aa">
                                                        <i class="material-icons prefix">crop_original</i>
                                                        <input id="icono" name="icono" type="text" maxlength="200" value=" ">
                                                        <label for="icono">Nombre icono</label>
                                                        <div id="error" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                                                      </div>   
                                                      <div class="file-field input-field col s12" id="bb">
                                                          <div class="btn">
                                                              <span>File</span>
                                                              <input type="file" id="pruebaImagen" name="pruebaImagen">
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                              <input class="file-path validate" type="text" name="imagenG" id="imagenG">
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
                                                       <div id="estado" class="chip center-align teal accent-4 white-text col s12 m6 l6 offset-m6 offset-l6">
                                                          ESTADO:<b> POR ASIGNAR</b>                                                          
                                                        </div>
                                                      </div> 
                                                      <div class="col s12">
                                                        <div class="input-field col s12 m6 l8">                                  
                                                          <p>Ingrese un número de fila para este item</p>
                                                        </div>                                                         
                                                        <div class="col s12 m6 l4">
                                                          <label for="fila">Fila</label>  
                                                          <input id="fila" name="fila" type="number" min="1" max="20" value="1">
                                                        </div>           
                                                      </div>  
                                                      <div class="col s12" style="padding-bottom: 10px; padding-top: 10px"> 
                                                        <div class="input-field col s12 m6 l8">                                  
                                                          <p>Ingrese el código del tipo para enlazarlo con este Item</p>
                                                        </div>                                    
                                                        <div class="col s12 m6 l4">
                                                          <label for="idtipo">Cod. Tipo</label>
                                                          <input id="idtipo" name="idtipo" type="text" data-error=".errorTxt2" value=" ">
                                                          
                                                        </div> 
                                                      </div>          
                                                      <div class="input-field col s12">
                                                        <i class="material-icons prefix">mode_edit</i>
                                                        <input id="titulo" name="titulo" type="text" maxlength="200">
                                                        <label for="titulo">Título</label>
                                                        <div id="error2" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem;"></div>
                                                      </div>       
                                                      <div class="input-field col s12">
                                                        <i class="material-icons prefix">subject</i>
                                                        <textarea id="descripcion" name="descripcion" class="materialize-textarea" lenght="200" maxlength="200" value="" style="height: 100px"></textarea>
                                                        <label for="descripcion" class="">Descripción</label>
                                                        <div id="error3" style="color: red; font-size: 12px; font-style: italic; padding-left: 3rem"></div>
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

