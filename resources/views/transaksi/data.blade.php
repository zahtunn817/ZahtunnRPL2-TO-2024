<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>No faktur</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Pelanggan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>No faktur</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Pelanggan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($transaksi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->tanggal_transaksi }}</td>
                <td>{{ $item->total_harga }}</td>
                <td>{{ optional($item->pelanggan)->nama_pelanggan }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#transaksi" data-mode="edit" data-id="{{ $item->id }}" data-id="{{ $item->id }}" data-tanggal_transaksi="{{ $item->tanggal_transaksi }}" data-total_harga="{{ $item->total_harga }}" data-metode_pembayaran="{{ $item->metode_pembayaran }}" data-keterangan="{{ $item->keterangan }}" data-keterangan="{{ $item->keterangan }}" data-pelanggan_id="{{ optional($item->pelanggan)->nama_pelanggan }}">
                        <i class='fas fa-pen'></i>
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#print" data-id="{{ $item->id }}">
                        <i class='fas fa-print'></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>