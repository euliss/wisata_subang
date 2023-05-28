@section('title')
Manage Destinations
@endsection
@extends('layout/v_template')
@section('page')
Add Destinations
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
            <h3 class="card-title">Destinations Add Form</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/insert-destinations" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="col-md-6">
                <label>Category</label>
                <select required class="form-control" name="id_category" >
                  @foreach($categories as $val)
                  <option value="{{ $val->id_categories }}">{{ $val->categories_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label>Name</label>
                <input required type="text" class="form-control" name="name" >
              </div>
              <div class="col-md-6">
                <label>Description</label>
                <textarea required class="form-control" name="description" id="summernote" ></textarea>
              </div>
              <div class="col-md-6">
                <label>Location</label>
                <textarea required class="form-control" name="location" ></textarea>
              </div>
              <div class="col-md-6">
                <label>Contact</label>
                <input required type="number" class="form-control" name="contact" >
              </div>
              <div class="col-md-6">
                <label>Image</label>
                <input required type="file" class="form-control mt-1" name="image[]" >
                <input type="file" class="form-control mt-1" name="image[]" >
                <input type="file" class="form-control mt-1" name="image[]" >
                <input type="file" class="form-control mt-1" name="image[]" >
                <input type="file" class="form-control mt-1" name="image[]" >
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

