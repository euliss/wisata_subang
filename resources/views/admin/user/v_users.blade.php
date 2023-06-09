@section('title')
    Kelola User
@endsection
@extends('layout/v_template')
@section('page')
    Data User
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>@yield('title')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">@yield('title')</a></li>
                    <li class="breadcrumb-item active">@yield('page')</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
<section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card p-3">
                        <div class="card-header">
                          <h3 class="card-title">Data User</h3>
                            <a href="/add-user" class="btn btn-primary" style="float: right"><i
                                    class="bi bi-plus-circle-fill"></i> Tambah Data</a>
                        </div>

                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <div class="table-responsive">

                              <table class="table datatable table-bordered table-hover">
                                @if (session('pesan'))
                                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                role="alert">
                                {{ session('pesan') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                              </div>
                              @endif
                                <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>Email</th>
                                      {{-- <th>NIK</th> --}}
                                      <th>Role</th>
                                      <th>Status</th>
                                      <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $no = 1; ?>
                                  @foreach ($users as $item)
                                  <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    {{-- <td>{{ $item->nik }}</td> --}}
                                    <td>{{ $item->level == 1 ? 'Admin' : 'Creator' }}</td>
                                    <td align="center">
                                      {{ $item->status }}
                                      <hr style="margin: 0;margin-bottom: 5px;">
                                      @if ($item->status == 'active')
                                      <a style="margin:0 4px" href="{{url('change-status/non-active/').'/'.$item->id }}" class="btn btn-sm btn-danger">Deactivate</a>
                                      @else
                                      <a style="margin:0 4px" href="{{url('change-status/active/').'/'.$item->id }}" class="btn btn-sm btn-primary">Activate</a>
                                      @endif
                                    </td>
                                    <!-- <td>
                                      @if ($item->photo)
                                      <img src="{{url('foto_user/'.$item->photo)}}" width="100px">
                                      @else
                                      <img src="{{url('foto_user/default.jpg')}}" width="100px">
                                      @endif
                                    </td> -->
                                    <td>
                                      @if (Auth::user()->id === $item->id)
                                      @else
                                      @if ($item->level == 2)
                                      <a href="/destinations-user/{{$item->id}}" class="btn btn-warning mb-1 text-white"><i class="bi bi-building"></i></a>
                                      @endif
                                      <a href="/edit-user/{{$item->id}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                      @endif
                                      <a href="/detail-user/{{$item->id}}" class="btn btn-info text-white"><i class="bi bi-eye"></i></a>
                                      @if (Auth::user()->id === $item->id)
                                      <button style="margin:0 4px" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-info"><i class="bi bi-trash"></i></button>
                                      @else
                                      <button style="margin:0 4px" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}"><i class="bi bi-trash"></i></button>
                                      
                                      
                                      @endif
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                              <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    {{-- Modal Delete --}}
    @foreach ($users as $item)
        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda ingin menghapus data?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <a href="/delete-user/{{ $item->id }}" class="btn btn-danger">Ya</a>
                    </div>
                </div>
            </div>
        </div><!-- End Basic Modal-->
    @endforeach
@endsection
