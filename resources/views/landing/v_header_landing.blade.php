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

    <style>
      .select2{
        margin-top: 11px !important;
        margin-right: 10px !important;
      }
    </style>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
      <div class="container">
      <a class="navbar-brand" href="index.html"></a><img src="images/wisata.png" height="80" alt="Logo"/></a>
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
        <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        @foreach ($categories as $category)
          <li class="nav-item">
            <a class="nav-link" href="#">{{ $category->categories_name }}</a>
          </li>
        @endforeach
      </ul>
    </div>
            <li class="nav-item"><a href="/about" class="nav-link"><span>About</span></a></li>
            <li class="nav-item"><a href="/register" class="nav-link"><span>Register</span></a></li>
            <li class="nav-item"><a href="/login" class="nav-link"><span>Login</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
</html>