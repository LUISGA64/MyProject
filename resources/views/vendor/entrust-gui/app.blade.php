<html>
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css">

  
  {{-- Links Luisga --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('/gentellela/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/gentellela/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/gentellela/css/nprogress.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/gentellela/css/green.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/gentellela/css/prettify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/gentellela/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/gentellela/css/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/gentellela/css/starrr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/gentellela/css/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/gentellela/css/daterangepicker.css') }}">

  {{-- FIN --}}

  <style>
    body {
      margin-top: 60px;
    }
    form {
      margin-bottom: 0;
    }
    .models--actions {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  @include('entrust-gui::partials.navigation')
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1>@yield('heading')</h1>
        @include('entrust-gui::partials.notifications')
        @yield('content')
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>



{{-- sCRIPT lUISGA --}}

  <!-- jQuery -->
    <script data-rocketsrc="../vendors/jquery/dist/jquery.min.js" type="text/rocketscript"></script>
    <!-- Bootstrap -->
    <script data-rocketsrc="../vendors/bootstrap/dist/js/bootstrap.min.js" type="text/rocketscript"></script>
    <!-- FastClick -->
    <script data-rocketsrc="../vendors/fastclick/lib/fastclick.js" type="text/rocketscript"></script>
    <!-- NProgress -->
    <script data-rocketsrc="../vendors/nprogress/nprogress.js" type="text/rocketscript"></script>
    <!-- bootstrap-progressbar -->
    <script data-rocketsrc="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js" type="text/rocketscript"></script>
    <!-- iCheck -->
    <script data-rocketsrc="../vendors/iCheck/icheck.min.js" type="text/rocketscript"></script>
    <!-- bootstrap-daterangepicker -->
    <script data-rocketsrc="../vendors/moment/min/moment.min.js" type="text/rocketscript"></script>
    <script data-rocketsrc="../vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/rocketscript"></script>
    <!-- bootstrap-wysiwyg -->
    <script data-rocketsrc="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js" type="text/rocketscript"></script>
    <script data-rocketsrc="../vendors/jquery.hotkeys/jquery.hotkeys.js" type="text/rocketscript"></script>
    <script data-rocketsrc="../vendors/google-code-prettify/src/prettify.js" type="text/rocketscript"></script>
    <!-- jQuery Tags Input -->
    <script data-rocketsrc="{{ asset('../vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}" type="text/rocketscript"></script>
    <!-- Switchery -->
    <script data-rocketsrc="../vendors/switchery/dist/switchery.min.js" type="text/rocketscript"></script>
    <!-- Select2 -->
    <script data-rocketsrc="../vendors/select2/dist/js/select2.full.min.js" type="text/rocketscript"></script>
    <!-- Parsley -->
    <script data-rocketsrc="../vendors/parsleyjs/dist/parsley.min.js" type="text/rocketscript"></script>
    <!-- Autosize -->
    <script data-rocketsrc="../vendors/autosize/dist/autosize.min.js" type="text/rocketscript"></script>
    <!-- jQuery autocomplete -->
    <script data-rocketsrc="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js" type="text/rocketscript"></script>
    <!-- starrr -->
    <script data-rocketsrc="../vendors/starrr/dist/starrr.js" type="text/rocketscript"></script>
    <!-- Custom Theme Scripts -->
    <script data-rocketsrc="../build/js/custom.min.js" type="text/rocketscript"></script>
<!-- Google Analytics -->
<script type="text/rocketscript">
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');


{{-- fin script --}}


<script>
(function() {
  $('select').select2();
})();
</script>
</body>
</html>
