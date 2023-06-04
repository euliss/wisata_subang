@section('title')
Manage Articles
@endsection
@extends('layout/v_template')
@section('page')
Data Articles
@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>@yield('title')</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
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
            <h3 class="card-title">Data Articles</h3>
            <a href="/add-articles" class="btn btn-primary" style="float: right"><i class="bi bi-plus-circle-fill"></i> Add Data</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              @if (session('pesan'))
              <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('pesan') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th width="50%">Description</th>
                  <th>Image</th>
                  <th width="10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;?>
                @foreach ($articles as $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->title }}</td>
                    <td><?= $item->description ?></td>
                    <td>
                      <img src="{{asset('images/articles/'.$item->image)}}" width="200px">
                    </td>
                    <td>
                      <!-- <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#detail{{$item->id}}"><i class="bi bi-eye"></i></button> -->
                      <a href="/edit-articles/{{$item->id}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}"><i class="bi bi-trash"></i></button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>
  </section>

</main>

@foreach ($articles as $item)
<div class="modal fade" id="detail{{$item->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <label for="inputName5" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="inputName5" name="title" value="{{ $item->title }}" disabled>
          </div>
          <div class="col-md-12"><br>
            <label for="inputState" class="form-label">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="15" disabled>{{ $item->description }}</textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
      </div>
    </div>
  </div>
</div>
@endforeach

{{-- Modal Delete --}}
@foreach ($articles as $item)
<div class="modal fade" id="delete{{$item->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <a href="/delete-articles/{{$item->id}}" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->
@endforeach

@endsection

