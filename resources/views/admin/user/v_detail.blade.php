@section('title')
Manage Users
@endsection
@extends('layout/v_template')
@section('page')
Detail User
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
            <h3 class="card-title">User Detail</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/update-user/{{$user->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Full Name</label>
                <input disabled type="text" class="form-control" id="inputName5" name="name" value="{{$user->name}}" placeholder="Enter Full Name...">
                <div class="text-danger">
                @error('name')
                  {{ $message}}
                @enderror
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Email</label>
                <input disabled type="email" class="form-control" id="inputEmail5" name="email" value="{{$user->email}}" placeholder="Enter Email Adress...">
                <div class="text-danger">
                  @error('email')
                    {{ $message}}
                  @enderror 
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">NIK</label>
                <input disabled type="email" class="form-control" id="inputEmail5" name="nik" value="{{$user->nik}}" placeholder="Enter NIK Number...">
                <div class="text-danger">
                  @error('nik')
                    {{ $message}}
                  @enderror 
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Role</label>
                <select disabled id="inputState" class="form-select" name="level" value="{{$user->level}}" placeholder="Enter Role...">
                  <option value="">Pilih Role</option>
                  <option {{ $user->level == '1' ? 'selected' : '' }} value="1">Admin</option>
                  <option {{ $user->level == '2' ? 'selected' : '' }} value="2">Non Admin</option>
                </select>
                <div class="text-danger">
                  @error('level')
                    {{ $message}}
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Status</label>
                <select disabled id="inputState" class="form-select" name="level" value="{{$user->level}}" placeholder="Enter Status...">
                  <option value="">Pilih Status</option>
                  <option {{ $user->status == 'active' ? 'selected' : '' }} value="active">Aktif</option>
                  <option {{ $user->status == 'non-active' ? 'selected' : '' }} value="non-active">Tidak Aktif</option>
                </select>
                <div class="text-danger">
                  @error('status')
                    {{ $message}}
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                @if($user->photo)
                <img src="{{url('foto_user/'.$user->photo)}}" width="100px">
                @else
                  <img src="{{url('foto_user/default.jpg')}}" width="100px">
                @endif
              </div>
            </form><!-- End Multi Columns Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

