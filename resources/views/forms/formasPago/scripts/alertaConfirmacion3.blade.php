<div id="confirmacion3{{$datos->codigo}}" class="modal" style="width: 500px">
                                    <div class="modal-content indigo white-text center">
                                      <p>Está seguro que desea habilitar este registro?</p>
                                    </div>
                                    <div class="modal-footer indigo lighten-4">
                                      <a href="#" class="waves-effectwaves-light btn-flat modal-action modal-close">Cancelar</a>
                                      <a class="waves-effect waves-light btn-flat modal-action modal-close" id="ha{{$datos->codigo}}" data-id="{{$datos->codigo}}">Aceptar</a>
                                    </div>
                                  </div>