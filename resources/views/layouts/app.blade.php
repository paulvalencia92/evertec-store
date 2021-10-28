<!DOCTYPE html>
<html lang="en" dir="">


<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet"/>
    <link href="/css/themes/lite-purple.min.css" rel="stylesheet"/>
    <link href="/css/plugins/perfect-scrollbar.min.css" rel="stylesheet"/>

    @stack('css')
</head>

<body class="text-left">
<div class="app-admin-wrap layout-sidebar-large">
    @include('partials.navigation.horizontalMenu')
    @include('partials.navigation.verticalMenu')
</div>

<!-- =============== Left side End ================-->
<div class="main-content-wrap sidenav-open d-flex flex-column">
    <!-- ============ Body content start ============= -->
    <div class="main-content">

        @yield('breadcrumb')

        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                @component('components.alert-component')@endcomponent
            </div>
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div><!-- Footer Start -->

    <div class="flex-grow-1"></div>
    <div class="app-footer">
        <div class="row">
            <div class="col-md-9">
                <p><strong>www.evertecinc.com</strong></p>
                <p>Somos una compañía líder de tecnología y transacciones electrónicas, con sede en San Juan, Puerto
                    Rico. Contamos con presencia en 26 países de América Latina y el Caribe, con servicios en tres
                    segmentos principales: adquisición de comerciantes, procesamiento de pagos y soluciones de negocio.
                    Somos dueños y operadores de la red de débito más grande del Caribe.
                    <sunt></sunt>
                </p>
            </div>
        </div>
        <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">
            <a class="btn btn-primary text-white btn-rounded" href="https://www.evertecinc.com/"
               target="_blank">Evertec</a>
            <span class="flex-grow-1"></span>
            <div class="d-flex align-items-center">
                <img class="logo" src="/images/logo.png" alt="">
                <div>
                    <p class="m-0">&copy; 2018 Gull HTML</p>
                    <p class="m-0">All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- fotter end -->
</div>
</div><!-- ============ Search UI Start ============= -->

<!-- ============ Search UI End ============= -->
<script src="/js/plugins/jquery-3.3.1.min.js"></script>
<script src="/js/plugins/bootstrap.bundle.min.js"></script>
<script src="/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/js/scripts/script.min.js"></script>
<script src="/js/scripts/sidebar.large.script.min.js"></script>
<script src="/js/jConfirm.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    jQuery(document).ready(function () {
        $.jConfirm.defaults.question = '{{ __("¿Estás seguro?") }}';
        $.jConfirm.defaults.confirm_text = '{{ __("Sí") }}';
        $.jConfirm.defaults.deny_text = '{{ __("No") }}';
        $.jConfirm.defaults.position = 'top';
        $.jConfirm.defaults.theme = 'black';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
<script src="/js/functions.js"></script>
@stack('js')
</body>

</html>
