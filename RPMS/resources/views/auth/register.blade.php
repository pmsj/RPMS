<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Landing-page| Registration</title>
 <!-- Favicon -->
 <link rel="icon" href="{{asset('backend1/assets/img/brand/ran_circle.PNG')}}" type="image/png">
 <!-- Fonts -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
 <!-- Icons -->
 <link rel="stylesheet" href="{{asset('backend1/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
 <link rel="stylesheet" href="{{asset('backend1/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
 <!-- Argon CSS -->
 <link rel="stylesheet" href="{{asset('backend1/assets/css/argon.css?v=1.2.0')}}" type="text/css">
</head>

<body class="bg-default">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{asset('backend1/assets/img/brand/ran_circle2.PNG')}}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.html">
                <img src="{{asset('backend1/assets/img/brand/ran_circle.png')}}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{route('login')}}" class="nav-link">
              <span class="nav-link-inner--text"><i class="ni ni-key-25"></i>Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('register')}}" class="nav-link">
              <span class="nav-link-inner--text"><i class="ni ni-circle-08"></i>Register</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-5 pt-lg-9">
        {{-- <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9"> --}}
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Connect with us !</h1>
              {{-- <p class=" h3 text-lead text-white">With US</p> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-header bg-transparent pb-5">
              {{-- <div class="text-muted text-center mt-2 mb-4"><small>Sign up with</small></div> --}}
              <div class="text-center">
                <a href="#" class="btn btn-neutral btn-icon mt-4">
                    <span class="btn-inner--icon"><img src="{{asset('backend1/assets/img/brand/ran_circle.png')}}"></span>
                  <span class="btn-inner--text">Ranchi Province Management system</span>
                </a>
                <p class="mt-2"><small class="btn-inner--text">A Jesuit Provinec in south Asia Assistancy</small></p>
                
                {{-- <a href="#" class="btn btn-neutral btn-icon mr-4">
                    <span class="btn-inner--icon"><img src="{{asset('backend1/assets/img/icons/common/github.svg')}}"></span>
                  <span class="btn-inner--text">Github</span>
                </a> --}}
                {{-- <a href="#" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon"><img src="{{asset('backend1/assets/img/icons/common/google.svg')}}"></span>
                  <span class="btn-inner--text">Google</span>
                </a> --}}
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-primary mb-4">
                <p class="h2 text-primary">Create an account !</p>
              </div>
              {{-- registration form --}}
              <form role="form" method="POST" action="{{ route('register') }}">
                {{-- csrf token is must --}}
                @csrf
                    {{-- name field--}}
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="text-primary form-control  @error('name') is-invalid @enderror" placeholder="Name" type=" id="name"  type="text" name="name" :value="old('name')" value="{{old('name')}}" required autofocus autocomplete="name" />
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      {{$message}}
                    </span>
                  @enderror
                  </div>
                </div>
                    {{-- email field--}}
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="text-primary form-control  @error('email') is-invalid @enderror" placeholder="Email" id="email" type="email" name="email" value="{{old('email')}}" required />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      {{$message}}
                    </span>
                    @enderror
                  </div>
                </div>
                  {{-- password field--}}
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="text-primary form-control  @error('password') is-invalid @enderror" placeholder="Password" id="password"  type="password" name="password" required autocomplete="new-password" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      {{$message}}
                    </span>
                  @enderror
                  </div>
                </div>
                  {{-- forgot password field--}}
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control text-primary" placeholder="Confirm Password" id="password_confirmation"  type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                  </div>
                <div class="col-12 display-inline-block">
                    <small>Already have an account?</small><a href="{{ route('login') }}" class="text-warning"><small> <u>login</u></small></a>
                  </div>
                {{-- <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div> --}}
                    
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input text-primary" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="Submit" class="btn btn-primary mt-4">Create account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2021 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Ranchi Province Management System</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('backend1/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('backend1/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('backend1/assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('backend1/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('backend1/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('backend1/assets/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>