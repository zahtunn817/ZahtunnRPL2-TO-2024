@extends('templates.pdftem')
@push('style')
@endpush
@section('title')
<h3 class="mb-3 text-center">Data transaksi</h3>
@endsection
@section('table')
<table class="table">
    <thead>
        <tr class="">
            <th>No</th>
            <th>No transaksi</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Pelanggan</th>
            <th>Keterangan</th>
            <th>Kasir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->id }}</td>
            <td>{{ $item->tanggal_transaksi }}</td>
            <td>{{ $item->total_harga }}</td>
            <td>{{ optional($item->pelanggan)->nama_pelanggan }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>{{ optional($item->user)->nama }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('script')
@endpush