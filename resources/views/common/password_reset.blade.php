<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
      Password Reset | Aetosdata
    </title>

    <link rel="icon" href="/img/logo-white.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/css/argon.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}" type="text/css">

</head>

<body class="bg-default">

  <div class="main-content">

    <!-- Header -->
    <div class="header bg-gradient-primary py-8 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-3">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              {{-- <img src="/img/logo.png" alt="" height="100"> --}}
              <h2 class="text-white">Welcome to Aetosdata</h2>
              <p class="text-lead text-light">Password Reset.</p>
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

    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">

              @if (session('errors'))
                @if ($errors->has('email'))
                  <span class="h5 text-danger text-center d-block">{{ $errors->get('email')[0] }}</span>
                @elseif ($errors->has('password'))
                  <span class="h5 text-danger text-center d-block">{{ $errors->get('password')[0] }}</span>
                @elseif ($errors->has('message'))
                  <span class="h5 text-danger text-center d-block">{{ $errors->get('message')[0] }}</span>
                @endif
              @elseif(session('success'))
                  <span class="h5 text-success text-center d-block">{{ session('success') }}</span>
              @endif

              <form action="/password-reset" method="post">
                <p id="error-message" style="font-weight: 300;" class="h4 text-danger mb-4 d-none"></p>
                @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" class="form-control form-control-alternative" placeholder="Password" type="password" name="password">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="confirm_password" class="form-control form-control-alternative" placeholder="Confirm Password" type="confirm_password" name="confirm_password">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
              </form>
            </div>
            <div class="card-footer">
              <a href="/signin" class="small float-left">Sign In</a>
              <a href="/signup" class="small float-right">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!--   Core   -->
  <script src="{{ asset('argon/assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('argon/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Argon JS   -->
  <script src="{{ asset('argon/assets/js/argon-dashboard.min.js?v=1.1.0') }}"></script>
  {{-- Custom JS --}}
  <script src="{{ asset('js/core.js') }}"></script>

</body>

</html>
