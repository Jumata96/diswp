@extends('layouts2.app')
@section('titulo','Seguimiento Compra')

@section('main-content')
<br>

@foreach($compra as $datos)
<div class="row">
  <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-header">                    
                    <i class="fa fa-table fa-lg material-icons">receipt</i>
                    <h2>FLUJO DE SEGUIMIENTO</h2>
                  </div>
                
                          <br>
                <div class="row cuerpo">
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card white">
                        <div class="card-content">
                            <div class="row" style="margin-bottom: 0px">
                              <div class="col s9">
                                <div class="input-field col s3">                                
                                  <input id="fecha" name="fecha" type="text" value="{{$datos->idcarrito}}" disabled="">
                                  <label for="fecha">Código Compra</label>
                                  <div class="errorTxt1"></div>
                                </div>                                 
                                <div class="input-field col s3">                                
                                  <input id="descuento" name="descuento" type="text" value="{{$datos->fecha}}" disabled="">
                                  <label for="descuento">Fecha Emisión</label>
                                  <div class="errorTxt1"></div>
                                </div>                                   
                                <div class="input-field col s3">                                
                                  <input id="total" name="total" type="text" value="{{$datos->total}}" disabled="">
                                  <label for="total">total</label>
                                  <div class="errorTxt1"></div>
                                </div>   
                                <div class="input-field col s3">                                
                                  <input id="total" name="total" type="text" value="{{$datos->direccion}}" disabled="">
                                  <label for="total">Dirección</label>
                                  <div class="errorTxt1"></div>
                                </div>   
                              </div>
                              <div class="col s3">
                                <div class="input-field col s12">
                                  @if($datos->idarea == 'FAC')
                                  <div class="badge grey darken-2 white-text text-accent-5 orange darken-4 white-text" style="width: 100%">
                                    <b>ESTADO: FACTURACIÓN</b>
                                    <i class="material-icons"></i>
                                  </div>
                                  @endif
                                  @if($datos->idarea == 'ALM')
                                  <div class="badge grey darken-2 white-text text-accent-5 indigo darken-4 white-text" style="width: 100%">
                                    <b>ESTADO: ALMACÉN</b>
                                    <i class="material-icons"></i>
                                  </div>
                                  @endif
                                  @if($datos->idarea == 'TRA')
                                  <div class="badge grey darken-2 white-text text-accent-5 green darken-4 white-text" style="width: 100%">
                                    <b>ESTADO: TRANSPORTISTA</b>
                                    <i class="material-icons"></i>
                                  </div>
                                  @endif
                                  @if($datos->idarea <> 'FAC' AND $datos->idarea <> 'ALM' AND $datos->idarea <> 'TRA')                               
                                  <div class="badge grey darken-2 white-text text-accent-5 grey darken-4 white-text" style="width: 100%">
                                    <b>ESTADO: REPECIONADO</b>
                                    <i class="material-icons"></i>
                                  </div>
                                  @endif
                                </div>
                              </div>
                                                            
                            </div>
                        </div>
                    </div>

                    <div class="card white">
                        <div class="card-content">
                            <span class="card-title">Estado</span>
                            <center>
                            <div class="row center">
                              <div class="col s4">
                                @if($datos->idarea == 'FAC' or $datos->idarea == 'ALM' or $datos->idarea == 'TRA')                               
                                <span class="seguimientoCircle" style="border-color: #f57c00"><span class="orange-text text-darken-4">FACTURACIÓN</span></span>  
                                @else
                                <span class="seguimientoCircle grey lighten-3" style="border-color: #e0e0e0"><span class="grey-text text-grey-4">FACTURACIÓN</span></span>  
                                @endif
                                
                              </div>
                              <div class="col s4">
                                @if($datos->idarea == 'ALM' or $datos->idarea == 'TRA')                               
                                <span class="seguimientoCircle" style="border-color: #5c6bc0"><span class="indigo-text text-darken-4">ALMACÉN</span></span>  
                                @else
                                <span class="seguimientoCircle grey lighten-3" style="border-color: #e0e0e0"><span class="grey-text text-grey-4">ALMACÉN</span></span>  
                                @endif
                                
                              </div>                              
                              <div class="col s4">
                                @if($datos->idarea == 'TRA')                               
                                <span class="seguimientoCircle" style="border-color: #66bb6a"><span class="green-text text-darken-4">TRANSPORTISTA</span></span>  
                                @else
                                <span class="seguimientoCircle grey lighten-3" style="border-color: #e0e0e0"><span class="grey-text text-grey-4">TRANSPORTISTA</span></span>  
                                @endif
                              </div>
                              <div class="col s3 hide">
                                @if($datos->idarea <> 'FAC' AND $datos->idarea <> 'ALM' AND $datos->idarea <> 'TRA')                               
                                <span class="seguimientoCircle"><span class="grey-text text-darken-4">RECEPCIONADO</span></span> 
                                @else
                                <span class="seguimientoCircle grey lighten-3" style="border-color: #e0e0e0"><span class="grey-text text-grey-4">RECEPCIONADO</span></span>  
                                @endif
                              </div>
                            </div>
                         </center>
                        </div>
                    </div>

                                        
                  </div>          
                
              </div>
  </div>
</div>
@endforeach

@endsection

@section('script')
  
@endsection

