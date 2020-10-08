<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
  @include('layouts.partials.htmlHead')

  <body>    
    @include('pagina.layouts.partials.header')
    @yield('inicio')
   
    
    <div id="main" style="padding-left: 0px">
     
      <!-- START WRAPPER -->
      <div class="wrapper">
         
        
        @yield('main-content')
         
        <!-- END WRAPPER -->
      </div>
      @include('pagina.layouts.partials.footer')
      @include('pagina.layouts.partials.scripts')    

  </body>
</html>