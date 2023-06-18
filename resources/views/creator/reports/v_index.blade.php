@section('title')
Manage Report
@endsection
@extends('layout/v_template')
@section('page')
Data Report
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
            <h3 class="card-title">Data Report</h3>
            <a href="/add-reports/{{ $destination->id }}" class="btn btn-primary" style="float: right"><i class="bi bi-plus-circle-fill"></i> Add Report</a>
            <a href="{{ url('detail-destinations/'.$destination->id) }}" class="btn btn-dark" >Kembali</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="" class="row mt-4 mb-5">
              @csrf
              <div class="col-sm-6">
                <h6>Dari Tanggal</h6>
                <input type="date" required name="dari_tanggal" class="form-control">
              </div>
              <div class="col-sm-6">
                <h6>Sampai Tanggal</h6>
                <input type="date" required name="sampai_tanggal" class="form-control">
              </div>
              <div class="col-sm-12 mt-3">
                <button class="btn btn-primary" type="submit">Filter</button>
                <a class="btn btn-secondary" href="/reports-destination/{{ Request::segment(2) }}">Reset</a>
              </div>
            </form>
          </div>
          <div class="card-body">
            <div class="d-flex flex-row-reverse">
              <a href="/report/export_excel_report" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i>
                  Export</a>
                  &nbsp;
            </div>
            <br>
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
                  <th>Jumlah Pengunjung</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;?>
                @foreach ($reports as $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->count }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->content }}</td>
                    <td>
                      <a href="/edit-reports/{{$item->id}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
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
@foreach ($reports as $item)
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
        <a href="/delete-reports/{{$item->id}}" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->
@endforeach

@endsection

