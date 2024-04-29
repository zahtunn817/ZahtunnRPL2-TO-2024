@extends('templates.layout')
@push('style')
@endpush
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Hi, {{auth()->user()->nama}}</h1>
        <small>Selamat datang di Kasir Cafe SE2</small>
    </div>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-toggle="modal" data-target="#filter"><i class="fas fa-calendar fa-sm text-white-50"></i>
        @if(is_array($date))
        {{ \Carbon\Carbon::parse($date['tgl_awal'])->format('d M Y') }} - {{ \Carbon\Carbon::parse($date['tgl_akhir'])->format('d M Y') }}
        @else
        {{ $date->format('d M Y') }}
        @endif
    </a>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Jumlah Transaksi -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah transaksi
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $count_transaksi }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumlah Pendapatan -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendapatan
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp. {{ number_format($pendapatan,0,",",".") }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumlah Pelanggan -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Jumlah pelanggan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_pelanggan }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Content Row -->
<div class="row">

    <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pendapatan tahun ini (perbulan)</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="grafikPendapatan"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Top 5 penjualan -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Top 5 penjualan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <ul>
                    @foreach($menu_teratas as $item)
                    <li class="row mt-2">
                        <img class="img rounded-circle mr-3" style="max-width: 3rem; height: 3rem; display: block; object-fit: cover;" src="{{ empty($item->menu->image)? asset('img/no-image.png') : asset('storage/pictures-menu/'.$item->menu->image)}}" alt="Tidak ada gambar">
                        <h5 class="mb-0 font-weight-bold text-gray-800">{{ $item->menu->nama_menu }} <br><small>{{ $item->total_terjual }} terjual</small></h5>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">



    <!-- Top 5 penjualan -->
    <div class="col-xl-6 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi Terbaru</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <ul>
                    @foreach($latest_transaksi as $item)
                    <li class="row mt-2">
                        <div><img class="img rounded-circle mr-3" style="max-width: 3rem; height: 3rem; display: block; object-fit: cover;" src="{{ empty($item->menu->image)? asset('img/no-image.png') : asset('storage/pictures-menu/'.$item->menu->image)}}" alt="Tidak ada gambar"></div>
                        <h5 class="mb-0 font-weight-bold text-gray-800">{{ $item->pelanggan->nama_pelanggan }} <br><small>{{ $item->id }} | Total: <span class="font-weight-bold">Rp. {{ number_format($item->total_harga,0,",",".") }}</span></small></h5>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Stok Terendah</h6>
            </div>
            <div class="card-body">
                <ul>
                    @foreach($lowest_stok as $item)
                    <li class="row mt-2">
                        <img class="img rounded-circle mr-3" style="max-width: 3rem; height: 3rem; display: block; object-fit: cover;" src="{{ empty($item->menu->image)? asset('img/no-image.png') : asset('storage/pictures-menu/'.$item->menu->image)}}" alt="Tidak ada gambar"></h5>
                        <h5 class="mb-0 font-weight-bold text-gray-800">{{ $item->nama_menu }} <br><small>{{ $item->jumlah }} tersisa</small></h5>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter tanggal</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard" method="post">
                    @csrf
                    <div class="form-group row">
                        <input class="form-control col-md-4" type="date" name="tgl_awal" id="tglawal">
                        <h6 class="mt-2 col-md-2"><b>s/d</b></h6>
                        <input class="form-control col-md-4" type="date" name="tgl_akhir" id="tglakhir">
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{{ url('dashboard') }}" class="btn btn-danger">Reset</a>
                <button type="submit" class="mr-3 btn btn-primary"><i class='fas fa-search'></i></button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    var ctx = document.getElementById("grafikPendapatan");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode($bulan_labels) ?>,
            datasets: [{
                label: "Pendapatan",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: <?= json_encode($data_pendapatan) ?>,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        var value = tooltipItem.yLabel;
                        // Ubah nilai menjadi format rupiah
                        value = formatRupiah(value, 'Rp ');
                        return datasetLabel + ': ' + value;
                    }
                }
            }
        }
    });
</script>
@endpush