{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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

  <title>Destinasi Wisata | Register</title>
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
                  <div class="pt-4 pb-2">
                    <h5 class="card-title pb-0 fs-4">Buat Akun Baru Sekarang</h5>
                    <p style="color: #888;">Buatlah akun pribadimu lalu tambahkan informasi terkait pariwisata, kuliner, penginapan, atau ekraf yang anda kelola agar dapat dijangkau oleh lebih dari 10.000 wisatawan!</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="{{ url('store-registrasi') }}" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                      <!-- <label for="name" class="form-label">Name</label> -->
                      <div class="input-group has-validation">
                        <input type="text" name="name" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required  autofocus placeholder="Nama Lengkap">
                        @error('name')
                         <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12">
                      <!-- <label for="email" class="form-label">Email</label> -->
                      <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control mb-2 @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required  autofocus placeholder="Alamat Email">
                        @error('email')
                         <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12">
                      <!-- <label for="nik" class="form-label">NIK</label> -->
                      <div class="input-group has-validation">
                        <input type="numeric" name="nik" class="form-control mb-2 @error('nik') is-invalid @enderror" id="nik" value="{{ old('nik') }}" required  autofocus placeholder="NIK">
                        @error('nik')
                         <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <!-- <div class="col-12">
                      <label for="photo" class="form-label">Photo</label>
                      <div class="input-group has-validation">
                        <input type="file" name="photo" class="form-control mb-2 @error('photo') is-invalid @enderror" id="photo" value="{{ old('photo') }}" required  autofocus placeholder="Enter Your Photo">
                        @error('photo')
                         <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div> -->
                    <div class="col-12">
                      <!-- <label for="password" class="form-label">Password</label> -->
                      <input type="password" name="password" class="form-control mb-2 @error('password') is-invalid @enderror" id="password" required placeholder="Kata Sandi">
                      @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <!-- <label for="password_confirmation" class="form-label">Password Confirmation</label> -->
                      <input type="password" name="password_confirmation" class="form-control mb-2 @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required placeholder="Konfirmasi Kata Sandi">
                      @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Register</button>
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