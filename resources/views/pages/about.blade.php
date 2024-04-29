@extends('templates.layout')
@push('style')
@endpush
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Cafe<sup>SE2</sup></h1>
<div class="row">

    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Panduan</h6>
            </div>
            <div class="card-body">
                <h5>Apa yang ada di aplikasi ini:</h5>
                <ul>
                    <li><b>Transaksi</b> dimana kasir dapat melaksanakan dan mencatat transaksi dengan mudah.</li>
                    <li><b>Kelola data</b> dimana admin dapat mengelola data seperti menu, data petugas, dan data pelanggan.</li>
                    <li><b>Laporan</b> dimana admin dapat mengelola laporan untuk disampaikan kepada atasan.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tentang Cafe SE2</h6>
            </div>
            <div class="card-body">
                <p>
                    Cafe SE2 adalah sebuah aplikasi kasir sederhana yang dibuat sebagai salah satu syarat kelulusan di SMK Negeri 1 Cianjur yakni Ujikom (Uji kompetensi).
                </p>
                <h5>Mengapa SE2?</h5>
                <p>
                    Dinamakan seperti itu karena pembuat aplikasi ini berasal dari kelas RPL (Rekayasa Perangkat Lunak) 2 atau <i>Software engineering</i> 2 yang disingkat menjadi SE2. Kelas yang penuh dengan kehangatan dan kebahagiaan
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
@push('script')
@endpush