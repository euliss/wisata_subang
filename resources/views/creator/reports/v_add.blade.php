@section('title')
Kelola Laporan
@endsection
@extends('layout/v_template')
@section('page')
Tambah Laporan Pengunjung
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
            <h3 class="card-title">Form Tambah Laporan Pengunjung</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/insert-reports/{{ Request::segment(2) }}" method="POST">
              @csrf

                <div class="form-group">
                  <label for="email">Jumlah<span style="color:crimson">*</span></label>
                  <input required type="number" class="form-control" name="count" placeholder="Masukkan Jumlah">
                </div>
                <div class="form-group">
                  <label for="message">Keterangan<span style="color:crimson">*</span></label>
                  <textarea required name="content" cols="10" rows="2" class="form-control" placeholder="Masukkan Keterangan"></textarea>
                </div>
               <div class="form-group">
                  <label for="bulan">Bulan<span style="color:crimson">*</span></label>
                  <input required type="month" class="form-control" name="date">
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

