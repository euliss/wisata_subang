@section('title')
Manage Comments
@endsection
@extends('layout/v_template')
@section('page')
Add Comments
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
            <h3 class="card-title">Comments Add Form</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/insert-comments/{{ Request::segment(2) }}" method="POST">
              @csrf

                <div class="form-group">
                  <label for="name">Name *</label>
                  <input required type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input required type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea required name="content" cols="10" rows="2" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label for="message">Rating</label>
                  <select required name="rating" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option selected value="5">5</option>
                  </select>
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

