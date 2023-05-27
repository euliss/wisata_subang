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
        <a class="navbar-brand" href="index.html">Ecoland</a>
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

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">{{ $category->categories_name }}</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row">

          @foreach($destination_category as $val)
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="project">
              <div class="img">
                <a href="{{ url('destination/'.$val->id) }}"><img src="{{ asset('images/destinations/'.explode('|', $val->image)[1]) }}" class="" alt="Colorlib Template" width="100%" height="300"></a>
              </div>
              <div class="text">
                <h3><a href="{{ url('destination/'.$val->id) }}">{{ $val->name }}</a></h3>
                <div class="star d-flex clearfix">
                  <div class="mr-auto float-left">
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                    <span class="ion-ios-star"></span>
                  </div>
                  <div class="float-right">
                    <span class="rate"><a href="#">(6)</a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Contact</span>
            <h2 class="mb-4">Contact Me</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>

        <div class="row block-9">
          <div class="col-md-7 order-md-last d-flex">
            <form action="#" class="bg-light p-4 p-md-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-5 d-flex">
            <div class="row d-flex contact-info mb-5">
              <div class="col-md-12 ftco-animate">
                <div class="box p-2 px-3 bg-light d-flex">
                  <div class="icon mr-3">
                    <span class="icon-map-signs"></span>
                  </div>
                  <div>
                    <h3 class="mb-3">Address</h3>
                    <p>198 West 21th Street, Suite 721 New York NY 10016</p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 ftco-animate">
                <div class="box p-2 px-3 bg-light d-flex">
                  <div class="icon mr-3">
                    <span class="icon-phone2"></span>
                  </div>
                  <div>
                    <h3 class="mb-3">Contact Number</h3>
                    <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 ftco-animate">
                <div class="box p-2 px-3 bg-light d-flex">
                  <div class="icon mr-3">
                    <span class="icon-paper-plane"></span>
                  </div>
                  <div>
                    <h3 class="mb-3">Email Address</h3>
                    <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 ftco-animate">
                <div class="box p-2 px-3 bg-light d-flex">
                  <div class="icon mr-3">
                    <span class="icon-globe"></span>
                  </div>
                  <div>
                    <h3 class="mb-3">Website</h3>
                    <p><a href="#">yoursite.com</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


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

  <script>

    $("select").select2();
    $(document).on('change',".search-destination",function(){
      window.location.href = "<?= url('destination') ?>/"+$(this).val()
    })

  </script>
  </body>
</html>