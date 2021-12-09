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
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('admin_assets/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('admin_assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('admin_assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('admin_assets/css/argon.css?v=1.2.0')}}" type="text/css">
</head>

<body class="bg-default">
  <!-- Navbar -->
 
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-1 py-lg-6 pt-lg-6">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              {{-- <h1 class="text-white">Create New Account</h1> --}}
              <h1 class="text-white"></h1>
              <p class="text-lead text-white"></p>
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
      <div class="row justify-content-center">
        <div class="col-lg-9 col-md-7 mb-5">
          <div class="card bg-secondary border-0 mb-0 mb-2">
            <!-- Header -->
            <div class="header-body text-center mt-5">
              <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                  <h1 class="text-dark">Create New Account</h1>
                  @if(Session::has('message')) 
                  <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text">{{Session::get('message')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                </div>
              </div>
            </div>
            <hr>
            <!-- End Header -->
            <div class="card-body px-lg-5 py-lg-5">
              @if(Session::has('message')) 
                <div class="alert alert-red text-sm" role="alert">{{Session::get('message')}}</div>
              @endif 
              <form role="form" action="{{url('authentication/register')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                          <label for="" class="form-control-label">{{ __('First Name') }}</label>
                          <input class="form-control input-group-alternative" name="firstname" type="text" value="{{old('firstname')}}">                      
                            @error('firstname') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                          <label for="" class="form-control-label">{{ __('Last Name') }}</label>
                          <input class="form-control input-group-alternative" name="lastname" type="text" value="{{old('lastname')}}">                      
                            @error('lastname') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
                          </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-control-label">{{ __('Contact') }}</label>
                    <input class="form-control input-group-alternative" name="contact" type="text" value="{{old('contact')}}">                      
                  @error('contact') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-control-label">{{ __('Address') }}</label>
                  <input class="form-control input-group-alternative" name="address" type="text" value="{{old('address')}}">                      
                  @error('address') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                          <label for="" class="form-control-label">{{ __('Age') }}</label>
                            <input class="form-control input-group-alternative" name="age" type="text" value="{{old('age')}}">                      
                           
                            @error('age') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                          <label for="" class="form-control-label">{{ __('Gender') }}</label>
                          <input class="form-control input-group-alternative" name="gender" type="text" value="{{old('gender')}}">                      
                            
                            @error('gender') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
                          </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                  <label for="" class="form-control-label">{{ __('Email') }}</label>
                  <input class="form-control input-group-alternative" name="email" type="email" value="{{old('email')}}">                            
                  @error('email') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
                </div>

                <div class="form-group mb-3">
                  <label for="" class="form-control-label">{{ __('Password') }}</label>
                  <input class="form-control input-group-alternative" name="password" type="password" value="{{old('password')}}">
                  @error('password') <small class="text-lead text-danger">{{$message}}</small> @enderror
                </div>

                <div class="form-group mb-3">
                  <label for="" class="form-control-label">{{ __(' Confirm Password') }}</label>
                  <input id="password-confirm" type="password" class="form-control input-group-alternative" value="{{old('password_confirmation')}}" name="password_confirmation">
                  @error('password_confirmation') <small class="text-lead text-danger">{{$message}}</small> @enderror
                </div>

                <div class="custom-control custom-control-alternative custom-checkbox mt-1">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="pt-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('admin_assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>

  <!-- Argon JS -->
  <script src="{{asset('admin_assets/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>
