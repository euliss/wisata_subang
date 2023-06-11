@section('title')
Dashboard
@endsection
@extends('landing/v_header_landing')
@section('content')
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
            <div class="blog-entry justify-content-end">
              <a href="#" class="block-20" style="background-image: url('<?= asset('images/articles/'.$val->image) ?>');">
              </a>
              <div class="text float-right d-block">
                <h3 class="heading"><a href="#">{{ $val->title }}</a></h3>
                <p><?= $val->description ?></p>
                <!-- <div class="d-flex align-items-center mt-4 meta">
                  <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                  <p class="ml-auto mb-0">
                    <a href="#" class="mr-2">Admin</a>
                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                  </p>
                </div> -->
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section>
@endsection
