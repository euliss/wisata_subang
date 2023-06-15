{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                      @if (session('pesan'))
                      <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                        {{ session('pesan') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Destinasi Wisata | Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('layout')}}/assets/img/favicon.png" rel="icon">
  <link href="{{asset('layout')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('layout')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('layout')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('layout')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('layout')}}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{asset('layout')}}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{asset('layout')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('layout')}}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- layout Main CSS File -->
  <link href="{{asset('layout')}}/assets/css/style.css" rel="stylesheet">

  <style>
    .main-img {
        background: url("{{asset("gambar/bg-login.png")}}");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        width: 100%;
    }
  </style>

  <!-- =======================================================
  * layout Name: NiceAdmin - v2.4.1
  * layout URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-layout/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main class="main-img">
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                  <div class="pt-4 pb-5 ">
                    <h5 class="card-title pb-0 fs-4">Hallo, <br>Selamat Datang Kembali</h5>
                  </div>

                      @if (session('pesan'))
                      <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                        {{ session('pesan') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endif
                  <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}" novalidate>
                    @csrf
                    <div class="col-12">
                      <!-- <label for="email" class="form-label">Email</label> -->
                      <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control mb-2 @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Email">
                        @error('email')
                         <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12">
                      <!-- <label for="password" class="form-label">Password</label> -->
                      <input type="password" name="password" class="form-control mb-2 @error('password') is-invalid @enderror" id="password" required autocomplete="current-password" placeholder="Masukkan Kata Sandi">
                      @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <div class="mb-3">
                        Belum Punya Akun? <a href="{{ route('register') }}">Daftar</a> 
                      </div>
                    </div>
                    <div class="col-12 text-center">
                      <button class="btn btn-primary w-50" type="submit">Masuk</button>
                    </div>
                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('layout')}}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{asset('layout')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('layout')}}/assets/vendor/chart.js/chart.min.js"></script>
  <script src="{{asset('layout')}}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{asset('layout')}}/assets/vendor/quill/quill.min.js"></script>
  <script src="{{asset('layout')}}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{asset('layout')}}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{asset('layout')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- layout Main JS File -->
  <script src="{{asset('layout')}}/assets/js/main.js"></script>

</body>

</html>