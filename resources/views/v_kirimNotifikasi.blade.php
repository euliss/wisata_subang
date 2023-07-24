@section('title')
    Dashboard
@endsection
@extends('layout/v_template')
@section('page')
    Dashboard Admin
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
                      <h3 class="card-title">Form Kirim Notifikasi</h3>
                    </div>
                    <div class="card-body">
                      <!-- Multi Columns Form -->
                      <form class="row g-3" action="/kirim-notifikasi" method="POST">
                        @csrf
          
                          <div class="form-group">
                            {{-- <label for="email" class="mb-3">Destinasi <button type="button" value="Pilih Semua" name="pilih_semua" id="pilih_semua" onclick="pilihSemua()" class="btn btn-primary">Pilih Semua Destinasi</button> <button type="button" style="display: none;" id="batal" onclick="batal()" class="btn btn-secondary">Batal</button></label> --}}
                            <label for="email" class="mb-3">Destinasi</label><br>
                            <select required name="id_destination[]" class="multiselect form-control" style="width: 100%;" multiple="multiple" id="id_destination">
                                @foreach($destination as $val)
                                <option value="{{ $val->id }}">{{ $val->name }}</option>
                                @endforeach
                            </select>
                            {{-- {{-- <select class="multiselect form-control" multiple="multiple"></select> --}}
                          </div>
                          <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea required name="pesan" cols="10" rows="2" placeholder="Masukkan pesan" class="form-control"></textarea>
                          </div>
          
                        <div class="text-center mt-5">
                          <button type="submit" class="btn btn-primary">Kirim</button>
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

@section('javascript')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" /> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>

<script>

    $(function() {
      // var name = ['joe', 'mary', 'rose'];
      $.map(name, function (x) {
        return $('.multiselect').append("<option>" + x + "</option>");
      });
      
      $('.multiselect')
        .multiselect({
          allSelectedText: 'All',
          maxHeight: 200,
          includeSelectAllOption: true
        })
        .multiselect('selectAll', false)
        .multiselect('updateButtonText');
    });

</script>
@endsection
