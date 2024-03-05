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
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#stok"
                            data-mode="edit" data-id="{{ $item->id }}"
                            data-menu_id="{{ $item->menu_id }}" data-jumlah="{{ $item->jumlah }}">
                            <i class='fas fa-pen'></i>
                        </button>
                        <form action="{{ route('stok.destroy', $item->id) }}" method="POST"
                            class="d-inline form-delete" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-data"
                                data-nama_menu="{{ $item->nama_menu }}">
                                <i class='fas fa-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
