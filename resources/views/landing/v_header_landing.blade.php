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
            <li class="nav-item"><a href="<?= Request::segment(1) == '' ? "#destinasi" : url('/').'#destinasi' ?>" class="nav-link"><span>{{ GoogleTranslate::trans('Pariwisata', app()->getLocale()) }}</span></a></li>
            <li class="nav-item"><a href="/about" class="nav-link"><span>{{ GoogleTranslate::trans('Berita', app()->getLocale()) }}</span></a></li>
            @if(auth()->user())
            <li class="nav-item"><a href="/dashboard" class="nav-link"><span>{{ GoogleTranslate::trans('Dashboard', app()->getLocale()) }}</span></a></li>
            @else
            <li class="nav-item"><a href="/login" class="nav-link"><span>{{ GoogleTranslate::trans('Login', app()->getLocale()) }}</span></a></li>
            @endif
            <li class="nav-item" style="padding-top:6px">
              <div class="dropdown">
                <button class=" btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ GoogleTranslate::trans('Pilih Bahasa', app()->getLocale()) }}
                </button>
                <div class="dropdown-menu w-100" style="margin: 0;" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item px-3 changeLang en" href="#">English</a>
                  <a class="dropdown-item px-3 changeLang id" href="#">Indonesia</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
  
    @yield('content')


    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md">
            <div class="ftco-footer-widget mb-2">
              <img src="{{ asset('ecoland/images/logo-white.png')}}" height="80px" alt="Logo"/></a>
              <p> Created by :</p>
              <p> Dinas Pariwisata Pemuda dan Olahraga Kabupaten Subang  </p>
              <p> Informasi Lebih Lanjut :</p>
              <a href="https://wa.me/085863518629" class="btn btn-success"><i class="ion-logo-whatsapp"></i> Hubungi Kami</a>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <p>Lokasi :</p>
              <p>Jl. Jend. Achmad Yani No.11, Pasirkareumbi, Kec. Subang Kabupaten Subang Jawa Barat</p>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5801145580176!2d107.75470330968386!3d-6.574555993391404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693cbc83e65e4f%3A0x1d6f46b5875bd277!2sDinas%20Kebudayaan%20Pariwisata%20Pemuda%20Dan%20Olah%20Raga!5e0!3m2!1sid!2sid!4v1687158543166!5m2!1sid!2sid" width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
          </div>
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
  {{-- <script src="{{ asset('ecoland/js/jquery.easing.1.3.js') }}"></script> --}}
  <script src="{{ asset('ecoland/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('ecoland/js/aos.js') }}"></script>
  {{-- <script src="{{ asset('ecoland/js/jquery.animateNumber.min.js') }}"></script> --}}
  <script src="{{ asset('ecoland/js/scrollax.min.js') }}"></script>
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> --}}
  <script src="{{ asset('ecoland/js/google-map.js') }}"></script>
  
  <script src="{{ asset('ecoland/js/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}



  <script>

    // $("select").select2();
    // $(document).on('change',".search-destination",function(){
    //   window.location.href = "<?= url('destination') ?>/"+$(this).val()
    // })
    var url = "<?= url('change-language') ?>";
    
    $(".changeLang").click(function(){
        const lang = $(this).attr('class').split(" ")[3]
        window.location.href = url + "?lang="+ lang;
    });

  </script>
  </body>
</html>