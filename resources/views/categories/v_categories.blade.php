@section('title')
Kelola Kategori
@endsection
@extends('layout/v_template')
@section('page')
Data Kategori
@endsection
@section('content')
<style>
  /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
            <h3 class="card-title">Data Kategori</h3>
            <!-- <a href="/add-categories" class="btn btn-primary" style="float: right"><i class="bi bi-plus-circle-fill"></i> Add Data</a> -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table datatable table-bordered table-hover">
              @if (session('pesan'))
              <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('pesan') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;?>
                @foreach ($categories as $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->categories_name }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                      <!-- Rounded switch -->
                      <label class="switch">
                        <input <?= $item->status == "Aktif" ? 'checked' : '' ?> data-id="{{ $item->id_categories }}" type="checkbox">
                        <span class="slider round"></span>
                      </label>
                    </td>
                    <!-- <td>
                      <a href="/edit-categories/{{$item->id_categories}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$item->id_categories}}"><i class="bi bi-trash"></i></butt>
                    </td> -->
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

{{-- Modal Delete --}}
@foreach ($categories as $item)
<div class="modal fade" id="delete{{$item->id_categories}}" tabindex="-1">
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
        <a href="/delete-categories/{{$item->id_categories}}" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->
@endforeach
@endsection

@section('javascript')
<script>
  $('[type="checkbox"]').change(function(){
    let status = "Aktif"
    let id = $(this).data('id')
    if($(this).is(":checked") == false){
      status = "Tidak Aktif"
    }
    window.location.href = window.location.href + '?id=' + id + '&status=' + status
  })
</script>
@endsection