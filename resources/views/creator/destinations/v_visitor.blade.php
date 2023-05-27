@section('title')
Manage Pengunjung
@endsection
@extends('layout/v_template')
@section('page')
Data Pengunjung
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
            <h3 class="card-title">Data Pengunjung</h3>
            <a href="{{ url('detail-destinations/'.$destination->id) }}" class="btn btn-dark" >Kembali</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          </div>
        </div>

      </div>

    </div>
  </section>

</main>

@endsection

