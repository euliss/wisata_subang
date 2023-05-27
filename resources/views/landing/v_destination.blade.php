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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
        <a class="navbar-brand" href="/">Ecoland</a>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav nav ml-auto">
            <li class="nav-item">
              <select class="form-control search-destination">
                <option value="">Cari Destinasi</option>
                @foreach($destinations as $val)
                  <option value="{{ $val->id }}">{{ $val->name }}</option>
                @endforeach
              </select>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kategori
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-top:0">
                @foreach($categories as $val)
                <a class="dropdown-item" href="{{ url('category/'.$val->id_categories) }}">{{ $val->categories_name }}</a>
                @endforeach
              </div>
            </li>
            <li class="nav-item"><a href="/register" class="nav-link"><span>Register</span></a></li>
            <li class="nav-item"><a href="/login" class="nav-link"><span>Login</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <section class="hero-wrap" style="background-image: url('landing/images/destination-single.jpg');" data-stellar-background-ratio="0.5">
      <div class="home-slider owl-carousel">

        @foreach(explode('|', $destination->image) as $image)
        @if($image != "")
        <div class="slider-item">
          <div class="overlay"></div>
          <div class="container-fluid p-0">
            <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
              <div class="one-third order-md-last">
                <div class="img" style="background-image:url(<?= asset('images/destinations/'.$image) ?>);">
                  <div class="overlay"></div>
                </div>
              </div>
              <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <div class="text">
                  <h1 class="mb-4 mt-3">{{ $destination->name }}</h1>
                  <p>{{ $destination->description }}</p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endforeach

      </div>
    </section>

    <section class="ftco-section ftco-services-2 ftco-no-pt">
      <div class="container-fluid px-0 bg-light">
        <div class="container">
          <div class="row tour py-5">

          <div class="col-md d-flex justify-content-center align-items-center align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-manager"></span></div>
              <div class="media-body">
                <h2>Kontak Destinasi</h2>
                <a target="_blank" href="https://wa.me/{{ $destination->contact }}" class="heading mb-3 text-dark" style="font-size:20px">{{ $destination->contact }}</a>
              </div>
            </div>      
          </div>

        </div>
        </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-md-12 tour-wrap">
            <iframe src="<?= $destination->location ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="col-md-12 tour-wrap">
            <div class="pt-5 mt-5">
              <h3 class="mb-5">{{ count($comments) }} Komentar</h3>
              <ul class="comment-list">

                @foreach($comments as $val)
                <li class="comment">
                    <hr>
                  <div class="comment-body" style="float:left;">
                    <h2>{{ $val->name }}</h2>
                    <div>{{ date("d M Y H:i:s", strtotime($val->created_at)) }}</div>
                    <div>Rating : {{ $val->rating }}🌟</div>
                    <p>{{ $val->content }}</p>
                  </div>
                </li>
                @endforeach

              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Tinggalkan Komentar</h3>
                <form action="{{ url('store-comment/'.$destination->id) }}" method="post" class="p-5 bg-dark text-white">
                  @csrf
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input required type="text" class="form-control" name="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input required type="email" class="form-control" name="email">
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea required name="content" cols="10" rows="2" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="message">Rating</label>
                    <select required name="rating" class="form-control">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option selected value="5">5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Kirim Komentar" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> <!-- .section -->


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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>

    $("select").select2();
    $(document).on('change',".search-destination",function(){
      window.location.href = "<?= url('destination') ?>/"+$(this).val()
    })
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }


  </script>
  @if($errors->any())
      <script>
        toastr["success"]("Komentar Berhasil Dikirim")
      </script>
  @endif

  </body>
</html>