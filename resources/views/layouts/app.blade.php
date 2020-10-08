<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
  @include('layouts.partials.htmlHead')

  <body>
    @include('layouts.partials.loading')
    @include('layouts.partials.header')
    
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        @include('layouts.partials.sidebar')       
        <section id="content">
            @yield('container')
        </section>
        @include('layouts.partials.floatButton')
        </div>
        <!-- END WRAPPER -->
      </div>
      @include('layouts.partials.footer')
      @include('layouts.partials.scripts')   
  </body>
</html>