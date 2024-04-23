@extends('templates.pdftem')
@push('style')
@endpush
@section('title')
<h3 class="mb-3 text-center">Meja</h3>
@endsection
@section('table')
<table class="table">
    <thead>
        <tr class="">
            <th>No</th>
            <th>Nomor meja</th>
            <th>Kapasitas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($meja as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nomor_meja }}</td>
            <td>{{ $item->kapasitas }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('script')
@endpush