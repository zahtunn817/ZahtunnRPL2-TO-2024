<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama produk</th>
                <th>Nama supplier</th>
                <th>Harga beli</th>
                <th>Harga jual</th>
                <th>stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama produk</th>
                <th>Nama supplier</th>
                <th>Harga beli</th>
                <th>Harga jual</th>
                <th>stok</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($produk_titipan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->nama_supplier }}</td>
                    <td>{{ $item->harga_beli }}</td>
                    <td>{{ $item->harga_jual }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#jenis">
                            <i class='fas fa-pen'></i>
                        </button>
                        <form action="{{ route('jenis.destroy', $item->id) }}" method="POST"
                            class="d-inline form-delete" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-data">
                                <i class='fas fa-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
