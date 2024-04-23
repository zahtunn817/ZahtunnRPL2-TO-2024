@extends('templates.layout')
@push('style')
@endpush
@section('content')
@include('absensi.form')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $page }}</h6>
    </div>
    <div class="card-body">
        <form action="/laporanAbsensi" method="post">
            @csrf
            <div class="form-group row">
                <input class="mr-3 form-control col-sm-2" type="date" name="tgl_awal" id="tglawal">
                <h6 class="mr-3 mt-2"><b>s/d</b></h6>
                <input class="mr-3 form-control col-sm-2" type="date" name="tgl_akhir" id="tglakhir">
                <button type="submit" class="mr-3 btn btn-primary"><i class='fas fa-search'></i></button>
            </div>
        </form>
        <div class="row">
            <h6 class="mr-3 mt-2">Export to</h6>
            <a href="{{ route('laporan-export-absensi') }}" class="mr-3 btn btn-success btn-icon-split" data-toggle="modal" data-target="#">
                <span class="icon text-white-50">
                    <i class="fas fa-file-export"></i>
                </span>
                <span class="text">Excel</span>
            </a>
            <a href="{{ route('laporan-pdf-absensi') }}" class="mr-3 btn btn-danger btn-icon-split" data-toggle="modal" data-target="#">
                <span class="icon text-white-50">
                    <i class="fas fa-file-pdf"></i>
                </span>
                <span class="text">Pdf</span>
            </a>
        </div>
    </div>
</div>
<div class=" card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tampilan</h6>
    </div>
    <div class="card-body">
        @include('absensi.laporan.data')
    </div>
</div>
@endsection
@push('script')
@endpush