@section('title')
Manage Destination
@endsection
@extends('layout/v_template')
@section('page')
Edit Destination
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
          <div class="card-header">
            <h3 class="card-title">Destination Edit Form</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/update-destinations/{{$destinations->id}}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="col-md-6">
                <label class="form-label">Category</label>
                <select class="form-control" name="id_category" value="{{$destinations->id_category}}">
                  @foreach($categories as $val)
                  <option value="{{ $val->id_categories }}">{{ $val->categories_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{$destinations->name}}" placeholder="Masukkan Name">
              </div>
              <div class="col-md-6">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" id="summernote" placeholder="Masukkan Description">{{$destinations->description}}</textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label">Location</label>
                <textarea class="form-control" name="location" placeholder="Masukkan Location">{{$destinations->location}}</textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="alamat" placeholder="Masukkan Address">{{$destinations->alamat}}</textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label">Contact</label>
                <input type="number" class="form-control" name="contact" value="{{$destinations->contact}}" placeholder="Masukkan Contact">
              </div>
              <div class="col-md-6">
                <label>Image <span style="color:crimson">* PNG, JPG, JPEG</span></label>
                <input type="file" class="form-control mt-1" name="image[]" multiple accept=".png, .jpg, .jpeg" placeholder="Masukan Gambar format png or jpg" >
                <div class="text-danger">
                  @error('image')
                  {{ $message}}
                  @enderror
                </div>
              </div>
              <div class="col-md-6 d-none input_jam_operasional">
                <label>Jam Operasional</label>
                <input value="{{$destinations->jam_operasional}}" type="text" class="form-control" name="jam_operasional" placeholder="Masukkan Jam Operasional" >
              </div>
              <div class="col-md-6 d-none input_harga">
                <label>Harga</label>
                <input value="{{$destinations->harga}}" type="text" class="form-control" name="harga" placeholder="Masukkan Harga" >
              </div>
              <div class="col-md-6 d-none input_fasilitas">
                <label>Fasilitas</label>
                <textarea class="form-control" name="fasilitas" placeholder="Masukkan Fasilitas" ><?= $destinations->fasilitas ?></textarea>
              </div>
              <div class="col-md-6 d-none input_menu">
                <label>Menu</label>
                <textarea class="form-control" name="menu" placeholder="Masukkan Menu" ><?= $destinations->menu ?></textarea>
              </div>
              <div class="col-md-6 d-none input_tipe_kamar">
                <label>Tipe Kamar</label>
                <input value="{{$destinations->tipe_kamar}}" type="text" class="form-control" name="tipe_kamar" placeholder="Masukkan Tipe Kamar" >
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
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

    $('select[name="id_category"]').change(function(){
      if(new Array('1','2','4').indexOf($(this).val()) != -1 ){
        $('.input_jam_operasional').removeClass('d-none')
      }else{
        $('.input_jam_operasional').addClass('d-none')
      }

      if(new Array('1','2','3','4').indexOf($(this).val()) != -1 ){
        $('.input_harga').removeClass('d-none')
      }else{
        $('.input_harga').addClass('d-none')
      }

      if(new Array('1','3','4').indexOf($(this).val()) != -1 ){
        $('.input_fasilitas').removeClass('d-none')
      }else{
        $('.input_fasilitas').addClass('d-none')
      }

      if(new Array('2').indexOf($(this).val()) != -1 ){
        $('.input_menu').removeClass('d-none')
      }else{
        $('.input_menu').addClass('d-none')
      }

      if(new Array('3').indexOf($(this).val()) != -1 ){
        $('.input_tipe_kamar').removeClass('d-none')
      }else{
        $('.input_tipe_kamar').addClass('d-none')
      }

    })
  </script>
@endsection
