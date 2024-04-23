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
        @include('templates.alert')
        <a href="#" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#absensi">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah absensi</span>
        </a>
        <a href="#" class="btn btn-danger btn-icon-split mb-3" data-toggle="modal" data-target="#absensiExport">
            <span class="icon text-white-50">
                <i class="fas fa-file-export"></i>
            </span>
            <span class="text">Export</span>
        </a>
        <a href="#" class="btn btn-success btn-icon-split mb-3" data-toggle="modal" data-target="#absensiImport">
            <span class="icon text-white-50">
                <i class="fas fa-file-import"></i>
            </span>
            <span class="text">Import</span>
        </a>
        @include('absensi.data')
    </div>
</div>
@endsection
@push('script')
<script>
</script>
@endpush