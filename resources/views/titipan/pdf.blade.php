<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <link href="{{ asset('sbadmin') }}/css/sb-admin-2.min.css" rel="stylesheet"> --}}
</head>
<style>
    body {
        margin: 0;
        font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #141414;
        /* text-align: left; */
        background-color: #fff;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin: 0 auto;
    }

    th,
    td {
        border: 1px solid black;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .text-center {
        text-align: center !important;
    }
</style>

<body>
    <h3 class="mb-3 text-center">Data titipan barang</h3>
    <div class="container">
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
    </div>
</body>

</html>