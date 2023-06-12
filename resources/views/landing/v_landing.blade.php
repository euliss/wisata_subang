@section('title')
Dashboard
@endsection
@extends('landing/v_header_landing')
@section('content')
    <section id="home-section" class="hero">
      <div class="home-slider owl-carousel">

        <div class="slider-item">
          <div class="container-fluid p-0 mx-0">
            <div class="row mx-0">
              <div class="col-md-5">
                <div class="text-landing"  data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-4 mt-3">Ayo Bermain Ke Kabupaten Subang</h1>
                    <p class="mb-4">Mari nikmati pesona Kabupaten Subang dengan mengunjungi berbagai macam destinasi wisata, kuliner, penginapan dan ekonomI kreatif.</p>
                    <a href="#" class="btn-utama px-3 py-2 mb-4">jelajahi</a>
                </div>
              </div>
              <div class="col-md-7">
                <img src="{{ asset('ecoland/images/bg-landing.jpg') }}" class="" alt="Background Landing" width="1000" height="736px">
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
            <h2 class="mb-4">Kategori Destinasi</h2>
            <p>Selamat datang di dunia destinasi wisata yang mengagumkan! 
              Kami hadir untuk menyediakan Anda beragam informasi terkait perjalanan impian Anda. Dengan keakuratan dan yang tak tertandingi, kami adalah sumber referensi terpercaya untuk memenuhi hasrat petualangan Anda.</p>
          </div>
        </div>
        <div class="row">

          @foreach ($categories as $category)
          <div class="ftco-animate" style="width: 20%;">
            <a href="{{ url('category/'.$category->id_categories) }}" class="media block-6 services text-center d-block">
              <div class="icon justify-content-center align-items-center d-flex">
                <img src="{{ asset($category->images) }}" width="160">
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">{{ $category->categories_name }}</h3>
                <p></p>
              </div>
            </a>      
          </div>
          @endforeach

        </div>
      </div>
    </section>

    <section class="" id="destination-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Temukan Destinasi</h2>
            <p>Temukan destinasi kemana aja yang ingin kamu kunjungi</p>
            <form action="/destination_search">
              <input type="text" class="search-box text-center mb-2 py-4" name="name" placeholder="Input Nama Destinasi">
              <button type="submit" class="btn-utama py-2 mt-4 px-4 mb-2">Cari Destinasi</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Tentang Kabupaten Subang</h2>
            <p>Sebelum berkunjung, yuk mengenal lebih dekat terkait Kabupaten Subang</p>
          </div>
        </div>
        <div class="row d-flex">

          @foreach($articles as $val)
          <div class="col-md-6 col-lg-4 d-flex ftco-animate">
            <div class="blog-entry">
              <a href="/about" class="block-20" style="background-image: url('<?= asset('images/articles/'.$val->image) ?>'); border-radius:15px;">
              </a>
              <div class="text float-right d-block">
                <p class="text heading"><a href="#">{{ $val->title }}</a></p>
                {{--  <p style="max-height:150px;overflow: hidden;">{{ $val->description }}</p> --}}
                <div class="row justify-content-center mb-3">
                  <div class="d-flex align-items-center mt-4">
                    <p class="mb-0"><a href="/about" class="btn-utama px-3 py-2">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                  </div>
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
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Rekomendasi Destinasi Wisata yang Paling Banyak Dikunjungi Wisatawan</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row">

          @foreach($destinations as $value)
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="card-destination project">
              <div class="img">
                <?php  
                  $image = explode("|", $value->image)[1];
                ?>
                <a class="text-center" href="/destination"><img src="{{ asset('images/destinations/'.$image) }}" width="100%" style="min-height:300px;max-height: 300px;"></a>
              </div>
              {{-- <span class="kategori">
                {{ $category->categories_name }}
              </span> --}}
              <div class="text">
                {{-- <span>{{ $value->created_at }}</span> --}}
                <h3 class="ml-3 mt-2 mb-2"><a href="/destination">{{ $value->name}}</a></h3>
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