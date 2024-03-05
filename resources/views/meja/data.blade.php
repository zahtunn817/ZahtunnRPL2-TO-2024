<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor meja</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nomor meja</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($meja as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nomor_meja }}</td>
                    <td>{{ $item->kapasitas }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#meja"
                            data-mode="edit" data-id="{{ $item->id }}"
                            data-nomor_meja="{{ $item->nomor_meja }}" data-kapasitas="{{ $item->kapasitas }}">
                            <i class='fas fa-pen'></i>
                        </button>
                        <form action="{{ route('meja.destroy', $item->id) }}" method="POST"
                            class="d-inline form-delete" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-data"
                                data-nomor_meja="{{ $item->nomor_meja }}">
                                <i class='fas fa-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
