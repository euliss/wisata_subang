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
                <input type="text" class="form-control" name="name" value="{{$destinations->name}}">
              </div>
              <div class="col-md-6">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" id="summernote">{{$destinations->description}}</textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label">Location</label>
                <textarea class="form-control" name="location">{{$destinations->location}}</textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label">Contact</label>
                <input type="number" class="form-control" name="contact" value="{{$destinations->contact}}">
              </div>
              <div class="col-md-6">
                <label>Image</label>
                <input required type="file" class="form-control mt-1" name="image[]" >
                <input type="file" class="form-control mt-1" name="image[]" >
                <input type="file" class="form-control mt-1" name="image[]" >
                <input type="file" class="form-control mt-1" name="image[]" >
                <input type="file" class="form-control mt-1" name="image[]" >
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

