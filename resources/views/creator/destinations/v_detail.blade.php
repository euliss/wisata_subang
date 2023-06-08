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
                  <option value="{{ $val->id_categories }}">{{ $val->categories_name }}</option>
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

            </form><!-- End Multi Columns Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

