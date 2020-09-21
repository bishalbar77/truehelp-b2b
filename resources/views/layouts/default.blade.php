
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('styles')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/v2/public/css/app.css" />
    <script defer src="https://enterprise.gettruehelp.com/v2/public/employeesjs/app.js"></script>
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/v2/public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/v2/public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/v2/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/v2/public/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/v2/public/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/v2/public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/v2/public/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="https://enterprise.gettruehelp.com/v2/public/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--Manual CSS -->
    <link href="https://enterprise.gettruehelp.com/v2/public/css/dashboard.css" rel="stylesheet" type="text/css">
    
</head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            @yield('content')

        </div>
        <order-form></order-form>
        {{-- Includable JS --}}
        <link rel="stylesheet" href="https://enterprise.gettruehelp.com/v2/public/dist/css/app.css">
        @if (app()->isLocal())
        <script src="https://enterprise.gettruehelp.com/v2/public/js/app.js"></script>
        @else
        <script src="https://enterprise.gettruehelp.com/v2/public/js/manifest.js"></script>
        <script src="https://enterprise.gettruehelp.com/v2/public/js/vendor.js"></script>
        <script src="https://enterprise.gettruehelp.com/v2/public/js/app.js"></script>
        @endif

        @yield('scripts')

        @yield('javascripts')
        <script>
		 function filterGlobal () {
		$('#datatable').DataTable().search(
			$('#global_filter').val(),
		
		).draw();
		}
		
		function filterColumn ( i ) {
			$('#datatable').DataTable().column( i ).search(
				$('#col'+i+'_filter').val()
			).draw();
		}
		
		$(document).ready(function() {
			$('#datatable').DataTable();
			
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
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/moment/moment.min.js"></script>
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="https://enterprise.gettruehelp.com/v2/public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="https://enterprise.gettruehelp.com/v2/public/dist/js/adminlte.js"></script>
        <script src="https://enterprise.gettruehelp.com/v2/public/dist/js/pages/dashboard.js"></script>
        <script src="https://enterprise.gettruehelp.com/v2/public/dist/js/demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
