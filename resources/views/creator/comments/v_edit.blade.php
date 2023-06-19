@section('title')
Kelola Komentar
@endsection
@extends('layout/v_template')
@section('page')
Edit Komentar
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
            <h3 class="card-title">Form Edit Komentar</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/update-comments/{{$comment->id}}" method="POST">
              @csrf

                <div class="form-group">
                  <label for="name">Nama *</label>
                  <input required type="text" class="form-control" value="{{ $comment->name }}" name="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input required type="email" class="form-control" value="{{ $comment->email }}" name="email">
                </div>
                <div class="form-group">
                  <label for="message">Komentar</label>
                  <textarea required name="content" cols="10" rows="2" class="form-control">{{ $comment->content }}</textarea>
                </div>
                <div class="form-group">
                  <label for="message">Rating</label>
                  <select required value="{{ $comment->rating }}" name="rating" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option selected value="5">5</option>
                  </select>
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

