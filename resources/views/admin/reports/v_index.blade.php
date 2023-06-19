@section('title')
Laporan Pengunjung
@endsection
@extends('layout/v_template')
@section('page')
Laporan
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
                            <h3 class="card-title">Data Laporan Pengunjung</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <br>
                            <h5>Filter Laporan</h5>
                            <form action="" class="row mt-4 mb-5">
                                @csrf
                                <div class="col-sm-4">
                                    <h6>Destinasi</h6>
                                    <select name="id_destination" class="form-control">
                                        <option value="">Filter Destinasi</option>
                                        @foreach ($destinations as $val)
                                            <option value="{{ $val->id }}"
                                                <?= isset($_GET['id_destination']) && $_GET['id_destination'] == $val->id ? 'selected' : '' ?>>
                                                {{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <h6>Dari Tanggal</h6>
                                    <input type="date" name="dari_tanggal"
                                        value="<?= isset($_GET['dari_tanggal']) ? $_GET['dari_tanggal'] : '' ?>"
                                        class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <h6>Sampai Tanggal</h6>
                                    <input type="date" name="sampai_tanggal"
                                        value="<?= isset($_GET['sampai_tanggal']) ? $_GET['sampai_tanggal'] : '' ?>"
                                        class="form-control">
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <button class="btn btn-primary" type="submit">Filter</button>
                                    <a class="btn btn-secondary" href="/report">Reset</a>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <a href="/report/export_excel" class="btn btn-success"><i class="bi bi-folder-symlink"></i>
                                Export</a>
                                &nbsp;
                        </div>
                        <br>
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
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
                                        <th>Nama Destinasi</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($reports as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->count }}</td>
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
        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1">
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
                        <a href="/delete-report/{{ $item->id }}" class="btn btn-danger">Yes</a>
                    </div>
                </div>
            </div>
        </div><!-- End Basic Modal-->
    @endforeach
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
                        backgroundColor: ['#ff6', '#f6f', '#6ff', '#66f', '#f66', ],
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
