<!-- ======= Header ======= -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Portal Wisata</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('ecoland/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ecoland/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('ecoland/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ecoland/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ecoland/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('ecoland/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('ecoland/css/ionicons.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('ecoland/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('ecoland/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('ecoland/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}


    <style>
      .select2{
        margin-top: 11px !important;
        margin-right: 10px !important;
      }
    </style>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
      <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('images/wisata.png') }}" height="80" alt="Logo"/></a>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav nav ml-auto">
          <script>
            // Ambil data kategori dari sumber data (misalnya API)
            var categories = ['Kategori 1', 'Kategori 2', 'Kategori 3'];

            // Temukan elemen <ul> dengan id 'navbarNav'
            var navbarNav = document.getElementById('navbarNav');

            // Buat elemen <li> dan <a> untuk setiap kategori
            categories.forEach(function(category) {
              var li = document.createElement('li');
              var a = document.createElement('a');
              a.href = '#'; // Tambahkan tautan ke halaman yang sesuai
              a.textContent = category; // Tambahkan teks kategori

              // Tambahkan elemen <a> ke dalam elemen <li>
              li.appendChild(a);

              // Tambahkan elemen <li> ke dalam elemen <ul>
              navbarNav.appendChild(li);
            });
        </script>
            <li class="nav-item"><a href="/" class="nav-link"><span>{{ GoogleTranslate::trans('Beranda', app()->getLocale()) }}</span></a></li>
            <li class="nav-item"><a href="<?= Request::segment(1) == '' ? "#destinasi" : url('/').'#destinasi' ?>" class="nav-link"><span>{{ GoogleTranslate::trans('Destinasi', app()->getLocale()) }}</span></a></li>
            <li class="nav-item"><a href="/about" class="nav-link"><span>{{ GoogleTranslate::trans('Berita', app()->getLocale()) }}</span></a></li>
            @if(auth()->user())
            <li class="nav-item"><a href="/dashboard" class="nav-link"><span>{{ GoogleTranslate::trans('Dashboard', app()->getLocale()) }}</span></a></li>
            @else
            <li class="nav-item"><a href="/login" class="nav-link"><span>{{ GoogleTranslate::trans('Login', app()->getLocale()) }}</span></a></li>
            @endif
            {{-- <li class="nav-item dropdown"><a href="/" class="nav-link"><span>{{ GoogleTranslate::trans('Pilih Bahasa', app()->getLocale()) }}</span></a></li>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                  <a class="dropdown-item" href="#" value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</a>
                  <a class="dropdown-item" href="#" value="id" {{ session()->get('locale') == 'id' ? 'selected' : '' }}>Indonesia</a>
                </div>
            </li> --}}
            <li class="nav-item">
              <select class="form control changeLang">
                <option value="id">{{ GoogleTranslate::trans('Bahasa', app()->getLocale()) }}</option>
                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                <option value="id" {{ session()->get('locale') == 'id' ? 'selected' : '' }}>Indonesia</option>
              </select>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    
    
    

    @yield('content')

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About <span><a href="index.html">Ecoland</a></span></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Online Enquiry</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>General Enquiry</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Booking</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Privacy</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Refund Policy</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Call Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Experience</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Adventure</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Hotel and Restaurant</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Beach</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Nature</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Camping</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Party</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
  
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('ecoland/js/jquery.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/popper.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('ecoland/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/aos.js') }}"></script>
  <script src="{{ asset('ecoland/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('ecoland/js/google-map.js') }}"></script>
  
  <script src="{{ asset('ecoland/js/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}



  <script>

    $("select").select2();
    $(document).on('change',".search-destination",function(){
      window.location.href = "<?= url('destination') ?>/"+$(this).val()
    })
    var url = "<?= url('change-language') ?>";
    
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });

  </script>
  </body>
</html>