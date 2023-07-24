@section('title')
Kelola Destinasi
@endsection
@extends('layout/v_template')
@section('page')
Tambah Destinasi
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
            <h3 class="card-title">Form Tambah Destinasi</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/insert-destinations" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="col-md-6">
                <label>Kategori <span style="color:crimson">*</span></label>
                <select required class="form-control" name="id_category" >
                  <option value="">Pilih Kategori</option>
                  @foreach($categories as $val)
                  <option value="{{ $val->id_categories }}">{{ $val->categories_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label>Nama<span style="color:crimson">*</span></label>
                <input required type="text" class="form-control" name="name" placeholder="Masukkan Nama Destinasi" >
              </div>
              <div class="col-md-6">
                <label>Deskripsi<span style="color:crimson">*</span></label>
                <textarea required class="form-control" name="description" placeholder="Masukkan Gambaran Umum" ></textarea>
              </div>
              <div class="col-md-6">
                <label>Lokasi<span style="color:crimson">*</span></label>
                <textarea required class="form-control" name="location" placeholder="Masukkan URL Google Maps" ></textarea>
              </div>
              <div class="col-md-6">
                <label>Alamat<span style="color:crimson">*</span></label>
                <textarea required class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap" ></textarea>
              </div>
              <div class="col-md-6">
                <label>Kontak<span style="color:crimson">*</span></label>
                <input required type="number" class="form-control" name="contact" placeholder="Masukkan Nomor WhatsApp Contoh:628**********" >
              </div>
              <div class="col-md-6">
                <label>Image<span style="color:crimson">*</span></label>
                <input type="file" class="form-control mt-1" name="image[]" multiple required accept=".png, .jpg, .jpeg" placeholder="Masukan Gambar format png or jpg">
              </div>
              <div class="col-md-6 d-none input_jam_operasional">
                <label>Jam Operasional<span style="color:crimson">*</span></label>
                <input type="text" class="form-control" name="jam_operasional" placeholder="Masukkan Jam Operasional" >
              </div>
              <div class="col-md-6 d-none input_harga">
                <label>Harga<span style="color:crimson">*</span></label>
                <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga" >
              </div>
              <div class="col-md-6 d-none input_fasilitas">
                <label>Fasilitas<span style="color:crimson">*</span></label>
                <textarea class="form-control" name="fasilitas" placeholder="Masukkan Fasilitas" ></textarea>
              </div>
              <div class="col-md-6 d-none input_menu">
                <label>Menu<span style="color:crimson">*</span></label>
                <textarea class="form-control" name="menu" placeholder="Masukkan Gambaran Menu" ></textarea>
              </div>
              <div class="col-md-6 d-none input_tipe_kamar">
                <label>Tipe Kamar<span style="color:crimson">*</span></label>
                <input type="text" class="form-control" name="tipe_kamar" placeholder="Masukkan Tipe Kamar" >
              </div>

              <div class="text-center mt-5">
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
