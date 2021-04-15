
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('styles')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
	<meta name="description" content="TrueHelp™ technology based employee verification platform helps employers at homes or offices do background checks on their employees." />
    <!-- Font Awesome -->
    
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/plugins/fontawesome-free/css/all.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!---->
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/plugins/summernote/summernote-bs4.css">
    <!---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--Manual CSS -->
    <link href="/css/dashboard.css" rel="stylesheet" type="text/css">
    
</head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            @yield('content')

        </div>

        @yield('scripts')

        @yield('javascripts')
        <script>
            $("#select1").change(function() {
            var option = $(this).find('option:selected');
            window.location.href = option.data("url");
            });
        </script>
        <script>
		 function filterGlobal () {
		$('#empdatatable').DataTable().search(
			$('#global_filter').val(),
		
		).draw();
		}
		
		function filterColumn ( i ) {
			$('#empdatatable').DataTable().column( i ).search(
				$('#col'+i+'_filter').val()
			).draw();
		}
		
		$(document).ready(function() {
			$('#empdatatable').DataTable();
			
			$('input.global_filter').on( 'keyup click', function () {
				filterGlobal();
			} );
		
			$('input.column_filter').on( 'keyup click', function () {
				filterColumn( $(this).parents('div').attr('data-column') );
			} );
		} );
        $('select.column_filter').on('change', function () {
            filterColumn( $(this).parents('div').attr('data-column') );
        } );
		</script>

        <script src="https://enterprise.gettruehelp.com/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://enterprise.gettruehelp.com/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        
    <script>
      feather.replace()
    </script>
        <!-- Bootstrap 4 -->
        <script src="https://unpkg.com/feather-icons"></script> 
        <script src="https://enterprise.gettruehelp.com/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="https://enterprise.gettruehelp.com/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="https://enterprise.gettruehelp.com/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="https://enterprise.gettruehelp.com/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="https://enterprise.gettruehelp.com/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="https://enterprise.gettruehelp.com/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="https://enterprise.gettruehelp.com/plugins/moment/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="https://enterprise.gettruehelp.com/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="https://enterprise.gettruehelp.com/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="https://enterprise.gettruehelp.com/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://enterprise.gettruehelp.com/dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="https://enterprise.gettruehelp.com/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="https://enterprise.gettruehelp.com/dist/js/demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    </body>
</html>
