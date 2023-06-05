@section('title')
Dashboard
@endsection
@extends('landing/v_header_landing')
@section('content')
    <section id="home-section" class="hero">
      <img src="{{ asset('ecoland/images/blob-shape-3.svg') }}" class="svg-blob" alt="Colorlib Free Template">
      <div class="home-slider owl-carousel">

        <div class="slider-item">
          <div class="overlay"></div>
          <div class="container-fluid p-0">
            <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
              <div class="one-third order-md-last">
                <div class="img" style="background-image:url(<?= asset('ecoland/images/bg_1.jpg')?>);">
                  <div class="overlay"></div>
                </div>
                <div class="bg-primary">
                  <div class="vr"><span class="pl-3 py-4" style="background-image: url(<?= asset('ecoland/images/bg_1-1.jpg')?>);">_|_|_|_</span></div>
                </div>
              </div>
              <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <div class="text">
                  <span class="subheading pl-5">Discover Greece</span>
                  <h1 class="mb-4 mt-3">Explore Your Travel Destinations like never before</h1>
                  <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>
                  
                  <p><a href="#" class="btn btn-primary px-5 py-3 mt-3">Discover <span class="ion-ios-arrow-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="slider-item">
          <div class="overlay"></div>
          <div class="container-fluid p-0">
            <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
              <div class="one-third order-md-last">
                <div class="img" style="background-image:url(<?= asset('ecoland/images/bg_1.jpg')?>);">
                  <div class="overlay"></div>
                </div>
                <div class="bg-primary">
                  <div class="vr"><span class="pl-3 py-4" style="background-image: url(<?= asset('ecoland/images/bg_1-1.jpg')?>);">_|_|_|_</span></div>
                </div>
              </div>
              <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <div class="text">
                  <span class="subheading pl-5">Discover Greece</span>
                  <h1 class="mb-4 mt-3">Explore Your Travel Destinations like never before</h1>
                  <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>
                  
                  <p><a href="#" class="btn btn-primary px-5 py-3 mt-3">Discover <span class="ion-ios-arrow-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  
    <section class="ftco-section ftco-services-2" id="services-section">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Categories</span>
            <h2 class="mb-4">Our Categories</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row">

          @foreach ($categories as $category)
          <div class=" ftco-animate" style="width: 20%;">
            <a href="{{ url('category/'.$category->id_categories) }}" class="media block-6 services text-center d-block">
              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-map-of-roads"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">{{ $category->categories_name }}</h3>
              </div>
            </a>      
          </div>
          @endforeach

        </div>
      </div>
    </section>

    <section class="ftco-intro img" id="destination-section" style="background-image: url(images/bg_3.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-9 text-center">
            <h2>Choose the Perfect Destination</h2>
            <p>We can manage your dream building A small river named Duden flows by their place</p>
            <form action="/destination_search">
              <input type="text" class="form-control text-center mb-2" name="name" placeholder="Input Destination">
              <button type="submit" class="btn btn-white px-4 py-3">Search Places</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Article</span>
            <h2 class="mb-4">Our Article</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row d-flex">

          @foreach($articles as $val)
          <div class="col-md-6 col-lg-4 d-flex ftco-animate">
            <div class="blog-entry">
              <a href="single.html" class="block-20" style="background-image: url('<?= asset('images/articles/'.$val->image) ?>');">
              </a>
              <div class="text float-right d-block">
                <h3 class="heading"><a href="#">{{ $val->title }}</a></h3>
                <p style="max-height:150px;overflow: hidden;">{{ $val->description }}</p>
                <div class="d-flex align-items-center mt-4 meta">
                  <p class="mb-0"><a href="/about" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Best Destination</span>
            <h2 class="mb-4">Best Place to Travel</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row">

          @foreach($destinations as $value)
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="project">
              <div class="img">
                <?php  
                  $image = explode("|", $value->image)[1];
                ?>
                <a class="text-center" href="destination.html"><img src="{{ asset('images/destinations/'.$image) }}" width="100%" style="min-height:300px;max-height: 300px;"></a>
              </div>
              <div class="text">
                <span>{{ $value->created_at }}</span>
                <h3><a href="destination.html">{{ $value->name}}</a></h3>
              </div>
              <a href="images/destination-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                <span class="icon-expand"></span>
              </a>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section>

@endsection