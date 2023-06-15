@section('title')
Manage <Article></Article>
@endsection
@extends('layout/v_template')
@section('page')
Detail <Article></Article>
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
            <h3 class="card-title">Article Detail</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3">
              @csrf
              {{-- <div class="col-md-6">
                <label for="inputName5" class="form-label">Title</label>
                <input type="text" class="form-control" id="inputName5" name="title" value="{{ $article->title }}" placeholder="Enter Title..." disabled>
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Image</label>
                <div class="row">
                  <div class="col-12">
                    <img src="{{url('foto_articles/'.$article->image)}}" width="100px">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Descriptions</label>
                <div class="row">
                  <div class="col-md-6">
                    <?php echo $article->description?>
                  </div>
                </div>
              </div> --}}
              <div class="col-md-6">
                <label class="form-label">Title</label>
                <input disabled type="text" class="form-control" name="name" value="{{$article->title}}">
              </div>
              <div class="col-md-6">
                <label class="form-label">Description</label>
                <textarea rows="10" disabled class="form-control" name="description">{{ strip_tags($article->description) }} </textarea> 
              </div>
              {{-- <div class="col-md-6">
                <label class="form-label">Image</label>
                <textarea rows="10" disabled class="form-control" name="image">{{$article->title}}</textarea> --}}
              </div>
            </form><!-- End Multi Columns Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection