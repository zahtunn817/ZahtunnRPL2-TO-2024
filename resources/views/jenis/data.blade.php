<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama jenis</th>
                <!-- <th>Kategori</th> -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama jenis</th>
                <!-- <th>Kategori</th> -->
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($jenis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_jenis }}</td>
                <!-- <td>{{ optional($item->kategori)->nama_kategori }}</td> -->
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#jenis" data-mode="edit" data-id="{{ $item->id }}" data-nama_jenis="{{ $item->nama_jenis }}" data-kategori_id="{{ $item->kategori_id }}">
                        <i class='fas fa-pen'></i>
                    </button>
                    <form action="{{ route('jenis.destroy', $item->id) }}" method="POST" class="d-inline form-delete" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data" data-nama_jenis="{{ $item->nama_jenis }}">
                            <i class='fas fa-trash'></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>