<div class="row center-align" >
  <div class="col l12 m12 s12" >
                            <div class="col s12 m6 l3 offset-l1">
                                <div class="card">
                                    <div class="card-content  green white-text" style="padding: 10px">
                                        <p class="card-stats-title"><i class="mdi-social-group-add"></i> Total de  Alumnos</p>
                                        <h4 class="card-stats-number" style="margin-top: 0px; margin-bottom: 0px"> {{ count($clientes)}} </h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> <span class="green-text text-lighten-5"> </span>
                                        </p>
                                    </div>
                                    <div class="card-action  green darken-2" style="padding: 10px">
                                        <div id="clients-bar" class="center-align">
                                          <canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content purple white-text" style="padding: 10px">
                                        <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Total de cursos</p>
                                        <h4 class="card-stats-number" style="margin-top: 0px; margin-bottom: 0px">{{ count($cursos)}} </h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i>   <span class="purple-text text-lighten-5"> </span>
                                        </p>
                                    </div>
                                    <div class="card-action purple darken-2" style="padding: 10px">
                                        <div id="sales-compositebar" class="center-align"><canvas width="214" height="25" style="display: inline-block; width: 214px; height: 25px; vertical-align: top;"></canvas></div>

                                    </div>
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content blue-grey white-text" style="padding: 10px">
                                        <p class="card-stats-title"><i class="mdi-action-trending-up"></i>Total de Trabajadores </p>
                                        <h4 class="card-stats-number" style="margin-top: 0px; margin-bottom: 0px">{{ count($users)}}  </h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i>   <span class="blue-grey-text text-lighten-5"> </span>
                                        </p>
                                    </div>
                                    <div class="card-action blue-grey darken-2" style="padding: 10px">
                                        <div id="profit-tristate" class="center-align"><canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas></div>
                                    </div>
                                </div>
                            </div>  
                           {{--  <div class="col s12 m6 l3">
                              <div class="card">
                                  <div class="card-content blue-grey white-text" style="padding: 10px">
                                      <p class="card-stats-title"><i class="mdi-action-trending-up"></i>Total de Horarios </p>
                                      <h4 class="card-stats-number" style="margin-top: 0px; margin-bottom: 0px">{{ count($users)}}  </h4>
                                      <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i>   <span class="blue-grey-text text-lighten-5"> </span>
                                      </p>
                                  </div>
                                  <div class="card-action blue-grey darken-2" style="padding: 10px">
                                      <div id="profit-tristate" class="center-align"><canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas></div>
                                  </div>
                              </div>
                          </div> --}}  
  </div>
</div>

 