    <!-- jQuery Library 
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>  -->
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="{{asset('js/plugins/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/data-tables/data-tables-script.js')}}"></script>
    
    
    <script type="text/javascript">
        $(document).ready(function(){
          // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
          $('.modal').modal();
        });

        $(".button-collapse").sideNav();
        $(document).ready(function(){
        $('.slider').slider();
      });
    </script>

    @section('script')

    @show