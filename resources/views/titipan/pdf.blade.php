@extends('templates.pdftem')
@push('style')
@endpush
@section('title')
<h3 class="mb-3 text-center">Data titipan barang</h3>
@endsection
@section('table')
<table class="table">
    <thead>
        <tr class="">
            <th>No</th>
            <th>Nama produk</th>
            <th>Nama supplier</th>
            <th>Harga beli</th>
            <th>Harga jual</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk_titipan as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_produk }}</td>
            <td>{{ $item->nama_supplier }}</td>
            <td>Rp. {{ $item->harga_beli }},00</td>
            <td>Rp. {{ $item->harga_jual }},00</td>
            <td>{{ $item->stok }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('script')
@endpush