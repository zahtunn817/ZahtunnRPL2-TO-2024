<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Hak akses</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Hak akses</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($user as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->roles == 'masterkey' ? 'admin' : $item->roles }}</td>
                    <td>
                        <a href="{{ url('user/'.$item->id) }}" class="btn btn-primary">
                            <i class='fas fa-eye'></i>
                        </a>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#user"
                            data-mode="edit" data-id="{{ $item->id }}"
                            data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-jk="{{ $item->jk }}" data-tgl_lahir="{{ $item->tgl_lahir }}" data-email="{{ $item->email }}" data-nomor_telepon="{{ $item->nomor_telepon }}" data-alamat="{{ $item->alamat }}" data-image="{{ $item->image }}" data-roles="{{ $item->roles }}">
                            <i class='fas fa-pen'></i>
                        </button>
                        <form action="{{ route('user.destroy', $item->id) }}" method="POST"
                            class="d-inline form-delete" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-data"
                                data-nama="{{ $item->nama }}">
                                <i class='fas fa-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
