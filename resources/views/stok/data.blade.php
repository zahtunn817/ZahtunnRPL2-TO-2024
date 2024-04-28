<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama menu</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama menu</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($stok as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_menu }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#stok" data-mode="edit" data-id="{{ $item->id }}" data-nama_menu="{{ $item->nama_menu }}" data-jumlah="{{ $item->jumlah }}">
                        <i class='fas fa-pen'></i>
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stok" data-id="{{ $item->id }}" data-mode="tambah" data-id="{{ $item->id }}" data-nama_menu="{{ $item->nama_menu }}" data-jumlah="{{ $item->jumlah }}">
                        <i class='fas fa-plus'></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>