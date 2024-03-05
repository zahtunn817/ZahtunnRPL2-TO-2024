<style>
    *{
        font-family: sans-serif;
    }

    table{
        width: 100%;
    }

    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<h2>Data titipan barang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama produk</th>
                <th>Nama supplier</th>
                <th>Harga beli</th>
                <th>Harga jual</th>
                <th>Stok</th>
                <th>Tanggal dibuat</th>
                <th>Tanggal diubah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($titipan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->nama_supplier }}</td>
                    <td>Rp. {{ $item->harga_beli }},00</td>
                    <td>Rp. {{ $item->harga_jual }},00</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>