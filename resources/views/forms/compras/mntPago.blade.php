<div id="addPago" class="modal modal-fixed-footer" style="height: 100%; overflow: hidden;">
              <div class="modal-content" style="padding: 0px; overflow-y: disabled; height: 300%; background-color: #f9f9f9">
                                  
                                  <div class="card" style="position: fixed; width: 100%; z-index: 2">                 
                                    <div class="card-header">                    
                                      <i class="fa fa-table fa-lg material-icons">receipt</i>
                                      <h2>REGISTRAR PAGO</h2>
                                    </div>
                                  </div>
                                  
                                
                                                    
                                  <form style="margin-top: 20px" id="myForm" accept-charset="UTF-8" enctype="multipart/form-data">
                                  <div class="row" style="margin-left: 0.5rem; margin-right: 0.5rem; padding-top:55px; z-index: 1">   

                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                                  <input type="hidden" name="id" id="id" value="{{ $datos->idcarrito }}">   
                                      
                                        <div class="col m8 l6 offset-m2 offset-l3">
                                          <div class="card white">
                                              <div class="card-content">
                                                <span class="card-title">Boucher</span>

                                                  <div class="row">                                                    
                                                    <div class="col s12">                                                      
                                                      <div class="file-field input-field col s12"> 
                                                        <div class="col s12  center" style="">   
                                                          @if(empty($datos->url_imagen))
                                                          <i class="material-icons" id="imagen_scr" style="color: #26c6da; font-size: 10rem; margin: auto">image</i> 
                                                          @else
                                                          <img src="{{url($datos->url_imagen)}}" alt=""  style="height: 100%; width: 100%">
                                                          @endif                                                       
                                                        </div>                                                         
                                                      </div>                                                                                                           
                                                    </div>

                                                    <div class="input-field col s12">
                                                      <i class="material-icons prefix">mode_edit</i>
                                                      <textarea id="observacion" name="observacion" class="materialize-textarea" lenght="200" style="height: 50px;" disabled="">{{$datos->observacion}}</textarea>
                                                      <label for="observacion" class="active">Observación</label>
                                                      <div id="error1" style="color: red; font-size: 12px; font-style: italic;"></div>
                                                    </div>        

                                                  </div>
                                              </div>
                                          </div>
                                        </div>

                                    </div>   
                                  </form>

              </div>
              
            </div>

