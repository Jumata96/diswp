<div class="row center-align">
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content  green white-text" style="padding: 10px">
                                        <p class="card-stats-title"><i class="mdi-social-group-add"></i> Nuevos clientes</p>
                                        <h4 class="card-stats-number" style="margin-top: 0px; margin-bottom: 0px">+{{$total_clientes_nuevos}}</h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> {{$porcentaje_cliente}}% <span class="green-text text-lighten-5">respecto al mes anterior</span>
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
                                        <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Total ingresos del mes</p>
                                        <h4 class="card-stats-number" style="margin-top: 0px; margin-bottom: 0px">${{$total_ingresos_mes}}</h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> {{$porcentaje_compras}}% <span class="purple-text text-lighten-5">de ventas ultimo mes</span>
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
                                        <p class="card-stats-title"><i class="mdi-action-trending-up"></i>Transacciones semanal</p>
                                        <h4 class="card-stats-number" style="margin-top: 0px; margin-bottom: 0px">${{$total_ingresos_semana_actual}}</h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> {{$porcentaje_compras_semana_anterior}}% <span class="blue-grey-text text-lighten-5">respecto última semana</span>
                                        </p>
                                    </div>
                                    <div class="card-action blue-grey darken-2" style="padding: 10px">
                                        <div id="profit-tristate" class="center-align"><canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content deep-purple white-text" style="padding: 10px">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i>Facturas por cobrar</p>
                                        <h4 class="card-stats-number" style="margin-top: 0px; margin-bottom: 0px">{{$cantidad_fac_cobrar}}</h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i> ${{$total_fac_cobrar}} <span class="deep-purple-text text-lighten-5">total</span>
                                        </p>
                                    </div>
                                    <div class="card-action  deep-purple darken-2" style="padding: 10px">
                                        <div id="invoice-line" class="center-align"><canvas width="265" height="25" style="display: inline-block; width: 265px; height: 25px; vertical-align: top;"></canvas></div>
                                    </div>
                                </div>
                            </div>        
                        </div>

<div id="sales-chart">
              <div class="row">
                <div class="col s12">
                    <div class="divider"></div>
                    <h4 class="header">ACTIVIDAD ECONÓMICA</h4>
                </div>
              </div>

              <div class="row">
                <div class="col s12">
                  <div id="revenue-chart" class="card">
                    <div class="card-content">
                      <h4 class="header mt-0">INGRESOS RESPECTO AL {{$ano_anterior}}
                        <span class="purple-text small text-darken-1 ml-1">
                          <i class="material-icons">keyboard_arrow_up</i> {{$porcentaje_anual}} %</span> <a class="waves-effect waves-light btn gradient-45deg-indigo-light-blue gradient-shadow right">Ver Detalle</a>
                      </h4>
                      <div class="row">
                        <div class="col s12">
                          <div class="yearly-revenue-chart">
                            <canvas id="thisYearRevenue" class="firstShadow" height="437" width="962" style="width: 770px; height: 350px;"></canvas>
                            <canvas id="lastYearRevenue" height="437" width="962" style="width: 770px; height: 350px;"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4 l4 hide">
                  <div id="weekly-earning" class="card">
                    <div class="card-content">
                      <h4 class="header m-0">Earning
                        <i class="material-icons right grey-text lighten-3">more_vert</i>
                      </h4>
                      <p class="no-margin grey-text lighten-3 medium-small">Mon 15 - Sun 21</p>
                      <h3 class="header">$899.39
                        <i class="material-icons deep-orange-text text-accent-2">arrow_upward</i>
                      </h3>
                      <canvas id="monthlyEarning" class="" height="217" width="437" style="width: 350px; height: 174px;"></canvas>
                      <div class="center-align">
                        <p class="lighten-3">Total Weekly Earning</p>
                        <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow">View Full</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
