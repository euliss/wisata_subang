@section('title')
Kelola Destinasi
@endsection
@extends('layout/v_template')
@section('page')
DataDestinasi
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

  <section class="section">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="card p-3">
          <div class="card-header">
            <h2 class="card-title">Data Destinasi</h2>
            <a href="/add-destinations" class="btn btn-primary" style="float: right"><i class="bi bi-plus-circle-fill"></i> Tambah Data</a>
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
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $data= auth()->user()->level == 1 ? $destination_all : $destinations;
                ?>
                @foreach ($data as $i => $item)
                  <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                      {{ $item->categories_name}}
                    </td>
                    <td>{{ $item->status == 0 ? 'unactive' : 'active' }}</td>
                    <td>
                      @if(auth()->user()->level == 1)
                        @if($item->status == 0)
                        <a href="/change-status-destinations/{{ $item->id }}/1" class="btn btn-primary text-white">
                          Activate
                        </a>
                        @else
                        <a href="/change-status-destinations/{{ $item->id }}/0" class="btn btn-danger text-white">
                          Deactivate
                        </a>
                        @endif
                      @endif
                      <a href="/detail-destinations/{{$item->id}}" class="btn btn-info text-white"><i class="bi bi-eye"></i></a>
                      <a href="/edit-destinations/{{$item->id}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
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

{{-- Modal Delete --}}
@foreach ($data as $item)
<div class="modal fade" id="delete{{$item->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <a href="/delete-destinations/{{$item->id}}" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->
@endforeach
@endsection

