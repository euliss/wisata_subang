@section('title')
Manage Destination
@endsection
@extends('layout/v_template')
@section('page')
Detail Destination
@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>@yield('title')</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">@yield('title')</a></li>
        <li class="breadcrumb-item active">@yield('page')</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="card p-3">
          <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">
            Destination Detail <br><br>
                        <a href="{{ url('destinations') }}" class="btn btn-dark" >Kembali</a>
            </h3>
            <div class="text-center">
              <a href="{{ url('comments-destination/'.$destinations->id) }}" class="btn btn-info text-white">Comments</a>
              <a href="{{ url('reports-destination/'.$destinations->id) }}" class="btn btn-info text-white">Report</a>
            </div>
          </div>
          <div class="card-body">
              @if (session('pesan'))
              <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('pesan') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
            <!-- Multi Columns Form -->
            <form class="row g-3">
              @csrf

              <div class="col-md-6">
                <label class="form-label">Category</label>
                <select disabled class="form-control" name="id_category" value="{{$destinations->id_category}}">
                  @foreach($categories as $val)
                  <option value="{{ $val->id_categories }}"{{ $val->id_categories == $destinations->id_category ? "selected" : '' }}>{{ $val->categories_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Name</label>
                <input disabled type="text" class="form-control" name="name" value="{{$destinations->name}}">
              </div>
              <div class="col-md-6">
                <label class="form-label">Description</label>
                <textarea rows="10" disabled class="form-control" name="description">{{$destinations->description}}</textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label">Location</label>
                <textarea rows="10" disabled class="form-control" name="location">{{$destinations->location}}</textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label">Contact</label>
                <input disabled type="number" class="form-control" name="contact" value="{{$destinations->contact}}">
              </div>
              <div class="col-md-6 d-none input_jam_operasional">
                <label>Jam Operasional</label>
                <input disabled value="{{$destinations->jam_operasional}}" type="text" class="form-control" name="jam_operasional" >
              </div>
              <div class="col-md-6 d-none input_harga">
                <label>Harga</label>
                <input disabled value="{{$destinations->harga}}" type="number" class="form-control" name="harga" >
              </div>
              <div class="col-md-6 d-none input_fasilitas">
                <label>Fasilitas</label>
                <textarea disabled class="form-control" name="fasilitas" ><?= $destinations->fasilitas ?></textarea>
              </div>
              <div class="col-md-6 d-none input_menu">
                <label>Menu</label>
                <textarea disabled class="form-control" name="menu" ><?= $destinations->menu ?></textarea>
              </div>
              <div class="col-md-6 d-none input_tipe_kamar">
                <label>Tipe Kamar</label>
                <input disabled value="{{$destinations->tipe_kamar}}" type="text" class="form-control" name="tipe_kamar" >
              </div>

            </form><!-- End Multi Columns Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection


@section('javascript')
  <script>
      if(new Array('1','2','4').indexOf($('select[name="id_category"]').val()) != -1 ){
        $('.input_jam_operasional').removeClass('d-none')
      }else{
        $('.input_jam_operasional').addClass('d-none')
      }

      if(new Array('1','2','3','4').indexOf($('select[name="id_category"]').val()) != -1 ){
        $('.input_harga').removeClass('d-none')
      }else{
        $('.input_harga').addClass('d-none')
      }

      if(new Array('1','3','4').indexOf($('select[name="id_category"]').val()) != -1 ){
        $('.input_fasilitas').removeClass('d-none')
      }else{
        $('.input_fasilitas').addClass('d-none')
      }

      if(new Array('2').indexOf($('select[name="id_category"]').val()) != -1 ){
        $('.input_menu').removeClass('d-none')
      }else{
        $('.input_menu').addClass('d-none')
      }

      if(new Array('3').indexOf($('select[name="id_category"]').val()) != -1 ){
        $('.input_tipe_kamar').removeClass('d-none')
      }else{
        $('.input_tipe_kamar').addClass('d-none')
      }

  </script>
@endsection
