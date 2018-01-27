<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>title</title>
  <link rel="shortcut icon" type="image/icon" href="{{ url('public/img/favicon.ico') }} "/>


  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('bower_components/font-awesome/css/font-awesome.min.css')}}">

  @yield('style')

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{ url('dist/css/custom.css')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 
    @include('main.layouts.header')
  <!-- Left side column. contains the logo and sidebar -->

    @include('main.layouts.sidebar')

  

  <!-- Content Wrapper. Contains page content -->
    @include('main.layouts.content')
    

   @include('main.layouts.footer')
  

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{url('dist/js/pages/dashboard.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{url('dist/js/demo.js')}}"></script> -->


<script type="text/javascript">
    $(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
    });
</script>

@yield('javascript')

</body>
</html>