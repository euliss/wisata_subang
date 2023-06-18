@section('title')
Dashboard
@endsection
@extends('landing/v_header_landing')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      <div class="layout-destination">
        <div class="card-destination p-4">
          <div class="row justify-content-center">
            <img src="{{asset('images/articles/'.$articles->image)}}" style="width: 90%; border-radius: 10px;" class="img" alt="">
          </div>
          <div class="text">
            <h1 class="mb-4 mt-3">{{ $articles->title }}</h1>
            <br>
            <h5>{{ GoogleTranslate::trans('Deskripsi', app()->getLocale()) }}</h5>
            <p><?= $articles->description ?></p>
          </div>  
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
