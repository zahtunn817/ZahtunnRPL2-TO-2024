@extends('templates.pdftem')
@push('style')
@endpush
@section('title')
<h3 class="mb-3 text-center">Stok</h3>
@endsection
@section('table')
<table class="table">
    <thead>
        <tr class="">
            <th>No</th>
            <th>Stok</th>
            <th>Menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stok as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ optional($item->menu)->nama_menu }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('script')
@endpush