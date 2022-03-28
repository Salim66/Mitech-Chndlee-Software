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


    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}/css/vendors/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />


    <!-- slick icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}/css/vendors/slick-theme.css">

    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}/css/vendors/jsgrid.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}/css/vendors/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/') }}/css/admin.css">

</head>
<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">
    <div class="authentication-box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 p-0 card-right">
                    <div class="card tab2-card">
                        <div class="card-body">

                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>

                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="tab-content" id="top-tabContent">

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" placeholder="Email" id="exampleInputEmail1" :value="old('email')" required autofocus>
                                    </div>
                                    <div class="form-button">
                                        <button class="btn btn-primary" type="submit">Email Password Reset Link</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script src="{{ asset('assets/') }}//js/slick.js"></script>

<!-- Jsgrid js-->
<script src="{{ asset('assets/') }}//js/jsgrid/jsgrid.min.js"></script>
<script src="{{ asset('assets/') }}//js/jsgrid/griddata-invoice.js"></script>
<script src="{{ asset('assets/') }}//js/jsgrid/jsgrid-invoice.js"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/') }}//js/lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="{{ asset('assets/') }}//js/chat-menu.js"></script>

<!--script admin-->
<script src="{{ asset('assets/') }}//js/admin-script.js"></script>
<script>
    $('.single-item').slick({
            arrows: false,
            dots: true
        }
    );
</script>

</body>

</html>
