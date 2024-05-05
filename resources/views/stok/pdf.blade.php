@extends('templates.pdftem')
@push('style')
@endpush
@section('title')
<h3 class="mb-3 text-center">Data Stok</h3>
@endsection
@section('table')
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama menu</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stok as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_menu }}</td>
            <td>{{ $item->jumlah }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('script')
@endpush