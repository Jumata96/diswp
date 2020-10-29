<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
@if(Auth::user()->idtipo === 'ADM' OR empty(Auth::user()) )
  @include('layouts2.partials.htmlHead')
@endif
@if(Auth::user()->idtipo === 'CLE')
  @include('layouts3.partials.htmlHead')
@endif

  <body style="background-color: #f5f9f9" class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  ">
  
  @if(Auth::user()->idtipo === 'ADM' OR empty(Auth::user()) ) 
    @include('layouts2.partials.header')
    
    <div id="main" class="main-full">      
      <!-- START WRAPPER -->
      <div class="wrapper" >
        @include('layouts2.partials.sidebar')    
        
        
        {{-- <div class="row">                     
          <div class="col s12">
            <div class="container">
              <div class="section">
                @yield('sub-cabecera')
                @yield('main-content')      
              </div>
            </div>
          </div>
        </div> --}}


        <section id="content">
            @yield('sub-cabecera')
            @yield('main-content') 
        </section>
        <!-- FLOAT BUTTON 
        @include('layouts2.partials.floatButton')
      -->
        </div>
        <!-- END WRAPPER -->
      </div>
      @include('layouts2.partials.footer')
      @include('layouts2.partials.scripts')   
  @endif     

  @if(Auth::user()->idtipo === 'CLE') 
    @include('layouts3.partials.header')
    
    <div id="main">      
      <!-- START WRAPPER -->
      <div class="wrapper">
        @include('layouts3.partials.sidebar')       
        <section id="content">
            @yield('sub-cabecera')
            @yield('main-content')
        </section>
        <!-- FLOAT BUTTON 
        @include('layouts3.partials.floatButton')
        -->
        </div>
        <!-- END WRAPPER -->
      </div>
      @include('layouts3.partials.footer')
      @include('layouts3.partials.scripts')   
  @endif  
  </body>
</html>