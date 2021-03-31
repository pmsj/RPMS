<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>RPMS</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('backend1/assets/img/brand/ran_circle2.PNG')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('backend1/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('backend1/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('backend1/assets/css/argon.css?v=1.2.0')}}" type="text/css">
  <!--fontawsome icons-->
  <link href="{{asset('backend1/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

  <!---Date picker--->
  <script src="{{asset('backend1/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

</head>

<body class="g-sidenav-show g-sidenav-hidden">
  
  @include('admin.body.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('admin.body.header')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      @include('admin.body.topcontent')
    </div> {{-- top content below top nav --}}
   
    <!-- Page content -->
    <div class="container-fluid mt--6">
      @yield('admin')
      <!-- Footer -->
      <footer class="footer pt-0">
        @include('admin.body.footer')
      </footer>

   
    </div>{{-- page content div --}}
  
  
  </div>   {{-- <!-- Main content div-->  --}}
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('backend1/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('backend1/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('backend1/assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('backend1/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('backend1/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('backend1/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('backend1/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('backend1/assets/js/argon.js?v=1.2.0')}}"></script>
  <!---Date picker--->
  <script src="{{asset('backend1/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

       {{--Sweet alert from guit hub  --}}
  @include('sweetalert::alert')
  <!-- Sidenav -->
</body>

</html>
