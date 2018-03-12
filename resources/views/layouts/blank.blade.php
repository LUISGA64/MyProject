<!DOCTYPE html>
<html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Censo Web - @yield('htmlheader_title', 'Your title')</title>

        <!-- Bootstrap -->
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">
        {{-- SweetAlert --}}
        <link href="{{ asset('sweetalert/css/sweetalert.css') }}" rel="stylesheet">
        {{-- Datatables --}}
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('select2/css/select2.css') }}" rel="stylesheet">
        <link href="{{ asset('ui/jquery-ui.css') }}" rel="stylesheet">
        <link href="{{ asset('ui/jquery-ui.theme.css') }}" rel="stylesheet">
        <link href="{{ asset('datatable/css/dataTables.bootstrap.css') }}" rel="stylesheet"> --}}
        

        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        @stack('stylesheets')

    </head>

    <body class="nav-md">
        <div class="container body">

            <div class="main_container">

                @include('includes/sidebar')

                @include('includes/topbar')

                @yield('main_container')

            </div>
        </div>
        
        <!-- jQuery -->
        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ asset("js/gentelella.min.js") }}"></script>
        
        {{-- Censo Web -JS --}}
        <script type="text/javascript" src="{{ asset("/censoweb/act_econ.js") }}"></script>
        <script type="text/javascript" src="{{ asset('/sweetalert/js/sweetalert.min.js') }}"></script>
        {{-- Datatables --}}
        {{-- <script src="{{ asset('datatable/js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('datatable/js/ui/jquery-ui.js') }}"></script> --}}
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
       {{--  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
        @include('sweet::alert')

        {{-- Archivos para las graficas --}}
        
        @stack('scripts')

    </body>

    <footer style="background-color: #34495E">
    <div class="pull-left">
        <strong>Luis Gabriel Quirá</strong>
    </div>

    <div class="pull-right" style="color: #3EB2AB">
        <strong>Censo Web</strong>
    </div>
    <div class="clearfix"></div>
</footer>
</html>
