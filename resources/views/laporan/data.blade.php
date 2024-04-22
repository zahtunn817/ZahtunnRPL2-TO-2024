<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Tanggal Transaksi</th>
        <th>Metode pembayaran</th>
        <th>Total</th>
        <th>Keterangan</th>
    </thead>
    <tbody>
        @if(isset($laporan))
        @foreach($laporan as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ optional($item->pelanggan)->nama_pelanggan }}</td>
            <td>{{ $item->tanggal_transaksi }}</td>
            <td>{{ $item->total_harga }}</td>
            <td>{{ $item->metode_pembayaran }}</td>
            <td>{{ $item->keterangan }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>