@extends('templates.pdftem')
@push('style')
@endpush
@section('title')
<h3 class="mb-3 text-center">Absensi</h3>
@endsection
@section('table')
<table class="table">
    <thead>
        <tr class="">
            <th>No</th>
            <th>Nama karyawan</th>
            <th>Tanggal masuk</th>
            <th>Waktu masuk</th>
            <th>Status</th>
            <th>Waktu keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absensi as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->namaKaryawan }}</td>
            <td>{{ $item->tanggalMasuk }}</td>
            <td>{{ $item->waktuMasuk }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->waktuKeluar }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('script')
@endpush