<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
  @include('layouts3.partials.htmlHead')

  <body style="background-color: #f5f9f9">
   
    @include('layouts3.partials.header')
    
    <div id="main">      
      <!-- START WRAPPER -->
      <div class="wrapper">
        @include('layouts3.partials.sidebar')       
        <section id="content">
            @yield('sub-cabecera')
            @yield('main-content')
        </section>
        @include('layouts3.partials.floatButton')
        </div>
        <!-- END WRAPPER -->
      </div>
      @include('layouts3.partials.footer')
      @include('layouts3.partials.scripts')   
  </body>
</html>