@section('title')
Manage Destinations User
@endsection
@extends('layout/v_template')
@section('page')
Edit Destinations User
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
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/destinations-update-user/{{Request::segment(2)}}" method="POST">
              @csrf
              <table class="table table-bordered table-hover">
              @if (session('pesan'))
              <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('pesan') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              <thead>
                <tr>
                  <th width="10px">No</th>
                  <th>Name</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;?>
                @foreach ($destinations as $item)
                <?php $same=false;?>
                  @foreach ($user_destinations as $item2)
                    <?php 
                      if($item->id == $item2->id_destination){
                        $same=true;
                        break;
                      }
                    ?>
                  @endforeach
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                      <input type="checkbox" name="id_destinations[]" value="{{ $item->id }}" <?= $same ? 'checked' : '' ?> >
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/users" class="btn btn-secondary">Kembali</a>
              </div>
            </form><!-- End Multi Columns Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

