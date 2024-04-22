@extends('templates.pdftem')
@push('style')
@endpush
@section('title')
<h3 class="mb-3 text-center">Menu</h3>
@endsection
@section('table')
<table class="table">
    <thead>
        <tr class="">
            <th>No</th>
            <th>Jenis</th>
            <th>Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jenis as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_jenis }}</td>
            <td>{{ optional($item->kategori)->nama_kategori }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('script')
@endpush