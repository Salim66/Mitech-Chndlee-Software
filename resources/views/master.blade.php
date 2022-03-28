
<!DOCTYPE html>
<html lang="en">


    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="pixelstrap">
        <link rel="icon" href="{{ asset('assets/') }}//images/dashboard/favicon.png" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('assets/') }}//images/dashboard/favicon.png" type="image/x-icon">
        <title>Chandlee Software</title>

        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Font Awesome-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}//css/vendors/fontawesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />


        <!-- Datatable -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/jqc-1.12.4/dt-1.11.5/b-2.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sl-1.3.4/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

        <!-- Toastr CSS -->
	    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">

        <!-- Flag icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}//css/vendors/flag-icon.css">

        <!-- ico-font-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}//css/vendors/icofont.css">

        <!-- Prism css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}//css/vendors/prism.css">

        <!-- Chartist css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}//css/vendors/chartist.css">

        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}//css/vendors/bootstrap.css">

        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}//css/admin.css">

        <!-- Custom css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}//css/custom/custom.css">
    </head>

<body>

    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        @include('layouts.top_header')

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            @include('layouts.left_sidebar')

            @include('layouts.right_sidebar')

            @section('admin')
            @show

            @include('layouts.footer')
        </div>

    </div>

    <!-- latest jquery-->
    <script src="{{ asset('assets/') }}//js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/') }}//js/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="{{ asset('assets/') }}//js/icons/feather-icon/feather.min.js"></script>
    <script src="{{ asset('assets/') }}//js/icons/feather-icon/feather-icon.js"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/') }}//js/sidebar-menu.js"></script>

    <!--chartist js-->
    <script src="{{ asset('assets/') }}//js/chart/chartist/chartist.js"></script>

    <!--chartjs js-->
    <script src="{{ asset('assets/') }}//js/chart/chartjs/chart.min.js"></script>

    <!-- lazyload js-->
    <script src="{{ asset('assets/') }}//js/lazysizes.min.js"></script>

    <!--copycode js-->
    <script src="{{ asset('assets/') }}//js/prism/prism.min.js"></script>
    <script src="{{ asset('assets/') }}//js/clipboard/clipboard.min.js"></script>
    <script src="{{ asset('assets/') }}//js/custom-card/custom-card.js"></script>

    <!--counter js-->
    <script src="{{ asset('assets/') }}//js/counter/jquery.waypoints.min.js"></script>
    <script src="{{ asset('assets/') }}//js/counter/jquery.counterup.min.js"></script>
    <script src="{{ asset('assets/') }}//js/counter/counter-custom.js"></script>

    <!-- DataTable -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jqc-1.12.4/dt-1.11.5/b-2.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sl-1.3.4/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <!--peity chart js-->
    <script src="{{ asset('assets/') }}//js/chart/peity-chart/peity.jquery.js"></script>

    <!--sparkline chart js-->
    <script src="{{ asset('assets/') }}//js/chart/sparkline/sparkline.js"></script>

    <!--Customizer admin-->
    <script src="{{ asset('assets/') }}//js/admin-customizer.js"></script>

    <!--dashboard custom js-->
    <script src="{{ asset('assets/') }}//js/dashboard/default.js"></script>

    <!--right sidebar js-->
    <script src="{{ asset('assets/') }}//js/chat-menu.js"></script>

    <!--height equal js-->
    <script src="{{ asset('assets/') }}//js/height-equal.js"></script>

    <!-- lazyload js-->
    <script src="{{ asset('assets/') }}//js/lazysizes.min.js"></script>

    <!--script admin-->
    <script src="{{ asset('assets/') }}//js/admin-script.js"></script>

    <!-- Sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/') }}//js/custom/custom.js"></script>

    <!-- Toastr JS -->

	<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script type="text/javascript">
        @if(Session::has('message'))
         let type = "{{ Session::get('alert-type', 'info') }}"
         switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

              case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
    </script>

</body>

</html>
