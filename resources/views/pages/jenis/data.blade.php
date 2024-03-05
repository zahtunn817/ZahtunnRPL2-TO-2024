<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($jenis as $j)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $j->nama_jenis }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formJenisModal"
                            data-mode="edit" data-id="{{ $j->id }}" data-nama_jenis="{{ $j->nama_jenis }}">
                            <i class='fas fa-pen'></i>
                        </button>
                        </button>
                        <form action="{{ route('jenis.destroy', $j->id) }}" method="POST" class="d-inline form-delete"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-data"
                                data-nama_jenis="{{ $j->nama_jenis }}">
                                <i class='fas fa-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
