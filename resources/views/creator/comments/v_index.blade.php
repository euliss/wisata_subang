@section('title')
Kelola Komentar
@endsection
@extends('layout/v_template')
@section('page')
Data Komentar
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
            <h3 class="card-title">Data Komentar</h3>
            <a href="/add-comments/{{ $destination->id }}" class="btn btn-primary" style="float: right"><i class="bi bi-plus-circle-fill"></i> Tambah Data</a>
            <a href="{{ url('detail-destinations/'.$destination->id) }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
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
                  <th>Email</th>
                  <th>Komentar</th>
                  <th>Rating</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;?>
                @foreach ($comments as $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->rating }}</td>
                    <td>
                      <a href="/edit-comments/{{$item->id}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
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
@foreach ($comments as $item)
<div class="modal fade" id="delete{{$item->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Menghapus Data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <a href="/delete-comments/{{$item->id}}" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->
@endforeach

@endsection

