<style>
    * {
        font-family: monospace;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 8px 12px;
        border: 1px solid #ddd;
        word-wrap: break-word;
        /* Word wrap untuk teks yang panjang */
    }

    .wrap-text {
        max-width: 300px;
        /* Atur lebar maksimum untuk word wrap */
    }
</style>

<body>
    <h2>Cafe SE2</h2>
    <h5>Jl. Siliwangi No.41, Sawah Gede, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43212</h5>
    <hr>
    <h5>No. Faktur : {{ $transaksi->id }}</h5>
    <h5>{{ $transaksi->tanggal_transaksi }}</h5>
    <table border="0">
        <thead>
            <tr>
                <td>Qty</td>
                <td>Item</td>
                <td>Harga</td>
                <td>Total</td>
            </tr>
        </thead>

        <tbody>
            @foreach($transaksi->detailTransaksi as $item)
            <tr>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->menu->nama_menu }}</td>
                <td>{{ number_format($item->menu->harga,0,",",".") }}</td>
                <td>{{ number_format($item->subtotal,0,",",".") }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: center;">
                    --------------------
                </td>
            </tr>
            <tr>
                <td colspan="3">Total</td>
                <td>
                    {{ number_format($transaksi->total_harga,0,",",".") }}
                </td>
            </tr>
        </tfoot>
        </tr>
        </tbody>
    </table>

</body>