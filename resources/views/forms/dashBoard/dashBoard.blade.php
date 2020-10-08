@section('sub-cabecera')
    <div id="breadcrumbs-wrapper">
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">DashBoard</h5>
                  <ol class="breadcrumbs">
                    <li><a href="#" style="color: #00796b">Indicadores</a></li>
                    <li><a href="#" style="color: #00796b">Estadísticas</a></li>
                    <li><a href="#" style="color: #00796b">Accesos directos</a></li>
                  </ol>
                </div>
               
              </div>
            </div>
          </div>
@endsection

@section('main-content')
<br>
  @if(Auth::user()->idtipo === 'ADM' OR empty(Auth::user()) ) 
    @include('forms.dashBoard.trabajadores')
  @endif
  
  @if(Auth::user()->idtipo === 'CLE') 
    @include('forms.dashBoard.clientes')
  @endif
@endsection

@if(Auth::user()->idtipo === 'ADM' OR empty(Auth::user()) ) 
  @section('script')
    
  @endsection
@endif

