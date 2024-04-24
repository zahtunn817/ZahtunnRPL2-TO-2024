@extends('templates.pdftem')
@push('style')
@endpush
@section('title')
<h3 class="mb-3 text-center">Data Kategori</h3>
@endsection
@section('table')
<table class="table">
    <thead>
        <tr class="">
            <th>No</th>
            <th>Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategori as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_kategori }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('script')
@endpush