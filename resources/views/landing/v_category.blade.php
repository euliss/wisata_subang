@section('title')
Dashboard
@endsection
@extends('landing/v_header_landing')
@section('content')

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">{{ $category->categories_name }}</h2>
            <p>{{ GoogleTranslate::trans('Temukan Destinasi Yang Kamu Pilih Berdasarkan Kategori', app()->getLocale()) }}</p>
          </div>
        </div>
        <div class="row">

          @foreach($destination_category as $val)
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="card-destination project">
              <div class="img">
                <a href="{{ url('destination/'.$val->id) }}"><img src="{{ asset('images/destinations/'.explode('|', $val->image)[1]) }}" class="" alt="Colorlib Template"  width="100%" style="min-height:300px;max-height: 300px; border-radius:15px;"></a>
              </div>
              <div class="text">
                <h3 class="ml-3 mt-2 mb-2"><a href="{{ url('destination/'.$val->id) }}">{{ $val->name }}</a></h3>
                <!-- <div class="star d-flex clearfix">
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
                </div> -->
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section>


@endsection
