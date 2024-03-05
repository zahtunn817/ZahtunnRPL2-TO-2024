<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($kategori as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formKategoriModal"
                            data-mode="edit" data-id="{{ $k->id }}" data-nama_kategori="{{ $k->nama_kategori }}">
                            <i class='fas fa-pen'></i>
                        </button>
                        </button>
                        <form action="{{ route('kategori.destroy', $k->id) }}" method="POST"
                            class="d-inline form-delete" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-data"
                                data-nama_kategori="{{ $k->nama_kategori }}">
                                <i class='fas fa-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
