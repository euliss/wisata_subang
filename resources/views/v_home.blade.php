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
            {{-- <div class="row"> --}}

            <!-- Left side columns -->
            {{-- <div class="col-lg-12"> --}}
            <div class="row">
                @if (auth()->user()->level == 2)
                <div class="card " style="border-radius: 10px">
                    <div class="col-12 mt-4 justify-content-beetween">
                        <h3><strong> Selamat Datang {{ Auth::user()->name }}</strong></h3>
                        <br>
                        <h6>Mari tambahkan informasi terkait destinasi wisata yang kamu kelola agar dapat dijangkau oleh banyak wisatawan!</h6> 
                        <h6>Jangan lupa tambahkan laporan pengunjung pada setiap bulannya, agar destinasi wisata yang anda kelola menjadi rekomendasi!</h6>
                        <img class="float-end" src="{{ asset('gambar/hello.jpg') }}" alt="selamatdatang" height="180px" >
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                    </div>
                </div>
                @endif
                <!-- Sales Card -->
                @if (auth()->user()->level == 1)
                    <div class="col-xxl-2 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Jumlah Pengguna</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $users }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
                @if (auth()->user()->level == 1)
                    <div class="col-xxl-2 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Jumlah Kategori</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-intersect"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $categories }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
                @if (auth()->user()->level == 1)
                <div class="col-xxl-2 col-md-4">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Jumlah Destinasi</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $destinations }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (auth()->user()->level == 1)
                <div class="col-xxl-2 col-md-7 ">
                    <div class="card">
                        <div class="card-body pt-4 text-center">
                            <h5>Grafik Jumlah Pengunjung </h5>
                            <canvas style="border-radius: 6px;" id="chartReport"></canvas><br><br>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            </div>
            {{-- </div> --}}
            <!-- Reports -->
           
            <div class="col-12">
                <div class="card">

                    {{-- <div class="card-body">
                        <div class="row">
                            <div class="col-xxl-8 col-md-6 d-flex align-items-center justify-content-center ">
                                <img src="{{ asset('layout') }}/assets/img/wisata.png" alt="Logo" width="500px">
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="info-card sales-card">


                                    <div class="col-xxl-12 col-md-12">
                                        <h3><strong>Welcome {{ Auth::user()->name }}</strong></h3>
                                        <h5>Welcome to the website of Destinasi Wisata. You are currently on the website of
                                            Destinasi Wisata, Admin section.</h5>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div><!-- End Reports --> --}}
                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-3">

                <!-- Recent Activity -->
                <div class="card">

                    {{-- <div class="card-body">
            <h5 class="card-title">Latest News</h5>

            <div class="activity">

              @foreach ($news as $item)
              <div class="activity-item d-flex">
                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                <div class="activity-content">
                  <strong>{{ $item->title }}</strong> - {{ $item->date }}
                </div>
              </div>
              @endforeach

            </div>

          </div> --}}
                </div><!-- End Recent Activity -->
            </div><!-- End Right side columns -->

            </div>
        </section>

    </main>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <script>
        function getChart() {
            Chart.defaults.global.defaultFontSize = 16;

            var myBarChart = new Chart(document.getElementById("chartReport").getContext('2d'), {
                type: 'bar',
                data: {
                    labels: [
                        <?php foreach($graphic as $val): ?> "<?= date('F', strtotime(date('Y-' . $val->month . '-d'))) ?>",
                        <?php endforeach ?>
                    ],
                    datasets: [{
                        label: "Chart",
                        backgroundColor: ['#4942E4', '#8696FE', '#C4B0FF','#4942E4', '#8696FE', '#C4B0FF','#4942E4', '#8696FE', '#C4B0FF','#4942E4', '#8696FE', '#C4B0FF'],
                        data: [
                            <?php foreach($graphic as $val): ?>
                            <?= $val->report_count ?>,
                            <?php endforeach ?>
                        ],

                    }, ]
                },
                options: {
                    legend: {
                        display: false
                    }
                }
            });
        }

        getChart()
    </script>
@endsection
