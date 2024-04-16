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
    </div>
</body>

</html>