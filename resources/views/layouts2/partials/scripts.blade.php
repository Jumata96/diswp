    <!-- jQuery Library -->
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <!--materialize js-->
    <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
     {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}
     <!-- data-tables -->
    <script type="text/javascript" src="{{asset('js/plugins/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/data-tables/data-tables-script.js')}}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>

    <!-- jQuery Library -->
      <!--prism-->
      <script type="text/javascript" src="{{asset('js/prism.js')}}"></script>
      <!-- chartjs -->
      <script type="text/javascript" src="{{asset('js/chart.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/plugins/chartjs/chart-script.js')}}"></script>
   <!--   <script type="text/javascript" src="{{asset('js/dashboard-ecommerce.js')}}"></script> -->

    <!-- sparkline -->
    <script type="text/javascript" src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/sparkline/sparkline-script.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/plugins/formatter/jquery.formatter.min.js')}}"></script> 
    <script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>

    <!--angularjs-->
    <script type="text/javascript" src="{{asset('js/plugins/angular.min.js')}}"></script>

    <!--form-file-uploads.js - Page Specific JS codes-->
    <script type="text/javascript" src="{{asset('js/form-file-uploads.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/dropify.min.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function(){
           $(document).bind("contextmenu",function(e){
              return false;
           });
        });

        $(document).ready(function(){
          // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
          $('.modal').modal();
          $('#imglogo').hide();
        });

         $('#radio').click(function(e){
          radio_valor();
          

        });

        function radio_valor(){
          val = $('#left-sidebar-nav').data('valor'); 
          if(val == '0'){            
            $('.sideusuario').hide();
            $('#logoTexto').hide();
            $('#left-sidebar-nav').data('valor','1');
            $('#imglogo').show();
          }else{
            $('.sideusuario').show();
            $('#imglogo').hide();
            $('#logoTexto').show();
            $('#left-sidebar-nav').data('valor','0');
          }

        }

        var Var_JavaScript = 5;

        

    </script>
     <script src="{{asset('js/appI.js')}}"></script> 


<script>

</script>
    
    @section('script') 
    @show

