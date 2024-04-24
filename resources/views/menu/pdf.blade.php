@extends('templates.pdftem')
@push('style')
@endpush
@section('title')
<h3 class="mb-3 text-center">Data Menu</h3>
@endsection
@section('table')
<table class="table">
    <thead>
        <tr class="">
            <th>No</th>
            <th>Menu</th>
            <th>Deskripsi</th>
            <th>Jenis</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menu as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_menu }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ optional($item->jenis)->nama_jenis }}</td>
            <td>Rp. {{ $item->harga }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('script')
@endpush