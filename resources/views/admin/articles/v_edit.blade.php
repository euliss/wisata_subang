@section('title')
Manage Articles
@endsection
@extends('layout/v_template')
@section('page')
Edit Product
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
            <h3 class="card-title">Article Edit Form</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/update-articles/{{$article->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Title</label>
                <input type="text" class="form-control" id="inputName5" name="title" value="{{ $article->title }}" placeholder="Enter Title...">
                <div class="text-danger">
                @error('title')
                  {{ $message}}
                @enderror
                </div>
              </div>
              <div class="col-md-12">
                <label for="inputState" class="form-label">Description</label>
                <textarea name="description" class="form-control" cols="30" rows="5">{{$article->description}}</textarea>
                <div class="text-danger">
                  @error('description')
                    {{ $message}}
                  @enderror
                </div>
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

