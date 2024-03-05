<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Meja</th>
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Meja</th>
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($meja as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->nomor_meja }}</td>
                    <td>{{ $m->kapasitas }}</td>
                    <td>{{ $m->status }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formMejaModal"
                            data-mode="edit" data-id="{{ $m->id }}" data-nomor_meja="{{ $m->nomor_meja }}"
                            data-kapasitas="{{ $m->kapasitas }}">
                            <i class='fas fa-pen'></i>
                        </button>
                        </button>
                        <form action="{{ route('meja.destroy', $m->id) }}" method="POST" class="d-inline form-delete"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-data"
                                data-nomor_meja="{{ $m->nomor_meja }}">
                                <i class='fas fa-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
