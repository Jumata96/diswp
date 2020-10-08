    <!-- jQuery Library -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>

    <!-- jQuery Library -->
      <!--prism-->
      <script type="text/javascript" src="js/prism.js"></script>
      <!-- chartjs -->
      <script type="text/javascript" src="js/chart.min.js"></script>
      <script type="text/javascript" src="js/dashboard-ecommerce.js"></script>


      <script type="text/javascript">
        $('#radio').click(function(e){
          val = $('#sidebar').data('valor');

          if(val == '0'){
            console.log('entroooo');
            $('#sidebar').hide();
            $('#sidebar').data('valor','1');
            $('#mas_opciones').text('MÁS');
          }else{
            $('#sidebar').show();
            $('#sidebar').data('valor','0');
            $('#mas_opciones').text('MÁS OPCIONES');
          }
          

        });
      </script>